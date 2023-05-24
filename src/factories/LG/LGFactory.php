<?php

namespace Php\Advanced\factories\LG;

use Php\Advanced\factories\AbstractTVFactory;
use Php\Advanced\factories\TV;

class LGFactory extends AbstractTVFactory
{
    public function createLED(): TV
    {
        return new LED();
    }

    public function createLCD(): TV
    {
        return new LCD();
    }
}
