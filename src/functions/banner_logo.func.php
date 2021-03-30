<?php

function __bannerLogo() {

    $banner="


    {$_SESSION["c12"]}██▓    ███▄    █     █    ██     ██▀███      ██▓       {$_SESSION["c1"]} ▄▄▄▄       ██▀███  
    {$_SESSION["c12"]}▓██▒    ██ ▀█   █     ██  ▓██▒   ▓██ ▒ ██▒   ▓██▒      {$_SESSION["c1"]} ▓█████▄    ▓██ ▒ ██▒
    {$_SESSION["c12"]}▒██▒   ▓██  ▀█ ██▒   ▓██  ▒██░   ▓██ ░▄█ ▒   ▒██░      {$_SESSION["c1"]} ▒██▒ ▄██   ▓██ ░▄█ ▒
    {$_SESSION["c12"]}░██░   ▓██▒  ▐▌██▒   ▓▓█  ░██░   ▒██▀▀█▄     ▒██░      {$_SESSION["c1"]} ▒██░█▀     ▒██▀▀█▄  
    {$_SESSION["c12"]}░██░   ▒██░   ▓██░   ▒▒█████▓    ░██▓ ▒██▒   ░██████▒  {$_SESSION["c1"]} ░▓█  ▀█▓   ░██▓ ▒██▒
    {$_SESSION["c12"]}░▓     ░ ▒░   ▒ ▒    ░▒▓▒ ▒ ▒    ░ ▒▓ ░▒▓░   ░ ▒░▓  ░  {$_SESSION["c1"]} ░▒▓███▀▒   ░ ▒▓ ░▒▓░
    {$_SESSION["c12"]} ▒ ░   ░ ░░   ░ ▒░   ░░▒░ ░ ░      ░▒ ░ ▒░   ░ ░ ▒  ░  {$_SESSION["c1"]} ▒░▒   ░      ░▒ ░ ▒░
    {$_SESSION["c16"]} ▒ ░      ░   ░ ░     ░░░ ░ ░      ░░   ░      ░ ░     {$_SESSION["c1"]}  ░    ░      ░░   ░ 
    {$_SESSION["c16"]} ░              ░       ░           ░            ░  ░  {$_SESSION["c1"]}  ░            ░     {$_SESSION["c1"]}{$_SESSION['config']['version_script']}
    {$_SESSION["c0"]}"; 
                                                   
return (!is_null($_SESSION['config']['no-banner']) ? NULL : system("command clear") . $banner."
{$_SESSION["c1"]}[ ! ] {$_SESSION["c16"]} https://blog.mrcl0wn.com{$_SESSION["c0"]}
{$_SESSION["c1"]}[ ! ] {$_SESSION["c16"]} https://twitter.com/MrCl0wnLab{$_SESSION["c0"]}
{$_SESSION["c1"]}[ ! ] {$_SESSION["c16"]} https://github.com/MrCl0wnLab{$_SESSION["c0"]}
{$_SESSION["c1"]}[ ! ] {$_SESSION["c16"]} Current IPinfo Token::[ {$_SESSION["c1"]}" . $_SESSION['config']['token_ipinfo'][0] . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}[ ! ] {$_SESSION["c16"]} Current PHP version::[ {$_SESSION["c1"]}" . phpversion() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}[ ! ] {$_SESSION["c16"]} Current script owner::[ {$_SESSION["c1"]}" . get_current_user() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}[ ! ] {$_SESSION["c16"]} Current uname::[ {$_SESSION["c1"]}" . php_uname() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}[ ! ] {$_SESSION["c16"]} Current pwd::[ {$_SESSION["c1"]}" . getcwd() . " {$_SESSION["c16"]}]{$_SESSION["c0"]}
{$_SESSION["c1"]}[ ! ] {$_SESSION["c2"]} Help: php inurlbr.php --help{$_SESSION["c0"]}
{$_SESSION["c1"]} ____________________________________________________________________________________________________________________{$_SESSION["c0"]}
"); 

}