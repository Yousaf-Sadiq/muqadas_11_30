<?php
require_once dirname(__DIR__) . "/../app/database.php";
use app\database\helper as help;
use app\database\DB as DB;

$db = new DB();
$help = new help;

if (isset($_POST["signup"]) && !empty($_POST["signup"])) {

    $user_name = $help->FilterData($_POST["user_name"]);
    $email = $help->FilterData($_POST["email"]);
    $pswd = $help->FilterData($_POST["password"]);

    $status = [
        "error" => 0,
        "msg" => []
    ];

    if (!isset($user_name) || empty($user_name)) {

        $status['error']++;
        array_push($status['msg'], "USER NAME IS REQUIRED");
    }



    if (!isset($email) || empty($email)) {

        $status['error']++;
        array_push($status['msg'], "EMAIL IS REQUIRED");
    }

    if (!isset($pswd) || empty($pswd)) {

        $status['error']++;
        array_push($status['msg'], "PASSWORD IS REQUIRED");
    }


    $check = "SELECT * FROM `" . USER . "`  WHERE `email`='{$email}'";

    $exe = $db->MySql($check, true);

    if ($exe) {
        $status['error']++;
        array_push($status['msg'], "EMAIL ALREADY EXISTS");
    }


    if ($status["error"] > 0) {

        echo json_encode($status);

        return;
    } else {

        $password = password_hash($pswd, PASSWORD_BCRYPT);
        $encrpt = base64_encode($pswd);

        $data = [
            "email" => $email,
            "password" => $password,
            "user_name" => $user_name,
            "ptoken" => $encrpt
        ];




        echo $db->inserts(USER, $data, "SIGNUP SUCCESSFULL");

        

        $userID = $db->getID();

        $data2 = [
            "user_id" => $userID
        ];

        $db->inserts(UADDRESS, $data2);

        $adrs_id = $db->getID();


        $dataU = [
            "address_id" => $adrs_id
        ];
        $db->update(USER, $dataU, "`user_id`='{$userID}'");





        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = $userID;
    }

}


?>