<?php

interface EatContract
{
    public function eat();
}

interface FlyContract
{
    public function fly();
}

abstract class Bird implements EatContract, FlyContract
{
}

class Swallow extends Bird
{
    public function eat() {}
    public function fly() {}
}

class Ostrich extends Bird
{
    public function eat() {}
    public function fly() { /* exception */ }
}