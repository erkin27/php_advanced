<?php

use Php\Advanced\factories\LG\LGFactory;
use Php\Advanced\factories\Sony\SonyFactory;

require_once 'vendor/autoload.php';

$LGFactory = new LGFactory();
$SONYFactory = new SonyFactory();

$LCDtv = $LGFactory->createLCD();
echo $LCDtv->turnOn() . "<br>";
echo $LCDtv->volumeUp() . "<br>";
echo $LCDtv->turnOff() . "<br>";


$LEDtv = $SONYFactory->createLED();
echo $LEDtv->turnOn(). "<br>";
echo $LEDtv->volumeDown(). "<br>";
echo $LEDtv->turnOff(). "<br>";
