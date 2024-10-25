<?php
require_once dirname(__FILE__) . "/app/database.php";

use app\database\DB as DB;
use app\database\helper as help;

$db = new DB();
$help = new help();

session_destroy();



echo json_encode([
    "msg" => "LOGOUT SUCCESSFULL",
    "error" => 0
]);





// echo $_SESSION["email"];
// $t = [
//     "email" => "xs2321321adsad",
//     "password" => "xs1234",
//     "ptoken" => "xs1234",
// ];

// $db->update("users",$t,"sdadksa");
// echo $a->inserts("users", $t);
?>