<?php
const Server = "http://localhost/";
define("SERVER2", $_SERVER['DOCUMENT_ROOT']);

const Folder = "11_30_muqadas/php/php_oops/prj/";


const abs_url = Server . Folder;
const rel_url = SERVER2 . "/" . Folder;

// form action 
const insert_form = abs_url . "action/form_action.php";
const Edit_form = abs_url . "action/form_action.php";
const del_form = abs_url . "action/form_action.php";

const signup_form = abs_url . "action/auth/signup.php";
const login_form = abs_url . "action/auth/login.php";



// pages url 
const signUp = abs_url . "signUp.php";
const lOGIN = abs_url . "login.php";
const DASHBOARD = abs_url . "dashboard.php";
const LOGOUT = abs_url . "logout.php";
?>