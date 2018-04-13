<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;

function play()
{
    $generateQuestion = function () {
        $randomOne = random_int(MIN_VALUE, MAX_VALUE);
        $randomTwo = random_int(MIN_VALUE, MAX_VALUE);
        $randomSign = getRandomSign();

        return "$randomOne $randomSign $randomTwo";
    };
    $generateAnswer = function (string $question) {
        list($firstNumber, $randomSign, $secondNumber) = explode(' ', $question);

        return calculate((int)$firstNumber, (int)$secondNumber, $randomSign);
    };
    run($generateQuestion, $generateAnswer, 'What is the result of the expression.');
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
