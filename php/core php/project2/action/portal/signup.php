
<?php

require_once dirname(__DIR__) . "/../layouts/header.php";


?>

<!-- ======================================================= -->
<?php

if (isset($_POST["signup"]) && !empty($_POST["signup"])) {

    $email = filterData($_POST["Email"]);
    $pswd = filterData($_POST["pswd"]);


    $status = [
        "error" => 0,
        "msg" => []
    ];


    if (!isset($email) || empty($email)) {
        $status['error']++;
        array_push($status['msg'], "EMAIL IS REQUIRED");
    } else {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $status['error']++;
            array_push($status['msg'], "Invalid Email");
        }
    }



    if (!isset($pswd) || empty($pswd)) {
        $status['error']++;
        array_push($status['msg'], "PASSWORD IS REQUIRED");
    }


    $check = "SELECT * FROM `" . USER . "` WHERE `email` = '{$email}'";
    $check_exe = $conn->query($check);

    if ($check_exe->num_rows > 0) {

        $status['error']++;
        array_push($status['msg'], "EMAIL ALREADY EXISTS");
    }



    if ($status["error"] > 0) {

        foreach ($status['msg'] as $key => $value) {
            ErrorMsg($value);
        }

        RefreshUrl(2, DASHBOARD);
    } else {
        $H_password = password_hash($pswd, PASSWORD_BCRYPT);

        $encrpt = base64_encode($pswd);

        $insert_q = "INSERT INTO " . USER . "(username, email, password) 
        VALUES ('{$email}','{$email}','{$H_password}')";

        $insert_exe = $conn->query($insert_q);

        if ($insert_exe) {

            if ($conn->affected_rows > 0) {
                SuccessMsg("DATA HAS BEEN INSERTED");

                $_SESSION["id"] = $conn->insert_id;

            } else {
                ErrorMsg("DATA HAS NOT BEEN INSERTED");
            }
        } else {
            ErrorMsg("ERROR IN QUERY  {$insert_q}");
        }


        RefreshUrl(2, DASHBOARD);

    }

}









?>

<!-- -=--========================================================= -->


<?php

require_once dirname(__DIR__) . "/../layouts/footer.php";


?>
