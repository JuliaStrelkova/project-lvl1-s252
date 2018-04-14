<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\run;

const MIN_VALUE = 1;
const MAX_VALUE = 100;
const MIN_STEP = 1;
const MAX_STEP = 9;
const PROGRESSION_LENGTH = 10;
const MISSING_NUMBER_POSITION = 5;

function play()
{
    $generateGame = function () {
        $randomNumber = random_int(MIN_VALUE, MAX_VALUE);
        $randomStep = random_int(MIN_STEP, MAX_STEP);

        $progression = generateProgression($randomNumber, $randomStep);
        $rightAnswer = $progression[MISSING_NUMBER_POSITION];
        $question = generateQuestion($progression);

        return [$question, $rightAnswer];
    };
    run($generateGame, 'What number is missing in this progression?');
}

function generateQuestion($progression)
{
    $progression[MISSING_NUMBER_POSITION] = '..';

    return implode(' ', $progression);
}

function generateProgression($randomNumber, $randomStep)
{
    $numberProgression = $randomNumber;
    $progression = [$numberProgression];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $numberProgression += $randomStep;
        $progression[] = $numberProgression;
    }

    return $progression;
}
