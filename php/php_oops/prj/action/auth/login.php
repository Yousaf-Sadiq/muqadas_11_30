<?php
require_once dirname(__DIR__) . "/../app/database.php";
use app\database\helper as help;
use app\database\DB as DB;

$db = new DB();
$help = new help;

if (isset($_POST["LOGIN"]) && !empty($_POST["LOGIN"])) {


    $email = $help->FilterData($_POST["email"]);
    $pswd = $help->FilterData($_POST["password"]);

    $status = [
        "error" => 0,
        "msg" => []
    ];





    if (!isset($email) || empty($email)) {

        $status['error']++;
        array_push($status['msg'], "EMAIL IS REQUIRED");
    }

    if (!isset($pswd) || empty($pswd)) {

        $status['error']++;
        array_push($status['msg'], "PASSWORD IS REQUIRED");
    }




    if ($status["error"] > 0) {

        echo json_encode($status);

        return;
    } else {


        $password = password_hash($pswd, PASSWORD_BCRYPT);
        $encrpt = base64_encode($pswd);



        $check = "SELECT * FROM `" . USER . "`  WHERE `email`='{$email}' AND `ptoken`='{$encrpt}'";

        $exe = $db->MySql($check, true);

        if ($exe) {

            $f = $db->get_result();
            // $help->pre($f);
            $_SESSION["email"] = $email;
            $_SESSION["user_id"] = $f[0]["user_id"];


            array_push($status['msg'], "LOGIN SUCCESSFULL");

        } else {
            $status['error']++;
            array_push($status['msg'], "RECORD NOT FOUND");
        }



        echo json_encode($status);
    }


   

}


?>