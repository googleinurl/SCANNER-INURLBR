<?php

################################################################################
#Base64 string encryption md5 , hexadecimal, hex, base64 & random string########
################################################################################
function __crypt($url) {

    preg_match_all("#(md5|base64|hex|random)(\()(.*?)(\))#", $url, $_);
    $cont = 0;

    foreach ($_[0] as $replace) {

        if (strstr($replace, 'md5('))
            $func = 'md5';

        if (strstr($replace, 'base64('))
            $func = 'base64_encode';

        if (strstr($replace, 'hex('))
            $func = 'bin2hex';

        if (strstr($replace, 'random('))
            $func = 'random';

        $url = str_replace($replace, $func($_[3][$cont]), $url);
        $cont ++;
    }
    return $url;
}

################################################################################
#GENERATE RANDOM STRING#########################################################
################################################################################
#(PHP4,PHP5) Shuffle an array http://php.net/manual/en/function.shuffle.php
function random($__) {
    $_ = 'A,a,B,b,C,c,D,d,E,e,F,f,G,g,';
    $_.= 'H,h,I,i,J,j,K,k,L,l,M,m,';
    $_.= '1,2,3,4,5,6,7,8,9,0';
    $_ = explode(',', $_);
    shuffle($_);
    $_ = implode($_, '');
    return substr($_, 0, $__);
}