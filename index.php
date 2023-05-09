<?php

use Php\Advanced\Connections\DB;
use Php\Advanced\Service;

require_once 'autoloader.php';

$query = 'select * from public.students';

$data = DB::getPDO()->query($query)->fetchAll();

$service = new Service();
$result = $service->get();
dd($data, $result);

