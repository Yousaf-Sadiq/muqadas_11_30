<?php
require_once dirname(__DIR__) . "/app/database.php";
use app\database\helper as help;
use app\database\DB as DB;

$db = new DB();
$help = new help;

if (isset($_POST["inserts"]) && !empty($_POST["inserts"])) {

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




        echo $db->inserts(USER, $data);

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

    }
}


// update

if (isset($_POST["updates"]) && !empty($_POST["updates"])) {

    $user_name = $help->FilterData($_POST["user_name"]);
    $email = $help->FilterData($_POST["email"]);
    $pswd = $help->FilterData($_POST["password"]);
    $user_id = $help->FilterData($_POST["user_id"]);

    $profile = $_FILES["profile"];

    $file = NULL;

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


    $check = "SELECT * FROM `" . USER . "`  WHERE `email`='{$email}' AND `user_id`<> '{$user_id}'";

    $exe = $db->MySql($check, true);

    if ($exe) {
        $status['error']++;
        array_push($status['msg'], "EMAIL ALREADY EXISTS");
    }



    if (isset($profile["name"]) && !empty($profile["name"])) {


        $chk_adrs = "SELECT * FROM `" . UADDRESS . "` WHERE `user_id`= '{$user_id}'";

        $exe_adrs = $db->MySql($chk_adrs, true);

        if ($exe_adrs) {

            $getAdrs = $db->get_result();

            if (isset($getAdrs[0]["images"]) && !empty($getAdrs[0]["images"])) {

                $img = json_decode($getAdrs[0]["images"], true);

                if (file_exists($img["relUrl"])) {
                    unlink($img["relUrl"]);
                }
            }

        }



        $ext = ["jpg", "png"];
        $file = $help->FIleUPload("profile", $ext, "assets/upload");

        if ($file == 1) {
            $str = implode(" ", $ext); // jpg png
            $str = strtoupper($str);
            $status['error']++;
            array_push($status['msg'], "ONLY {$str} ALLOWED ");

        } else if ($file == 2) {
            $status['error']++;
            array_push($status['msg'], "File UPLOADING ERROR");

        } else if (is_array($file)) {

            $file = json_encode($file);

        } else {
            $status['error']++;
            array_push($status['msg'], "File ERROR");
        }
    }




    if ($status["error"] > 0) {

        echo json_encode($status);

        return;
    } else {

        $password = password_hash($pswd, PASSWORD_BCRYPT);
        $encrpt = base64_encode($pswd);





        $data2 = [
            "images" => $file,
            "user_id" => $user_id
        ];

        $chk_adrs = "SELECT * FROM `" . UADDRESS . "` WHERE `user_id`= '{$user_id}'";

        $exe_adrs = $db->MySql($chk_adrs, true);

        $adrs_id = NULL;
        if ($exe_adrs) {


            $getAdrs = $db->get_result();

            $adrs_id = $getAdrs[0]["id"];

            // $help->pre($data2);
            $db->update(UADDRESS, $data2, "`user_id`='{$user_id}'");


        } else {

            $db->inserts(UADDRESS, $data2);

            // echo "else";
            $adrs_id = $db->getID();
        }


        $data = [
            "email" => $email,
            "password" => $password,
            "user_name" => $user_name,
            "ptoken" => $encrpt,
            "address_id" => $adrs_id
        ];


        echo $db->update(USER, $data, "`user_id`='{$user_id}'");



    }
}




if (isset($_POST["deletes"]) && !empty($_POST["deletes"])) {


    $user_id = $help->FilterData($_POST["user_id"]);

    $status = [
        "error" => 0,
        "msg" => []
    ];


    $check = "SELECT * FROM `" . USER . "`  WHERE `user_id`='{$user_id}'";

    $exe = $db->MySql($check, true);

    if (!$exe) {
        $status['error']++;
        array_push($status['msg'], "RECORD NOT FOUND");
    }


    if ($status["error"] > 0) {

        echo json_encode($status);

        return;
    } else {






        echo $db->delete(USER, "`user_id`='{$user_id}'");

    }
}


?>