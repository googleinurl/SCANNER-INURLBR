<?php

function __getValuesRobots($url) {
    $_[0] = "http://" . __filterHostname($url) . "/robots.txt";
    $_[0] = __request_info($_[0], $_SESSION["config"]["proxy"], NULL);
    echo "\n{$_SESSION["c1"]}[ * ]__\n";
    echo "       |[ ACCESSING FILE ROBOTS ]::\n";
    if (__not_empty($_[0]['corpo']) && $_[0]['server']['http_code'] == 200):
        $_[1] = array_unique(array_filter(explode("\n", $_[0]['corpo'])));
        foreach ($_[1] as $value):
            if (strstr($value, 'Disallow:') || strstr($value, 'Allow:')):
                echo "       |[ value={$value}\n";
                __saveValue($_SESSION['config']['arquivo_output'], $value, 2);
            endif;
            __plus();
        endforeach;
    else:
        echo "       |[ ERRO ] LOAD FILE ROBOTS.TXT [ COD_HTTP ]:: {$_[0]['server']['http_code']}\n{$_SESSION["c0"]}";
    endif;
}