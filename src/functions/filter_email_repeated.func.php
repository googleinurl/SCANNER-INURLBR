<?php

function __filterEmailsRepeated() {

    echo "\n\n{$_SESSION["c1"]}|[ INFO ][ Filtering the repeated emails  the file {$_SESSION['config']['arquivo_output']} ]{$_SESSION["c0"]}\n";
    $array = __openFile($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output'], 1);
    if (is_array($array)):

        unlink($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output']);
        unset($_SESSION['config']['resultado_valores']);
        foreach ($array as $value):
            __saveValue($_SESSION['config']['out_put_paste'] . $_SESSION['config']['arquivo_output'], $value, 2) . __plus();
            $_SESSION['config']['resultado_valores'] .= "{$value}\n";
        endforeach;
    else:
        echo "\n\n{$_SESSION["c1"]}|[ ERROR ][ ERROR EMAILS FILTERING ]{$_SESSION["c0"]}\n";
    endif;
}