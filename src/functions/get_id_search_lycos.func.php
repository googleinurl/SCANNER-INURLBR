<?php

################################################################################
#CAPTURE ID KEY TO SEARCH LYCOS MAKE############################################
################################################################################

function __getIdSearchLycos($html) {

    $match = NULL;
    preg_match_all("(val.*)", $html, $match);
    return (str_replace(');', '', str_replace('val(', '', str_replace("'", '', $match[0][4]))));
}