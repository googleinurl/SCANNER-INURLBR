<?php

function __validate_error_db($html_, $verificar, $bd) {
    return (strstr($html_, $verificar)) ? $bd : NULL;
}