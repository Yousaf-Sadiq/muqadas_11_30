<?php
declare(strict_types=1);


// $a = 10;
// $a = 11;



abstract class Q
{

    public $a;

    public function ABC()
    {
        echo "CLASS A ABC function called";
    }


    public abstract function display2();

}

interface A
{
   
    public function SUM();
}

interface C
{
   
    public function display();

}


// overwrite 
// override 
class B extends Q implements A, C
{
    public function ABC()
    {

        echo "CLASS B ABC function called";
    }

    public function display()
    {

    }

    public function SUM()
    {

    }

    public function display2()
    {

    }

}


$p = new B();
$p->ABC();
?>