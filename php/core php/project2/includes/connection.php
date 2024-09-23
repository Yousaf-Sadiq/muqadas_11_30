
<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB", "crud_new12");

$conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB);

if ($conn) {
    
}
else{
    echo "connection failed".$conn->error;
}

?>

