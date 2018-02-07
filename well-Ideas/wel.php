<?php

/**
 * @param $arr
 *
 * @return string
 */
function well($arr): string
{
    $arr = array_map(function ($el) { return implode('-', $el); }, $arr);
    $num = preg_match_all('/good/i', implode('-', $arr));

    return $num ? ($num > 2 ? 'I smell a series!' : 'Publish!') : 'Fail!';
}

$arr = [['bad', 'bAd', 'bad'], ['bad', 'bAd', 'bad'], ['bad', 'bAd', 'bad']]; // Fail!
$arr2 = [['gOOd', 'bad', 'BAD', 'bad', 'bad'], ['bad', 'bAd', 'bad'], ['GOOD', 'bad', 'bad', 'bAd']]; // Publish!
$arr3 = [['gOOd', 'bAd', 'BAD', 'bad', 'bad', 'GOOD'], ['bad'], ['gOOd', 'BAD']]; // I smell a series!

echo well($arr3), "\n";