<?php

namespace Php\Advanced\formats;

use Php\Advanced\IFormat;

class RawFormat implements IFormat
{
    public function format(string $string): string
    {
        return $string;
    }
}
