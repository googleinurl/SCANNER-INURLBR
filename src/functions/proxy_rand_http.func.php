<?php

function __proxyHttpRandom() {

    $proxy_file = (file_exists($_SESSION['config']['proxy-http-file']) ? __openFile($_SESSION['config']['proxy-http-file'], 1) : array());
    $proxy_ = is_array($proxy_file) ? array_merge($_SESSION['config']['proxy-http'], $proxy_file) : $_SESSION['config']['proxy-http'];

    return $proxy_[rand(0, count($proxy_) - 1)];
}