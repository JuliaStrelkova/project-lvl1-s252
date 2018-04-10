<?php

namespace  BrainGames\Cli;

use function BrainGames\BrainEven\checkParity;
use function cli\line;
use function cli\prompt;

function run($string)
{
    line('Welcome to the Brain Game!');

    if ($string === 'brain-games') {
        $name = askUserName();
        line('Hello, %s!', $name);

        return;
    }

    if ($string === 'brain-even') {
        line('Answer "yes" if number even otherwise answer "no".');
        checkParity(3);

        return;
    }
}

function askUserName()
{
    return prompt('May I have your name?');
}
