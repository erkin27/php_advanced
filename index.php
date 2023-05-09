<?php

use Php\Advanced\Connections\DB;
use Php\Advanced\Service;

require_once 'autoloader.php';

$autoloader = new Autoloader();
$autoloader->addNamespace('Php\Advanced', __DIR__ . '/src');
$autoloader->addNamespace('Symfony\Component\VarDumper', __DIR__ . '/vendor/symfony/var-dumper');
$autoloader->addFiles( __DIR__ . '/vendor/symfony/var-dumper/Resources');
$autoloader->addFiles( __DIR__ . '/vendor/larapack/dd/src');

$query = 'select * from public.students';

$data = DB::getPDO()->query($query)->fetchAll();

$service = new Service();
$result = $service->get();
dd($data, $result);

