<?php

print_r(increment([9, 9, 9, 9]));

function increment(array $number): array
{
    for ($i = count($number) - 1; $i >= 0; --$i) {
        $number[$i] = (9 === $number[$i]) ? 0 : ++$number[$i];
        if (0 != $number[$i]) {
            break;
        }
    }

    (0 === $number[0]) ? array_unshift($number, 1) : '';

    return $number;
}
