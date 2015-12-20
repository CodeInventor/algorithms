<?php
/**
  * Searching maximum subarray inside given array behind linear time
  *
  * @package maximum_subarray
  * @author Andrey Babaev <rebellious.mind@outlook.com>
  */

require_once('../common/functions.php');

ini_set("memory_limit","512M");

// Prepare test array
$a = array(13, -3, -25, 20, -3, -16, -23, 0, 0, 0, 18, 20, -7, 12, -5, -22, 15, -4, 7);
// Print array before sorting
array_before($a);

// Sort array
$a = maximum_subarray($a);

//Print array after sorting
array_after($a);

measure_exec_time_rand('maximum_subarray', 500000);
measure_exec_time_rand('maximum_subarray', 1000000);
measure_exec_time_rand('maximum_subarray', 1500000);


/**
 * Searching maximum subarray inside given array behind linear time
 * 
 * @param array $a Array for sorting
 * @return array $new_arr left index, right index, maximal sum of element
 */
function maximum_subarray(array $a)
{
    $max_end = 0;
    $max_far = 0;
    $x = 0;
    $y = 0;

    for ($i = 0; $i < count($a); $i++) {
        if ($max_end + $a[$i] > 0) {
            $max_end += $a[$i];
        }
        else {
            $max_end = 0;
            $x = $i + 1;
        }

        if($max_far < $max_end) {
            $max_far = $max_end;
            $y = $i;
        }
    }
    if ($x > $y) {
        $x = $y;
    }
    return array($x, $y , $max_far);
}

?>