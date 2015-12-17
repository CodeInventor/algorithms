<?php

/**
  * Sorting array by merge algorithm
  *
  * @package bubble_sort
  * @author Andrey Babaev <rebellious.mind@outlook.com>
  */

require_once('../../common/functions.php');


// Prepare test array
$a = array(4, 10, 21, 5, 12, 43, 0, -4, 12, 5, 6, 1, 3, 27, 11, 15, 9);

// Print array before sorting
before_sort($a);

// Sort array
$a = merge_sort($a);

//Print array after sorting
after_sort($a);

measure_exec_time('merge_sort', 10000);
measure_exec_time('merge_sort', 20000);
measure_exec_time('merge_sort', 30000);


/**
 * Array sorting function
 * Use merge algorythm for sorting
 *
 * @param array $a Array for sorting
 * @return array $new_arr Sorting array
 */
function merge_sort(array $a)
{
    if (count($a) <= 1) {
        return $a;
    }

    $arr1 = array_slice($a, 0, count($a) / 2);
    $arr2 = array_slice($a, count($a) / 2);

    $arr1 = merge_sort($arr1);
    $arr2 = merge_sort($arr2);

    do {
        if($arr1[0] < $arr2[0]) {
            $new_arr[] = array_shift($arr1);
        }
        else {
            $new_arr[] = array_shift($arr2);  
        }

        if(count($arr1) == 0) {
            $new_arr = array_merge($new_arr, $arr2);
        }

        if(count($arr2) == 0) {
            $new_arr = array_merge($new_arr, $arr1);
        }
    } while(count($arr1) && count($arr2));
    
    return $new_arr;
}

?>