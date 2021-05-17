<?php

print_r(increment([1, 9, 9, 9, 9]));

function increment(array $number): array
{
    for ($i = count($number) - 1; $i >= 0; --$i) {
        if (9 === $number[$i]) {
            $number[$i] = 0;
            (0 === $i) ?? array_unshift($number, 1);
        } else {
            ++$number[$i];
        }
    }

    return $number;
}
