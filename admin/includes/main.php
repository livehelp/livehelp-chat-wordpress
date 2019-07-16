<div class="lh-admin-main">
    <div class="col-sm-6 bg-white">
        <form method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <input type="hidden" name="conferma" value="Y"/>
            <?php settings_fields('ylb_options_group'); ?>
            <div class="col-inner marginTop20">
                <div class="lh-form-group">
                    <label class="lh-label" for="Livehelp_ID">LiveHelp ID <a
                            href="http://www.livehelp.it/vedit/15/registrazione_form_LH.asp?pagina=1539&campagna=WPRESS"
                            target="blank"><?php esc_html_e('Get one for free', 'livehelp-chat'); ?></a></label>
                    <input type="text"
                           id="Livehelp_ID"
                           class="lh-form-control" 
                           value="<?php echo $lh_id; ?>"
                           placeholder="il tuo ID"
                           name="Livehelp_ID"/>
                </div>
            </div>
            <div class="col-inner paddingLeft15">
                <div class="marginBottom15">
                    <label class="lh-label" for="widget"><?php esc_html_e('Choose a dynamic widget', 'livehelp-chat'); ?> <a
                            href="http://server.livehelp.it/admin/widget_elenco.asp?campagna=WPRESS"
                            target="blank"><?php esc_html_e('create one here', 'livehelp-chat'); ?></a></label>
                    <div class="control-group">
                        <select name="widget" id="widget" class="lh-form-control">
                            <option value="0"><?php esc_html_e('Select', 'livehelp-chat'); ?>...</option>
                            <?php if(!empty($lh_id)) {
                                foreach($response as $key => $value) {
                                    $lh_selected = $lh_widget == $key ? "selected" : "";
                                    ?>
                                    <option value="<?php echo $key; ?>" <?php echo $lh_selected; ?>>
                                        <?php echo $value; ?>
                                    </option>;
                                <?php }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="lh-form-group paddingLeft30">
                <input type="submit" class="lh-button lh-button-info" id="submit" name="submit" value="Save"/>
            </div>
        </form>
    </div>
    <div class="col-sm-6 bg-white">
        <div class="col-inner">
            <h1><?php esc_html_e('What is LiveHelp', 'livehelp-chat'); ?><sup>&reg;</sup>?</h1>
            <?php esc_html_e('LiveHelp is the chat for customer care easy to use and to integrate.', 'livehelp-chat'); ?>
            <br><br>
            <?php esc_html_e('Website visitors can chat with an agent of your customer care service and get information about products and services in real time. Only one click to get in contact with a trusted reference.', 'livehelp-chat'); ?>
            <br>
            <h3><?php esc_html_e('15-days free trial!', 'livehelp-chat'); ?></h3>
            <div>
                <h1>How it works</h1>
                <ol>
                    <li>
                        <?php
                        echo sprintf(
                            __( '<a href="%s" target="_blank">Sign up</a> to get your LiveHelp ID.', 'livehelp-chat' ), 
                            'http://www.livehelp.it/vedit/15/registrazione_form_LH.asp?pagina=1539&campagna=WPRESS'
                        );
                        ?>
                    </li>
                    <li>
                        <?php
                        _e('<strong>Fast setup</strong>: insert your Livehelp ID, choose a button layout and its position in the website, click <b>SAVE</b> and the button will immediately appear in your website!', 'livehelp-chat');
                        ?>
                    </li>
                    <li>
                        <?php
                        echo sprintf(
                            __( '<strong>Advanced setup</strong> (customizable dynamic widget with activation rules): Log in your <a href="%s" target="blank">admin dashboard</a> with login data you received by e-mail, go to <a href="%s" target="blank">Dynamic JS Widget</a>, add your widget and choose the layout and activation rules. Refresh this page to save the dynamic widget and activate it.', 'livehelp-chat' ), 
                            'http://server.livehelp.it/',
                            'http://server.livehelp.it/admin/widget_elenco.asp'
                        );
                        ?>
                    </li>
                    <li>
                        <?php
                        _e('<b>log in as agent</b> by clicking the first button on top left. Just for the first time enable the desktop notification.', 'livehelp-chat');
                        ?>
                    </li>
                    <li>
                        <?php
                        _e('<b>Web Users</b> invite operators to chat in a private browser window by clicking the LiveHelp button.', 'livehelp-chat');
                        ?>
                    </li>
                    <li>
                        <?php
                        _e('<b>Agents receive a sound alert</b> (customizable in the admin dashboard) and a desktop notification on their monitors, from which they can accept the chat.', 'livehelp-chat');
                        ?>
                    </li>
                </ol>
                <br>
                <!-- Start LiveHelp Code Copyright 1997 - 2015 www.livehelp.it Sostanza srl  -->
                <script type="text/javascript">
                    function apri_livehelp() {
                        var today = new Date();
                        nuovo_LiveHelp_29244 = window.open('http://server.livehelp.it/client_user_resp/?provenienza=' + encodeURI(document.location.href) + '&info=&template=10314&stanza=Assistenza+Prodotti%2D29244&ID=29244&gruppo=Assistenza&nick=&x=' + today.valueOf(), 'LiveHelpwin1_29244', 'status=no,location=no,toolbar=no,width=500,height=600,resizable=yes');
                        nuovo_LiveHelp_29244.focus();
                    }
                </script>

                <span>
                    <a href="#" onclick="apri_livehelp(); return(false);">
                        <button class="lh-button lh-button-default"><?php _e('Need HELP?', 'livehelp-chat'); ?></button>
                    </a>
                </span>
                <!-- End LiveHelp code -->
            </div>
        </div>
    </div>
</div>