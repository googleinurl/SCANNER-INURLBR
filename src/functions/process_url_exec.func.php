<?php

function __processUrlExec($url, $contUrl) {

    
    
    if (!__not_empty($url))
        return FALSE;
    

    $host = (!is_null($_SESSION['config']['replace'])) ?
    __replace_url_value($_SESSION['config']['replace'], urldecode($_SESSION['config']['tipoerro'] == 3 ? __filterHostname($url) : ($url))) :
            urldecode($_SESSION['config']['tipoerro'] == 3 ? __filterHostname($url) : ($url));

    $target_['url_xpl'] = __remove($_SESSION['config']['remove'], __mountURLExploit(!is_null($_SESSION['config']['url']) ? 
            $_SESSION['config']['url'] . $host : $host));
    
    $target_['url_clean'] = ($_SESSION['config']['tipoerro'] == 4) ? 
            $_SESSION['config']['url'] . $host : urldecode($url);
    
    $info = __infoServer($target_['url_xpl'], $_SESSION['config']['exploit-post']);

    
    if ($_SESSION['config']['tipoerro'] != 5 && is_null($_SESSION['config']['extrai-email']) &&
            is_null($_SESSION['config']['extrai-url']) && is_null($_SESSION['config']['regexp-filter'])):

        $ifredirect = strstr($_SESSION['config']['curl_getinfo']['redirect_url'], $_SESSION['config']['ifredirect']) ?
                "{$_SESSION["c4"]}{$_SESSION['config']['curl_getinfo']['redirect_url']}" : NULL;
        $exget = (__not_empty($_SESSION['config']['exploit-get']) ? ' _/GET=> ' . $_SESSION['config']['exploit-get'] : NULL);
        $expost = (__not_empty($_SESSION['config']['exploit-post']) ? ' _/POST=> ' . $_SESSION['config']['exploit-post_str'] : NULL);
        $valid_return = (__not_empty($_SESSION['config']['erroReturn'])) ? TRUE : FALSE;
        $info = ($valid_return) ? "{$_SESSION["c4"]}{$info}" : $info;
        $target_ip = ($valid_return) ? "{$_SESSION["c4"]}{$_SESSION['config']['info_ip']}" : $_SESSION['config']['info_ip'];
        $title = ($valid_return) ? "{$_SESSION["c4"]}{$_SESSION['config']['title']}" : $_SESSION['config']['title'];

        $anime = ($valid_return) ? '[ ! ]' : '[ - ]';
        echo __plus() . "\n";

        echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
        echo "{$_SESSION["c1"]}[ + ] [{$_SESSION["c2"]} {$contUrl} / {$_SESSION['config']['total_url']} {$_SESSION["c1"]}]{$_SESSION["c9"]}-[ " . date("H:i:s") . " ]{$_SESSION["c1"]} {$_SESSION["c0"]}\n";
        echo "{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Target:: {$_SESSION["c1"]}{$_SESSION["c9"]} {$_SESSION['config']['vull_style']}{$target_['url_clean']}{$_SESSION["c1"]} {$_SESSION["c0"]}\n";
        echo "{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Exploit:: {$_SESSION["c0"]}{$_SESSION["c3"]}{$exget}{$expost}{$_SESSION["c0"]}\n";
        echo (__not_empty($_SESSION['config']['replace'])) ? ("{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Replace:: {$_SESSION["c0"]}{$_SESSION["c3"]}{$_SESSION['config']['replace']}{$_SESSION["c0"]}\n") : NULL;
        echo (__not_empty($_SESSION['config']['remove'])) ? ("{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Remove:: {$_SESSION["c0"]}{$_SESSION["c3"]}{$_SESSION['config']['remove']}{$_SESSION["c0"]}\n") : NULL;
        echo (isset($_SESSION['config']['cms-check-resultado'])) ? ("{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}CMS check:: {$_SESSION["c0"]}{$_SESSION["c3"]}{$_SESSION['config']['cms-check-resultado']}{$_SESSION["c0"]}\n") : NULL;
        echo "{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Title:: {$_SESSION["c0"]}{$_SESSION["c9"]}{$title}{$_SESSION["c1"]}\n";
        echo "{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Information Server:: {$_SESSION["c0"]}{$_SESSION["c9"]}{$info}{$_SESSION["c1"]}\n";
        echo "{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}More details:: {$_SESSION["c0"]}{$_SESSION["c9"]}{$target_ip}{$_SESSION["c1"]}\n";
        echo "{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Found:: {$_SESSION["c9"]}" . ($valid_return ? "{$_SESSION["c4"]}{$_SESSION['config']['erroReturn']}" : "UNIDENTIFIED") . "{$_SESSION["c0"]}";
        echo (__not_empty($ifredirect) ? "\n{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}URL REDIRECT:: {$_SESSION["c9"]}{$ifredirect}{$_SESSION["c0"]}" : NULL);
        echo (__not_empty($_SESSION['config']['error_conection']) ? "\n{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}ERROR CONECTION:: {$_SESSION["c2"]}{$_SESSION['config']['error_conection']}{$_SESSION["c0"]}" : NULL);
        ($valid_return ? __saveValue($_SESSION['config']['arquivo_output'], $target_['url_xpl'], 1) : NULL);
        echo ($_SESSION['config']['sendmail'] ? "\n{$_SESSION["c1"]}[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}SEND MAIL:: {$_SESSION["c9"]}" . (($valid_return) ? "{$_SESSION["c4"]}" : NULL) . __sendMail($_SESSION['config']['sendmail'], $target_['url_xpl']) . "{$_SESSION["c0"]}" : NULL);
        (__not_empty($_SESSION['config']['arquivo_output_all']) ? __saveValue($_SESSION['config']['arquivo_output_all'], $target_['url_xpl'], NULL) : NULL);
        

        if ($valid_return):
            __plus();
            (__not_empty($_SESSION['config']['irc']['irc_connection']) ?
                            __ircMsg($_SESSION['config']['irc'], "{$_SESSION['config']['erroReturn']}::: {$target_['url_xpl']}") : NULL);
            
            __plus();
            (__not_empty($_SESSION['config']['command-vul']) ? __command($_SESSION['config']['command-vul'], $target_) : NULL);
            
            __plus();
            (__not_empty($_SESSION['config']['exploit-vul-id']) ?
                            __configExploitsExec($_SESSION['config']['exploit-vul-id'], $target_) : NULL);
            
        endif;
        __plus();
        (__not_empty($_SESSION['config']['command-all']) ? __command($_SESSION['config']['command-all'], $target_) : NULL);
        
        __plus();
        (__not_empty($_SESSION['config']['sub-file']) &&
                is_array($_SESSION['config']['sub-file']) ? __subExecExploits($target_['url_xpl'], $_SESSION['config']['sub-file']) : NULL);
        
        __plus();
        (__not_empty($_SESSION['config']['exploit-all-id']) ? __configExploitsExec($_SESSION['config']['exploit-all-id'], $target_) : NULL);
        

        ($_SESSION['config']['robots'] ? __getValuesRobots($host) : NULL);
        
        __plus();
        (__not_empty($_SESSION['config']['port-scan']) ? __portScan(array(0 => $target_, 1 => $_SESSION['config']['port-scan'])) : NULL);
        

        __timeSec('delay', "\n");
    endif;
}