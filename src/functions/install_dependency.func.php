<?php

function __installDepencia() {

    echo __bannerlogo() . __plus();
    echo "\n{$_SESSION["c15"]}|_[ * ]__{$_SESSION["c0"]}\n";
    echo "         {$_SESSION["c15"]}|[EXTERNAL COMMAND INSTALLING PREMISES ]:: {$_SESSION["c11"]}\n";
    $dados = system("sudo apt-get install curl libcurl3 libcurl3-dev php5 php5-cli php5-curl", $dados) . __plus();
    sleep(1) . __plus();
    echo "{$_SESSION["c0"]}";
    if (empty($dados))
        return FALSE;
    unset($dados);
    exit();
}