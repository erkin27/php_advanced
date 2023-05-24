<?php

interface Taxi
{
    public function getPrice();
    public function getModel();
}

class EconomyTaxi implements Taxi
{
    public function getPrice()
    {
        return '10$';
    }
    public function getModel()
    {
        return 'Reno';
    }
}

class StandardTaxi implements Taxi
{
    public function getPrice()
    {
        return '30$';
    }
    public function getModel()
    {
        return 'Hyundai';
    }
}

class LuxTaxi implements Taxi
{
    public function getPrice()
    {
        return '50$';
    }
    public function getModel()
    {
        return 'Mercedes-Benz';
    }
}

abstract class TaxiFactory
{
    abstract protected function createTaxi(): Taxi;

    public function getTaxi(): Taxi
    {
        return $this->createTaxi();
    }
}

class EconomyTaxiFactory extends TaxiFactory
{
    protected function createTaxi(): Taxi
    {
        return new EconomyTaxi();
    }
}

class StandardTaxiFactory extends TaxiFactory
{
    protected function createTaxi(): Taxi
    {
        return new StandardTaxi();
    }
}

class LuxTaxiFactory extends TaxiFactory
{
    protected function createTaxi(): Taxi
    {
        return new LuxTaxi();
    }
}

$clientCode = static function (TaxiFactory $factory) {
    $taxi = $factory->getTaxi();
    echo "You order taxi with model {$taxi->getModel()} and price {$taxi->getPrice()} per 10 km.\n";
};

$clientCode(new EconomyTaxiFactory());
$clientCode(new StandardTaxiFactory());
$clientCode(new LuxTaxiFactory());


