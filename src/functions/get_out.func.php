<?php


function __getOut($msg) {

    (!function_exists('__ircQuit') ? NULL :
    __ircQuit($_SESSION['config']['irc']));
    print_r($msg);
    print($_SESSION["c0"]);
    exit(1);
 
}