<?php

function __validateOptions($opArray, $validar, $op = NULL) {

    if (empty($validar) || empty($opArray))
        return FALSE;

    $array = explode(',', $opArray);
    if (is_null($op)):
        $busca = explode(',', $validar);
        for ($i = 0; $i <= count($busca); $i++):
            if (in_array($busca[$i], $array))
                return TRUE;
        endfor;
    else:
        for ($i = 0; $i <= count($array); $i++):
            if (strstr($validar, $array[$i]))
                return TRUE;
        endfor;
    endif;
    
    return FALSE;
}