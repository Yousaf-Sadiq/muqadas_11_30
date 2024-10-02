<?php
namespace abc;
/**
oops (object oriented programming) 

1. encapsulation (information hiding) 
2. inheritance  (data sharing)
3. polymorphism (same data use in different categories)
        a. method overloading
        b. mehod overriding
4. abstraction ( to combine common things )

 */
class A
{
    //  properties => variable  
//  methods => functions 



    //  access modifier 

    //  public => any where in the class
// protected => use in inheritance behaviuor
// private => use in same class only

    private $b;
    private $a;
    private $sum;

    // setter 
// getter 
    public function SetValue($x, $y)
    {
        $this->b = $y;
        $this->a = $x;
    }


    public function calculate()
    {
        $this->sum = $this->a + $this->b;

        return $this->sum;
    }
}




// $p = new A; // object 

// $p->SetValue(5, 5);

// echo $p->calculate();


?>