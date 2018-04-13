<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\run;

const  DEFAULT_ATTEMPTS_VALUE = 3;
const MIN_VALUE = 0;
const MAX_VALUE = 100;



function play()
{
    for ($i = 1; $i <= DEFAULT_ATTEMPTS_VALUE; $i++) {
        $randomOne = random_int(MIN_VALUE, MAX_VALUE);
        $randomTwo = random_int(MIN_VALUE, MAX_VALUE);

        $answer = findGreatestCommonDivisor($randomOne, $randomTwo);
        $question = "$randomOne $randomTwo";

        $gamesParams[] = [$question, $answer];
    }
    run($gamesParams, 'Find the greatest common divisor of given numbers.');
}

function findGreatestCommonDivisor($numberOne, $numberTwo)
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
