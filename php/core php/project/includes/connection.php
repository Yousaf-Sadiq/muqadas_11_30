<?php 

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DB","crudnew11_30");
//  php oops 
$conn= new mysqli(HOSTNAME,USERNAME,PASSWORD,DB);

if ($conn) {
    // echo "CONNECTED";
}
else{
    echo "connection failed".$conn->error;
}
// php core 
// $conn= mysqli_connect();



?>