<?php

/*
 * Complete the 'biggerIsGreater' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING w as parameter.
 */

function biggerIsGreater($w) {
    // Write your code here
    $length = strlen($w);
    $i = $length - 2;
    
    while ($i >= 0 && $w[$i] >= $w[$i + 1]) {
        $i--;
    }
    if ($i == -1) {
        return 'no answer';
    } else {
        $j = $length - 1;
        while ($j >= $i && $w[$j] <= $w[$i]) {
            $j--;
        }
        // let swap $w[$j] && $w[$j]
        $tmp = $w[$i];
        $w[$i] = $w[$j];
        $w[$j] = $tmp;
    }
    $result = '';
    for ($k = 0; $k <= $i; $k++) {
        $result .= $w[$k];
    }
    for ($k = $length - 1; $k > $i; $k--) {
        $result .= $w[$k];
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$T = intval(trim(fgets(STDIN)));

for ($T_itr = 0; $T_itr < $T; $T_itr++) {
    $w = rtrim(fgets(STDIN), "\r\n");

    $result = biggerIsGreater($w);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

