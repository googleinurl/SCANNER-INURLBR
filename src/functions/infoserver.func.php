<?php

function __infoServer($url_, $postDados = NULL) {

   
    $_SESSION['config']['verifica_info'] = 1;
    $resultado = __request_info($url_, $_SESSION["config"]["proxy"], $postDados);
    
    if (isset($resultado['corpo'])):
        if (!is_null($_SESSION['config']['extrai-email']))
            return __extractEmail($resultado['corpo'], $url_);

        if (!is_null($_SESSION['config']['extrai-url']))
            return __extractURLs($resultado['corpo'], $url_);

        if (__not_empty($_SESSION['config']['regexp-filter']))
            return __extractRegCustom($resultado['corpo'], $url_);

        if (__not_empty($_SESSION['config']['target']) && $_SESSION['config']['tipoerro'] == 5)
            return __checkURLs($resultado, $url_);
        
        $ifcode = __not_empty($_SESSION['config']['ifcode']) &&
                strstr($resultado['server']['http_code'], $_SESSION['config']['ifcode']) ?
                "CODE_HTTP_FOUND: {$_SESSION['config']['ifcode']} / " : NULL;

        $ifredirect = __not_empty($_SESSION['config']['ifredirect']) &&
                (strstr($resultado['server']['redirect_url'], $_SESSION['config']['ifredirect'])) ?
                'VALUE URL REDIRECT FOUND' : NULL;

        $_SESSION['config']['title'] = __parse_title($resultado['corpo']);
        $_SESSION['config']['erroReturn'] = $ifredirect . $ifcode . __checkError($resultado['corpo']);
        $_SESSION['config']['curl_getinfo'] = $resultado['server'];
        $_SESSION['config']['error_conection'] = (__not_empty($resultado['error']) ? $resultado['error'] : NULL);
        $_SESSION['config']['server_ip'] = (!is_null($resultado['server']['primary_ip']) ? $resultado['server']['primary_ip'] : NULL);
        $_SESSION['config']['vull_style'] = (__not_empty($_SESSION['config']['erroReturn'])) ? "{$_SESSION["c4"]}( POTENTIALLY VULNERABLE ){$_SESSION["c0"]}  \033[1m \033[32m" . __cli_beep() : NULL;
        $_SESSION['config']['resultado_valores'].=(__not_empty($_SESSION['config']['erroReturn'])) ? "{$url_}\n" : NULL;
        $_SESSION['config']['info_ip'] = __infoIP($resultado['server']['primary_ip'], 1);
        $url_ = ($_SESSION['config']['alexa-rank']) ? ", RANK ALEXA: " . __positionAlexa($url_) : NULL;
        __plus();
    else:
        return FALSE;
    endif;
    __plus();

    return "{$resultado['info']} , IP:{$resultado['server']['primary_ip']}:{$resultado['server']['primary_port']} {$url_}";
}