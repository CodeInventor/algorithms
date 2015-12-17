<?php

require_once('../../common/functions.php');

// Prepare test array
$a = array(4, 10, 21, 5, 12, 43, 0, -4, 12, 5, 6, 1, 3, 27, 11, 15);

// Print array before sorting
before_sort($a);

// Sort array
$a = insertion_sort($a);

// Print array after sorting
after_sort($a);

measure_exec_time('insertion_sort', 10000);
measure_exec_time('insertion_sort', 20000);
//measure_exec_time('insertion_sort', 30000);  // too long for wait

/*
 * Array sorting function
 * Use insertion algorythm for sorting
 *
 * @param array $a Array for sorting
 * @return array $a Sorting array
 */
function insertion_sort(array $a)
{
    $arr_length = count($a);
    for ($j = 1; $j < $arr_length; $j++) {
        $key = $a[$j];
        $i = $j - 1;
	while ($i >= 0 && $a[$i] > $key) {
	    $a[$i + 1] = $a[$i];
	    $i--;
	}
	$a[$i + 1] = $key;
    }
    return $a;
}

?>