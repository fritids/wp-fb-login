<?php

/*
 * Plugin Info
 */
$pfb_path_dir = plugin_dir_path(__FILE__);

/*
 * General Info
 */
global $pfb_name, $pfb_version, $pfb_data_url, $pfb_data_dir;
$pfb_name       = "WP FB Login";
$pfb_version    = "0.0.1";
$pfb_data_url   = plugins_url(dirname(plugin_basename(__FILE__)));
$pfb_data_dir   = $pfb_path_dir;

global $pfb_opt_app_id, $pfb_opt_api_key, $pfb_opt_api_sec, $pfb_js_callbackfunc, $pfb_fb_valid;
$pfb_opt_app_id         = "pfb_login_app_id";
$pfb_opt_api_key        = "pfb_login_api_key";
$pfb_opt_api_sec        = "pfb_login_api_sec";
$pfb_js_callbackfunc    = "pfb_login_callback_process";
$pfb_fb_valid           = "pfb_login_session_valid";