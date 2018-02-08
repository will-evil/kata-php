<?php

/**
 * @param string $word
 *
 * @return string
 */
function duplicate_encode(string $word): string
{
    return implode(array_map(function ($el) use ($word) {
        return preg_match_all('/' . preg_quote($el) . '/i', $word) > 1 ? ')' : '(';
    }, str_split( $word)));
}

$word = 'recede';
$word2 = 'iiiiii';
$word3 = ' ( ( )';

echo duplicate_encode($word), "\n";
