<?php

/*
* Below script is used to get sum of two arguments
* There is a default variable (array) "$argv" which is used to get all inputs
* There are some default functions used by me
* explode => It is used to exploding the numbers separated by comma and create a new array
* array_sum => It is a php array function which return sum of values.
*/

if (isset($argv[1]) && $argv[1] == 'sum') {
    if (isset($argv[2])) {
        $inputNumbers = explode(',', $argv[2]);
        $numberSum = array_sum($inputNumbers);
        echo $numberSum;
    } else {
        echo 0;
    }
} else {
    echo "Something went wrong. Please check entered operation, Only 'sum' operation is allowed.";
}

?>