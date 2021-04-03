<?php

function __openFile($arquivo, $op = NULL) {

    if (isset($arquivo) && !empty($arquivo)) {
        $resultadoURL = array_unique(array_filter(explode("\n", file_get_contents($arquivo))));

        if (is_array($resultadoURL)) {

            return ($op == 1 ? $resultadoURL : __process($resultadoURL));
        }
    }
}