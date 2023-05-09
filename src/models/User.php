<?php

namespace Php\Advanced\models;

use Php\Advanced\traits\UserTrait;

class User
{
    use UserTrait;

    public function getName(): string
    {
        return $this->name();
    }
}
