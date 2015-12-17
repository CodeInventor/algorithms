<?php
/**
  * Common function and classes
  *
  * @package  common\function
  * @author Andrey Babaev <rebellious.mind@outlook.com>
  */


/**
 * Print array before something
 *
 * @param array $a
 */
function array_before(array $a)
{
	print_array($a, "Array before:");
}

/**
 * Print array after something
 *
 * @param array $a
 */
function array_after(array $a)
{
	print_array($a, "Array after:");
}

/**
 * Print array before sorting
 *
 * @param array $a
 */
function before_sort(array $a)
{
	print_array($a, "Array before sorting:");
}

/**
 * Print array after sorting
 *
 * @param array $a
 */
function after_sort(array $a)
{
	print_array($a, "Array after sorting:");
}

/**
 * Print array with different messages
 *
 * @param array $a
 * @param String $s
 *
 * @throws FunctionException if the second argument isn't of type String
 */
function print_array(array $a, $s = '')
{
	if (!is_string($s)) {
		throw new FunctionException("Second parameter isn't String", 1);
	}

	if (!empty($s)) {	
    	echo "$s\n";
    }

    echo implode(', ', $a);
    echo "\n";
}

/**
 * Measure user's function execution time with different array size
 *
 * @param String $func User's callback function name
 * @param integer $array_size Size for test array 
 */
function measure_exec_time($func, $array_size = 10000)
{
	echo "Starting to measure an execution time of $func() for N = $array_size\n";
	
	$i = PHP_INT_MAX;
	
	while($array_size) {
		$arr[] = $i;
		$i--;
		$array_size--;
	}

	$time = microtime(true);
	
	call_user_func($func, $arr);

	printf("End test. TIME = %0.02f\n", microtime(true) - $time);
}

/**
 * Measure user's function execution time with different array size and random data
 *
 * @param String $func User's callback function name
 * @param integer $array_size Size for test array 
 */
function measure_exec_time_rand($func, $array_size = 10000)
{
	echo "Starting to measure an execution time of $func() for RAND N = $array_size\n";
	
	$i = PHP_INT_MAX;
	
	while($array_size) {
		$arr[] = rand(-1000, 1000);
		$array_size--;
	}

	$time = microtime(true);
	
	call_user_func($func, $arr);

	printf("End test. TIME = %0.02f\n", microtime(true) - $time);
}

/**
 *  Class for Exceptions from our functions
 */
class FunctionException extends Exception {

}

?>