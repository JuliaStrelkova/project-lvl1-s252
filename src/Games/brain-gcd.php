<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $generateGame = function () {
        $randomOne = random_int(MIN_VALUE, MAX_VALUE);
        $randomTwo = random_int(MIN_VALUE, MAX_VALUE);

        $question = "$randomOne $randomTwo";
        $rightAnswer = findGreatestCommonDivisor($randomOne, $randomTwo);

        return [$question, $rightAnswer];
    };
    run($generateGame, 'Find the greatest common divisor of given numbers.');
}

function findGreatestCommonDivisor(int $numberOne, int $numberTwo)
{
    return $numberTwo
        ? findGreatestCommonDivisor($numberTwo, $numberOne % $numberTwo)
        : $numberOne;
}
