<?php

function __timeSec($camp, $value = NULL) {

    echo!is_null($_SESSION['config'][$camp]) && 
    !empty($_SESSION['config'][$camp]) ? 
    "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ TIME SEC/DELAY ]::{$_SESSION["c1"]}{ {$_SESSION["c8"]}[ {$_SESSION['config'][$camp]} ]{$_SESSION["c1"]} }{$_SESSION["c0"]}{$value}" : NULL;
    !is_null($_SESSION['config'][$camp]) ?
     sleep($_SESSION['config'][$camp]) : NULL;
}
