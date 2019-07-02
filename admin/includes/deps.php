<?php
    //DEPS
    function livehelp_deps () {
        global $lh_url;
        wp_enqueue_script("jquery");
        wp_register_style('livehelp_style', $lh_url . "css/style.css");
        wp_enqueue_style('livehelp_style');
    }