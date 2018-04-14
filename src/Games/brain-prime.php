<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $generateGame = function () {
        $randomNumber = random_int(MIN_VALUE, MAX_VALUE);

        $question = $randomNumber;
        $rightAnswer = isPrime($randomNumber) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };
    run($generateGame, 'Answer "yes" if number prime otherwise answer "no".');
}

function isPrime($number)
{
    if ($number === 0 || $number === 1) {
        return false;
    }
    $sgrt = sqrt($number);
    for ($i = 2; $i < $sgrt; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
