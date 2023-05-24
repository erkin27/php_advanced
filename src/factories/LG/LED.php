<?php

namespace Php\Advanced\factories\LG;


class LED extends AbstractTV
{
    protected function getType(): string
    {
        return 'LED';
    }
}