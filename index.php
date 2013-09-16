<?php

require_once( 'easydump.php');

$var1 = "toto";
$var2 = array(
    'titi' => 'tonton',
    'tata' => 'toutou',
);


EasyDump::debug($var1, $var2, 756);
// or simply:
//d($var1, $var2, 756);
 
//immediatly stop the script after the dump:
EasyDump::debugExit($var1, $var2, 756);
// or simply:
//de($var1, $var2, 756);

?>