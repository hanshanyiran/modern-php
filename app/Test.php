<?php

namespace App;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use App\DocumentStore;
use App\HtmlDocument;
use App\StreamDocument;
use App\CommandOutputDocument;
use App\Car;
use App\RetailStore;
use App\Generator;
use App\App;

class  Test
{
    /**
     * test constructor.
     */
    public function __construct()
    {
    }

    /**
     * 测试 modern PHP 命名空间特性
     */
    public function test()
    {
        // create a log channel
        $log = new Logger('modern_php');
        $log->pushHandler(new StreamHandler(__DIR__ . '/../storage/logs/modern_php.log', Logger::WARNING));

        // add records to the log
        $log->addWarning('Foo');
        $log->addError('Bar');
        return 1111;
    }

    /**
     * 测试modern php 接口特性
     */
    public function testInterface()
    {
        $documentStore = new DocumentStore();

        $htmlDoc = new HtmlDocument('https://php.net');
        $documentStore->addDocument($htmlDoc);

        //$streamDoc= new StreamDocument(fopen('stream.txt', 'rb'));
        //$documentStore->addDocument($streamDoc);

        $cmDoc = new CommandOutputDocument('cat /etc/hosts');
        $documentStore->addDocument($cmDoc);

        print_r($documentStore->getDocuments());
    }

    public function testTrait()
    {
        $car = new Car();
        $car->setLongitude('car11111');
        $car->setLatitude('car222222');
        $retailStore = new RetailStore();
        $retailStore->setLongitude('retailStore111111');
        $retailStore->setLatitude('retailStore222222');
        echo 'car location:'.$car->getAddress();
        echo "\n".'retail store location:'.$retailStore->getAddress();
    }

    public function testGenerator()
    {
        foreach (Generator::getRows(__DIR__.'/data.csv') as $row)
        {
            var_dump($row);
        }
    }


    public function testClosure ()
    {
        $closure = function ($name) {
            return sprintf('hello %s', $name);
        };
        echo $closure('jim');
    }

    public function testArrayMap()
    {
        print_r(array_map(
            function ($n) {
                return $n + 1;
            },
            [1,2,3]
        ));
    }

    public function testClosureUse()
    {
        $clay = $this->enclosePerson('clay');
        echo $clay('give five');
    }

    private  function enclosePerson($name) {
        return function ($doCommand) use ($name) {
            return sprintf('%s, %s', $name, $doCommand);
        };
    }

    public function testClosureToBind()
    {
        $app = new App();
        $app->addRoute('/users/josh',function (){
            $this->responseContentType = 'application/json;charset=utf-8';
            $this->responseBody = '{"name":"Josh"}';
        });
        $app->dispatch('/users/josh');
    }


}