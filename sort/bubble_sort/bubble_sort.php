<?php

require_once('../../common/functions.php');

// Prepare test array
$a = array(4, 10, 21, 5, 12, 43, 0, -4, 12, 5, 6, 1, 3, 27, 11, 15);

// Print array before sorting
before_sort($a);

// Sort array
$a = bubble_sort($a);

// Print array after sorting
after_sort($a);

measure_exec_time('bubble_sort', 1000);
measure_exec_time('bubble_sort', 5000);
measure_exec_time('bubble_sort', 10000);  


/*
 * Array sorting function
 * Use bubble algorythm for sorting
 *
 * @param array $a Array for sorting
 * @return array $a Sorting array
 */
function bubble_sort(array $a)
{
	for($i = 0; $i < count($a); $i++) {
		for($j = count($a) - 1; $j > $i; $j--) {
			if($a[$j] < $a[$j - 1]) {
				$x = $a[$j];
				$a[$j] = $a[$j - 1];
				$a[$j - 1] = $x;
			}
		}
	}
	return $a;
}

?>