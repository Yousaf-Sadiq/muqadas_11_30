<?php
define("SERVER1", "http://localhost/");
define("SERVER2",$_SERVER['DOCUMENT_ROOT']);

// define("folder", "project/");
define("folder", "11_30_muqadas/php/core%20php/project2/");

define("domain1", SERVER1 . folder); // absolute url

define("rel_url",SERVER2."/".folder);
define("DASHBOARD", domain1 . "layouts/dashboard.php"); // dashboard ka URL
define("INSERTS", domain1 . "/action/form_action.php");

define("SAVE_CHANGES", domain1 . "/action/form_action.php");
const EDIT= domain1."enroll.php";


const SIGNUP = domain1 . "/portal/signup.php";
const signup = domain1 . "action/portal/signup.php";

const LOGIN = domain1 . "/portal/login.php";
const login = domain1 . "action/portal/login.php";
const LOGOUT = domain1 . "logout.php";

?>
