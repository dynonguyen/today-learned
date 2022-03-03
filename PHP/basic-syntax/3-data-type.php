<?php
// String
$str = 'Hello';
var_dump($str);

// Integer
$numInt = 15;
var_dump($numInt);

// Float
$numFloat = 15.5;
var_dump($numFloat);

// Boolean
$boolVar = true;
var_dump($boolVar);

// NULL
$nullVar = null;
var_dump($nullVar);

// Array
$arr = array(1, 2, 3);
$strArr = ['hi', 'hello $arr[0]'];
$associativeArr = ["dyno" => 1, "tuan" => 2];
$associativeArr['dyno']; //1
var_dump($arr);
echo $arr[0];

// Object & Classes
class Person
{
    public $name;
    private $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }
}

$person = new Person('Dyno', 18);
var_dump($person);
echo $person->name;
echo $person->getAge();
