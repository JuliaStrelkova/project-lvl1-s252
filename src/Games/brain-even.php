<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $generateQuestion = function () {
        return random_int(MIN_VALUE, MAX_VALUE);
    };
    $generateAnswer = function (string $question) {
        return isEven((int)$question);
    };

    run($generateQuestion, $generateAnswer, 'Answer "yes" if number even otherwise answer "no".');
}

function isEven($randomNumber): string
{
    $answer = 'no';
    if ($randomNumber % 2 === 0) {
        $answer = 'yes';
    }

    return $answer;
}
