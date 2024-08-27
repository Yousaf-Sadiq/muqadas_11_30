<?php
declare(strict_types=1);


function Sum(float|int $a,float|int $b):float|int
{


    $sum = $a + $b;
   
    return $sum;
}

// bootstrap 




echo Sum(3,6);
?>