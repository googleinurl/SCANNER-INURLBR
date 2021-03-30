<?php

function __pageEngine($confArray, $motorNome, $motorURL, $dork, $postDados, $pagStart, $pagLimit, $pagIncrement, $pagStart2 = NULL, $pagIncrement2 = NULL) {

    __plus();

    echo ("\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ ENGINE ]::{$_SESSION["c1"]}[ {$motorNome} ]{$_SESSION["c0"]}\n");
    echo (!is_null($_SESSION['config']['max_pag']) ? ("{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ LIMIT PAG ]::{$_SESSION["c1"]}[ {$_SESSION['config']['max_pag']} ]{$_SESSION["c0"]}\n") : NULL);
    $http_proxy = __not_empty($_SESSION['config']['proxy-http-file']) || __not_empty($_SESSION['config']['proxy-http']) ? __proxyHttpRandom() : NULL;
    echo __not_empty($http_proxy) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ HTTP_PROXY ]:: {$http_proxy}{$_SESSION["c0"]}\n" : NULL;
    echo "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ SEARCHING ]:: {$_SESSION["c0"]}\n";

    $count_max_label = 0;
    $contMaxpg = 0;
    $pagStart2_ = $pagStart2;
    $pagStart3_ = $pagStart2;
    while ($pagStart <= $pagLimit):
        
        echo "{$_SESSION["c16"]}||{$_SESSION["c0"]}";
        __plus();

        if ($count_max_label==39):
            echo "\n";
            $count_max_label=0;
        else:
            $count_max_label++;
        endif;


        $_proxy = __not_empty($confArray["list_proxy_rand"]) && !__not_empty($_SESSION['config']['time-proxy']) ? $confArray["list_proxy_rand"] : $_SESSION["config"]["proxy"];
        $proxy = __not_empty($_SESSION['config']['proxy-file']) && __not_empty($_SESSION['config']['time-proxy']) ? __timeSecChangeProxy($confArray["list_proxy_file"]) : $_proxy;

        $murl[0] = str_replace("[DORK]", $dork, $motorURL);
        $murl[0] = str_replace("[PAG]", $pagStart, $murl[0]);
        $murl[0] = str_replace("[PAG2]", $pagStart2_, $murl[0]);
        $murl[0] = str_replace("[PAG3]", $pagStart3_, $murl[0]);
        $murl[0] = str_replace("[RANDOM]", base64_encode(intval(rand() % 255) . intval(rand() % 2553333)), $murl[0]);
        $murl[0] = str_replace("[IP]", intval(rand() % 255) . "." . intval(rand() % 255) . "." . intval(rand() % 255) . "." . intval(rand() % 255), $murl[0]);

        
        $postDados_ = !is_null($postDados) ? __convertUrlQuery(parse_url(urldecode($murl[0]), PHP_URL_QUERY)) : NULL;
        
        __debug(array('debug' => "[ URL ENGINE ]{$http_proxy}{$murl[0]}", 'function' => __FUNCTION__), 1);
        
        $request__ = __request_info($http_proxy . $murl[0], $proxy, $postDados_);

        __plus();

        $tmp_url = ($motorNome == 'GOOGLE API') ? __filterURLJson($request__["corpo"]) : __filterURL($request__["corpo"], $motorNome);
        __subProcess($tmp_url);
        __plus();

        $pagStart = ($pagStart + $pagIncrement);
        $pagStart2_ = ($pagStart2_ + $pagIncrement);
        $pagStart3_ = ($pagStart3_ + $pagIncrement2);
        $contMaxpg++;
        __timeSec('delay');

        if (!is_null($_SESSION['config']['max_pag']) && $_SESSION['config']['max_pag'] == $contMaxpg):
            break;
        endif;
        
    endwhile;
}

