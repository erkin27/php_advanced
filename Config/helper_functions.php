<?php

use Config\Config;

if (! function_exists('config')) {
    function config(string $name): string|null
    {
        return Config::get($name);
    }
}
