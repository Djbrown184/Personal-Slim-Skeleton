<?php

    function StaffSecurity($s, $res)
    {
        
        if($s['settings']['maintenance']):
            $staff = in_array($_SERVER["HTTP_X_REAL_IP"], $s['settings']['staff']);
            if(!$staff):
                return $res->withStatus(302)->withHeader('Location', '/maintenance');
            endif;
        endif;

    }