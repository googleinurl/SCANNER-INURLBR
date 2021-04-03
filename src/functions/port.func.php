<?php

################################################################################
#VALIDATING OPEN DOORS##########################################################
################################################################################
#(PHP 4, PHP 5) fsockopen — Open Internet or Unix domain socket connection
#http://php.net/manual/en/function.fsockopen.php

function __portScan($_) {
    
    $ports = explode(',', $_[1]);
    echo "\n{$_SESSION["c1"]}|_[ * ]__\n";
    echo "         |[ PROCESS PORT-SCAN ]::\n";
    foreach ($ports as $value):

        $conc = fsockopen($_SESSION['config']['server_ip'], $value, $_[2], $_[3], 30);

        __plus();

        if ($conc):

            echo "{$_SESSION["c1"]}|_[ + ]__|[ {$value}=\033[1m\033[32mOPEN{$_SESSION["c0"]}";
            (__not_empty($_SESSION['config']['port-write']) ? __portWrite($conc, $_SESSION['config']['port-write']) : NULL);
            __saveValue($_SESSION['config']['arquivo_output'], "{$value}=OPEN", 2);

            __plus();
            $_[0]['url_port'] = $value;
            (__not_empty($_SESSION['config']['port-cmd']) ? __command($_SESSION['config']['port-cmd'], $_[0]) : NULL);
            __plus();
        else:

            echo "{$_SESSION["c1"]}|_[ x ]__|[ {$value}={$_SESSION["c9"]}CLOSED{$_SESSION["c0"]}\n";
            __plus();
        endif;
    endforeach;
    echo $_SESSION["c0"];
    fclose($conc);
}

################################################################################
#WRITING ON THE DOOR############################################################
################################################################################
#(PHP 4, PHP 5) fwrite — Binary-safe file write
#http://php.net/manual/pt_BR/function.fwrite.php
function __portWrite($conect, $valores) {

    $valores = explode(',', $valores);
    foreach ($valores as $value):

        echo "{$_SESSION["c1"]}|_[ + ]__|[ WRITE SEND={$value}{$_SESSION["c0"]}\n";
        fwrite($conect, "{$value}\r\n") . sleep(3);
        __plus();
    endforeach;
}