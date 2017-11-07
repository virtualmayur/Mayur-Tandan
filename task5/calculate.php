<?php

include __DIR__ . '/../core/calculator.php';

/**
 * Class Calculate.
 *
 * It extends the core class methods calulate sum of inputs
 *
 * @method add ($argv)
 */
class Calculate extends Calculator
{
    /**
     * Method add It uses parent class methods to calculate and return sum of array.
     *
     * @param array $argv It contains filepath, operation name and input numbers
     */
    public function add($argv)
    {
        // Use parent class method @getFilteredValues which is used to return maniputed input numbers
        $number_string = $this->getFilteredValues($argv);

        // Check & fetch user defined delimiter
        $delimiter = substr($number_string, 2, strrpos($number_string, '\\') - 3);

        // Below if condition check if delimeter contains a '-' sign or multiple '--'.
        if (strpos($delimiter, '-') !== false) {
            $del = $delimiter . "-";
            // check & fetch negative numbers
            $negative_sign_position = strpos($number_string, $del);
        } else {
            // check & fetch negative numbers
            $negative_sign_position = strpos($number_string, '-');
        }

        // Check if negative values not found, return sum of array else return error message
        if ($negative_sign_position === false) {
            $filtered_string = ltrim($number_string, '\\' . $delimiter . '\\');
            // Use parent class method @getSum which is used to return sum of array
            $numbers_sum = $this->getSum($filtered_string, $delimiter);
            echo $numbers_sum;
        } else {
            echo "Negative numbers are not allowed.";
        }
    }
}

$calculate = new Calculate();

echo $calculate->add($argv);
echo "\n";


?>