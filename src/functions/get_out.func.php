<?php


function __getOut($msg) {

    (!function_exists('__ircQuit') ? NULL :
    __ircQuit($_SESSION['config']['irc']));
    print_r($msg);
    exit(1);
 
}