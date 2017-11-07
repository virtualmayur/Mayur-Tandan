<?php

/**
 * Class Calculator
 *
 * It contains 2 methods which is used to manipulate input array and get sum of array.
 *
 * @method getFilteredValues($argv)
 *
 * @method getSum($argv)
 *
 */
class Calculator
{
    /**
     * Method getFilterdValues
     * it is used to manipulate user input and if all the validations passed it returns a string.
     *
     * @param array $argv It contains filepath, operation name and input numbers
     *
     */
    public function getFilteredValues($argv)
    {

        $array_count = count($argv);
        $result = ['status' => true, 'message' => ''];

        // If condition is used to stop execution of the program, If user not sending proper input (Operation name & input numbers).
        if ($array_count <= 1) {
            $result['message'] = "Please enter operation name and input arguments.";
            $result['status'] = false;
        }else{
        
            $method_name = (empty($argv[1])) ? '' : $argv[1];
            $number_string = (empty($argv[2])) ? '' : $argv[2];
            $methods = array('add');
        
            // If it is task1 then method shoud be 'add'
            if (stripos($argv[0], 'task1') !== FALSE) {
                $methods[0] = 'sum';
            }

            // If it is task8 then method shoud be 'multiply'
            if (stripos($argv[0], 'task8') !== FALSE) {
                $methods[0] = 'multiply';
            }

            // Check if proper method not found then it set a message for that issue and set status false
            if (!in_array($method_name, $methods)) {
                $result['message'] = "Please check entered operation, Only '$methods[0]' operation is allowed.";
                $result['status'] = false;
            }
        }
        // Check if anything wrong then execution stop with proper message
        if ($result['status'] == false) {
            echo $result['message'];
            echo "\n";
            exit;
        }
        // It is used to return user input string
        if ($number_string) {
            return $number_string;
        }
    }

    /**
     * Method getSum is used to create an array from the given string and return sum of array.
     *
     * @param str $number_string It contains numbers in a string entered by the user.
     *
     * @param str $delimiter It is used to explode number_string.
     *
     */
    public function getSum($number_string, $delimiter = ',')
    {
        if(!isset($delimiter) || $delimiter == ''){
            $delimiter = ',';
        }
        // Explode number_string through specified delimiter and create a number_array
        $number_array = explode($delimiter, $number_string);
        // Use array_sum function and pass number_array to get the sum of numbers
        $numbers_sum = array_sum($number_array);

        return $numbers_sum;
    }
}

?>