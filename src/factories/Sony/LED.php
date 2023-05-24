<?php

namespace Php\Advanced\factories\Sony;


class LED extends AbstractTV
{
    protected function getType(): string
    {
        return 'LED';
    }
}