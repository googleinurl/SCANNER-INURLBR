<?php

# [+]VERIFYING LIB php5-curl IS INSTALLED.
# (PHP 4, PHP 5) function_exists — Return TRUE if the given function has been defined.
# http://php.net/manual/en/function.function-exists.php
# [+]Verification - CURL_EXEC
# Execute the given cURL session.This function should be called after initializing a cURL session and all the
# options for the session are set.
# http://php.net/manual/en/function.curl-exec.php
(!function_exists('curl_exec') ? __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]} INSTALLING THE LIBRARY php5-curl ex: php5-curl apt-get install{$_SESSION["c0"]}\n") : NULL );


# [+]VERIFYING use Input PHP CLI.
# (PHP 4, PHP 5) defined — Checks whether a given named constant exists
# http://php.net/manual/pt_BR/function.defined.php */
(!defined('STDIN') ? __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]} Please run it through command-line!{$_SESSION["c0"]}\n") : NULL);
  

__get_color();


#[+]PRINTING HELP / INFO
(isset($opcoes['h']) || isset($opcoes['help']) || isset($opcoes['ajuda']) ? 
__menu() : NULL);
(isset($opcoes['info']) ? 
__info() : NULL);

#[+]PRINTING EXPLOITS LIST.
(isset($opcoes['exploit-list']) ?
print(__bannerLogo()) . __configExploitsList(1)  : NULL);

#[+]CREATING DEFAULT SETTINGS EXIT RESULTS.
(!is_dir($_SESSION['config']['out_put_paste']) ?
mkdir($_SESSION['config']['out_put_paste'], 0777, TRUE) : NULL);

#[+]CREATING DEFAULT SETTINGS MANAGEMENT EXPLOITS.
(!file_exists($_SESSION['config']['file_exploit_conf']) ?
touch($_SESSION['config']['file_exploit_conf']) : NULL);

#[+]Deletes FILE cookie STANDARD.
(file_exists('cookie.txt') ?
unlink('cookie.txt') : NULL);

#[+]REGISTRATION NEW COMMAND EXPLOIT
(__not_empty($opcoes['exploit-cad']) ?
__configExploitsADD($opcoes['exploit-cad']) : NULL);

#[+]Dependencies installation
(isset($opcoes['install-dependence']) ?
__installDepencia() : NULL);

#[+]UPDATE SCRIPT
(isset($opcoes['update']) ? 
__update() : NULL);

################################################################################
#CAPTURE OPTIONS################################################################
################################################################################
#[+]VALIDATION SEARCH METHODS / (DORK,RANGE-IP)
if (__not_empty($opcoes['o'])) {
    $_SESSION['config']['abrir-arquivo'] = $opcoes['o'];
} else if (!__not_empty($opcoes['o']) &&
        !__not_empty($opcoes['range']) &&
        !__not_empty($opcoes['range-rand']) &&
        !__not_empty($opcoes['dork-rand'])) {

    $_SESSION['config']['dork'] = __not_empty($opcoes['dork']) && is_null($_SESSION['config']['abrir-arquivo']) ? $opcoes['dork'] : NULL;
    $_SESSION['config']['dork-file'] = __not_empty($opcoes['dork-file']) && is_null($_SESSION['config']['abrir-arquivo']) ? $opcoes['dork-file'] : NULL;
    (!__not_empty($_SESSION['config']['dork']) && !__not_empty($_SESSION['config']['dork-file']) ? print(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}DEFINE DORK ex: --dork '.asp?CategoryID=' OR --dork-file 'dorks.txt'{$_SESSION["c0"]}\n") : NULL);
}

#[+]VALIDATION GENERATE DORKS RANDOM
$_SESSION['config']['dork-rand'] = __not_empty($opcoes['dork-rand']) ?
$opcoes['dork-rand'] : NULL;

#[+]VALIDATION TARGET FIND PAGE
$_SESSION['config']['target'] = __not_empty($opcoes['target']) &&
!isset($_SESSION['config']['dork']) ?
$opcoes['target'] : NULL;

#[+]VALIDATION URL EXTRACTION
$_SESSION['config']['extrai-url'] = isset($opcoes['u']) ? TRUE : NULL;

#[+]VALIDATION EMAIL EXTRACTION
$_SESSION['config']['extrai-email'] = isset($opcoes['m']) ? TRUE : NULL;

#[+]VALIDATION ID SEARCH ENGINE
$_SESSION['config']['motor'] = __not_empty($opcoes['q']) &&
__validateOptions('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,e1,e2,e3,e4,e5,e6,all', $opcoes['q']) ?
$opcoes['q'] : 1;

#[+]VALIDATION SAVE FILE VULNERABLE
!__not_empty($opcoes['s']) && !__not_empty($opcoes['save-as']) &&
empty($opcoes['sall']) ? __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}DEFINE FILE SAVE OUTPUT ex: -s , --save-as , --sall filevull.txt{$_SESSION["c0"]}\n") : NULL;

$_SESSION['config']['s'] = __not_empty($opcoes['s']) ?
$opcoes['s'] : null;

$_SESSION['config']['save-as'] = __not_empty($opcoes['save-as']) ?
$opcoes['save-as'] : null;

$_SESSION['config']['arquivo_output'] = __not_empty($_SESSION['config']['s']) ?
$_SESSION['config']['s'] : $opcoes['save-as'];

#[+]VALIDATION SAVE FILE ALL VALORES
$_SESSION['config']['arquivo_output_all'] = __not_empty($opcoes['sall']) ?
$opcoes['sall'] : NULL;

#[+]VALIDATION TYPE ERROR
$_SESSION['config']['tipoerro'] = __not_empty($opcoes['t']) && 
__validateOptions('1,2,3,4,5', $opcoes['t']) ? $opcoes['t'] : 1;

#[+]VALIDATION REPLACEMENT VALUES
$_SESSION['config']['replace'] = __not_empty($opcoes['replace']) ?
$opcoes['replace'] : NULL;

#[+]VALIDATION SET PROXY
$_SESSION['config']['proxy'] = __not_empty($opcoes['proxy']) ?
$opcoes['proxy'] : NULL;

#[+]VALIDATION SET FILE WITH LIST OF PROXY
$_SESSION['config']['proxy-file'] = __not_empty($opcoes['proxy-file']) ?
$opcoes['proxy-file'] : NULL;

#[+]VALIDATION SET HTTP->PROXY
$_SESSION['config']['proxy-http'] = __not_empty($opcoes['proxy-http']) ?
$opcoes['proxy-http'] : NULL;

#[+]VALIDATION SET FILE WITH LIST OF HTTP->PROXY
$_SESSION['config']['proxy-http-file'] = __not_empty($opcoes['proxy-http-file']) ?
$opcoes['proxy-http-file'] : NULL;

#[+]VALIDATION SET EXPLOIT VIA REQUEST GET
$_SESSION['config']['exploit-get'] = __not_empty($opcoes['exploit-get']) ?
str_replace(' ', '%20', $opcoes['exploit-get']) : NULL;

#[+]VALIDATION SET EXPLOIT VIA REQUEST POST
$_SESSION['config']['exploit-post'] = __not_empty($opcoes['exploit-post']) ?
__convertUrlQuery($opcoes['exploit-post']) : NULL;
$_SESSION['config']['exploit-post_str'] = __not_empty($opcoes['exploit-post']) ?
$opcoes['exploit-post'] : NULL;

#[+]VALIDATION COMMAND SHELL STRING COMPLEMENTARY
$_SESSION['config']['exploit-command'] = __not_empty($opcoes['exploit-command']) ?
$opcoes['exploit-command'] : NULL;

#[+]VALIDATION MANAGEMENT COMMANDS SHELL TARGET VULN ID
$_SESSION['config']['exploit-vul-id'] = __not_empty($opcoes['exploit-vul-id']) ?
$opcoes['exploit-vul-id'] : NULL;

#[+]VALIDATION MANAGEMENT COMMANDS SHELL ALL TARGET ID
$_SESSION['config']['exploit-all-id'] = __not_empty($opcoes['exploit-all-id']) ?
$opcoes['exploit-all-id'] : NULL;

#[+]VALIDATION SET COMMANDS SHELL EXECUTE TARGET VULN
$_SESSION['config']['command-vul'] = __not_empty($opcoes['command-vul']) ?
$opcoes['command-vul'] : NULL;

#[+]VALIDATION SET COMMANDS SHELL EXECUTE ALL TARGET
$_SESSION['config']['command-all'] = __not_empty($opcoes['command-all']) ?
$opcoes['command-all'] : NULL;

#[+]VALIDATION ADDITIONAL TYPE OF PARAMETER ERROR
$_SESSION['config']['achar'] = __not_empty($opcoes['a']) ? $opcoes['a'] : NULL;

#[+]VALIDATION DEBUG NIVEL
$_SESSION['config']['debug'] = __not_empty($opcoes['d']) &&
__validateOptions('1,2,3,4,5,6', $opcoes['d']) ? $opcoes['d'] : NULL;

#[+]VALIDATION INTERNAL
$_SESSION['config']['verifica_info'] = (__validateOptions($opcoes['d'], 6)) ? 1 : NULL;

#[+]VALIDATION ADDITIONAL PARAMETER PROXY
$_SESSION['config']['tor-random'] = isset($opcoes['tor-random']) &&
!is_null($_SESSION["config"]["proxy"]) ? TRUE : NULL;

#[+]VALIDATION CHECK VALUES CMS
$_SESSION['config']['cms-check'] = isset($opcoes['cms-check']) ? TRUE : NULL;

#[+]VALIDATION CHECK LINKS WEBCACHE GOOGLE
$_SESSION['config']['webcache'] = isset($opcoes['gc']) ? TRUE : NULL;

#[+]VALIDATION REGULAR EXPRESSION
$_SESSION['config']['regexp'] = __not_empty($opcoes['regexp']) ?
$opcoes['regexp'] : NULL;

#[+]VALIDATION FILTER BY REGULAR EXPRESSION
$_SESSION['config']['regexp-filter'] = __not_empty($opcoes['regexp-filter']) ?
$opcoes['regexp-filter'] : NULL;

#[+]VALIDATION NO BANNER SCRIPT
$_SESSION['config']['no-banner'] = isset($opcoes['no-banner']) ? TRUE : NULL;

#[+]VALIDATION SET USER-AGENT REQUEST
$_SESSION['config']['user-agent'] = __not_empty($opcoes['user-agent']) ?
$opcoes['user-agent'] : NULL;

#[+]VALIDATION SET URL-REFERENCE REQUEST
$_SESSION['config']['url-reference'] = __not_empty($opcoes['url-reference']) ?
$opcoes['url-reference'] : NULL;

#[+]VALIDATION PAGING THE MAXIMUM SEARCH ENGINE
$_SESSION['config']['max_pag'] = __not_empty($opcoes['mp']) ?
$opcoes['mp'] : NULL;

#[+]VALIDATION DELAY SET PAGING AND PROCESSES
$_SESSION['config']['delay'] = __not_empty($opcoes['delay']) ?
$opcoes['delay'] : NULL;

#[+]VALIDATION SET TIME OUT REQUEST
$_SESSION['config']['time-out'] = __not_empty($opcoes['time-out']) ?
$opcoes['time-out'] : NULL;

#[+]VALIDATION CODE HTTP
$_SESSION['config']['ifcode'] = __not_empty($opcoes['ifcode']) ?
$opcoes['ifcode'] : NULL;

#[+]VALIDATION STRING URL
$_SESSION['config']['ifurl'] = __not_empty($opcoes['ifurl']) ?
$opcoes['ifurl'] : NULL;

#[+]VALIDATION SET HTTP HEADER
$_SESSION['config']['http-header'] = __not_empty($opcoes['http-header']) ?
$opcoes['http-header'] : NULL;

#[+]VALIDATION SET FILE SUB_PROCESS
$_SESSION['config']['sub-file'] = __not_empty($opcoes['sub-file']) ?
__openFile($opcoes['sub-file'], 1) : NULL;

#[+]VALIDATION SUB_PROCESS TYPE REQUEST POST
$_SESSION['config']['sub-post'] = isset($opcoes['sub-post']) ? TRUE : NULL;

#[+]VALIDATION SUB_PROCESS TYPE REQUEST GET
$_SESSION['config']['sub-get'] = isset($opcoes['sub-get']) ? TRUE : NULL;

#[+]VALIDATION SEND VULN EMAIL
$_SESSION['config']['sendmail'] = __not_empty($opcoes['sendmail']) ?
$opcoes['sendmail'] : NULL;

#[+]VALIDATION SHOW RANK ALEXA
$_SESSION['config']['alexa-rank'] = isset($opcoes['alexa-rank']) ? TRUE : NULL;

#[+]VALIDATION ACTIVATE BEEP WHEN APPEAR VULNERABLE
$_SESSION['config']['beep'] = isset($opcoes['beep']) ? TRUE : NULL;

#[+]VALIDATION OF SINGLE DOMAIN FILTER 
$_SESSION['config']['unique'] = isset($opcoes['unique']) ? TRUE : NULL;

#[+]VALIDATION IRC SERVER/CHANNEL SEND VULN
$_SESSION['config']['irc']['conf'] = __not_empty($opcoes['irc']) &&
strstr($opcoes['irc'], '#') ? 
explode("#", $opcoes['irc']) : NULL;

#[+]VALIDATION RANGE IP
$_SESSION['config']['range'] = __not_empty($opcoes['range']) &&
strstr($opcoes['range'], ',') ? 
$opcoes['range'] : NULL;

#[+]VALIDATION QUANTITY RANGE IP RANDOM
$_SESSION['config']['range-rand'] = __not_empty($opcoes['range-rand']) ?
$opcoes['range-rand'] : NULL;

#[+]VALIDATION REMOVE STRING URL
$_SESSION['config']['remove'] = __not_empty($opcoes['remove']) ?
$opcoes['remove'] : NULL;

#[+]VALIDATION ACCESS FILE ROBOTS
$_SESSION['config']['robots'] = isset($opcoes['robots']) ? TRUE : NULL;

#[+]VALIDATION FILTER EMAIL STRING
$_SESSION['config']['ifemail'] = __not_empty($opcoes['ifemail']) ?
$opcoes['ifemail'] : NULL;

#[+]VALIDATION OPEN WINDOW CONSOLE PROCESS
$_SESSION['config']['popup'] = isset($opcoes['popup']) ? TRUE : NULL;

#[+]VALIDATION ACTIVATE SHELLSHOCK
$_SESSION['config']['shellshock'] = isset($opcoes['shellshock']) ? TRUE : NULL;

#[+]VALIDATION METHOD OF BUSTA PROGRESSIVE
$_SESSION['config']['pr'] = isset($opcoes['pr']) ? TRUE : NULL;

#[+]VALIDATION SET SUB-COMMANDS SHELL EXECUTE ALL TARGET
$_SESSION['config']['sub-cmd-all'] = isset($opcoes['sub-cmd-all']) ? TRUE : NULL;

#[+]VALIDATION SET SUB-COMMANDS SHELL EXECUTE TARGET VULN
$_SESSION['config']['sub-cmd-vul'] = isset($opcoes['sub-cmd-vul']) ? TRUE : NULL;

#[+]VALIDATION SET POR VALIDATION
$_SESSION['config']['port-cmd'] = __not_empty($opcoes['port-cmd']) ?
$opcoes['port-cmd'] : NULL;

#[+]VALIDATION SET SCAN PORT
$_SESSION['config']['port-scan'] = __not_empty($opcoes['port-scan']) ?
$opcoes['port-scan'] : NULL;

#[+]VALIDATION SET PAYLOAD XPL PORT
$_SESSION['config']['port-write'] = __not_empty($opcoes['port-write']) ?
$opcoes['port-write'] : NULL;

#[+]VALIDATION SET URL REDIRECT HEADER
$_SESSION['config']['ifredirect'] = __not_empty($opcoes['ifredirect']) ?
$opcoes['ifredirect'] : NULL;

#[+]VALIDATION SET URL REDIRECT HEADER
$_SESSION['config']['persist'] = __not_empty($opcoes['persist']) ?
$opcoes['persist'] : 4;

#[+]VALIDATION SET FILE COOKIE
$_SESSION['config']['file-cookie'] = __not_empty($opcoes['file-cookie']) ?
$opcoes['file-cookie'] : NULL;

#[+]VALIDATION SET STRING CONCAT URL SUB-PROCESS
$_SESSION['config']['sub-concat'] = __not_empty($opcoes['sub-concat']) ?
$opcoes['sub-concat'] : NULL;