<?php
    /*
    Plugin Name: LiveHelp
    Plugin URI: http://www.livehelp.it/index.asp?lingua=EN
    Description: Provide livehelp chat support
    Version: 1.4.2
    Author: Sostanza s.r.l
    Author URI: http://www.livehelp.it/index.asp?lingua=EN
    Text Domain: livehelp-chat
    */

    // Exit if accessed directly.
    if(!defined('ABSPATH')) {
        exit;
    }

    add_action('init', function() {
        load_plugin_textdomain( 'livehelp-chat' );
    });
    
    add_action('admin_init', function() {
        $arraya_ecl_v = get_plugin_data ( __FILE__ );
        $new_version = $arraya_ecl_v['Version'];
            
        if ( version_compare($new_version,  get_option('livehelp_version') ) == 1 ) {
            update_option( 'livehelp_version', $new_version );   
        }
    });

    $lh_path = plugin_dir_path(__FILE__);
    $lh_ds = "/";
    $lh_url = rtrim(WP_PLUGIN_URL . $lh_ds . basename(__DIR__), $lh_ds) . $lh_ds;
    $lh_shared = $lh_path . "includes/shared.php";

    if(is_admin()) {
        $lh_main = $lh_path . "admin/admin.php";
    }
    else {
        $lh_main = $lh_path . "public/public.php";
    }

    require_once($lh_shared);
    require_once($lh_main);
   
