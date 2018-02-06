<?php

/**
 * @param array $array
 *
 * @return array
 */
function snail(array $array): array
{
    $sortArr = [];

    $i = 0;
    $j = -1;
    $colSteps = $count = count($array);
    $rowSteps = $count - 1;
    $elNum = pow($count, 2);
    $vectors = [
        ['ref' => &$j, 'step' => 1, 'limit' => &$colSteps],
        ['ref' => &$i, 'step' => 1, 'limit' => &$rowSteps],
        ['ref' => &$j, 'step' => -1, 'limit' => &$colSteps],
        ['ref' => &$i, 'step' => -1, 'limit' => &$rowSteps],
    ];

    while ($elNum) {
        $vector = array_shift($vectors);
        array_push($vectors, $vector);
        $vector['ref'] += $vector['step'];
        for ($l = 0; $l < $vector['limit']; ++$l) {
            $sortArr[] = $array[$i][$j];
            ($l + 1) !== $vector['limit'] ? $vector['ref'] += $vector['step'] : null;
            --$elNum;
        }
        --$vector['limit'];
    }

    return $sortArr;
}

$array = [
    [1, 2, 3, 11],
    [4, 5, 6, 12],
    [7, 8, 9, 13],
    [7, 8, 9, 14],
];

print_r(snail($array));