<?php

$files = require 'autoload_files.php';
$classMap = require 'autoload_namespaces.php';

foreach ($files as $file) {
    Autoloader::getLoader()->addFiles($file);
}

foreach ($classMap as $namespace => $dir) {
    Autoloader::getLoader()->addNamespace($namespace, $dir);
}

class Autoloader
{
    private static ?Autoloader $loader = null;

    public static function getLoader(): self
    {
        if (self::$loader === null) {
            self::$loader = new self();
        }
        return self::$loader;
    }

    private array $namespaceClassMap = [];

    public function addNamespace(string $namespace, string $dir): void
    {
        if (is_dir($dir)) {
            $this->namespaceClassMap[$namespace] = $dir;
            $this->register();
        }
    }

    public function addFiles(string $dir): void
    {
        if (is_dir($dir)) {
            $files = scandir($dir);
            unset($files[0], $files[1]);
            foreach ($files as $file) {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $file)) {
                    $this->addFiles($dir . DIRECTORY_SEPARATOR . $file);
                    continue;
                }
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if ($extension === 'php') {
                    require_once $dir . DIRECTORY_SEPARATOR . $file;
                }
            }
        }
    }

    private function autoload($class): void
    {
        foreach ($this->namespaceClassMap as $namespace => $dir) {
            if (strpos($class, $namespace) === 0) {
                $subName = substr($class, strlen($namespace));
                $lastPos = strrpos($subName, '\\');
                $subPath = str_replace('\\', DIRECTORY_SEPARATOR, substr($subName, 0, $lastPos));
                $subPath = strtolower(trim($subPath, DIRECTORY_SEPARATOR));
                $fileName = substr($subName, $lastPos + 1) . '.php';

                $file = $dir . DIRECTORY_SEPARATOR . $subPath . DIRECTORY_SEPARATOR . $fileName;
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        }
    }

    private function register(): void
    {
        spl_autoload_register(array($this, 'autoload'));
    }
}
