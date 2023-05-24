<?php

namespace Php\Advanced\factories;

abstract class AbstractTVFactory
{
    abstract public function createLED(): TV;
    abstract public function createLCD(): TV;
}