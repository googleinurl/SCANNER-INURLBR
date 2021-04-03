<?php
function __googleGenericRandom() {

    $generic = [
        '013269018370076798483:wdba3dlnxqm',
        '005911257635119896548:iiolgmwf2se',
        '007843865286850066037:b0heuatvay8',
        '002901626849897788481:cpnctza84gq',
        '006748068166572874491:55ez0c3j3ey',
        '012984904789461885316:oy3-mu17hxk',
        '006688160405527839966:yhpefuwybre',
        '003917828085772992913:gmoeray5sa8',
        '007843865286850066037:3ajwn2jlweq',
        '010479943387663786936:wjwf2xkhfmq',
        '012873187529719969291:yexdhbzntue',
        'partner-pub-7045961825256243:1400200985',
        'partner-pub-1411074771348646:1404326155&'
    ];
    
    return $generic[rand(0, count($generic) - 1)];
}