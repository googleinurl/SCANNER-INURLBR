<?php

function __command($commando, $alvo) {

    if (!is_null($commando)):

        (strstr($commando, '_TARGET_')              ||
                strstr($commando, '_TARGETFULL_')   ||
                strstr($commando, '_TARGETIP_')     ||
                strstr($commando, '_EXPLOIT_')      ||
                strstr($commando, '_URI_')          ||
                strstr($commando, '_URI_')          ||
                strstr($commando, '_PORT_')         ||
                strstr($commando, '_RANDOM_') ? NULL :
                        __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c2"]}SET PARAMETER - command correctly{$_SESSION["c0"]}\n"));

        $uri = parse_url($alvo['url_xpl']);

        $command[0] = str_replace("_TARGET_", "{$_SESSION["c8"]}" . __filterHostname($alvo['url_xpl']) . "{$_SESSION["c1"]}", $commando);
        $command[0] = str_replace('_TARGETIP_', "{$_SESSION["c9"]}{$_SESSION['config']['server_ip']}{$_SESSION["c1"]}", $command[0]);
        $command[0] = str_replace('_TARGETFULL_', "{$_SESSION["c14"]}{$alvo['url_clean']}{$_SESSION["c1"]}", $command[0]);
        $command[0] = str_replace('_TARGETXPL_', "{$_SESSION["c14"]}{$alvo['url_xpl']}{$_SESSION["c1"]}", $command[0]);
        $command[0] = str_replace("_EXPLOIT_", "{$_SESSION["c6"]}{$_SESSION['config']['exploit-command']}{$_SESSION["c1"]}", $command[0]);
        $command[0] = str_replace('_URI_', "{$_SESSION["c8"]}{$uri['path']}{$_SESSION["c1"]}", $command[0]);
        $command[0] = str_replace('_PORT_', "{$_SESSION["c9"]}{$alvo['url_port']}{$_SESSION["c1"]}", $command[0]);
        $command[0] = str_replace('_RANDOM_', "{$_SESSION["c15"]}" . random(5) . "{$_SESSION["c1"]}", $command[0]);

        $command[0] = __crypt($command[0]);

        $command[1] = str_replace("_TARGET_", __filterHostname($alvo['url_clean']), $commando);
        $command[1] = str_replace('_TARGETIP_', $_SESSION['config']['server_ip'], $command[1]);
        $command[1] = str_replace('_TARGETFULL_', $alvo['url_clean'], $command[1]);
        $command[1] = str_replace('_TARGETXPL_', $alvo['url_xpl'], $command[1]);
        $command[1] = str_replace("_EXPLOIT_", $_SESSION['config']['exploit-command'], $command[1]);
        $command[1] = str_replace("_URI_", $uri['path'], $command[1]);
        $command[1] = str_replace("_PORT_", $alvo['url_port'], $command[1]);
        $command[1] = str_replace("_RANDOM_", random(5), $command[1]);
        $command[1] = str_replace("\n", '', str_replace("\r", '', $command[1]));

        $command[1] = __crypt($command[1]);

        echo "\n{$_SESSION["c1"]}[ * ]__\n";
        echo "       |[ EXTERNAL COMMAND ]:: {$command[0]}{$_SESSION["c11"]}\n";
        $_ = array(0 => ($_SESSION['config']['popup']) ? 'sudo xterm -geometry 134x50+1900+0 -title "Auxiliary Window - INURLBR / COMMAND" -e ' : NULL, 1 => ($_SESSION['config']['popup']) ? ' > /dev/null &' : NULL);
        echo ($_SESSION['config']['popup'] ? "\t[!] opening auxiliary window...\n" : NULL);
        $dados = system($_[0] . $command[1] . $_[1], $dados);
        sleep(1) . __plus();

        echo $_SESSION["c0"];
    endif;
    if (empty($dados[0])):
        return FALSE;
    endif;
    unset($dados);
}