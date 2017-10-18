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
* array_filter => It is a php array function which filter the values of an array using a callback function and return an array.
*/

if (isset($argv[1]) && $argv[1] == 'add') {
    if (isset($argv[2])) {
		$delimiter = substr($argv[2], 2, strrpos($argv[2], '\\') - 3);

		// Below if condition check if delimeter contains a '-' sign or multiple '--'.
		// In that case this logic is used to check the number is negative or not.

		if (strpos($delimiter, '-') !== false) {
            $del = $delimiter . "-";
            $negativeSignPosition = strpos($argv[2], $del);
        } else {
            $negativeSignPosition = strpos($argv[2], '-');
        }
        $newString = ltrim($argv[2], '\\' . $delimiter . '\\');
        $inputNumbers = explode($delimiter, $newString);
        if ($negativeSignPosition === false) {
            $numberSum = array_sum($inputNumbers);
            echo $numberSum;
        } else {
            $negativeNumberArray = array_filter($inputNumbers,
                                           function ($x) {
                                               return $x < 0;
                                           });
            $negativeNumberString = implode($negativeNumberArray, ',');
            echo "Error:Negative numbers ($negativeNumberString) are not allowed.";
        }
    } else {
        echo 0;
    }
} else {
    echo "Something went wrong. Please check entered operation, Only 'add' operation is allowed.";
}

?>
