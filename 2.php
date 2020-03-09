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

