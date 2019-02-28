<?php

require_once("./php-restclient/restclient.php");
require_once("./php-rest-http-invoker/RestHttpInvokerProxyFactory.php");

require_once "TestService.php";

$factory = new \jclab\RestHttpInvokerProxyFactory();
$factory->setServiceUrl("http://127.0.0.1:9999/api/test");
$factory->setServiceInterface('TestService');
/*
$factory->addMethod("test_1", null, []);
$factory->addMethod("test_2", null, ["int"]);
$factory->addMethod("test_3", null, ["string"]);
$factory->addMethod("test_4", null, []);
$factory->addMethod("test_5", null, []);
*/
$object = $factory->getProxyObject();

class Test {
    public $a;
    public $b;
}

$t = new Test();
$t->a = 10;
$t->b = 20;

$object->test_1();
$object->test_2(10);
$object->test_3("30");
$object->test_4(array(
    "a" => "aaaa",
    "b" => 123123,
    "c" => 3.1123,
    "d" => $t
));
echo "test 5 : " . $object->test_5(10, 20);


