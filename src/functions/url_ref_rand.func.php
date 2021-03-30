<?php

function __setURLReferenceRandom() {

    $dominio = [
        'Adzuna', 'Bixee', 'CareerBuilder', 'Craigslist', 'Dice', 'Eluta.ca', 'Hotjobs',
        'JobStreet', 'Incruit', 'Indeed', 'Glassdoor', 'LinkUp', 'Monster', 'Naukri',
        'Yahoo', 'Legal', 'GoogleScholar', 'Lexis', 'Manupatra', 'Quicklaw', 'WestLaw',
        'Medical', 'Bing Health', 'Bioinformatic', 'CiteAb', 'EB-eye', 'Entrez', 'mtv',
        'ubuntu','GenieKnows', 'GoPubMed', 'Healia', 'Healthline', 'Nextbio', 'PubGene', 
        'Quertle', 'Searchmedica', 'WebMD', 'News', 'BingNews', 'Daylife', 'GoogleNews', 
        'aol', 'microsoft','MagPortal', 'Newslookup', 'Nexis', 'Topix', 'Trapit', 'YahooNews',
        'People', 'Comfibook', 'Ex.plode', 'InfoSpace', 'PeekYou', 'Spock', 'Spokeo',
        'WorldwideHelpers', 'iPhone','Zabasearch', 'ZoomInfo', 'Fizber', 'HotPads', 'Realtor',
        'Redfin', 'Rightmove', 'Trulia', 'Zillow', 'Zoopla', 'StuRents', 'globo', 'sbt', 'band', 
        'cnn'
    ];

    $gTLD = [
        'aero', 'arpa', 'biz', 'com', 'coop', 
        'edu', 'gov', 'info', 'int', 'mil', 
        'museum', 'name', 'net', 'org', 
        'pro', 'tel'
    ];

    $arquivo = [
        'admin', 'index', 'wp-admin', 'info', 'shop', 'file', 'out', 'open', 
        'news', 'add', 'profile', 'search', 'open', 'photo', 'insert', 'view'
    ];

    $ext = [
        'exe', 'php', 'asp', 'aspx', 'jsf', 
        'html', 'htm', 'lua', 'log', 'cgi', 
        'sh', 'css', 'py', 'sql', 'xml', 'rss'
    ];

    $pasta = [
        'App_Files', 'Assets', 'CFFileServlet', 'CFIDE', 'Communication', 
        'Computers', 'CoreAdminHome', 'CoreHome', 'Crawler', 'Creator',
        'DECOM', 'Dashboard', 'Drives', 'Dynamic', 'FCKeditor', 'Feedback', 
        'Files', 'Flash', 'Forms', 'Help', 'ICEcore', 'IO', 'Image', 'JPG', 
        'getold','JSP', 'KFSI', 'Laguna', 'Login', 'Motors', 'MultiSites', 
        'NR', 'OCodger', 'RSS', 'Safety', 'Smarty', 'Software', 'Static', 'Stress',
        'Sugarcrm', 'Travel', 'UPLOAD', 'Urussanga', 'UserFiles', '__tpl', 
        '_fckeditor', '_info', '_machine', '_plugins', '_sample', '_samples',
         'postmost','_source', '_testcases', 'aaa', 'abelardoluz', 'aberlardoluz', 
        'aborto', 'about', 'aboutus', 'abuse', 'abusers', 'ac_drives', 'acabamentos', 
        'mail','academias', 'acao', 'acartpro', 'acatalog', 'acc', 'acc_auto_del', 
        'acc_beep_ken', 'acc_beep_time', 'acc_ch_mail', 'acc_fc_prsc', 'accounts', 
        'validar','acc_html_mark', 'acc_html_rand', 'acc_lan_page', 'acc_pic_html', 
        'acc_profol', 'acc_soft_link', 'acc_ssd_page', 'acc_syun_ei', 'german', 
        'intranet', 'old','acc_time_go', 'acc_wbcreator', 'accept', 'accepted', 
        'acceso', 'access', 'accessibility', 'accessories', 'acciones', 'acclg', 
        'account', 'paste', 'paste22','acessorios', 'acontece', 'acougueiro', 
        'acoustic', 'act', 'action', 'activate', 'active', 'activeden', 'activism', 
        'actualit', 'actuators', 'ad', 'informatica','ad_division', 'ad_rate', 'adapter', 
        'adapters', 'adaptive', 'adaptivei', 'adatmentes', 'adbanner', 'adblock', 
        'adboard', 'adclick', 'add-ons', 'add', 'delete','added', 'addon', 'address', 
        'adduser', 'adfree', 'adhoc', 'adinfo', 'adios_papa', 'adlink', 'adlinks', 
        'acc_folder_vw', 'acc_syun_su'
    ];

    $locais = [
        'ac', 'ad', 'ae', 'af', 'ag', 'al', 'am', 'an', 'ao', 
        'aq', 'ar', 'as', 'at', 'au', 'aw', 'az', 'ba', 'bb', 
        'bd', 'be', 'bf', 'bg', 'bh', 'bi', 'bj', 'bm', 'bn',
        'bw', 'by', 'bz', 'ca', 'cc', 'cd', 'cf', 'cg', 'ch', 
        'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cr', 'cu', 'cv', 
        'cx', 'cy', 'cz', 'de', 'dj', 'dk', 'dm', 'do', 'dz', 
        'bo', 'br', 'ec', 'ee', 'eg', 'er', 'es', 'et', 'eu', 
        'fi', 'fj', 'fk', 'fm', 'fo', 'fr', 'ga', 'gb', 'gd', 
        'ge', 'gf', 'gg', 'gh', 'gi', 'gl', 'gm', 'gn', 'gp',
        'gs', 'gt', 'gu', 'gw', 'gy', 'hk', 'hm', 'hn', 'hr', 
        'ht', 'hu', 'id', 'ie', 'il', 'im', 'in', 'io', 'iq', 
        'ir', 'is', 'it', 'je', 'jm', 'jo', 'jp', 'ke', 'kg', 
        'kh', 'ki', 'km', 'kn', 'kr', 'kw', 'ky', 'kz', 'la', 
        'lb', 'lc', 'li', 'lk', 'lr', 'ls', 'lt', 'lu', 'lv', 
        'ly', 'ma', 'mc', 'md', 'me', 'mg', 'mh', 'mk', 'ml',
        'mm', 'mn', 'mo', 'mp', 'mq', 'mr', 'ms', 'mt', 'mu', 
        'mv', 'mw', 'mx', 'my', 'mz', 'nb', 'nc', 'ne', 'nf', 
        'ng', 'ni', 'nl', 'no', 'np', 'nr', 'nu', 'nz', 'om',
        'pa', 'pe', 'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn', 
        'pr', 'ps', 'pt', 'pw', 'py', 'qa', 're', 'ro', 'ru', 
        'rw', 'sa', 'sb', 'sc', 'sd', 'se', 'sg', 'sh', 'si',
        'sj', 'sk', 'sl', 'sm', 'sn', 'so', 'sr', 'ss', 'st', 
        'su', 'sv', 'sy', 'sz', 'tc', 'td', 'tf', 'tg', 'th', 
        'tj', 'tk', 'tl', 'tm', 'tn', 'to', 'tr', 'tt', 'tv',
        'tw', 'tz', 'ua', 'ug', 'uk', 'um', 'us', 'uy', 'uz', 
        'va', 'vc', 've', 'vg', 'vi', 'vn', 'vu', 'wf', 'ws', 
        'ye', 'yt', 'yu', 'za', 'zm', 'zw', 'ai'
    ];

    return "http://www." . strtolower($dominio[rand(0, count($dominio) - 1)]) . 
    ".{$gTLD[rand(0, count($gTLD) - 1)]}.{$locais[rand(0, count($locais) - 1)]}".
    "/{$pasta[rand(0, count($pasta) - 1)]}/{$arquivo[rand(0, count($arquivo) - 1)]}"
    .".{$ext[rand(0, count($ext) - 1)]}";
}