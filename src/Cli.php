<?php

namespace  BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const DEFAULT_ATTEMPTS_VALUE = 3;

function run(callable $generateQuestion = null, callable $generateAnswer = null, string $description = '')
{
    showWelcomeMessage($description);
    $name = askUserName();
    if (!$generateQuestion || !$generateAnswer) {
        return;
    }

    for ($i = 1; $i <= DEFAULT_ATTEMPTS_VALUE; ++$i) {
        $question = $generateQuestion();
        $userAnswer = ask($question);
        $rightAnswer = (string)$generateAnswer($question);
        if ($userAnswer !== $rightAnswer) {
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
