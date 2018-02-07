<?php

/**
 * @param int $num
 *
 * @return string
 */
function dashatize(int $num): string
{
    $resStr = '';

    $str = (string) $num;
    for ($i = 0; $i < strlen($str); ++$i) {
        $resStr .= $str[$i] % 2 === 0 ? $str[$i] : '-' . $str[$i] . '-';
    }

    return trim(str_replace('--', '-', $resStr), '-');
}

$num = 6815;

echo sprintf('%d -> %s %s', $num, dashatize($num), "\n");