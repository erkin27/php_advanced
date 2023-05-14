<?php

namespace Php\Advanced\formats;

use Php\Advanced\IFormat;

class DateDetailsFormat implements IFormat
{
    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}