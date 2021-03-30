<?php
function __randomDork($count_dork) {

    $string_dork[1] = [
        'view', 'page', 'index', 'file', 'ver', 'web', 'form', 'public', 'map', 'visit',
        'site', 'perfil', 'sistema', 'system', 'cad', 'frm', 'content', 'conteudo', 'graf', 'page',
        'search', 'arch', 'class', 'app', 'galeria', 'text', 'noticia', 'default', 'storytopic', 'home',
        'lenoticia', 'counter', 'todos', 'all', 'principal', 'main', 'pesquisa', 'dir', 'category', 'news_more',
        'info', 'display', 'showrecord', 'download', 'sum', 'produtos', 'Menu', 'guia', 'product', 'about',
        'WebForms', 'proj', 'inter', 'PageText', 'topper', 'notes', 'name', 'redirect', 'open_link', 'artist',
        'curricu', 'resumen', 'top', 'list', 'directorio', 'Project', 'membre', 'photos', 'Contenido',
        'presentation', 'component', 'release', 'article', 'asesores', 'Detail', 'about', 'lire', 'story',
        'memoriam', 'transport', 'journal', 'album', 'community', 'includes', 'ler', 'video', 'configs', 'refer',
        'form_cpf', 'atualiza', 'refresh', 'materia', 'fotos', 'photos', 'itemdetail', 'listcategoriesandproduct',
        'myaccount', 'learnmore', 'powersearch', 'prodbycat', 'prodetails', 'prodlist', 'productDisplay', 'promotion',
        'pview', 'resellers', 'inc', 'oferta', 'layout', 'standard', 'blank', 'path', 'declaration', 'newsitem', 'games',
        'buy', 'readnews', 'event', 'news_view', 'communique_detail', 'kategorie', 'preview', 'faq2', 'comment', 'newsDetail',
        'shopping', 'shop_category', 'product_ranges_view', 'section', 'ages', 'curriculum', 'galeri_info', 'tekst', 'play_old',
        'viewapp', 'padrao', 'sitio', 'head', 'template', 'index1', 'index2', 'index3', 'index4', 'index5', 'mod', 'press', 'gery',
        'index_table', 'mainfile', '_functions', 'phpshop', 'new-visitor.inc', 'Packages', 'editor', 'board', 'advanced', 'pref',
        'q', 'side', 'home1', 'home2', 'home3', 'getbook', 'checkout', 'affiliate', 'addcart', 'product_info', 'showsub', 'library',
        'edition', 'get', 'temp', 'catalog', 'press2', 'company', 'jobs', 'review', 'input', 'cats', 'showmedia', 'event_info'
    ];


    $string_dork[2] = [
        'view', 'file', 'ver', 'web', 'form', 'public', 'map', 'site', 'perfil', 'bookid',
        'sistema', 'system', 'cad', 'frm', 'content', 'id', 'action', 'user', 'option', 'area', 'catalogid',
        'tp', 'pg', 'p', 'v', 'a', 't', 'r', 'o', 'm', 'n', 'sec', 'lang', 'search', 'Itemid', 'open',
        'servicoid', 'id_ap', 'artic', 'pag', 'archive', 'ind', 'sigl', 'url', 'link', 'tp', 'cd', 'item_ID',
        'web', 'sourc', 'sitemap', 'go', 'galeria', 'img', 'notic', 'num', 'ter', 'dow', 'type', 'CartId',
        'redir', 'default', 'storytopic', 'topic', 'cod_noti', 'detalhe', 'ler', 'storyid', 'start',
        'click', 'title', 'tmpl', 'templat', 'cont', 'corp', 'contat', 'consult', 'main', 'exib', 'guia',
        'span', 'OpenDocument', 'document', 'codidem', 'pesq', 'print', 'imprimir', 'jobs', 'pic', 'contri',
        'code', 'myPage', 'openPage', 'homepage', 'home', 'inner', 'custom', 'bin', 'IsisScript', 'pid',
        'wxis.exe', 'wood', 'modules', 'kbn', 'chid', 'jump', 'mes', 'ano', 'month', 'year', 'day', 'dia', 'pre',
        'show', 'download', 'summit', 'new', 'coming', 'Category', 'produtos', 'Menu', 'uid', 'Consulta', 'qry',
        'product', 'WebForms', 'proj', 'inter', 'scgi', 'orig_q', 'b1', 'showpage', 'filter', 'Detail', 'about',
        'itemlist', 'memor', 'info', 'website', 'cidade', 'lic', 'materia', 'SEC_', 'includes', 'store', 'ler',
        'reader', 'src', 'theme', 'Boletim', 'busca', 'date', 'video', 'configs', 'exec', 'doc', 'refresh', 'telec',
        'digital', 'materia', 'portal', 'shop', 'photos', 'sales', 'open', 'check', 'token', 'general', 'process', 'ViewType',
        'idCategor', 'intCatalogID', 'Cart', 'maingroup', 'play', 'where', 'mod', 'panel', 'str', 'staff_id', 'buy', 'preview',
        'chapter', 'club_id', 'GLOBALS', 'absolute_path', 'body', 'from', 'pg_ID', 'load', 'systempath', 'conf', 'do', 'x', 'temp',
        'see', 'act', 'middle', 'content', 'q', 'my', 'to', 'nivel', 'arq', 'modo', 'rss', 'pagina', 'opcion', 'loader', 'l', 'this',
        'subject', 'param', 'index', 'tipo', 'second', 'loc', 'cat_id', 'magazin', 'artist_art', 'cID', 'cat', 'message_id'
    ];

    $string_dork[3] = ['aspx', 'asp', 'cfm', 'php', 'php3', 'pl', 'cgi', 'py', 'jsp'];

    for ($i = 0; $i <= $count_dork; $i++):
        $dork_file = $string_dork[1][rand(0, count($string_dork[1]) - 1)];
        $dork_ext = $string_dork[2][rand(0, count($string_dork[2]) - 1)];
        $dork_get = $string_dork[3][rand(0, count($string_dork[3]) - 1)];
        $dork_return[] = "\"/{$dork_file}.{$dork_ext}?{$dork_get}\"";
    endfor;
return $dork_return;
}