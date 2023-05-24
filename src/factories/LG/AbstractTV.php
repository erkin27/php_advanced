<?php

namespace Php\Advanced\factories\LG;

use Php\Advanced\factories\TV;

abstract class AbstractTV implements TV
{
    private ?string $name = null;

    abstract protected function getType(): string;

    protected function getTVName(): string
    {
        return $this->name ?? $this->name = $this->getType() . ' TV. [LG]. SERIAL NUMBER: ' . mt_rand();
    }

    public function turnOn(): void
    {
        print "TURN ON " . $this->getTVName();
    }

    public function turnOff(): void
    {
        print "TURN OFF " . $this->getTVName();
    }

    public function volumeUp(): void
    {
        print "VOLUME ++ " . $this->getTVName();
    }

    public function volumeDown(): void
    {
        print "VOLUME -- " . $this->getTVName();
    }
}