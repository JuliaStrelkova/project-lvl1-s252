<?php

namespace  BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run(array $gamesParams = [], string $description = '')
{
    showWelcomeMessage($description);
    $name = askUserName();

    if (count($gamesParams) === 0) {
        return;
    }

    foreach ($gamesParams as list($question, $rightAnswer)) {
        $userAnswer = ask($question);
        if ($userAnswer != $rightAnswer) {
            showWrongAnswer($userAnswer, $rightAnswer, $name);

            return;
        }

        showCorrectAnswer();
    }

    showCongratulation($name);
}

function showCongratulation($name)
{
    line('Congratulations, %s!', $name);
}

function showCorrectAnswer()
{
    line('Correct!');
}

function showWrongAnswer($userAnswer, $rightAnswer, $name)
{
    line(
        "'%s' is wrong answer ;(. Correct answer was '%s'. Let's try again, %s!",
        $userAnswer,
        $rightAnswer,
        $name
    );
}

function showWelcomeMessage(string $description = '')
{
    line('Welcome to the Brain Game!');

    if ($description !== '') {
        line($description);
    }
}

function askUserName()
{
    $name = prompt('May I have your name?', '', ' ');
    line('Hello, %s!', $name);

    return $name;
}

function ask(string $question)
{
    line("Question: $question");

    return prompt('Your answer', 0);
}
