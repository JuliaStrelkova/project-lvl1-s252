<?php

namespace  BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use const BrainGames\GamesConfigurations\DEFAULT_ATTEMPTS_VALUE;

function run($gameName = '', $description = '')
{
    showWelcomeMessage();
    if ($description) {
        line($description);
    }
    $name = askUserName();
    line('Hello, %s!', $name);

    if ($gameName === '') {
        return;
    }

    for ($i = 1; $i <= DEFAULT_ATTEMPTS_VALUE; $i++) {
        $results = call_user_func("\BrainGames\Games\\$gameName");

        if ($results['user_answer'] != $results['correct_answer']) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'. Let's try again, %s!",
                $results['user_answer'],
                $results['correct_answer'],
                $name
            );

            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}

function showWelcomeMessage()
{
    line('Welcome to the Brain Game!');
}

function askUserName()
{
    return prompt('May I have your name?', '', ' ');
}

function ask($question)
{
    line("Question: $question");

    return prompt('Your answer', 0);
}
