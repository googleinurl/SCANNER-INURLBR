<?php
function __googleGenericRandom() {

    $generic = [
        '000905274576528531678:hvqlnmyn2is',
        '002901626849897788481:cpnctza84gq',
        '003917828085772992913:gmoeray5sa8',
        '005911257635119896548:iiolgmwf2se',
        '006688160405527839966:yhpefuwybre',
        '006748068166572874491:55ez0c3j3ey',
        '007843865286850066037:3ajwn2jlweq',
        '007843865286850066037:b0heuatvay8',
        '009462381166450434430:0aq_5piun68',
        '010479943387663786936:wjwf2xkhfmq',
        '012873187529719969291:yexdhbzntue',
        '012984904789461885316:oy3-mu17hxk',
        '013269018370076798483:wdba3dlnxqm',
        '018033044562278214682:oxcpaqr8gke',
        'partner-pub-1411074771348646:1404326155&',
        'partner-pub-7045961825256243:1400200985',
    ];
    
    return $generic[rand(0, count($generic) - 1)];
}