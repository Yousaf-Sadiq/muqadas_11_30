<?php

/**
 1. encapsulation 
 2. inheritance
 3. polymorphism 
    a. method ovveriding
    b. method overloading
 4. abstraction
    a. interfaces
    
 */
// API  


trait ASDF
{
    public function display()
    {
        echo "BASE::display()";
    }


    public function SetName($a)
    {
        $this->name = $a;
    }



    public function GetName()
    {
        return $this->name;
    }
}


abstract class revision
{

    abstract function display();
}

interface W
{
    public function display();
}

class BASE implements W
{
    private $name;

    use ASDF;
}



class DERIVED extends BASE
{
    public function GetName()
    {
        return "ok";
    }

}




?>