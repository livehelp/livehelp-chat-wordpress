<?php
    /*
    Plugin Name: Livehelp
    Plugin URI: http://www.livehelp.it/index.asp?lingua=EN
    Description: Provide livehelp chat support
    Version: 1.3.4
    Author: Sostanza s.r.l
    Author URI: http://www.livehelp.it/index.asp?lingua=EN
    */

    // Exit if accessed directly.
    if(!defined('ABSPATH')) {
        exit;
    }

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
   