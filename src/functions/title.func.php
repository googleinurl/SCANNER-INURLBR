<?php


function __parse_title($html) {
    $matches = [];
	preg_match("/<title>(.*)<\/title>/siU", $html, $matches);
	if (count($matches) > 1):
		return trim($matches[1]);
    else:
		return null;
	endif;
}