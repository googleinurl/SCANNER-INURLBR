<?php

################################################################################
#This function removes the last regular expression ta###########################
################################################################################

function __filterURLTAG($valor = NULL) {

    return(!is_null($valor)) ? str_replace('"', '', str_replace('href="', '', str_replace('src="', '', str_replace('value="', '', $valor)))) : NULL;
}