<?php
    function livehelp_fix_id ($id = "") {
        if(is_string($id)) {
            return str_replace("ID-", "", $id);
        }

        return $id;
    }