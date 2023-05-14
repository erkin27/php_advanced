<?php

namespace Php\Advanced\deliveries;

use Php\Advanced\IDelivery;

class ConsoleDelivery implements IDelivery
{
    public function deliver(string $format): void
    {
        echo "Output format ({$format}) to CONSOLE";
    }
}