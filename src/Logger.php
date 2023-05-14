<?php

namespace Php\Advanced;

class Logger
{
    private IFormat $format;
    private IDelivery $delivery;

    public function __construct(IFormat $format, IDelivery $delivery)
    {
        $this->format = $format;
        $this->delivery = $delivery;
    }

    public function log(string $str): void
    {
        $this->delivery->deliver($this->format->format($str));
    }
}