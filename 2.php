<?php

function convertString($a,$b)
{
    if (empty($a) || empty($b)){
        echo 'ne vernie uslovia';
        exit();
    } else {
        if (substr_count($a, $b) == 0){
            echo 'sovpadeniy net';
            exit();
        } elseif (substr_count($a, $b) == 1) {
            echo 'sovpadenie odno';
            exit();
        } else {
            $pos = strpos($a, $b, strpos($a, $b) + 1);
            echo substr_replace($a, strrev($b), $pos, strlen($b));
        }
    }
}

function mySortForKey($a, $b)
{
    if (!is_array($a) || !is_string($b)) {
        echo 'ne vernie uslovia';
        exit();
    } else {
        $arr = [];
        for ($i = 0; $i < count($a); $i++) {
            if (!in_array($a[$i][$b], $a[$i])){
                throw new Exception( "V massive s indexom '$i' net klucha '$b'" );
            }
            $arr[] = $a[$i][$b];
        }
        array_multisort($arr, SORT_NUMERIC, SORT_ASC);
        return $arr;
    }
}

/*
try {
    print_r(mySortForKey([['a'=>2,'b'=>1],['a'=>1,'b'=>3],['b'=>2]], 'a'));
} catch (Exception $e) {
    echo 'Vibrosheno iskluchenie: ',  $e->getMessage(), "\n";
} 
*/

define ('HOST', 'localhost');
define ('USER', 'root');
define ('PASS', 'password');
define ('DB', 'test_samson');

function importXml($a)
{
    $CONNECT = mysqli_connect(HOST, USER, PASS, DB);
    if (mysqli_connect_errno()) {
	printf("Соединение не удалось: %s\n", mysqli_connect_error());
        exit();
    }
    
}

