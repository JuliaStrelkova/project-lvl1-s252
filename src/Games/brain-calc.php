<?php

namespace BrainGames\Games;

use function BrainGames\Cli\ask;
use const BrainGames\GamesConfigurations\MAX_VALUE;
use const BrainGames\GamesConfigurations\MIN_VALUE;

function brainCalc()
{
    $randomOne = random_int(MIN_VALUE, MAX_VALUE);
    $randomTwo = random_int(MIN_VALUE, MAX_VALUE);
    $randomSign = getRandomSign();

    $answerCalc = calculate($randomOne, $randomTwo, $randomSign);
    $answerUser = ask("$randomOne $randomSign $randomTwo");

    return ['correct_answer' => $answerCalc, 'user_answer' => $answerUser];
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
