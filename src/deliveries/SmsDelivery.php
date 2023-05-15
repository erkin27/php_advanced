<?php

namespace Php\Advanced\deliveries;

use Php\Advanced\IDelivery;

class SmsDelivery implements IDelivery
{
    public function deliver(string $format): void
    {
        echo "Output format ({$format}) by SMS";
    }
}
