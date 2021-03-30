<?php

function __saveValue($arquivo, $valor, $op = NULL) {

    $path = !__not_empty($_SESSION['config']['save-as']) ? $_SESSION['config']['out_put_paste'] : NULL;
    echo ($op == 1) ?
            "\n{$_SESSION["c1"]}|_[ + ]{$_SESSION["c7"]} VALUE SAVED IN THE FILE::{$_SESSION["c9"]} {$arquivo}{$_SESSION["c0"]}" : NULL;
    file_put_contents(($op == 2) ? $arquivo : $path . $arquivo, "{$valor}\n", FILE_APPEND);
}