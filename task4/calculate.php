<?php

include __DIR__.'/../core/calculator.php';

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
        
        // Get filtered string
        $filtered_string = ltrim($number_string, '\\'.$delimiter.'\\');
        
        // Use parent class method @getSum which is used to return sum of array
        $numbers_sum = $this->getSum($filtered_string, $delimiter);
        
        echo $numbers_sum;
    
    }
    
}

$calculate = new Calculate();

echo $calculate->add($argv);
echo "\n";

?>
