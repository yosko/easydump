<?php

require_once( 'easydump.php');

$var1 = "toto";
$var2 = opendir('.');
$var3 = array(
    'titi' => 'tonton',
    'tata' => 'toutou',
);
$var4 = new DateTime();


EasyDump::debug(756, $var1, null, $var2, $var3, $var4);
// or simply:
//d(756, $var1, null, $var2, $var3, $var4);
 
//immediatly stop the script after the dump:
EasyDump::debugExit(756, $var1, null, $var2, $var3, $var4);
// or simply:
//de(756, $var1, null, $var2, $var3, $var4);

?>