<?php

interface DataProvider
{
    public function getData();
}

class Mysql implements DataProvider
{
    public function getData()
    {
        return 'some data from database';
    }
}

class Controller
{
    private DataProvider $adapter;

    public function __construct(DataProvider $mysql)
    {
        $this->adapter = $mysql;
    }

    function getData()
    {
        return $this->adapter->getData();
    }
}

print (new Controller(new Mysql()))->getData() . PHP_EOL;