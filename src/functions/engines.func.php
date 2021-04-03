<?php 
function __engines($dork, $list_proxy) {

    $dork_exec = (__not_empty($dork)) ? $dork : __getOut("DEFINA SUA DORK\n");
    $list_proxy_ = (!is_null($list_proxy) ? $list_proxy[rand(0, count($list_proxy) - 1)] : NULL);

    $confArray = ["list_proxy_rand" => $list_proxy_, "list_proxy_file" => $list_proxy];

    (!is_null($_SESSION["config"]["tor-random"]) && !is_null($_SESSION["config"]["proxy"]) ? __renewTOR() : NULL);

    echo "{$_SESSION["c0"]}{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ SEARCHING ]:: {$_SESSION["c1"]}{{$_SESSION["c0"]} ";

    __plus();

    echo (!is_null($list_proxy_) ? "\n{$_SESSION["c1"]}[ INFO ]{$_SESSION["c0"]}{$_SESSION["c16"]}[ PROXY FILE RANDOM ]:: {$_SESSION["c1"]}[ {$list_proxy_} ]{$_SESSION["c0"]} " : NULL );

    ################################################################################
    # SEARCH ENGINE :::  google
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 1) || __validateOptions($_SESSION["config"]["motor"], "all")):
        $randHost = __dominioGoogleRandom();
        $_SESSION["config"]["dork_tmp"] = $dork_exec;
        $_SESSION["config"]["conf_array_tmp"] = $confArray;
        __pageEngine($confArray, "GOOGLE - {$randHost}", "https://{$randHost}/search?q=[DORK]&num=1500&btnG=Search&pws=1", $dork_exec, NULL, 0, 0, 1);
    endif;

    ################################################################################
    # SEARCH ENGINE :::  bing
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 2) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "BING", "https://www.bing.com/search?q=[DORK]&filt=rf&first=[PAG]&FORM=PERE", $dork_exec, NULL, 7, 57, 10);

    ################################################################################
    # SEARCH ENGINE :::  yahoo
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 3) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "YAHOO BR", "http://search.yahoo.com/search?p=[DORK]&ei=UTF-8&b=[PAG]", $dork_exec, NULL, 1, 471, 10);

    ################################################################################
    # SEARCH ENGINE :::  ask
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 4) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "ASK", "https://www.ask.com/web?q=[DORK]&page=[PAG]&qid=[RANDOM&qo=pagination&qsrc=[RANDOM]", $dork_exec, NULL, 0, 6, 1);

    ################################################################################
    # SEARCH ENGINE :::  googleapis 
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 6) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "GOOGLE API", "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=8&q=[DORK]&start=[PAG]&userip=[IP]&filter=1&safe=off", $dork_exec, NULL, 0, 56, 4);
    
    ################################################################################
    # SEARCH ENGINE :::  lycos
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 7) || __validateOptions($_SESSION["config"]["motor"], "all")):
        $_ = __request_info("http://search.lycos.com", $_SESSION["config"]["proxy"], FALSE);
        $_SESSION["config"]["idPesquisaLycos"] = __getIdSearchLycos($_["corpo"]);
        __pageEngine($confArray, "LYCOS", "http://search.lycos.com/web?q=[DORK]&keyvol={$_SESSION["config"]["idPesquisaLycos"]}&pn=[PAG]", $dork_exec, NULL, 0, 24, 1);
    endif;

    ################################################################################
    # SEARCH ENGINE :::  uol.com.br
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 8) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "UOL BR", "http://busca.uol.com.br/web/?q=[DORK]&start=[PAG]", $dork_exec, NULL, 10, 130, 10);

    ################################################################################
    # SEARCH ENGINE :::  us.yhs4.search.yahoo
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 9) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "YAHOO US", "http://us.yhs4.search.yahoo.com/yhs/search?p=[DORK]&fr=goodsearch-yhsif&b=[PAG]", $dork_exec, NULL, 1, 551, 10);
   
    ################################################################################
    # SEARCH ENGINE :::  sapo.pt
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 10) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "SAPO", "http://pesquisa.sapo.pt/?adultfilter=strict&barra=resumo&cluster=0&format=html&limit=100&location=pt&q=[DORK]&st=web#gsc.tab=0&gsc.q=[DORK]&gsc.page=[PAG]", $dork_exec, NULL, 0, 10, 1);

    ################################################################################
    # SEARCH ENGINE :::  dmoz
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 11) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "DMOZ", "http://www.dmoz.org/search/search?q=[DORK]&start=[PAG]&type=next&all=yes&cat=", $dork_exec, NULL, 0, 800, 20);

    ################################################################################
    # SEARCH ENGINE :::  gigablast
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 12) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "GIGABLAST", "http://www.gigablast.com/search?k3h=223119&s=22&rat=0&sc=1&ns=100&n=100&sites=&q=[DORK]", $dork_exec, NULL, 0, 1, 1);

    ################################################################################
    # SEARCH ENGINE :::  web.search.naver.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 13) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "NEVER", "https://search.naver.com/search.naver?f=&fd=2&filetype=0&nso=so:r,a:all,p:all&query=[DORK]&research_url=&sm=tab_nmr&start=[PAG]&where=webkr", $dork_exec, NULL, 1, 500, 10);

    ################################################################################
    # SEARCH ENGINE :::  www.hotbusca.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 17) || __validateOptions($_SESSION["config"]["motor"], "all"))
         __pageEngine($confArray, "HOTBUSCA", "https://hotbusca.com/busca.php?q=[DORK]&pag=[PAG]", $dork_exec, NULL, 0, 6, 1);


    ################################################################################
    # SEARCH ENGINE :::  srch.timway.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 19) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "HKSEARCH", "http://srch.timway.com/cgi/tsrch.cgi?query=[DORK]&type=phrase&bool=and&mh=100", $dork_exec, NULL, 0, 0, 1);
    #http://srch.timway.com/cgi/tsrch.cgi?query=[DORK]&type=phrase&bool=and&mh=100
    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / USA
    ################################################################################

    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "EZILION USA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=usa&f=", $dork_exec, NULL, 0, 215, 15);

    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / ASIA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "EZILION ASIA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=asia&f=", $dork_exec, NULL, 0, 215, 15);

    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / EUROPA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "EZILION EUROPA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=eu&f=", $dork_exec, NULL, 0, 215, 15);
    

    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / INDIA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "EZILION INDIA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=in&f=", $dork_exec, NULL, 0, 215, 15);
    
    ################################################################################
    # SEARCH ENGINE :::  find.ezilon.com / CANADA
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 20) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "EZILION CANADA", "http://find.ezilon.com/search.php?q=[DORK]&start=[PAG]&t=&v=can&f=", $dork_exec, NULL, 0, 215, 15);

    ################################################################################
    # SEARCH ENGINE :::  www.sogou.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 21) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "SOGOU", "http://www.sogou.com/web?query=[DORK]&cid=&s_from=result_up&page=[pag]&ie=utf8&dr=1", $dork_exec, NULL, 1, 20, 1);
    
    ################################################################################
    # SEARCH ENGINE :::  api.duckduckgo.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 22) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "DUCK DUCK GO", "https://api.duckduckgo.com/?q=[DORK]&kl=en-us&t=hk&ia=web", $dork_exec, NULL, 1, 20, 1);
   

    ################################################################################
    # SEARCH ENGINE ::: Google Generic RANDOM
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 24) 
        || __validateOptions($_SESSION["config"]["motor"], "all")):
        $randHost = __dominioGoogleRandom();
        $randGeneric = __googleGenericRandom();
        __pageEngine($confArray, "GOOGLE_GENERIC_RANDOM - {$randHost} ID: {$randGeneric}", "http://{$randHost}/cse?cx={$randGeneric}&q=[DORK]&num=500&hl=en&as_qdr=all&start=[PAG]&sa=N", $dork_exec, NULL, 0, 0, 1);
    endif;

    if (__validateOptions($_SESSION["config"]["motor"], 24) 
        || __validateOptions($_SESSION["config"]["motor"], "all")):
        $randHost = __dominioGoogleRandom();
        $randGeneric = __googleGenericRandom();
        __pageEngine($confArray, "GOOGLE_GENERIC_RANDOM - {$randHost} ID: {$randGeneric}", "http://{$randHost}/cse?cx={$randGeneric}&q=[DORK]&num=500&hl=en&as_qdr=all&start=[PAG]&sa=N", $dork_exec, NULL, 0, 0, 1);
    endif;


    ################################################################################
    # SEARCH ENGINE :::  www.exalead.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 25) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "EXALEAD", "https://www.exalead.com/search/web/results/?q=[DORK]&elements_per_page=10&start_index=[PAG]", $dork_exec, NULL, 0, 70, 10);

    ################################################################################
    # SEARCH ENGINE :::  www.startpage.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 26) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "STARTPAGE", "https://www.startpage.com/sp/search?lui=english&language=english&query=[DORK]&cat=web&page=[PAG]&sc=Mow3extbsGS910", $dork_exec, NULL, 0, 6, 1);
    
    ################################################################################
    # SEARCH ENGINE :::  www.qwant.com
    ################################################################################
    if (__validateOptions($_SESSION["config"]["motor"], 27) || __validateOptions($_SESSION["config"]["motor"], "all"))
        __pageEngine($confArray, "QWANT", "https://www.qwant.com/?q=index.php&t=[DORK]", $dork_exec, NULL, 0, 0, 1);
    
    
    #===============================================================================
    #===============================================================================
    #===============================================================================
    #======================[ MOTORES DE BUSCA ESPECIAIS  ]==========================
    #===============================================================================
    #===============================================================================
    #===============================================================================
    #===============================================================================
    # SEARCH ENGINE :::  ndj6p3asftxboa7j.tor2web.org / Tor find ===================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e1"))
        __pageEngine("TOR FIND", "https://ndj6p3asftxboa7j.tor2web.org/search.php?search_query=[DORK]&page_num=[PAG]&domainchoice=onion", $dork_exec, NULL, 1, 5, 1);
    

    #===============================================================================
    # SEARCH ENGINE :::  elephantjmjqepsw.tor2web.org ==============================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e2"))
        __pageEngine("ELEPHANT", "https://elephantjmjqepsw.tor2web.orgsearch?q=[DORK]&page=[PAG]", $dork_exec, NULL, 0, 29, 1);
    

    #===============================================================================
    # SEARCH ENGINE :::  kbhpodhnfxl3clb4.tor2web.org ==============================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e3"))
        __pageEngine("TORSEARCH", "https://kbhpodhnfxl3clb4.tor2web.org/en/search?j=f&page=[PAG]&q=[DORK]&utf8=%E2%9C%93", $dork_exec, NULL, 0, 10, 1);


    #===============================================================================
    # SEARCH ENGINE :::  xmh57jrzrnw6insl.onion.ws =================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e4"))
        __pageEngine("GORCH", "https://xmh57jrzrnw6insl.onion.ws/4a1f6b371c/search.cgi?cmd=Search!&np=[PAG]&q=[DORK]&s=DRP", $dork_exec, NULL, 0, 10, 1);

    #===============================================================================
    # SEARCH ENGINE :::  search.wikileaks.org ======================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e5"))
        __pageEngine("WIKILEAKS", "https://search.wikileaks.org/?page=[PAG]&q=[DORK]&sort=0#results", $dork_exec, NULL, 1, 60, 1);

    #===============================================================================
    # SEARCH ENGINE :::  ahmia.fi ==================================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e6"))
        __pageEngine("AHMIA", "https://ahmia.fi/search/?q=[DORK]", $dork_exec, NULL, 0, 0, 1);
    
    #===============================================================================
    # SEARCH ENGINE ::: oth.net ====================================================
    #===============================================================================
    if (__validateOptions($_SESSION["config"]["motor"], "e7"))
        __pageEngine("OTN", "http://oth.net/s/s?q=[DORK]&cl=1&skip=[PAG]", $dork_exec, NULL, 1, 211, 20);

    #===============================================================================
    # SEARCH ENGINE ::: exploits.shodan.io =========================================
    #===============================================================================
    
    if (__validateOptions($_SESSION["config"]["motor"], "e8"))
        __pageEngine("EXPLOITS SHODAN", "https://exploits.shodan.io/?q=[DORK]&p=[PAG]", $dork_exec, NULL, 1, 25, 1);
    

    __plus();
}