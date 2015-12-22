<?php 
/**
 * Generate a Fibonacci number by sequence index.
 * @package fibonacci_generator
 * @author Andrey Babaev <rebellious.mind@outlook.com>
 * PHP 7.0.0+
 */

for ($i = 0; $i < 71; $i++) {
	echo "Input: $i, Output:", getFibonacciLinear($i), "\n";
}

/**
 * Generate a Fibonacci number by sequence index.
 * Another algorithm, wich can generate the Fibonacci sequence with better performance.
 * Disadvantage - on the x64 platform after 70th index will return an approximate results (on x86 platform after a smaller index).
 * PHP 7.0.0+
 * @author Andrey Babaev <rebellious.mind@outlook.com>
 * @param int $i Index of Fibonacci sequence
 * @return int Fibonacci number
 */
function getFibonacciLinear(int $i):int {
	if ($i < 0) {
		throw new Exception("The index must be more than zero. You given: $i");
	}

	if ($i > 70) {
		throw new Exception("Out of range. The index must be between 0 and 70. You given: $i");
	}

	if(PHP_INT_SIZE != 8) {
		throw new Exception("The function is designed for 64-bit PHP version. For another platform you must recalculate a maximum value for input parameter");
	}

	return (int) round(pow((sqrt(5) + 1) / 2, $i) / sqrt(5));
}

?>