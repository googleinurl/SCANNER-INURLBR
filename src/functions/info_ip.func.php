<?php

function __infoIP($ip, $op = 0) {
    if(__not_empty($_SESSION['config']['token_ipinfo'][0])):
        preg_match_all('#\b(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})#si', $ip, $ip);
        $url_request = "https://ipinfo.io/{$ip[0][0]}/json?token={$_SESSION['config']['token_ipinfo'][0]}";
        if (filter_var($ip[0][0], FILTER_VALIDATE_IP)):
            if ($op == 0):
                $request = __request_info($url_request, $_SESSION["config"]["proxy"], NULL);
                __plus();
                return json_decode($request['corpo'], TRUE);
            else:
                $_SESSION['config']['verifica_info'] = NULL;
                $request = __request_info($url_request, $_SESSION["config"]["proxy"], NULL);
                $return = json_decode($request['corpo'], TRUE);
                __plus();
                return "{$return['city']}, {$return['country']}, {$return['hostname']}, {$return['org']}";
            endif;
        endif;
    endif;
    return FALSE;
}