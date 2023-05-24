<?php

namespace Php\Advanced\factories\Sony;

use Php\Advanced\factories\AbstractTVFactory;
use Php\Advanced\factories\TV;

class SonyFactory extends AbstractTVFactory
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