<?php

    function livehelp_get_options () {
        global $wpdb;

        $options_names = ["Livehelp_ID", "widget"];
        $options_values = [];
        foreach($options_names as $name) {
            $options_values[$name] = $wpdb->get_var("SELECT option_value FROM $wpdb->options where option_name='$name'");
        }

        return $options_values;
    }

    //PUBLIC HEAD HANDLE
    function livehelp_print_widget () {
        $options = livehelp_get_options();

        $lh_id = livehelp_fix_id($options["Livehelp_ID"]);
        $lh_widget = $options["widget"];
        if(!empty($lh_id)) {
            $output = "<!-- Start LiveHelp activation widget - http://www.livehelp.it -->
				<script type=\"text/javascript\">
				    	jQuery(document).ready(function($){
				    	    var timestamp = new Date().getTime();
				    	    var url = \"//server.livehelp.it/widgetjs/$lh_id/$lh_widget.js?x=\" + timestamp;
                            $.getScript(url, function(data, textStatus){
                                console.info(\"LiveHelp: got script\", data);
                                console.info(\"LiveHelp: status\", textStatus);
                            });
                           
				    	});
                </script >
				<!--End LiveHelp widget-->";

            echo $output;
        }
        else {
            //HANDLE ERROR?
        }
    }

    //PUBLIC HEAD HOOK
    add_action('wp_head', 'livehelp_print_widget');