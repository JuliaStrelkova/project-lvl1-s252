<?php

namespace BrainGames\Games;

use function BrainGames\Cli\ask;
use const BrainGames\GamesConfigurations\MAX_VALUE;
use const BrainGames\GamesConfigurations\MIN_VALUE;

function brainEven()
{
    $randomNumber = random_int(MIN_VALUE, MAX_VALUE);
    $answer = 'no';
    if ($randomNumber % 2 === 0) {
        $answer = 'yes';
    }

    $answerUser = ask("$randomNumber");

    return ['user_answer' => $answerUser, 'correct_answer' => $answer];
}
