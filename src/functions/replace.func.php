<?php

function __command_replace($exploit, $url) {

    $exploit_ = strstr($_SESSION['config']['replace'], '[INURL]') ?
            $exploit :
            __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$_SESSION["c0"]}\n");
    $exploit = explode("[INURL]", $exploit_);
    $exploit[0] = (isset($exploit[0]) && !is_null($exploit[0])) ?
            $exploit[0] :
            __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$_SESSION["c0"]}\n");
    $exploit[1] = (isset($exploit[0]) && !is_null($exploit[1])) ?
            $exploit[1] :
            __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$_SESSION["c0"]}\n");
    return str_replace($exploit[0], $exploit[1], $url);
}

function __replace_url_value($url){
        # http://click.hotbusca.com/clk.php?url=https://groups.drupal.org/node/477438
        return str_replace('http://click.hotbusca.com/clk.php?url=','',$url);
}