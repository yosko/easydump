<?php

require_once( 'easydump.php');

$var1 = "toto";
$var2 = opendir('.');
$var3 = array(
    'ti,ti' => 'tete',
    'tata' => 'tutu',
);


// basic example
EasyDump::debug($var1);
// or more simply:
// d($var1);
 
// extended example:
// - immediatly stop the script after the dump
// - dump any number of variables, values and function/class calls
EasyDump::debugExit(
    756,
    $var1,
    null,
    $var2,
    $var3['ti,ti'],
    new DateTime()
);
// or more simply:
// de(756, $var1, null, $var2, $var3['ti,ti'], new DateTime());

?>