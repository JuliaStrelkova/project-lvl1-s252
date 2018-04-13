<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

const  DEFAULT_ATTEMPTS_VALUE = 3;
const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $gamesParams = [];
    for ($i = 1; $i <= DEFAULT_ATTEMPTS_VALUE; $i++) {
        $randomNumber = random_int(MIN_VALUE, MAX_VALUE);

        $answer = isEven($randomNumber);
        $question = $randomNumber;

        $gamesParams[] = [$question, $answer];
    }

    run($gamesParams, 'Answer "yes" if number even otherwise answer "no".');
}

function isEven($randomNumber): string
{
    $answer = 'no';
    if ($randomNumber % 2 === 0) {
        $answer = 'yes';
    }

    return $answer;
}
