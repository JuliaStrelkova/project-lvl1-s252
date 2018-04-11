<?php

namespace BrainGames\Games;

use function BrainGames\Cli\ask;
use const BrainGames\GamesConfigurations\MAX_VALUE;
use const BrainGames\GamesConfigurations\MIN_VALUE;

function brainGcd()
{
    $randomOne = random_int(MIN_VALUE, MAX_VALUE);
    $randomTwo = random_int(MIN_VALUE, MAX_VALUE);

    $greatestCommonDivisor = findGreatestCommonDivisor($randomOne, $randomTwo);
    $answerUser = ask("$randomOne $randomTwo");

    return ['correct_answer' => $greatestCommonDivisor, 'user_answer' => $answerUser];
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
