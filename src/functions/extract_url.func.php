<?php

function __extractURLs($html, $url_) {
   
    __plus();
    $reg_tag = 'href=\"|src=\"|value=\"';
    $reg = "#\b({$reg_tag}http[s]?://|{$reg_tag}ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si";
    preg_match_all($reg, $html, $matches);
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]} |_[ INFO ][URL] {$_SESSION["c0"]}=>{$_SESSION["c9"]} {$url_} {$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    $matches_ = array_unique(array_filter($matches[0]));
    $trash_list = $_SESSION["config"]['trash_list'];
    $trash_list_ = (isset($_SESSION["config"]["webcache"])) ? str_replace('webcache.,', '', $trash_list) : $trash_list;

    foreach ($matches_ as $valor):

        $valor = __filterURLTAG($valor);
        if (__validateURL($valor) && !__validateOptions($trash_list_, $valor, 1)):
            echo "{$_SESSION["c1"]}__[ + ]{$_SESSION["c0"]}[\033[01;31m {$_SESSION["config"]['cont_url']}"
            . " {$_SESSION["c9"]}]- {$valor}{$_SESSION["c0"]}\n";
            $_SESSION["config"]["resultado_valores"].="{$valor}\n";
            __plus();
            __saveValue($_SESSION["config"]["arquivo_output"], $valor) . __plus();
            $_SESSION["config"]["cont_url"] ++;
        endif;
        __plus();
    endforeach;
    __timeSec('delay', "\n");
}

function __extractURLDomainsArchive($domain_) {
    
    __plus();
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]} |_[ INFO ][URL EXTRACT FROM DOMAIN] {$_SESSION["c0"]}=>{$_SESSION["c9"]} {$domain_} {$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    $url_ = "http://web.archive.org/cdx/search/cdx?url=*.{$domain_}/*&output=text&fl=original&collapse=urlkey";
    $matches_ = array_unique(array_filter(explode("\n", __request_info($url_, $proxy, $postDados_)['corpo'])));
    $trash_list = $_SESSION["config"]['trash_list'];
    foreach ($matches_ as $valor):

        $valor = __filterURLTAG($valor);
        if (__validateURL($valor) && !__validateOptions($trash_list_, $valor, 1)):
            echo "{$_SESSION["c1"]}__[ + ]{$_SESSION["c0"]}[\033[01;31m {$_SESSION["config"]['cont_url']}"
            . " {$_SESSION["c9"]}]- {$valor}{$_SESSION["c0"]}\n";
            $_SESSION["config"]["resultado_valores"].="{$valor}\n";
            __plus();
            __saveValue($_SESSION["config"]["arquivo_output"], $valor) . __plus();
            $_SESSION["config"]["cont_url"] ++;
        endif;
        __plus();
    endforeach;
    __timeSec('delay', "\n");
    


}