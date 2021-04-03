<?php

function __filterDomainUnique($resultados) {
    if (is_array($resultados)):
        foreach ($resultados as $value):
            $temp[] = "http://" . __filterHostname($value);
        endforeach;
        return array_unique(array_filter($temp));
    endif;
    return FALSE;
}