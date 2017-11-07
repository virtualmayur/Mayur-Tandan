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
        //  Use parent class method @getFilteredValues which is used to return maniputed input numbers
        $number_string = $this->getFilteredValues($argv);

        //  Create an array by exploding number_string
        $number_array = explode(',', $number_string);

        //  Filter number_array it contains number if number < 1000
        $filtered_number_array = array_filter($number_array,
                                              function ($x) {
                                                  return $x <= 1000;
                                              });

        //  array_sum is use to get sum of array.
        $numbers_sum = array_sum($filtered_number_array);

        echo $numbers_sum;
    }
}

$calculate = new Calculate();

echo $calculate->add($argv);
echo "\n";


?>
