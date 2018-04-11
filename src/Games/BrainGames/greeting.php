<?php

namespace BrainGames\Games\BrainGames;

use function BrainGames\Cli\askUserName;
use function cli\line;

function greeting()
{
    $name = askUserName();
    line('Hello, %s!', $name);
}
