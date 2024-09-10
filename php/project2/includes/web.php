<?php
define("SERVER1", "http://localhost/");
define("SERVER2",$_SERVER['DOCUMENT_ROOT']);

// define("folder", "project/");
define("folder", "11_30_muqadas/php/project2");

define("domain1", SERVER1 . folder); // absolute url

define("rel_url",SERVER2."/".folder);
define("DASHBOARD", domain1 . "layouts/dashboard.php"); // dashboard ka URL
define("INSERTS", domain1 . "/action/form_action.php");
define("SAVE_CHANGES", domain1 . "/action/form_action.php");
?>
