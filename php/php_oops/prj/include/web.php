<?php
const Server = "http://localhost/";
define("SERVER2", $_SERVER['DOCUMENT_ROOT']);

const Folder = "11_30_muqadas/php/php_oops/prj/";


const abs_url = Server . Folder;
const rel_url = SERVER2 . "/" . Folder;


const insert_form = abs_url . "action/form_action.php";
const Edit_form = abs_url . "action/form_action.php";
const del_form = abs_url . "action/form_action.php";
?>