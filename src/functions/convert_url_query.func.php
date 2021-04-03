<?php
################################################################################
#FORMATTING POST################################################################
################################################################################
function __convertUrlQuery($query) {

    $queryParts = explode('&', $query);
    $params = [];
    $match = [];
    foreach ($queryParts as $param):
        $item = explode('=', $param);
        preg_match_all("([a-zA-Z0-9]=(.*))", $param, $match);
        $params[$item[0]] = ($match[1][0]);
    endforeach;

    return $params;
}