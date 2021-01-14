<?php
/*
 *  Author: Nate Arnold<hello@natearnold.me>
 *  Custom functions, support, custom post types and more.
 */

add_theme_support( "post-thumbnails" );

function remove_menus() {
    remove_menu_page( "index.php" ); //Dashboard
    remove_menu_page( "jetpack" ); //Jetpack*
    remove_menu_page( "edit-comments.php" ); //Comments
}

add_action( "admin_menu", "remove_menus" );

// Remove Admin bar
// function remove_admin_bar()
// {
//     return false;
// }

include_once("functions/custom-post-types.php");
include_once("functions/custom-shortcodes.php");
// include_once("functions/custom-taxonomies.php");

function headless_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        
        "edit.php?post_type=funeral_videos", // Custom Post Type
        "edit.php?post_type=page", // Pages
        "edit.php", // Posts
        "separator1", // First separator

        "upload.php", // Media
        "themes.php", // Appearance
        "plugins.php", // Plugins
        "users.php", // Users
        "separator2", // Second separator

        "tools.php", // Tools
        "options-general.php", // Settings
        "separator-last", // Last separator
    );
}
add_filter( "custom_menu_order", "headless_custom_menu_order", 10, 1 );
add_filter( "menu_order", "headless_custom_menu_order", 10, 1 );

function headless_disable_feed() {
    wp_die( __('No feed available, please visit our <a href="'. get_bloginfo("url") .'">homepage</a>!') );
}

add_action("do_feed", "headless_disable_feed", 1);
add_action("do_feed_rdf", "headless_disable_feed", 1);
add_action("do_feed_rss", "headless_disable_feed", 1);
add_action("do_feed_rss2", "headless_disable_feed", 1);
add_action("do_feed_atom", "headless_disable_feed", 1);
add_action("do_feed_rss2_comments", "headless_disable_feed", 1);
add_action("do_feed_atom_comments", "headless_disable_feed", 1);

// Return `null` if an empty value is returned from ACF.
if (!function_exists("acf_nullify_empty")) {
  function acf_nullify_empty($value, $post_id, $field) {
      if (empty($value)) {
          return null;
      }
      return $value;
  }
}
add_filter("acf/format_value", "acf_nullify_empty", 100, 3);

// Remove menu Items
function wpdocs_remove_menus(){
   
//   remove_menu_page( 'index.php' );                          //Dashboard
//   remove_menu_page( 'edit.php' );                           //Posts
//   remove_menu_page( 'upload.php' );                         //Media
//   remove_menu_page( 'edit.php?post_type=page' );            //Pages
//   remove_menu_page( 'edit-comments.php' );                  //Comments
//   remove_menu_page( 'themes.php' );                         //Appearance
//   remove_menu_page( 'plugins.php' );                        //Plugins
//   remove_menu_page( 'users.php' );                          //Users
//   remove_menu_page( 'tools.php' );                          //Tools
//   remove_menu_page( 'options-general.php' );                //Settings
//   remove_menu_page( 'edit.php?post_type=acf-field-group' ); //ACF
   
}
add_action( 'admin_menu', 'wpdocs_remove_menus' );

// Remove items from Admin Bar
function remove_toolbar_items($wp_adminbar) {
  $wp_adminbar->remove_node('wp-logo');
  $wp_adminbar->remove_node('updates');
  $wp_adminbar->remove_node('comments');
  $wp_adminbar->remove_node('new-content');
}

add_action('admin_bar_menu', 'remove_toolbar_items', 999);