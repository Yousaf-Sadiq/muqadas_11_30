
<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB", "crud_new12");

$conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB);

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connected";
}

?>

