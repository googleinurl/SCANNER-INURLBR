<?php

function __exitProcess() {

    $file = !is_null($_SESSION['config']['arquivo_output']) ? $_SESSION['config']['arquivo_output'] : NULL;
    $file_all = !is_null($_SESSION['config']['arquivo_output_all']) ? $_SESSION['config']['arquivo_output_all'] : NULL;
    (($_SESSION['config']['extrai-email']) ? __filterEmailsRepeated() : NULL);
    $cont = count(explode("\n", $_SESSION['config']['resultado_valores'])) - 1;
    echo "\n\n{$_SESSION["c1"]}[ INFO ] [ Shutting down ]{$_SESSION["c0"]}";
    echo "\n{$_SESSION["c1"]}[ INFO ] [ End of process INURLBR at [ " . date("d-m-Y H:i:s") . " ]{$_SESSION["c0"]}";
    echo "\n{$_SESSION["c1"]}[ INFO ] {$_SESSION["c0"]}{$_SESSION["c16"]}[ TOTAL FILTERED VALUES ]::{$_SESSION["c0"]}{$_SESSION["c1"]} [ {$cont} ]{$_SESSION["c0"]}";
    echo!is_null($file) ? "\n{$_SESSION["c1"]}[ INFO ] {$_SESSION["c16"]}[ OUTPUT FILE ]::{$_SESSION["c1"]} [ " . getcwd() . "/{$_SESSION['config']['out_put_paste']}{$file}  ]{$_SESSION["c0"]}" : NULL;
    echo!is_null($file_all) ? "\n{$_SESSION["c1"]}[ INFO ] {$_SESSION["c16"]}[ OUTPUT FILE ALL ]::{$_SESSION["c1"]} [ " . getcwd() . "/{$_SESSION['config']['out_put_paste']}{$file_all}  ]{$_SESSION["c0"]}" : NULL;
    echo "\n{$_SESSION["c1"]}|_________________________________________________________________________________________{$_SESSION["c0"]}\n";

    print_r(!$_SESSION['config']['extrai-email'] ? $_SESSION['config']['resultado_valores'] : NULL);

    echo "\n{$_SESSION["c1"]}\_________________________________________________________________________________________/{$_SESSION["c0"]}\n";
    __getOut("\n");
}