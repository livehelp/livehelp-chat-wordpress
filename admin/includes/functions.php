<?php

    //CHECK IF OPTIONS ARE CHANGED
    function check_for_options_update () {
        //salvo i dati della form in variabili
        if(isset($_POST['conferma']) && $_POST['conferma'] == 'Y') {
            //Form data sent
            $ID = livehelp_fix_id($_POST['Livehelp_ID']);
            update_option('Livehelp_ID', $ID);
            $widget = $_POST['widget'];
            update_option('widget', $widget);

            return TRUE;
        }

        return FALSE;
    }

    function string_to_associative_array ($string, $delimiter = ',', $kv = '=>') {
        $ka = [];
        if($array = explode($delimiter, $string)) { // create parts
            foreach($array as $string) { // each part
                if($string) {
                    if($pos = strpos($string, $kv)) { // key/value delimiter
                        $ka[trim(substr($string, 0, $pos))] = trim(substr($string, $pos + strlen($kv)));
                    }
                    else { // key delimiter not found
                        $ka[] = trim($string);
                    }
                }
            }

        }

        return $ka;

    }