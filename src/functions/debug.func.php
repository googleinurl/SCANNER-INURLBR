<?php

function __debug($valor, $op = NULL) {

    return isset($_SESSION["config"]["debug"]) && 
    __validateOptions($_SESSION["config"]["debug"], $op) ? 
    "\n[ INFO ][ FUNCTION ]=>{$valor['function']}[ DEBUG ] => \n" . print_r($valor['debug']) . "\n" : NULL;
}