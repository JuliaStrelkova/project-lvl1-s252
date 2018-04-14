<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $generateGames = function () {
        $question = random_int(MIN_VALUE, MAX_VALUE);
        $generateAnswer = isEven($question);

        return [$question, $generateAnswer];
    };

    run($generateGames, 'Answer "yes" if number even otherwise answer "no".');
}

function isEven($randomNumber): string
{
    $answer = 'no';
    if ($randomNumber % 2 === 0) {
        $answer = 'yes';
    }

    return $answer;
}
