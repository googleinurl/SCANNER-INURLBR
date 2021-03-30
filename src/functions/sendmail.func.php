<?php

function __sendMail($email, $value) {

    $headers = NULL;
    $headers .= "From: <scanner-inurlbr@localhost>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "content-type: text/html\nX-priority: 1\n";
    $body = "------------------------------------------------------\n";
    $body.="DATE:  [" . date("d-m-Y H:i:s") . "]";
    $body.=__not_empty($_SESSION['config']['http-header']) ? "HTTP HEADER: {$_SESSION['config']['http-header']}\n" : NULL;
    $body.=__not_empty($_SESSION['config']['motor']) ? "MOTOR BUSCA: {$_SESSION['config']['motor']}\n" : NULL;
    $body.=__not_empty($_SESSION['config']['tipoerro']) ? "TIPO ERROR: {$_SESSION['config']['tipoerro']}\n" : NULL;
    $body.=__not_empty($_SESSION['config']['exploit-get']) ? "EXPLOIT GET: {$_SESSION['config']['exploit-get']}\n" : NULL;
    $body.=__not_empty($_SESSION['config']['exploit-post']) ? "EXPLOIT-POST: {$_SESSION['config']['exploit-post']}\n" : NULL;
    $body.=__not_empty($_SESSION['config']['command-vul']) ? "COMMAND VUL: {$_SESSION['config']['command-vul']}\n" : NULL;
    $body.=__not_empty($_SESSION['config']['command-all']) ? "COMMAND ALL: {$_SESSION['config']['command-all']}\n" : NULL;
    $body.=__not_empty($_SESSION['config']['user-agent']) ? "USER AGENT: {$_SESSION['config']['user-agent']}\n" : NULL;
    $body.= "------------------------------------------------------\n";

    if (mail($email, "[ INFO ][ OUTPUT INURLBR ]:: {$value}", $body, $headers)):
        __plus();
        return "[ INFO ][ SUBMITTED SUCCESSFULLY ]\n";
    else:
        __plus();
        return "[ INFO ][ NOT SENT ]\n";
    endif;
}