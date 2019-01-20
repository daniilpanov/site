<?php
function arrayToStr($array)
{
    $str = "";

    foreach ($array as $item)
    {
        $str .= "{$item}, ";
    }

    $str = substr($str, 0, -2);

    return $str;
}