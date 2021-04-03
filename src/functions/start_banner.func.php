<?php

function __startingBanner() {

    echo "\n{$_SESSION["c1"]}[ ! ] Starting SCANNER INURLBR {$_SESSION['config']['version_script']} at [" . date("d-m-Y H:i:s") . "]{$_SESSION["c9"]}
[ ! ] legal disclaimer: Usage of INURLBR for attacking targets without prior mutual consent is illegal. 
[ ! ] It is the end user's responsibility to obey all applicable local, state and federal laws.
[ ! ] Developers assume no liability and are not responsible for any misuse or damage caused by this program{$_SESSION["c0"]}\n";

    $file = __not_empty($_SESSION['config']['arquivo_output']) ? $_SESSION['config']['arquivo_output'] : NULL;
    $file_all = __not_empty($_SESSION['config']['arquivo_output_all']) ? $_SESSION['config']['arquivo_output_all'] : NULL;
    $command = __not_empty($_SESSION['config']['command-vul']) ? $_SESSION['config']['command-vul'] : $_SESSION['config']['command-all'];
    $subcommand = __not_empty($_SESSION['config']['sub-cmd-vul']) ? $_SESSION['config']['sub-cmd-vul'] : $_SESSION['config']['sub-cmd-all'];

    echo (__not_empty($_SESSION['config']['ifemail']) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ FILTER EMAIL ]::{$_SESSION["c1"]}[ {$_SESSION['config']['ifemail']} ]{$_SESSION["c0"]}" : NULL);

    echo (is_array($_SESSION['config']['dork-file']) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ DORK FILE ]::{$_SESSION["c1"]}[ {$_SESSION['config']['dork-file']} ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($_SESSION['config']['dork-rand']) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ DORKS GENERATED ]::{$_SESSION["c1"]}[ {$_SESSION['config']['dork-rand']} ]{$_SESSION["c0"]}" : NULL);

    echo (is_array($_SESSION['config']['irc']['conf']) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ SEND VULN IRC ]::{$_SESSION["c1"]}[ server: {$_SESSION['config']['irc']['conf'][0]} / channel: {$_SESSION['config']['irc']['conf'][1]} ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($_SESSION['config']['ifurl']) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ FILTER URL ]::{$_SESSION["c1"]}[ {$_SESSION['config']['ifurl']} ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($file) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ OUTPUT FILE ]::{$_SESSION["c1"]} [ " . getcwd() . "/{$_SESSION['config']['out_put_paste']}{$file}  ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($file_all) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ OUTPUT FILE ALL ]::{$_SESSION["c1"]}[ " . getcwd() . "/{$_SESSION['config']['out_put_paste']}{$file_all}  ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($command) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ DEFINED EXTERNAL COMMAND ]::{$_SESSION["c1"]} [ $command ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($subcommand) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ DEFINED EXTERNAL SUB_COMMAND ]::{$_SESSION["c1"]} [ $subcommand ]{$_SESSION["c0"]}" : NULL);

    echo (__not_empty($_SESSION['config']['proxy-file']) ?
            "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ FILE SOURCE LIST OF PROXY ]::{$_SESSION["c1"]} [ {$_SESSION['config']['proxy-file']} ]{$_SESSION["c0"]}" : NULL);
}