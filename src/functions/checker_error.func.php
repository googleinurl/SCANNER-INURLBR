<?php

function __checkError($html_) {
    if (__validateOptions($_SESSION['config']['tipoerro'], '2')):
        $_SESSION['validation']['error-custom'] = __not_empty($_SESSION['config']['achar']) ?
        $_SESSION['config']['achar'] : NULL;
    endif;
    if (__validateOptions('1,3,4', $_SESSION['config']['tipoerro'])):
        if (__validateOptions('3,4', $_SESSION['config']['tipoerro'])):
            $_SESSION['validation']['error-custom'] = __not_empty($_SESSION['config']['achar']) ?
            $_SESSION['config']['achar'] : NULL;
        endif;
        $_SESSION['config']['cms-check-resultado'] = (!is_null($_SESSION['config']['cms-check'])) ?
        __SimpleCheckCMS($html_) : NULL;
    endif;
    if (!is_null($_SESSION['config']['regexp'])):
        preg_match_all("#\b{$_SESSION['config']['regexp']}#i", $html_, $match);
        __plus();
        return (isset($match[0][0]) && !empty($match[0][0]) ?
        " regular expression->{$_SESSION['config']['regexp']} - " . $match[0][0] . " FOUND! " : NULL);
    else:
        foreach ($_SESSION['validation'] as $campo => $valor):
            __plus();
            if (__validate_error_db($html_, $_SESSION['validation'][$campo], $campo)):
                __plus();
                return(" {$campo}  -  VALUE: {$_SESSION['validation'][$campo]}");
            endif;
        endforeach;
    endif;
}