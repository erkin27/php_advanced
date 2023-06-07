<?php

namespace Config;

class Config
{

    protected static Config|null $instance = null;
    protected array $configs = [];

    public static function get(string $name): string|null
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance->getParam($name);
    }

    public function getParam(string $name): string|null
    {
        $keys = explode('.', $name);
        return $this->findParamByKeys($keys, $this->getConfigs());
    }

    protected function getConfigs(): array
    {
        if (empty($this->configs)) {
            $this->configs = include CONFIG_DIR . '/configurations.php';
        }

        return $this->configs;
    }

    protected function findParamByKeys(array $keys, array $configs): string|null
    {
        $needle = array_shift($keys);

        if (array_key_exists($needle, $configs)) {
            $value = is_array($configs[$needle])
                ? $this->findParamByKeys($keys, $configs[$needle])
                : $configs[$needle];
        }

        return $value ?? null;
    }

}