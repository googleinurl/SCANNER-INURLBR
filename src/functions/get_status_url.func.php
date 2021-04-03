<?php
################################################################################
#GET STATUS HTTP URL############################################################
################################################################################

function __getStatusURL($url) {

    if (__not_empty($url))
        return FALSE;

    __plus();
    $status = array();
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    $resultadoCurl = curl_exec($curl);
    if ($resultadoCurl):
        preg_match_all('(HTTP.*)', $resultadoCurl, $status['http']) . __plus();
        return (!is_null($status['http']) && !empty($status['http'])) ? TRUE : FALSE;
    endif;
    unset($curl);
    return FALSE;
}