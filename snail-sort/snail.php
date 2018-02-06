<?php

/**
 * @param array $array
 *
 * @return array
 */
function snail(array $array): array
{
    $sortArr = [];

    if ($colSteps = reset($array) ? count(reset($array)) : 0) {
        $i = 0;
        $j = -1;
        $count = count($array);
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
                ($l + 1) < $vector['limit'] && $vector['ref'] += $vector['step'];
                --$elNum;
            }
            --$vector['limit'];
        }
    } else {
        $sortArr = array_filter($array, function ($val) {
            return ! (is_array($val) && empty($val));
        });
    }

    return $sortArr;
}

$array = [
    [1, 2, 3, 1],
    [4, 5, 6, 4],
    [7, 8, 9, 7],
    [7, 8, 9, 7]
];

$array2 = [[]];

print_r(snail($array));
