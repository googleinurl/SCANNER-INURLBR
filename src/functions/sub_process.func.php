<?php

function __subProcess($resultado = NULL) {

    $resultado_ = is_array($resultado) ? array_unique(array_filter($resultado)) : $resultado;
    if (isset($resultado_)):
        foreach ($resultado_ as $result):
            $result = __filterURLTAG($result);
            $result_ = __validateURL($result) ? $result : NULL;
            $result_ = __replace_url_value($result_);
            $trash_list = (!is_null($_SESSION["config"]["webcache"])) ? 
            str_replace('webcache.,', '', $_SESSION["config"]['trash_list']) : 
            $_SESSION["config"]['trash_list'];
            __plus();
            if (__not_empty($result_) && !__validateOptions($trash_list, $result_, 1)):
                $_SESSION["config"]["totas_urls"].= "{$result_}\n";
            endif;
        endforeach;
    endif;
}

