<?php

/*
* Below script is used to get sum of 'n' arguments
* There is a default variable (array) "$argv" which is used to get all inputs
* There are some default functions used by me
* str_replace => It is used to replace substring. If the string contains \n, it replaces \n with comma,
* explode => It is used to exploding the numbers separated by comma and create a new array.
* array_sum => It is a php array function which return sum of values.S
*/

if (isset($argv[1]) && $argv[1] == 'add') {
    if (isset($argv[2])) {
        if (strpos($argv[2], '\n') !== - 1) {
            $newString = str_replace('\n', ',', $argv[2]);
        } else {
            $newString = $argv[2];
        }
        $inputNumbers = explode(',', $newString);
        $numberSum = array_sum($inputNumbers);
        echo $numberSum;
    } else {
        echo 0;
    }
} else {
    echo "Something went wrong. Please check entered operation, Only 'add' operation is allowed.";
}

?>