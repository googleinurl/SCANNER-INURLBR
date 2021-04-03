<?php

function __positionAlexa($url) {

    $xmlSimple = simplexml_load_file("http://data.alexa.com/data?cli=10&dat=snbamz&url={$url}");
    $resultRank = $xmlSimple->SD[1];
    __plus();
    if ($resultRank):
        $retornoRank = $resultRank->REACH->attributes()->RANK;
    else:
        $retornoRank = 0;
    endif;
    return $retornoRank . __plus();
}