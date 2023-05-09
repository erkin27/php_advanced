<?php

namespace Php\Advanced;

use Php\Advanced\models\User;

class Service
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function get(): string
    {
        return $this->user->getName();
    }
}
