<?php

/**
 * Utility class to easily and beautifully dump PHP variables
 * the functions d() and dd() where inspired Kint
 * 
 * @author      Yosko <contact@yosko.net>
 * @version     0.3
 * @copyright   none: free and opensource
 * @link        http://www.yosko.net/
 */
class EasyDump {
    /**
     * For debug purpose only
     * @param  misc    $variables any number of variables of any type
     */
    public static function debug() {
        echo '<pre style="border: 0.5em solid #7A7267; color: #EBD1B7; background-color: #36312c; margin: 0; padding: 0.5em; white-space: pre-wrap;font-family:\'DejaVu Sans Mono\',monospace;font-size:11px;">';
        $trace = debug_backtrace();

        foreach ( $trace[0]['args'] as $k => $v ) {
            EasyDump::showVar($k, $v);
        }
        echo '</pre>';
    }

    /**
     * For debug purpose only. Exits after dump
     * @param  misc    $variable the variable to dump
     */
    public static function debugExit() {
        call_user_func_array( array( __CLASS__, 'debug' ), func_get_args() );
        exit;
    }

    /**
     * For debug purpose only, used by debug()
     * Recursive (for arrays) function to display variable in a nice formated way
     * @param  string  $name           name/value of the variable's index
     * @param  misc    $value          value to display
     * @param  integer $level          for indentation purpose, used in recursion
     * @param  boolean $serializeArray force array serialization
     */
    protected static function showVar($name, $value, $level = 0, $dumpArray = false) {
        $indent = "    ";
        for($lvl = 0; $lvl < $level; $lvl++) { echo $indent; }
        echo '<span style="color:#F8BB39;">'.(is_string($name)?'"'.$name.'"':'['.$name.']').'</span>';
        echo '<span style="color:#DB784D;">('.gettype($value).")</span>\t= ";
        if(is_array($value) && !$dumpArray && $level <= 5) {
            echo '{';
            if(!empty($value)) {
                echo "\r\n";
                foreach($value as $k => $v) {
                    self::showVar($k, $v, $level+1);
                }
            }
            echo "}\r\n";
        } else {
            echo '<span style="color:#95CC5E;">';
            if(is_object($value) || is_resource($value)) {
                ob_start();
                var_dump($value);
                $result = ob_get_clean();
                //trim the var_dump because EasyDump already handle the newline after dump
                echo trim($result);
            } elseif(is_array($value)) {
                echo serialize($value);
            } elseif(is_string($value)) {
                echo '"'.htmlentities($value).'"';
            } elseif(is_bool($value)) {
                echo $value?'true':'false';
            } elseif(is_null($value)) {
                echo 'NULL';
            } elseif(is_numeric($value)) {
                echo $value;
            } else {
                echo 'N/A';
            }
            echo "</span>\r\n";
        }
    }
}

/**
 * Dump variable
 * Alias of EasyDump::debug()
 */
if ( !function_exists( 'd' ) ) {
    function d() {
        call_user_func_array( array( 'EasyDump', 'debug' ), func_get_args() );
    }
}

/**
 * Dump variable, then exit script
 * Alias of EasyDump::debugExit()
 */
if ( !function_exists( 'de' ) ) {
    function de() {
        call_user_func_array( array( 'EasyDump', 'debugExit' ), func_get_args() );
    }
}

?>