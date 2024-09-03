<?php
require_once dirname(__DIR__) . "/layouts/header.php";
require_once dirname(__DIR__) . "/layouts/dashboard.php";


if (isset($_POST["inserts"]) && !empty($_POST["inserts"])) {
    $email = filterData($_POST["Email"]);
    $pswd = filterData($_POST["pswd"]);
    if (isset($_POST["phone_no"]) && !empty($_POST["phone_no"])) {
        $phone_no = filterData($_POST["phone_no"]);
    } else {
        $phone_no = "";
    }

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
            echo "<div class='alert alert-danger'>$value</div>";
        }
        header("Refresh:2; url=" . DASHBOARD);
    } else {
        $H_password = password_hash($pswd, PASSWORD_BCRYPT);
        $encrpt = base64_encode($pswd);
        $insert_q = "INSERT INTO " . USER . " (username, password, email, phone_no) VALUES ('$email', '$H_password', '$email', '$phone_no')";
        $insert_exe = $conn->query($insert_q);
        if ($insert_exe) {
            if ($conn->affected_rows > 0) {
                echo "<div class='alert alert-success'>DATA HAS BEEN INSERTED</div>";
            } else {
                echo "<div class='alert alert-danger'>DATA HAS NOT BEEN INSERTED</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>ERROR IN QUERY {$insert_q}</div>";
        }
       
    }
}
require_once dirname(__DIR__) . "/layouts/footer.php";
?>


