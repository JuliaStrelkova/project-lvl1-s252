<?php

namespace  BrainGames\Cli;

use function BrainGames\Games\BrainCalculator\calculatorGame;
use function BrainGames\Games\BrainEven\checkParity;
use function BrainGames\Games\BrainGames\greeting;
use function cli\line;
use function cli\prompt;

function showWelcomeMessage()
{
    line('Welcome to the Brain Game!');
}

function askUserName()
{
    return prompt('May I have your name?');
}

function run($gameName)
{
    showWelcomeMessage();

    if ($gameName === 'brain-calc') {
        return calculatorGame(DEFAULT_ATTEMPTS_VALUE);
    }
    if ($gameName === 'brain-even') {
        return checkParity(DEFAULT_ATTEMPTS_VALUE);
    }
    if ($gameName=== 'brain-games') {
        return greeting();
    }
}

const DEFAULT_ATTEMPTS_VALUE = 3;
