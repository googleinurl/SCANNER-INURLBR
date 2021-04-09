<?php
function __request_info($url_, $proxy = NULL, $postDados = NULL) {

    $url_ = __crypt($url_);
    $parser_url = parse_url($url_);
    $mh = curl_multi_init();
    $curl_array = [];
    $nodes = is_array($url_) ? $url_ : [$url_];

    foreach ($nodes as $i => $url):

        $curl_array[$i] = curl_init($url);

        __plus();

        //FORMATANDO POST & EXECUTANDO urlencode EM CADA VALOR DO POST.
        if (__not_empty($postDados) && is_array($postDados)):

            foreach ($postDados as $campo => $valor):
                $postDados_format .= "{$campo}=" . urlencode($valor) . '&';
            endforeach;

            $postDados_format = rtrim($postDados_format, '&');
            curl_setopt($curl_array[$i], CURLOPT_POST, count($postDados));
            curl_setopt($curl_array[$i], CURLOPT_POSTFIELDS, __crypt($postDados_format));
        endif;

        curl_setopt($curl_array[$i], CURLOPT_HTTPHEADER, array_merge(__not_empty($_SESSION['config']['http-header']) ?
                                explode(',', __crypt($_SESSION['config']['http-header'])) : array(), array("Cookie: disclaimer_accepted=true")));
        curl_setopt($curl_array[$i], CURLOPT_USERAGENT, (__not_empty($_SESSION['config']['user-agent'])) ?
                        __crypt($_SESSION['config']['user-agent']) : __setUserAgentRandom());
        curl_setopt($curl_array[$i], CURLOPT_REFERER, (__not_empty($_SESSION['config']['url-reference'])) ?
                        __crypt($_SESSION['config']['url-reference']) : __setURLReferenceRandom());

        (!is_null($proxy) ? curl_setopt($curl_array[$i], CURLOPT_PROXY, $proxy) : NULL);
        (!is_null($_SESSION['config']['verifica_info'])) ? curl_setopt($curl_array[$i], CURLOPT_HEADER, 1) : NULL;
        (!is_null($_SESSION['config']['verifica_info']) && __validateOptions('3,6', $_SESSION['config']['debug']) ?
                        curl_setopt($curl_array[$i], CURLOPT_VERBOSE, 1) : NULL);

        __plus();
        curl_setopt($curl_array[$i], CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_array[$i], CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_array[$i], CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($curl_array[$i], CURLOPT_RETURNTRANSFER, 1);
        #curl_setopt($curl_array[$i], CURLOPT_FOLLOWLOCATION, 1);

        curl_setopt($curl_array[$i], CURLOPT_CONNECTTIMEOUT, __not_empty($_SESSION['config']['time-out']) ?
                        $_SESSION['config']['time-out'] : 5);

        curl_setopt($curl_array[$i], CURLOPT_TIMEOUT, __not_empty($_SESSION['config']['time-out']) ?
                        $_SESSION['config']['time-out'] : 5);

        curl_setopt($curl_array[$i], CURLOPT_COOKIEFILE, __not_empty($_SESSION['config']['file-cookie']) ?
                        $_SESSION['config']['file-cookie'] : 'cookie.txt');

        curl_setopt($curl_array[$i], CURLOPT_COOKIEJAR, __not_empty($_SESSION['config']['file-cookie']) ?
                        $_SESSION['config']['file-cookie'] : 'cookie.txt');

        curl_multi_add_handle($mh, $curl_array[$i]);
    endforeach;
    
    $running = NULL;
    do {
        usleep(100);
        curl_multi_exec($mh, $running);
    } while ($running > 0);
    $ret =[];
    foreach ($nodes as $i => $url):
        $ret[0] = curl_multi_getcontent($curl_array[$i]);
        $ret[1] = curl_getinfo($curl_array[$i]);
        $ret[2] = curl_error($curl_array[$i]);
    endforeach;
    foreach ($nodes as $i => $url):
        curl_multi_remove_handle($mh, $curl_array[$i]);
    endforeach;

    $status = NULL;
    preg_match_all('(HTTP.*)', $ret[0], $status['http']);
    preg_match_all('(Server:.*)', $ret[0], $status['server']);
    preg_match_all('(X-Powered-By:.*)', $ret[0], $status['X-Powered-By']);

    __plus();
    $ret[3] = str_replace("\r", '', str_replace("\n", '', "{$status['http'][0][0]}, {$status['server'][0][0]}  {$status['X-Powered-By'][0][0]}"));
    __debug(array('debug' => "[ BODY ]{$ret[0]}", 'function' => __FUNCTION__), 4);

    __plus();
    __debug(array('debug' => "[ URL ]{$url_}", 'function' => __FUNCTION__), 2);

    __plus();
    curl_multi_close($mh) . unlink('cookie.txt');

    __plus();
    unset($curl_array);
    return isset($ret[0]) ? array('corpo' => $ret[0], 'server' => $ret[1], 'error' => $ret[2], 'info' => $ret[3],'parser_url'=>$parser_url) : FALSE;
}