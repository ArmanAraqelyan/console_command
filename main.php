<?php

declare(strict_types=1);

require_once 'typifier.php';

$main_array = ['vasya', 'pupkin', 'apple', 23, 41, 55, 1, 2];

function init(array $args, array $main_array): void
{
    unset($args[0]);
    $incoming_array = typify_string_array(array_values($args));
    $result = run_command($incoming_array, $main_array);
    show_result($result);
}

function run_command(array $incoming_array, array $main_array)
{
    $command = $incoming_array[count($incoming_array) - 1];
    unset($incoming_array[count($incoming_array) - 1]);

    switch ($command) {
        case '--f':
            $result = filter_array($main_array, true);
            break;
        case '--e':
            $result = check_exists($incoming_array, true);
            break;
        case '--m':
            $result = array_merge($incoming_array, $main_array);
            break;
        case '--d':
            $result = diff_array($incoming_array, $main_array);
            break;
        case '--i':
            $result = intersect_array($incoming_array, $main_array);
            break;
        case '--u':
            $result = uppercase_array_elements($main_array);
            break;
        case '--n':
            $result = get_numeric_elements($incoming_array);
            break;
        case '--s':
            $result = sort_array_by_numbers($main_array);
            break;
        default:
            $result = "Command not supported: Available commands:
                --f  # make sure if main array does not contains true       
                --e  # check if incoming array contains true
                --m  # merge arrays         
                --d  # get difference of arrays
                --i  # get equal elements of arrays
                --u  # to uppercase main array string elements
                --n  # get numeric elements of incoming array      
                --s  # sort main array by numeric elements";
    }
    return $result;
}

function filter_array(array $array, bool $check): array
{
    return array_filter($array, function($item) use ($check) {
        return $check !== $item;
    });
}

function check_exists(array $array, bool $exists): bool
{
    return in_array($exists, $array, true);
}

function diff_array(array $array1, array $array2): array
{
    $result = [];
    foreach ($array1 as $item) {
        if (!in_array($item, $array2, true)) {
            $result[] = $item;
        }
    }
    return $result;
}

function intersect_array(array $array1, array $array2): array
{
    $result = [];
    foreach ($array1 as $item) {
        if (in_array($item, $array2, true)) {
            $result[] = $item;
        }
    }
    return $result;
}

function uppercase_array_elements(array $array): array
{
    return array_map(function ($item) {
        if (is_string($item)) {
            return strtoupper($item);
        }
        return $item;
    }, $array);
}

function get_numeric_elements(array $array): array
{
    $numeric_array = [];
    foreach ($array as $item) {
        if (is_numeric($item)) {
            $numeric_array[] = $item;
        }
    }
    return $numeric_array;
}

function sort_array_by_numbers($array): array
{
    for ($i = 0; $i < count($array); $i++) {
        for ($j = $i + 1; $j < count($array); $j++) {
            if (!is_numeric($array[$i])) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}

function show_result($result): void
{
    var_export($result);
}

init($argv, $main_array);