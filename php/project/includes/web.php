<!-- 
routes  
-->
<?php 

define("SERVER1","http://localhost/");
define("SERVER2",$_SERVER['DOCUMENT_ROOT']);

define("folder","11_30_muqadas/php/project/");


define("domain1",SERVER1.folder); // absolute url


define("rel_url",SERVER2."/".folder);




define("DASHBOARD",domain1."dashboard.php");



// 
define("INSERTS",domain1."/action/form_action.php");

define("UPDATES",domain1."/action/form_action.php");


const EDIT= domain1."edit.php";
?>