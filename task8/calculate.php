<?php
include __DIR__ . '/../core/calculator.php';

/**
 * Class Calculate.
 *
 * It extends the core class methods to manipulate inputs
 *
 * @method multiplication ($argv)
 */
class Calculate extends Calculator
{
    /**
     * Method multiplication  it return product/multiplication of user input values
     *
     * @param array $argv It contains filepath, operation name and input numbers
     */
    public function multiplication($argv)
    {
        //  Use parent class method @getFilteredValues which is used to return maniputed input numbers
        $number_string = $this->getFilteredValues($argv);

        //  Below condition is used to check is there any user defined delimiter, else go with the default delimiter ','
        if (strpos($number_string, '\\') !== false) {

            //  Check & fetch user defined delimiter
            $delimiter = substr($number_string, 2, strrpos($number_string, '\\') - 3);

            //  Below condition check if delimeter contains a '-' sign or multiple '--'.
            if (strpos($delimiter, '-') !== false) {
                $del = $delimiter . "-";

                //  check & fetch negative numbers
                $negative_sign_position = strpos($number_string, $del);
            } else {

                //  check & fetch negative numbers
                $negative_sign_position = strpos($number_string, '-');
            }

            $filtered_number_string = ltrim($number_string, '\\' . $delimiter . '\\');
        } else {
            $delimiter = ',';
            $filtered_number_string = $number_string;

            //  check & fetch negative numbers
            $negative_sign_position = strpos($number_string, '-');
        }

        //  Check if negative values not found, return multiplication of array else return error message which contains negative numbers
        if ($negative_sign_position === false) {
            $number_array = explode($delimiter, $filtered_number_string);
            $filteredArray = array_filter($number_array,
                                          function ($x) {
                                              return $x <= 1000;
                                          });
            $multiplication_result = array_product($filteredArray);
            echo $multiplication_result;
        } else {
            $number_array = explode($delimiter, $filtered_number_string);
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

echo $calculate->multiplication($argv);
echo "\n";


?>