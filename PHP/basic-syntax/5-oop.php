<?php
class Human
{
    public $name = 'Anonymous';
    protected $id;

    function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function intro()
    {
        echo "My name is " . $this->name;
    }
}

$dyno = new Human("Dyno", "123", 9.5);

// Extends
class Student extends Human
{
    private $avg;
    function __construct($name, $id, $avg)
    {
        parent::__construct($name, $id);
        $this->avg = $avg;
    }

    final public function get_avg()
    {
        return $this->avg;
    }
}

// Abstract class
abstract class AbstractClass
{
    public $x;
    public $y;

    // Only define method
    public function abstractMethod()
    {
    }
}

class ExtendAbsClass extends AbstractClass
{
    function abstractMethod()
    {
        echo 'Implement the method';
    }
}

$hihi = new ExtendAbsClass();
$hihi->abstractMethod();

// Interface
interface IAnimal
{
    public function speak(): void;
    public function isDead(): bool;
}

class Cat implements IAnimal
{
    private $status;
    public function speak(): void
    {
        echo "meow meow";
    }

    public function isDead(): bool
    {
        return $this->status;
    }
}

// Trait (cũng như interface nhưng có thể khởi tạo 1 instance với trait)
trait Trait_1
{
    public function say()
    {
        echo 'Hello';
    }
}

trait Trait_2
{
    public function eat()
    {
        echo 'Eating ...';
    }
}

class ExtendTrait
{
    use Trait_1;
    use Trait_2;
}

$traitTest = new ExtendTrait();
$traitTest->say();
$traitTest->eat();

// Khởi tạo class 1 lần, không tái sử dụng
$useOnlyOnce = new class(1)
{
    private $x;
    function __construct($a)
    {
        $this->x = $a;
    }
    public function getX()
    {
        return $this->x;
    }
};

echo $useOnlyOnce->getX();

// self và this
class A
{
    public function test()
    {
        echo "Test của A";
    }
    public function demo()
    {
        $this->test(); // gọi hàm test() của lớp kế thừa nếu có
        self::test(); // gọi hàm test() của A
    }
}

class B extends A
{
    public function test()
    {
        echo "Test của B";
    }
}

$b = new B();
$b->demo();

// final và static
// cả 2 đều có thể sử dụng mà không cần khởi tạo instance thông qua tên lớp. Do chương trình chỉ tạo 1 lần khi chạy.
// final không thể chỉnh sửa giá trị nhưng static thì có.