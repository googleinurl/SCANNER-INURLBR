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
```
./inurlbr.php --dork "site:br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q all
```

- Efetuando pesquisa com múltiplas dorks:
------
```
./inurlbr.php --dork "[dork]site:br noticias php?id=[dork]site:ar noticias php?id=[dork]site:gov.br noticias php?id=" -s resultados.txt --exploit-get "?'0x27" -q all
```
