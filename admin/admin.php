<?php

/*
 * WP FB Login Admin Settings
 */

/**
 * Generate a menu for the WP FB Login Settings
 *
 * @access public
 * @param none
 * @return none
 */
function create_admin_page() {

    global $pfb_name;
    add_options_page("$pfb_name Options", 'WP FB Login', 'administrator',
        "wp-fb-login", "wp_fb_login_admin_page");
}

add_action('admin_menu', 'create_admin_page');

/**
 * Link to Settings on Plugins page
 *
 * @access public
 * @param array @links
 * @param string $file
 * @return array
 */
function pfb_create_plugin_links($links, $file) {
    if(dirname(dirname(plugin_basename( __FILE__ ))) == dirname($file))
        $links[] = '<a href="options-general.php?page=' . "wp-fb-login" .'">' .
            __('Settings','sitemap') . '</a>';
    return $links;
}

add_filter('plugin_action_links', 'pfb_create_plugin_links', 10, 2);

/**
 * Generate a page for the WP FB Login Settings
 *
 * @access public
 * @param none
 * @return none
 */
function wp_fb_login_admin_page() {
    global $pfb_opt_app_id, $pfb_opt_api_key, $pfb_opt_api_sec, $pfb_fb_valid;
    
    if (isset($_POST['pfb_api_updates'])) {
        
        $fbValid = check_validate_key($_POST[$pfb_opt_api_key], $_POST[$pfb_opt_api_sec]);
        
        if( $fbValid && method_exists($fbValid->api_client, 'admin_getAppProperties') ) {
            
            $appInfo = $fbValid->api_client->admin_getAppProperties(array('app_id',
                'application_name'));
            
            if( is_array($appInfo) ) {
                $appID = sprintf("%.0f", $appInfo['app_id']);
                $message = '"' . $appInfo['application_name'] . '" (ID ' . $appID . ')'; 
            } else if( $appInfo->app_id ) {   
                /* Why does this happen? Presumably because another plugin includes a different 
                    version of the API that uses objects instead of arrays */
                $appID = sprintf("%.0f", $appInfo->app_id);
                $message = '"' . $appInfo->application_name . '" (ID ' . $appID . ')';
            } else {
                $fbValid = false;
            }
        }
        
        if ($fbValid) {
            update_option($pfb_fb_valid, 1);
            ?>
            <div class="updated">
                <p>
                    <strong>Successfully connected with <?php echo $message ?></strong>
                </p>
            </div>
            <?php
        } else {
            update_option($pfb_fb_valid, 0);
            $message = "ERROR: Facebook could not validate your session key and secret!  " .
                "Are you sure you've entered them correctly?";
            ?>
            <div class="updated">
                <p><?php echo $message ?></p>
            </div>
            <?php
        }
        
        //We can save these either way, because if "valid" isn't set, a button won't be shown.
        update_option($pfb_opt_app_id, $appID);
        update_option($pfb_opt_api_key, $_POST[$pfb_opt_api_key] );
        update_option($pfb_opt_api_sec, $_POST[$pfb_opt_api_sec] );
    }
    ?>
    <div>
        <h3>Facebook Connect</h3>
        <form name="formFacebook" method="post" action="">
            <input type="text" size="40" name="<?php echo 
                $pfb_opt_api_key?>" value="<?php echo 
                    get_option($pfb_opt_api_key) ?>" /> App ID<br />
            <input type="text" size="40" name="<?php echo 
                $pfb_opt_api_sec?>" value="<?php echo 
                    get_option($pfb_opt_api_sec) ?>" /> App Secret
            <input type="hidden" name="pfb_api_updates" value="1" />
            <div class="submit">
                <input type="submit" name="Submit" value="Connect" />
            </div>
        </form>
    </div>
    <?php
}

/**
 * Use the key and secret to generate an auth_token, just to test if they're valid.
 * If so, return a Facebook API instance.  Otherwise, return null.
 *
 * @access public
 * @param string $key
 * @param string $secret
 * @return object/null
 */
function check_validate_key($key, $secret) {
    global $pfb_data_dir;
    
    require_once($pfb_data_dir . '/facebook.lib/php/facebook.php');
    
    $facebook = new Facebook($key, $secret, null, true);
    $facebook->api_client->session_key = 0;
    
    try {
       $token = $facebook->api_client->auth_createToken();
       return $facebook;
    } catch(Exception $e) {
        return null;
    }
}