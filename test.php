<?php
require_once("vendor/autoload.php");

require_once "TestService.php";

$factory = new \jclab\PhpRestHttpInvoker\RestHttpInvokerProxyFactory();
$factory->setServiceUrl("http://127.0.0.1:9999/api/test");
$factory->setServiceInterface('TestService');

$factory->setMethodParemeterTypes("test_5", ['long', 'long']);

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


