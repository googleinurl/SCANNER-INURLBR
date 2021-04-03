<?php

################################################################################
#This function will filter and mail each url####################################
################################################################################
function __filterEmailif($resultados) {

    if (is_array($resultados)) {
        echo "{$_SESSION["c1"]}|_[ ! ][ INFO ]{$_SESSION["c16"]}[ FILTERING VALUE ]::{$_SESSION["c1"]}[ {$_SESSION["config"]['ifemail']} ]{$_SESSION["c0"]}\n";
        foreach ($resultados as $value) {

            $temp[] = (strstr($value, $_SESSION['config']['ifemail']) ? $value : NULL);
        }

        return array_unique(array_filter($temp));
    }

    RETURN FALSE;
}