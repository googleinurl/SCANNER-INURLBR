<?php

################################################################################
#CHANGE PROXY FUNCTION IN TIME##################################################
################################################################################
function __timeValueChangeProxy($sec = NULL) {

    return __not_empty($sec) ? date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . " + {$sec} second")) : NULL;
}

function __timeSecChangeProxy($list_proxy) {

    if ($_SESSION["config"]["time_change_proxy"] < date('Y-m-d H:i:s') && !is_null($list_proxy)):
        $_SESSION["config"]["proxy"] = $list_proxy[rand(0, count($list_proxy) - 1)];
        echo ("[ INFO ][PROXY] CHANGE: {$_SESSION["config"]["proxy"]}  - " . date('Y-m-d H:i:s') . "\n");
        $_SESSION["config"]["time_change_proxy"] = __timeValueChangeProxy($_SESSION["config"]["time-proxy"]);
        __plus();
    endif;
}