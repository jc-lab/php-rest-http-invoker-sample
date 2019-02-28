# php-rest-http-invoker-sample

[spring-boot-rest-http-invoker](https://github.com/jc-lab/spring-boot-rest-http-invoker) 와 연동되는 PHP Rest http invoker Client 입니다.



php composer 에서 `jc-lab/php-rest-http-invoker` 으로 사용하실 수 있습니다.



TestService.php

```php
<?php
interface TestService {
    public function test_1();
    public function test_2($a);
    public function test_3($b);
    public function test_4($c);
    public function test_5($a, $b);
}
```



test.php

```php
<?php

require_once("vencor/autoload.php");

$factory = new \jclab\RestHttpInvokerProxyFactory();
$factory->setServiceUrl("http://127.0.0.1:9999/api/test");
$factory->setServiceInterface('TestService');
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
?>
```
