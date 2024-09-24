<?php
declare(strict_types=1);

// constructor and destructor
// magic constant methods
//  static variable and methods
class A
{
    protected $a;
    protected $b;

    protected static $c;

    public function __construct()
    {
        $this->b = "Default";
        self::$c = "Default";
        echo "<br> class A constructor called   <br>";
    }


    public function __destruct()
    {

        echo "<br> class A destructor called <br>";
    }
}


class B extends A
{


    public function __destruct()
    {

        echo "<br> class B destructor called <br>";
        parent::__destruct();
    }
    public function setA(float $n)
    {
        $this->a = $n;
    }


    public function __construct($a)
    {
        echo "<br> class b constructor called  $a <br>";
        parent::__construct();
    }


    public function display()
    {
        return $this->a;
    }


    public static function display2()
    {
        return parent::$c;
    }
}




$z = new A();

// $z->setA(10.5);
// echo $z->display();

echo B::display2();
?>