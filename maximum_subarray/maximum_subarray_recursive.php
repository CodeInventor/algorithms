<?php

require_once('../common/functions.php');

define('PHP_INT_MIN', ~PHP_INT_MAX);

// Prepare test array
$a = array(13, -3, -25, 20, -3, -16, -23, 18, 20, -7, 12, -5, -22, 15, -4, 7);
// Print array before sorting
array_before($a);

// Sort array
$a = maximum_subarray($a);

//Print array after sorting
array_after($a);

measure_exec_time_rand('maximum_subarray', 5000);
measure_exec_time_rand('maximum_subarray', 10000);
measure_exec_time_rand('maximum_subarray', 15000);


/**
 * 
 * 
 *
 * @param array $a Array for sorting
 * @return array $new_arr Sorting array
 */
function maximum_subarray(array $a, $low = 0, $high = NULL)
{
    if (count($a) == 0) {
        throw new Exception("Array is empty", 1);
    }

    if ($high === NULL) {
        $high = count($a) - 1;
    }

    if ($low == $high) {
        return array(
            'low'   => $low,
            'high'  => $high,
            'sum'   => $a[$low]);
    }

    $mid = intval(($low + $high) / 2);
    
    $left_arr = maximum_subarray($a, $low, $mid);
    $righ_arr = maximum_subarray($a, $mid + 1, $high);

    $cross_arr = max_crossing_subarray($a, $low, $mid, $high);

    if ($left_arr['sum'] >= $righ_arr['sum'] && 
        $left_arr['sum'] >= $cross_arr['sum']) {
        return array(
            'low'   => $left_arr['low'],
            'high'  => $left_arr['high'],
            'sum'   => $left_arr['sum']);
    } 
    elseif ($righ_arr['sum'] >= $left_arr['sum'] &&
            $righ_arr['sum'] >= $cross_arr['sum']) {
        return array(
            'low'   => $righ_arr['low'],
            'high'  => $righ_arr['high'],
            'sum'   => $righ_arr['sum']);  
    }
    else {
        return array(
            'low'   => $cross_arr['low'],
            'high'  => $cross_arr['high'],
            'sum'   => $cross_arr['sum']);  
    }
}

function max_crossing_subarray(array $a, $low, $mid, $high) {
    
    $left_sum = PHP_INT_MIN;
    $sum = 0;

    for ($i = $mid; $i >=0; $i--) {
        $sum += $a[$i];
        if ($sum > $left_sum) {
            $left_sum = $sum;
            $max_left = $i;
        }
    }

    $rigth_sum = PHP_INT_MIN;
    $sum = 0;

    for ($i = $mid + 1; $i <= $high; $i++) {
        $sum += $a[$i];
        if ($sum > $rigth_sum) {
            $rigth_sum = $sum;
            $max_right = $i;
        }
    }

    return array(
        'low'  => $max_left, 
        'high' => $max_right, 
        'sum'  => $left_sum + $rigth_sum);
}

?>