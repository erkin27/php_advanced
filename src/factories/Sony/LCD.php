<?php

namespace Php\Advanced\factories\Sony;

use Php\Advanced\factories\TV;

class LCD extends AbstractTV
{
    protected function getType(): string
    {
        return 'LCD';
    }
}