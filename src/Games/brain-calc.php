<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $generateGame = function () {
        $randomOne = random_int(MIN_VALUE, MAX_VALUE);
        $randomTwo = random_int(MIN_VALUE, MAX_VALUE);
        $randomSign = getRandomSign();

        $question = "$randomOne $randomSign $randomTwo";

        list($firstNumber, $randomSign, $secondNumber) = explode(' ', $question);

        $rightAnswer = calculate((int)$firstNumber, (int)$secondNumber, $randomSign);

        return [$question, $rightAnswer];
    };
    run($generateGame, 'What is the result of the expression.');
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

function getRandomSign()
{
    $arithmeticSigns = ['*', '+', '-'];
    $randKey = array_rand($arithmeticSigns, 1);

    return $arithmeticSigns[$randKey];
}
