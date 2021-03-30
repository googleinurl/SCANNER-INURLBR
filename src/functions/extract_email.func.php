<?php

function __extractEmail($html, $url_) {

    $matches = NULL;
    __plus();
    preg_match_all('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/mi', $html, $matches);
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]}|_[ ! ][ INFO ][URL] :: {$_SESSION["c9"]} {$url_} {$_SESSION["c0"]}\n";

    $_matches = array_filter(array_unique(array_unique($matches[0])));
    $matches_ = (__not_empty($_SESSION['config']['ifemail']) ? __filterEmailif($_matches) : $_matches);

    foreach ($matches_ as $valor) {

        if (__validateEmail($valor)) {

            echo "{$_SESSION["c1"]}|_[ + ]{$_SESSION["c0"]}[\033[01;31m {$_SESSION['config']['cont_valores']} {$_SESSION["c0"]}]- {$valor} "
            . (filter_var($valor, FILTER_VALIDATE_EMAIL) ?
                    "{$_SESSION["c14"]}[ OK ]{$_SESSION["c0"]}" : "{$_SESSION["c16"]}[ NO ]{$_SESSION["c0"]}") . "\n";
            (filter_var($valor, FILTER_VALIDATE_EMAIL) ? $_SESSION["config"]["resultado_valores"].="{$valor}\n" : NULL);
            __plus();
            (filter_var($valor, FILTER_VALIDATE_EMAIL) ? __saveValue($_SESSION["config"]["arquivo_output"], $valor) : NULL);

            $_SESSION['config']['cont_valores'] ++;
        }
        __plus();
    }
    __timeSec('delay', "\n");
}