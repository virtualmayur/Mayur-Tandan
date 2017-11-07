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

        // Below condition check if delimeter contains a '-' sign or multiple '--'.
        if (strpos($delimiter, '-') !== false) {
            $del = $delimiter . "-";
            // check & fetch negative numbers
            $negative_sign_position = strpos($number_string, $del);
        } else {
            // check & fetch negative numbers
            $negative_sign_position = strpos($number_string, '-');
        }

        $filtered_number_string = ltrim($number_string, '\\' . $delimiter . '\\');
        $number_array = explode($delimiter, $filtered_number_string);

        // Check if negative values not found, return sum of array else return error message which contains negative numbers
        if ($negative_sign_position === false) {
            $numbers_sum = array_sum($number_array);
            echo $numbers_sum;
        } else {
            $negative_number_array = array_filter($number_array,
                                                  function ($x) {
                                                      return $x < 0;
                                                  });
            $negative_number_string = implode($negative_number_array, ',');
            echo "Error:Negative numbers ($negative_number_string) are not allowed.";
        }
    }
}

$calculate = new Calculate();

echo $calculate->add($argv);
echo "\n";

?>
