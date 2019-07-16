<?php

    include "includes/functions.php";
    include "includes/deps.php";
	
	$lh_site = "http://server.livehelp.it";

    function livehelp_update_options_form () {
		global $lh_site;
        $lh_id = livehelp_fix_id(get_option("Livehelp_ID"));
        $lh_widget = get_option("widget");
        $lh_url = "$lh_site/admin/widget_elenco_ajax.asp?idgruppo=$lh_id";
        $response = wp_remote_get($lh_url, []);
        $response = wp_remote_retrieve_body($response);
        $response = string_to_associative_array($response);

        ?>

        <a href="https://www.livehelp.it" target="_blank" title="LiveHelp">
            <img style="margin: 50px 0 0 30px;width: 300px;" src="<?php echo plugins_url('../img/logo.png',__FILE__); ?>" />
        </a>

        <?php

        if(empty($response)) {
            //HANDLE ERROR
        }
        if(check_for_options_update()) { ?>
            <div id="message" class="updated">
                <p><strong><?php _e("Settings saved.") ?></strong></p>
            </div>
        <?php } ?>
        <div class="page-header lh-admin-header">
            <?php
                if(!empty($lh_id)) {
                    ?>
                    <a href="<?php echo "$lh_site/mobile/?id=$lh_id"; ?>" target="_blank">
                        <button class="lh-button lh-button-success"><?php esc_html_e('Agent\'s login', 'livehelp-chat'); ?></button>
                    </a>
                    <a href="<?php echo "$lh_site/admin/main.asp"; ?>" target="_blank">
                        <button class="lh-button lh-button-primary"><?php esc_html_e('Admin dashboard', 'livehelp-chat'); ?></button>
                    </a>
                    <a href="<?php echo "$lh_site/admin/conferma.asp"; ?>" target="_blank">
                        <button class="lh-button lh-button-danger"><?php esc_html_e('Buy NOW', 'livehelp-chat'); ?></button>
                    </a>
                    <?php
                }
            ?>
        </div>

        <?php
        include "includes/main.php";
    }

    //ADMIN MENU HANDLE
    function livehelp_add_option_page () {
		global $lh_url;
        add_menu_page("LiveHelp", "LiveHelp", "administrator", "livehelp-options-page", "livehelp_update_options_form", "dashicons-format-chat");
    }

    //ADMIN
    add_action("admin_enqueue_scripts", "livehelp_deps");
    //ADMIN MENU HOOK
    add_action("admin_menu", "livehelp_add_option_page");
