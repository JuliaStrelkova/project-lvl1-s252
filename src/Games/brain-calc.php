<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Cli\run;

const MIN_VALUE = 0;
const MAX_VALUE = 100;
const DEFAULT_ATTEMPTS_VALUE = 3;

function play()
{
    $gamesParams = [];
    for ($i = 1; $i <= DEFAULT_ATTEMPTS_VALUE; ++$i) {
        $randomOne = random_int(MIN_VALUE, MAX_VALUE);
        $randomTwo = random_int(MIN_VALUE, MAX_VALUE);
        $randomSign = getRandomSign();

        $answer = calculate($randomOne, $randomTwo, $randomSign);
        $question = "$randomOne $randomSign $randomTwo";

        $gamesParams[] = [$question, $answer];
    }

    run($gamesParams, 'What is the result of the expression?');
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
