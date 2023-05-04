<?php

use Php\Advanced\Connections\DB;

require_once 'vendor/autoload.php';

$query = 'select * from public.students';

$data = DB::getPDO()->query($query)->fetchAll();
dd($data);