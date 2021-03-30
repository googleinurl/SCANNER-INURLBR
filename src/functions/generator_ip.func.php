<?php

################################################################################
#GENERATOR RANGE IP#############################################################
################################################################################
function __generatorRangeIP($range) {

    $ip_ = explode(',', $range);
    if (is_array($ip_)):
        $_ = array(0 => ip2long($ip_[0]), 1 => ip2long($ip_[1]));
        while ($_[0] <= $_[1]):
            $ips[] = "http://" . long2ip($_[0]);
            $_[0] ++;
        endwhile;
    else:
        return FALSE;
    endif;
    return $ips;
}

################################################################################
#GENERATOR RANGE IP RANDOM######################################################
################################################################################

function __generatorIPRandom($cont) {

    $cont[0] = 0;
    while ($cont[0] < $cont[1]):
        $bloc[0] = rand(0, 255);
        $bloc[1] = rand(0, 255);
        $bloc[2] = rand(0, 255);
        $bloc[3] = rand(0, 255);
        $ip[] = "http://{$bloc[0]}.{$bloc[1]}.{$bloc[2]}.{$bloc[3]}";
        $cont[0] ++;
    endwhile;
    return array_unique($ip);
}