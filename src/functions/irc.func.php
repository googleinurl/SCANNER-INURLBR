<?php

################################################################################
#IRC CONFIGURATION##############################################################
################################################################################
if (is_array($_SESSION['config']['irc']['conf'])):
    $alph = range("A", "Z");
    $_ = array(0 => rand(0, 10000), 1 => $alph[rand(0, count($alph))]);
    $_SESSION['config']['irc']['my_pid'] = 0;
    $_SESSION['config']['irc']['irc_server'] = $_SESSION['config']['irc']['conf'][0];
    $_SESSION['config']['irc']['irc_channel'] = "#{$_SESSION['config']['irc']['conf'][1]}";
    $_SESSION['config']['irc']['irc_port'] = 6667;
    $_SESSION['config']['irc']['localhost'] = "127.0.0.1 localhost";
    $_SESSION['config']['irc']['irc_nick'] = "[BOT]1nurl{$_[0]}[{$_[1]}]";
    $_SESSION['config']['irc']['irc_realname'] = "B0t_1NURLBR";
    $_SESSION['config']['irc']['irc_quiet'] = "Session Ended";
    global $conf;
elseif (!is_array($_SESSION['config']['irc']['conf']) && __not_empty($opcoes['irc'])):
    __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}IRC WRONG FORMAT! ex: --irc 'irc.rizon.net#inurlbrasil' {$_SESSION["c0"]}\n");
endif;

################################################################################
#IRC CONECTION##################################################################
################################################################################
function __ircConect($conf) {

    $fp = fsockopen($conf['irc_server'], $conf['irc_port'], $conf['errno'], $conf['errstr'], 30);
    if (!$fp):
        echo "Error: {$conf['errstr']}({$conf['errno']})\n";
        return NULL;
    endif;
    $u = php_uname();
    fwrite($fp, "NICK {$conf['irc_nick']}\r\n");
    fwrite($fp, "USER {$conf['irc_nick']} 8 * :{$conf['irc_realname']}\r\n");
    fwrite($fp, "JOIN {$conf['irc_channel']}\r\n");
    fwrite($fp, "PRIVMSG {$conf['irc_channel']} :[ SERVER ] {$u}\r\n");
    return $fp;
}

################################################################################
#IRC SEND MSG###################################################################
################################################################################
function __ircMsg($conf, $msg) {

    fwrite($conf['irc_connection'], "PRIVMSG ${conf['irc_channel']} :${msg}\r\n") . sleep(2);
    __plus();
}

################################################################################
#IRC PING PONG##################################################################
################################################################################
function __ircPong($conf) {

    while (!feof($conf['irc_connection'])):
        $conf['READ_BUFFER'] = fgets($conf['irc_connection']);
        __plus();
        if (preg_match("/^PING(.+)/", $conf['READ_BUFFER'], $conf['ret'])):
            __debug(array('debug' => "[ PING-PONG ]{$conf['ret'][1]}", 'function' => __FUNCTION__), 6) . __plus();
            fwrite($conf['READ_BUFFER'], "PONG {$conf['ret'][1]}\r\n");
            ($_SESSION['config']['debug'] == 6) ?
                            fwrite($conf['irc_connection'], "PRIVMSG ${conf['irc_channel']} :[ PING-PONG ]-> {$conf['ret'][1]}->function:__ircPong\r\n") : NULL;
        endif;
    endwhile;
}

################################################################################
#IRC QUIT#######################################################################
################################################################################
function __ircQuit($conf) {

    fwrite($conf['irc_connection'], "QUIT {$conf['irc_quiet']}\r\n") . sleep(2);
    __plus();
    fclose($conf['irc_connection']);
}

