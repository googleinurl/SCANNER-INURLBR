<?php

function __filterHostname($url) {
    $alvo_ = NULL;
    //#\b((((ht|f)tps?://*)|(www|ftp)\.)[a-zA-Z0-9-\.]+)#i - 1.0
    preg_match_all('@^(?:(ht|f)tps?://*)?([^/]+)@i', $url, $alvo_);
    return str_replace("/", '', str_replace("ftps:", '', str_replace("ftp:", '', str_replace("https:", '', str_replace("http:", '', $alvo_[0][0])))));
}