<?php

namespace Php\Advanced\factories\Sony;

class LCD extends AbstractTV
{
    protected function getType(): string
    {
        return 'LCD';
    }
}
