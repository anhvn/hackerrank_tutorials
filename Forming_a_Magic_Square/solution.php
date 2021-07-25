<?php

/*
 * Complete the 'formingMagicSquare' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY s as parameter.
 */

function formingMagicSquare($s) {
    // Write your code here
    $arr = [];
    // Forming a new 1-dimension array
    for ($i = 0; $i < 3; $i++) {
        $arr = array_merge($arr, $s[$i]);
    }
    // All possible 3x3 magic squares
    $allCases = [
        [2, 7, 6, 9, 5, 1, 4, 3, 8],
        [2, 9, 4, 7, 5, 3, 6, 1, 8],
        [4, 3, 8, 9, 5, 1, 2, 7, 6],
        [4, 9, 2, 3, 5, 7, 8, 1, 6],
        [6, 1, 8, 7, 5, 3, 2, 9, 4],
        [6, 7, 2, 1, 5, 9, 8, 3, 4],
        [8, 1, 6, 3, 5, 7, 4, 9, 2],
        [8, 3, 4, 1, 5, 9, 6, 7, 2]
    ];
    $min = null;
    foreach ($allCases as $case) {
        $cost = array_sum(array_map(function ($x, $y) {
            return abs($x - $y);
        }, $case, $arr));
        if (is_null($min) || $cost < $min) {
            $min = $cost;
        }
    }
    return $min;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = array();

for ($i = 0; $i < 3; $i++) {
    $s_temp = rtrim(fgets(STDIN));

    $s[] = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = formingMagicSquare($s);

fwrite($fptr, $result . "\n");

fclose($fptr);

