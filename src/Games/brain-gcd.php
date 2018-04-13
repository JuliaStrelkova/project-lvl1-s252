<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $generateQuestion = function () {
        $randomOne = random_int(MIN_VALUE, MAX_VALUE);
        $randomTwo = random_int(MIN_VALUE, MAX_VALUE);

        return "$randomOne $randomTwo";
    };
    $generateAnswer = function (string $question) {
        list($firstNumber, $secondNumber) = explode(' ', $question);

        return findGreatestCommonDivisor((int)$firstNumber, (int)$secondNumber);
    };
    run($generateQuestion, $generateAnswer, 'Find the greatest common divisor of given numbers.');
}

function findGreatestCommonDivisor(int $numberOne, int $numberTwo)
{
    while ($numberOne !== $numberTwo) {
        if ($numberOne > $numberTwo) {
            $numberOne -= $numberTwo;
        } else {
            $numberTwo -= $numberOne;
        }
    }

    return $numberOne;
}
