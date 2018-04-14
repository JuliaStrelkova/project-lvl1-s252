<?php

namespace BrainGames\Games\Balance;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $generateGame = function () {
        $question = random_int(MIN_VALUE, MAX_VALUE);
        $rightAnswer = balance($question);

        return [$question, $rightAnswer];
    };

    run($generateGame, 'Balance the given number.');
}

function balance(int $number)
{
    $numbers = str_split((string)$number);
    $len = count($numbers);

    sort($numbers);

    $min = (int)$numbers[0];
    $max = (int)$numbers[$len - 1];

    if ($min === $max - 1 || $min === $max) {
        return (int)implode($numbers);
    }

    $numbers[0]++;
    $numbers[$len - 1]--;
    $number = (int)implode($numbers);

    return balance($number);
}
