<?php

function __extractRegCustom($html, $url_) {

    $matches = NULL;
    __plus();
    preg_match_all("#\b{$_SESSION['config']['regexp-filter']}#i", $html, $matches);
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]} |_[ URL ] {$_SESSION["c0"]}=>{$_SESSION["c9"]} {$url_} {$_SESSION["c0"]}\n";

    $matches_ = array_filter(array_unique(array_unique($matches[0])));
    foreach ($matches_ as $valor):
        if (__not_empty($valor)):
            echo "{$_SESSION["c1"]}__[ + ] {$_SESSION["c0"]}[\033[01;31m {$_SESSION['config']['cont_valores']} {$_SESSION["c0"]}]- {$valor}\n";
            $_SESSION["config"]["resultado_valores"].="{$valor}\n";
            __plus();
            __saveValue($_SESSION["config"]["arquivo_output"], $valor);
            $_SESSION['config']['cont_valores'] ++;
        endif;
        __plus();
    endforeach;
    __timeSec('delay', "\n");
}