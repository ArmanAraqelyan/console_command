<?php

declare(strict_types=1);

function typify_string_array(array $array): array
{
    foreach ($array as &$element) {
        $element = get_element_correct_type($element);
    }
    return $array;
}

function get_element_correct_type(string $string)
{
    $string = trim($string);
    if (empty($string)) return "";
    if (!preg_match("/[^0-9.]+/", $string)) {
        return (preg_match("/[.]+/",$string)) ? (double) $string : (int) $string;
    }
    if ($string == "true") return true;
    if ($string == "false") return false;
    return (string) $string;
}