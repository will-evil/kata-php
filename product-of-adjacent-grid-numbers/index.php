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
 * @param int $startRow
 * @param int $startCol
 * @param bool $main
 *
 * @return array
 */
function getDiagonal(array $grid, int $startRow, int $startCol, bool $main = true): array
{
    $arr = [];
    list($stop, $step) = $main ? [count($grid) - $startRow, 1] : [0 + $startRow, -1];
    while (($startCol < $stop && $main) || $startCol >= $stop && ! $main) {
        $arr[] = $grid[$startRow][$startCol];
        $startCol += $step;
        ++$startRow;
    }

    return $arr;
}

/**
 * @param array $grid
 * @param int $lengthSeq
 *
 * @return int
 */
function getLargestProduct(array $grid, int $lengthSeq = 4): int
{
    $arr = [];

    foreach ($grid as $col => $row) {
        $arr[] = calculate($row, $lengthSeq);
        $arr[] = calculate(array_column($grid, $col), $lengthSeq);
    }

    $count = count($grid);
    $rowsNumbers = $colsLeft = range(0, $count - $lengthSeq);
    $cols = array_merge($colsLeft, range($lengthSeq - 1, $count - 1));
    foreach ($cols as $col) {
        $rows = $col === 0 || $col === $count - 1 ? $rowsNumbers : [0];
        foreach ($rows as $row) {
            $arr[] = calculate(getDiagonal($grid, $row, $col, ($col < $count / 2)), $lengthSeq);
        }
    }

    rsort($arr);

    return (int) reset($arr);
}

$grid = [
    [1, 1, 1, 1 ,5, 1],
    [1, 1, 1, 5 ,1, 1],
    [9, 1, 5, 9 ,1, 1],
    [1, 9, 7, 1 ,1, 1],
    [1, 1, 9, 1 ,1, 1],
    [1, 1, 1, 9 ,1, 1],
];

echo sprintf('Max product = %s%s', getLargestProduct($grid), "\n");
