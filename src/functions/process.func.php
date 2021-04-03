<?php
function __process($resultadoURL) {

    __plus();
    $resultadoURL[0] = (is_array($resultadoURL) ? array_unique(array_filter($resultadoURL)) : $resultadoURL);
    $resultadoURL[0] = ($_SESSION['config']['unique'] ? __filterDomainUnique($resultadoURL[0]) : $resultadoURL[0]);

    $resultadoURL[0] = (__not_empty($_SESSION['config']['ifurl']) ? __filterURLif($resultadoURL[0]) : $resultadoURL[0]);
    $_SESSION['config']['total_url'] = count($resultadoURL[0]);

    echo "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c12"]}[ TOTAL FOUND VALUES ]::{$_SESSION["c1"]} [ {$_SESSION['config']['total_url']} ]{$_SESSION["c0"]}\n";
    __debug(array('debug' => $resultadoURL[0], 'function' => __FUNCTION__), 3);

    if (count($resultadoURL[0]) > 0):

        $_SESSION['config']['irc']['irc_connection'] = (__not_empty($_SESSION['config']['irc']['conf']) ? __ircConect($_SESSION['config']['irc']) : NULL);
        $_SESSION['config']['irc']['my_fork'] = pcntl_fork();

        if ($_SESSION['config']['irc']['my_fork'] == 0):
            (__not_empty($_SESSION['config']['irc']['irc_connection']) ? __ircPong($_SESSION['config']['irc']) : NULL);
            exit(0);
        elseif($_SESSION['config']['irc']['my_fork'] == -1):
            __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}ERROR Fork failed{$_SESSION["c0"]}\n");
        endif;

        $_SESSION['config']['user-agent'] = ($_SESSION['config']['shellshock']) ? $_SESSION['config']['user_agent_xpl'] : $_SESSION['config']['user-agent'];
        foreach ($resultadoURL[0] as $url):
            __plus();
            $url = urldecode(__not_empty($_SESSION['config']['target']) ?
                            $_SESSION['config']['target'] . $url : $url);

            if (__validateURL($url) || __not_empty($_SESSION['config']['abrir-arquivo'])):
                __processUrlExec(__filterURLTAG($url), $_SESSION["config"]["contUrl"] ++);
                __plus();
            endif;
        endforeach;
    else:
        print_r("{$_SESSION["c1"]}[ INFO ]{$_SESSION["c2"]} Not a satisfactory result was found!{$_SESSION["c0"]}\n");
    endif;
}