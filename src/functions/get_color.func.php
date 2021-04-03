<?php
(!isset($_SESSION) ? session_start() : NULL);
function __get_color(){

    //DEFINING COLORS
    $_SESSION["c0"] = "\033[0m";      // END OF COLOR
    $_SESSION["c1"] = "\033[1;37m";   // WHITE
    $_SESSION["c2"] = "\033[1;33m";   // YELLOW
    $_SESSION["c3"] = "\033[1;31m";   // RED LIGHT
    $_SESSION["c4"] = "\033[32m";     // GREEN 
    $_SESSION["c5"] = "\033[1;32m";   // GREEN LIGHT
    $_SESSION["c6"] = "\033[0;35m";   // PURPLE
    $_SESSION["c7"] = "\033[1;30m";   // DARK GREY
    $_SESSION["c8"] = "\033[0;34m";   // BLUE
    $_SESSION["c9"] = "\033[0;37m";   // LIGHT GREY
    $_SESSION["c10"] = "\033[0;33m";  // BROWN
    $_SESSION["c11"] = "\033[1;35m";  // LIGHT PURPLE
    $_SESSION["c12"] = "\033[0;31m";  // RED
    $_SESSION["c13"] = "\033[1;36m";  // LIGHT CYAN
    $_SESSION["c14"] = "\033[0;36m";  // CIANO
    $_SESSION["c15"] = "\033[1;34m";  // LIGHT BLUE
    $_SESSION["c16"] = "\033[02;31m"; // DARK RED

}