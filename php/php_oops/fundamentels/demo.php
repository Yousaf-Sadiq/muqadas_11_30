<?php 
require_once "./traits.php";
require_once "./encapsulation.php";

use v1\traitSample\A    as A; 
use abc\A as Q;


$a = new Q;
$a->SetValue(2,4);
echo $a->calculate();
?>