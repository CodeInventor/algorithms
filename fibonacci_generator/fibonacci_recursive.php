<?php 
/**
 * Generate a Fibonacci number by sequence index.
 * @package fibonacci_generator
 * @author Andrey Babaev <rebellious.mind@outlook.com>
 * PHP 7.0.0+
 */

for ($i = 0; $i < 20; $i++) {
	echo "Input: $i, Output:", getFibonacciRecursive($i), "\n";
}

/**
 * Generate a Fibonacci number by sequence index.
 * It is the most common algorithm for this task. Using a recursion for calculation.
 * However, it will work too slow and use too much CPU and memory, if a sequence index is too big.
 * The recursive algorithm will start to return an approximate results only after 92 index of sequence on x64 platform.
 * But, I think, you can't wait the result.
 * PHP 7.0.0+
 * @author Andrey Babaev <rebellious.mind@outlook.com>
 * @param int $i Index of Fibonacci sequence
 * @return int Fibonacci number
 */
function getFibonacciRecursive(int $i): int {
	if ($i < 0) {
		throw new Exception("The index must be more than zero. You given: $i");
	}

	if($i < 2) {
		$result = $i;
	}
	else {
		$result = (getFibonacciRecursive($i - 1) + getFibonacciRecursive($i - 2));
	}

	if ($result > PHP_INT_MAX) {
   		throw new Exception("Out of range");
	}
	return $result;
}

?>