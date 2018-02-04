<?php

/**
 * @param array $arr
 * @param int $lengthSeq
 * @param int $index
 *
 * @return int
 */
function calculate(array $arr, int $lengthSeq, int $index = 0): int
{
    $product = 0;
    $maxIndex = count($arr) - $lengthSeq;
    while ($index <= $maxIndex) {
        $newProduct = array_product(array_slice($arr, $index, $lengthSeq));
        $product = $newProduct > $product ? $newProduct : $product;
        ++$index;
    }

    return $product;
}

/**
 * @param array $grid
 * @param int $lengthSeq
 *
 * @return int
 */
function getLargestProduct(array $grid, int $lengthSeq = 4): int
{
    $res = 0;

    foreach ($grid as $key => $row) {
        $newProduct = calculate($row, $lengthSeq);
        $res = $newProduct > $res ? $newProduct : $res;
        $newProduct = calculate(array_column($grid, $key), $lengthSeq);
        $res = $newProduct > $res ? $newProduct : $res;
    }

    return $res;
}

$grid = [
    [4, 4, 4, 4 ,1, 1],
    [5, 1, 1, 1 ,1, 1],
    [5, 1, 1, 1 ,1, 1],
    [5, 1, 1, 1 ,1, 1],
    [5, 1, 1, 1 ,1, 1],
    [1, 1, 1, 1 ,1, 1],
];

echo (string) getLargestProduct($grid);
