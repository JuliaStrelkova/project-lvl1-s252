<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Cli\askUserName;
use function cli\line;
use function cli\prompt;

function checkParity($attempts)
{
    line('Answer "yes" if number even otherwise answer "no".');
    $name = askUserName();
    for ($i = 1; $i <= $attempts; $i++) {
        $randomNumber = random_int(PHP_INT_MIN, PHP_INT_MAX);

        line("Question: $randomNumber");
        $userAnswer = prompt('Your answer');

        if (!isAnswerCorrect($randomNumber, $userAnswer)) {
            $oppositeAnswer = ['yes' => 'no', 'no' => 'yes'];

            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'. Let's try again, %s!",
                $userAnswer,
                $oppositeAnswer[$userAnswer],
                $name
            );

            return;
        }

        line('Correct!');
    }
    line("Congratulations, $name!");
}

function isAnswerCorrect($randomNumber, $userAnswer)
{
    $answer = 'no';
    if ($randomNumber % 2 === 0) {
        $answer = 'yes';
    }

    return $userAnswer === $answer;
}
