<?php

/*
* Below script is used to get sum of  'n' arguments
* There is a default variable (array) "$argv" which is used to get all inputs
* There are some default functions used by me
* strrpos => It is used to get the position of string from end. 
* substr => It is used to return a part of a string.
* ltrim => It is used to remove characters from the left side of a string.
* explode => It is used to exploding the numbers separated by comma and create a new array.
* array_sum => It is a php array function which return sum of values.
*/

if (isset($argv[1]) && $argv[1] == 'add') {
    if (isset($argv[2])) {
		$delimiter = substr($argv[2], 2, strrpos($argv[2], '\\') - 3);
        $newString = ltrim($argv[2], '\\' . $delimiter . '\\');
        $inputNumbers = explode($delimiter, $newString);
        $numberSum = array_sum($inputNumbers);
        echo $numberSum;
    } else {
        echo 0;
    }
} else {
    echo "Something went wrong. Please check entered operation, Only 'add' operation is allowed.";
}

?>
