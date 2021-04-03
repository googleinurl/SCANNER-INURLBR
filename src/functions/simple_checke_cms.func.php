<?php

function __SimpleCheckCMS($html) {

    $cms['XOOPS CMS IDENTIFIED'] = '<meta name="generator" content="XOOPS"';
    $cms['Joomla CMS IDENTIFIED'] = '<meta name="generator" content="Joomla!';
    $cms['Wordpress CMS IDENTIFIED'] = '<meta name="generator" content="WordPress';
    $cms['SMF CMS IDENTIFIED-1'] = '<a href="http://www.simplemachines.org/" title="Simple Machines Forum" target="_blank">Powered by SMF';
    $cms['SMF CMS IDENTIFIED-2'] = '<a href="http://www.simplemachines.org/about/copyright.php" title="Free Forum Software" target="_blank">SMF';
    $cms['vBulletin CMS IDENTIFIED-1'] = '<meta name="generator" content="vBulletin';
    $cms['vBulletin CMS IDENTIFIED-2'] = 'Powered by <a href="http://www.vbulletin.com" id="vbulletinlink">vBulletin&trade;</a> Version';
    $cms['vBulletin CMS IDENTIFIED-3'] = 'powered by vBulletin';
    $cms['phpBB CMS IDENTIFIED'] = 'Powered by <a href="http://www.phpbb.com/">phpBB</a>';
    $cms['MyBB CMS IDENTIFIED'] = 'Powered By <a href="http://www.mybboard.net" target="_blank">MyBB</a>';
    $cms['Drupal CMS IDENTIFIED-1'] = 'name="Generator" content="Drupal';
    $cms['Drupal CMS IDENTIFIED-2'] = 'Drupal.settings';
    $cms['MODx CMS IDENTIFIED'] = '<a href="http://www.modx.com" target="_blank"> Powered by MODx</a>';
    $cms['SilverStripe CMS IDENTIFIED'] = '<meta name="generator" content="SilverStripe - http://silverstripe.org" />';
    $cms['Textpattern CMS IDENTIFIED'] = 'Powered by <a href="http://www.textpattern.com" title="Textpattern">Textpattern</a>';
    $cms['Adapt CMS IDENTIFIED'] = 'Powered by <a href="http://www.adaptcms.com">AdaptCMS';
    $cms['ATutor CMS IDENTIFIED'] = '<a href="/about.php">About ATutor</a>';
    $cms['b2evolution CMS IDENTIFIED'] = '<meta name="generator" content="b2evolution';
    $cms['Moodle CMS IDENTIFIED-1'] = 'Powered by <a href="http://moodle.org" title="Moodle">Moodle</a>';
    $cms['Moodle CMS IDENTIFIED-2 '] = '<meta name="key words" content="moodle, Course Management System " />';
    $cms['Moodle CMS IDENTIFIED-3'] = '://moodle';
    $cms['Moodle CMS IDENTIFIED-4'] = '://www.mood le';
    $cms['ATutor CMS IDENTIFIED'] = '<META NAME="GENERATOR" CONTENT="PHP-Nuke';
    $cms['PostNuke CMS IDENTIFIED'] = '<meta name="generator" content="PostNuke';
    $cms['CloudFlare IDENTIFIED-1'] = '<a href="http://www.cloudflare.com/" target="_blank" style=';
    $cms['CloudFlare IDENTIFIED-2'] = 'DDoS protection by CloudFlare</a>';

    foreach ($cms as $campo => $valor):
        __plus();
        if (strstr($html, $cms[$campo])):
            return(" {$campo} ");
        endif;
    endforeach;
    return "0xUNIDENTIFIED";
}