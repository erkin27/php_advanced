<?php

namespace Php\Advanced\deliveries;

use Php\Advanced\IDelivery;

class EmailDelivery implements IDelivery
{
    public function deliver(string $format): void
    {
        echo "Output format ({$format}) by EMAIL.";
    }
}
