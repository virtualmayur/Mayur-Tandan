<?php

include __DIR__.'/../core/calculator.php';

/**
 * Class Calculate.
 *
 * It extends the core class methods calulate sum of inputs
 *
 * @method sum ($argv)
 */
class Calculate extends Calculator
{
    /**
     * Method sum It uses parent class methods to calculate and return sum of array.
     *
     * @param array $argv It contains filepath, operation name and input numbers
     */
    public function sum($argv)
    {
        
        // Use parent class method @getFilteredValues which is used to return maniputed input numbers
        $number_string = $this->getFilteredValues($argv);
        
        // Use parent class method @getSum which is used to return sum of array
        $numbers_sum = $this->getSum($number_string);

        return $numbers_sum;
    }
}

$calculate = new Calculate();

echo $calculate->sum($argv);
echo "\n";


?>