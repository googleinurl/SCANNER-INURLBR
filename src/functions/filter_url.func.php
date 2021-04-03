<?php

################################################################################
#FILTER HTML URLs ALL THE RETURN OF seekers#####################################
################################################################################
function __filterURL($html, $op = NULL) {

    $reg = !strstr($op, 'GOOGLE') ? "#\b(href=\"|src=\"|value=\")(.*?)(\")#si" :
            "#\b(href=\"|src=\"|value=\"http[s]?://|href=\"|src=\"|value=\"ftp[s]?://){1,}?([-a-zA-Z0-9\.]+)([-a-zA-Z0-9\.]){1,}([-a-zA-Z0-9_\.\#\@\:%_/\?\=\~\-\//\!\'\(\)\s\^\:blank:\:punct:\:xdigit:\:space:\$]+)#si";
    $html = str_replace('href="/url?q=', 'href="', $html);

    if (strstr($html, '.google.com/sorry/IndexRedirect?continue=https://www.google.com.') && $_SESSION['config']['persist'] <= $_SESSION["config"]['google_attempt'][1]):

        print_r("{$_SESSION["c1"]}[ INFO ][ ERROR ]{$_SESSION["c2"]} GOOGLE LOCKED!{$_SESSION["c0"]}\n");
        $randHost = __dominioGoogleRandom();
        $_SESSION["config"]['google_attempt'][1] ++;
        __pageEngine($_SESSION["config"]["conf_array_tmp"], "GOOGLE - {$randHost}", "https://{$randHost}/search?q=[DORK]&num=1500&btnG=Search&pws=1", $_SESSION["config"]["dork_tmp"], NULL, 0, 0, 1);
    else:
        $_SESSION["config"]["google_attempt"][1] = 0;
        preg_match_all($reg, $html, $html);
        return (array_filter(array_unique($html[0])));
    endif;
}
################################################################################
#FILTER IF URL DOMAIN###########################################################
################################################################################
function __filterURLif($resultados) {
    if (is_array($resultados)):
        foreach ($resultados as $value):
            $temp[] = __not_empty($_SESSION['config']['ifurl']) && strstr($value, $_SESSION['config']['ifurl']) ? $value : NULL;
        endforeach;
        return array_unique(array_filter($temp));
    endif;
    return FALSE;
}
################################################################################
#FILTER HTML URLs ALL THE RETURN OF GOOGLE API##################################
################################################################################
function __filterURLJson($html) {
    $html = json_decode($html, true);
    $allresponseresults = $html['responseData']['results'];
    foreach ($allresponseresults as $value):
        $tmp[] = $value['url'];
    endforeach;
    return (array_filter(array_unique($tmp)));
}