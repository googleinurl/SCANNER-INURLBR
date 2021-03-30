#!/usr/bin/php -q
<?php
/*
  +-----------------------------------------------------------------------------+
  |  [!] Legal disclaimer: Usage of INURLBR for attacking targets without prior |
  |  mutual consent is illegal.                                                 |
  |  It is the end user's responsibility to obey all applicable local, state and|
  |  federal laws.                                                              |
  |  Developers assume no liability and are not responsible for any misuse or   |
  |  damage caused by this program                                              |
  +-----------------------------------------------------------------------------+


  [+] Autor:    MrCl0wn
  [+] Blog:     http://blog.mrcl0wn.com
  [+] GitHub:   https://github.com/MrCl0wnLab
  [+] Twitter:  https://twitter.com/MrCl0wnLab
  [+] Email:    mrcl0wnlab\@\gmail.com

  [+] SCRIPT NAME: INURLBR 2.2
  INURLBR scanner was developed by Cleiton Pinheiro, owner and founder of INURL - BRASIL.
  Tool made ​​in PHP that can run on different Linux distributions helps
  hackers / security professionals in their specific searches.
  With several options are automated methods of exploration, AND SCANNER is
  known for its ease of use and performasse.
  The inspiration to create the inurlbr scanner, was the XROOT Scan 5.2 application.

  [+]  Long desription
  The INURLBR tool was developed aiming to meet the need of Hacking community.
  Purpose: Make advanced searches to find potential vulnerabilities in web
  applications known as Google Hacking with various options and search filters,
  this tool has an absurd power of search engines available with
  (24) + 6 engines special(deep web)

  - Possibility generate IP ranges or random_ip and analyze their targets.
  - Customization of  HTTP-HEADER, USER-AGET, URL-REFERENCE.
  - Execution external to exploit certain targets.
  - Generator dorks random or set file dork.
  - Option to set proxy, file proxy list, http proxy, file http proxy.
  - Set time random proxy.
  - It is possible to use TOR ip Random.
  - Debug processes urls, http request, process irc.
  - Server communication irc sending vulns urls for chat room.
  - Possibility injection exploit GET / POST => SQLI, LFI, LFD.
  - Filter and validation based regular expression.
  - Extraction of email and url.
  - Validation using http-code.
  - Search pages based on strings file.
  - Exploits commands manager.
  - Paging limiter on search engines.
  - Beep sound when trigger vulnerability note.
  - Use text file as a data source for urls tests.
  - Find personalized strings in return values of the tests.
  - Validation vulnerability shellshock.
  - File validation values wordpress wp-config.php.
  - Execution sub validation processes.
  - Validation syntax errors database and programmin.
  - Data encryption as native parameter.
  - Random google host.
  - Scan port.
  - Error Checking & values​​:
  [*]JAVA INFINITYDB, [*]LOCAL FILE INCLUSION, [*]ZIMBRA MAIL,           [*]ZEND FRAMEWORK,
  [*]ERROR MARIADB,   [*]ERROR MYSQL,          [*]ERROR JBOSSWEB,        [*]ERROR MICROSOFT,
  [*]ERROR ODBC,      [*]ERROR POSTGRESQL,     [*]ERROR JAVA INFINITYDB, [*]ERROR PHP,
  [*]CMS WORDPRESS,   [*]SHELL WEB,            [*]ERROR JDBC,            [*]ERROR ASP,
  [*]ERROR ORACLE,    [*]ERROR DB2,            [*]JDBC CFM,              [*]ERROS LUA,
  [*]ERROR INDEFINITE

  [+] Dependencies - (PHP 5.4.*):
  sudo apt-get install curl libcurl3 libcurl3-dev php7 php7-cli php7-curl


  [+] Play LIST TUTORIAL:
  https://www.youtube.com/watch?v=jwjZUsgf9xM&list=PLV1376pVwcCmcoCmq_Z4O0ra4BqjmhIaR


  +--------------------------------------------------------------------------------------+
  |  |  |                            G R 3 3 T S                                   |  |  |
  +--------------------------------------------------------------------------------------+
 * r00t-3xp10t, Jh00n, chk_,  Unknownantisec,  sl4y3r 0wn3r, hc0d3r, arplhmd, 0x4h4x
 * Clandestine, KoubackTr, SnakeTomahawk, SkyRedFild, Lorenzo Faletra, Eclipse, shaxer   
 * dd3str0y3r, Johnny Deep, Lenon Leite, pSico_b0y, Bakunim_Malvadão, IceKiller, c00z  
 * Oystex, rH, Warflop, se4b3ar 
 */

/*
    MODIFICAR MOTOR DE BUSCA 17
*/

$set_error=1;
error_reporting($set_error);
ini_set('memory_limit', '256M');
ini_set('display_errors', $set_error);
ini_set('max_execution_time', $set_error);
ini_set('allow_url_fopen', 1);
set_time_limit(0);
(!isset($_SESSION) ? session_start() : NULL);

#########################################################################################
#Capturing TERMINAL VALUES.##############################################################
#(PHP 4 >= 4.3.0, PHP 5) Gets options from the command line argument list################
#http://php.net/manual/pt_BR/function.getopt.php#########################################
#########################################################################################
$command_list = [
    'dork:', 'dork-file:', 'exploit-cad:', 'range:', 'range-rand:', 'irc:',
    'exploit-all-id:', 'exploit-vul-id:', 'exploit-get:', 'exploit-post:',
    'regexp-filter:', 'exploit-command:', 'command-all:', 'command-vul:',
    'replace:', 'remove:', 'regexp:', 'sall:', 'sub-file:', 'sub-get::', 'sub-concat:',
    'user-agent:', 'url-reference:', 'delay:', 'sendmail:', 'time-out:',
    'http-header:', 'ifcode:', 'ifurl:', 'ifemail:', 'mp:', 'target:',
    'no-banner::', 'gc::', 'proxy:', 'proxy-file:', 'time-proxy:', 'pr::',
    'proxy-http-file:', 'update::', 'info::', 'help::', 'unique::', 'popup::',
    'ajuda::', 'install-dependence::', 'cms-check::', 'sub-post::', 'robots::',
    'alexa-rank::', 'beep::', 'exploit-list::', 'tor-random::', 'shellshock::',
    'dork-rand:', 'sub-cmd-all:', 'sub-cmd-vul:', 'port-cmd:', 'port-scan:',
    'port-write:', 'ifredirect:', 'persist:', 'file-cookie:', 'save-as:'
];
$opcoes = getopt('u::a:d:o:p:s:q:t:m::h::', $command_list);
#########################################################################################
#INCLUDE FILES CONFIGURATION ############################################################
#########################################################################################
require_once("src/load/session.config.php");
require_once("src/load/require.files.php");
require_once("src/load/validate.options.php");
#########################################################################################
#RUN VALIDATION / PROCESSES SCAN RANG IP#################################################
#########################################################################################
if (__not_empty($_SESSION['config']['range']) || __not_empty($_SESSION['config']['range-rand'])):
    print __bannerLogo();
    __startingBanner();
    __not_empty($_SESSION['config']['range']) ? 
    __process(__generatorRangeIP($_SESSION['config']['range'])) : NULL;
    __not_empty($_SESSION['config']['range-rand']) ?
    __process(__generatorIPRandom([1 => $_SESSION['config']['range-rand']])) : NULL;
    __exitProcess();
endif;
#########################################################################################
#RUN VALIDATION / PROCESSES WITH FILE####################################################
#########################################################################################
if (__not_empty($_SESSION['config']['abrir-arquivo'])):
    print __bannerLogo();
    __startingBanner();
    __openFile($_SESSION['config']['abrir-arquivo']);
    __plus();
    __exitProcess();
endif;
################################################################################
#RUN WITH SEARCH ENGINES########################################################
################################################################################
__main($_SESSION['config']['dork'], $_SESSION['config']['motor'], $_SESSION['config']['cod']);