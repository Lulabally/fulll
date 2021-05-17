<?php

for ($i = 1; $i < 100; ++$i) {
    echo nl2br(fizzBuzz($i)."\n");
}

function fizzBuzz(int $i): string
{
    $fizzBuzz = '';

    $fizzBuzz .= (0 == $i % 3) ? 'Fizz' : '';
    $fizzBuzz .= (0 == $i % 5) ? 'Buzz' : '';

    return !empty($fizzBuzz) ? $fizzBuzz : (string) $i;
}
