<?php

namespace BrainGames\Games\BrainCalculator;

use function BrainGames\Cli\askUserName;
use function cli\line;
use function cli\prompt;

const MIN_VALUE = -100;
const MAX_VALUE = 100;

function calculatorGame($attempts)
{
    line('What is the result of the expression?');
    $name = askUserName();
    line('Hello, %s!', $name);

    for ($i = 1; $i <= $attempts; $i++) {
        $randomOne = random_int(MIN_VALUE, MAX_VALUE);
        $randomTwo = random_int(MIN_VALUE, MAX_VALUE);
        $randomSign = getRandomSign();

        $answerCalc = calculate($randomOne, $randomTwo, $randomSign);
        $answerUser = askAnswer($randomOne, $randomTwo, $randomSign);

        if ($answerCalc == $answerUser) {
            line('Correct!');
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'. Let's try again, %s!",
                $answerUser,
                $answerCalc,
                $name
            );

            return;
        }
    }
    line('Congratulations, %s!', $name);
}


function calculate($numberOne, $numberTwo, $sign)
{
    switch ($sign) {
        case '*':
            $answer = $numberOne * $numberTwo;
            break;
        case '+':
            $answer = $numberOne + $numberTwo;
            break;
        case '-':
            $answer = $numberOne - $numberTwo;
            break;
    }

    return $answer;
}

function askAnswer($numberOne, $numberTwo, $sign)
{
    line("Question: $numberOne $sign $numberTwo");

    return prompt('Your answer', 0);
}

function getRandomSign()
{
    $arithmeticSigns = ['*', '+', '-'];
    $randKey = array_rand($arithmeticSigns, 1);

    return $arithmeticSigns[$randKey];
}
