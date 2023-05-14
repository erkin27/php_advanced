<?php

use Php\Advanced\deliveries\SmsDelivery;
use Php\Advanced\formats\RawFormat;
use Php\Advanced\Logger;

require_once 'vendor/autoload.php';

$logger = new Logger(new RawFormat(), new SmsDelivery());
$logger->log('Emergency error! Please fix me!');