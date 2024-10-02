<?php
namespace v1\traitSample;



trait sample
{

    function display()
    {
        echo "Hello, I am a sample trait.";
    }

}



trait sample2
{

    function display()
    {
        echo "Hello, I am a sample2 trait.";
    }

}




class A{

    use sample,sample2{
        sample::display insteadof sample2;
        sample2::display as display2;
    }
}





?>