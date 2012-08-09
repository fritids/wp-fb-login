=== Plugin Name ===
Contributors: Jacob Perez
Tags: facebook connect, login with facebook, facebook autoconnect, facebook, connect, login, logon, wordpress
Requires at least: 2.5
Tested up to: 3.4
Stable tag: 2.3.1

A LoginLogout with Facebook Connect button, offering hassle-free login for your readers. Clean and extensible.


== Description ==

The simple concept behind WP FB Login is to offer an easy-to-use that lets readers login to your blog with either their Facebook account or local Wordpress credentials. Although many "Facebook Connect" plugins do exist, most of them are either overly complex and difficult to customize, or fail to provide a seamless experience for new  visitors. I wrote this plugin to provide what the others didn't:

* Full support for both Wordpress and Buddypress.
* No user interaction is required - the login process is transparent to new and returning users alike.
* Existing users who connect with FB retain the same local user accounts as before.
* New visitors will be given new user accounts, which can be retained even if you remove the plugin.
* Facebook profile pictures can be used as avatars, even on pre-existing comments.
* User registration announcements can be pushed to Facebook walls.
* No contact with the Facebook API after the login completes - so no slow pageloads.
* Won't bloat your database with duplicate user accounts, extra fields, or unnecessary complications.
* Custom logging options can notify you whenever someone connects with Facebook.
* A powerful set of hooks and filters allow developers to easily tailor the login process to their personal needs: redirect to a custom page, fill xProfile data with information from Facebook, setup permissions based on social connections, and more.
* Fully HTML/CSS valid.


== Installation ==

To allow your users to login with their Facebook accounts, you must first setup an Application for your site:

1. Visit [developers.facebook.com/apps](http://developers.facebook.com/apps) and click the "Create New App" button.
2. Type in a name (i.e. the name of your blog). This is what Facebook will show on the login popup.
3. Facebook may now require you to verify your account before continuing (see [here](https://developers.facebook.com/blog/post/386/) for more information).
4. Once your app has been created, fill in your "Site URL" under "Select how your app integrates with Facebook -&gt; Website".  Note: http://example.com/ and http://www.example.com/ are *not* the same.
5. Click "Save Changes," and note the App ID and Secret (you'll need them in a minute).

Then you can install the plugin:

1. Download the latest version from [here](http://wordpress.org/extend/plugins/wp-fb-autoconnect/), unzip it, and upload the extracted files to your plugins directory.
2. Login to your Wordpress admin panel and activate the plugin.
3. Navigate to Settings -> WP-FB AutoConn.
4. Enter your App ID and Secret (obtained above), and click "Save."
5. If you're using BuddyPress, a Facebook button will automatically be added to its built-in login panel.  If not, navigate to Appearance -&gt; Widgets and add the WP-FB AutoConnect widget to your sidebar. 

That's it - users should now be able to use the widget to login to your blog with their Facebook accounts.

For more information on exactly how this plugin's login process works and how it can be customized,


== Frequently Asked Questions ==


== Screenshots ==



== Changelog ==

= 0.0.1 (2012-08-09) =
* First Release


== Support ==
