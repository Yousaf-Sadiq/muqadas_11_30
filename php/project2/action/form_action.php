<?php

require_once dirname(__FILE__) . "/../layouts/header.php";

if (isset($_POST["inserts"]) && !empty($_POST["inserts"])) {
    $email = filterData($_POST["Email"]);
    $pswd = filterData($_POST["pswd"]);
    $status = ["error" => 0, "msg" => []];

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

    $check = "SELECT * FROM " . USER . " WHERE email = '{$email}'";
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
        $insert_q = "INSERT INTO " . USER . "(username, email, password) VALUES ('{$email}','{$email}','{$H_password}')";
        $insert_exe = $conn->query($insert_q);

        if ($insert_exe) {
            if ($conn->affected_rows > 0) {
                SuccessMsg("DATA HAS BEEN INSERTED");
            } else {
                ErrorMsg("DATA HAS NOT BEEN INSERTED");
            }
        } else {
            ErrorMsg("ERROR IN QUERY {$insert_q}");
        }
        RefreshUrl(2, DASHBOARD);
    }
}

//save_changes============
if (isset($_POST["SAVE_CHANGES"]) && !empty($_POST["SAVE_CHANGES"])) {
    $email = filterData($_POST["Email"] ?? '');
    $pswd = filterData($_POST["pswd"] ?? '');
    $userName = filterData($_POST["username"] ?? '');
    $userID = filterData($_POST["id"]);

    $status = ["error" => 0, "msg" => []];

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

    if (!isset($userName) || empty($userName)) {
        $status['error']++;
        array_push($status['msg'], "USERNAME IS REQUIRED");
    }

    $check_id = "SELECT * FROM " . USER . " WHERE `id`= '{$userID}'";
    $check_id_result = $conn->query($check_id);

    if ($check_id_result->num_rows > 0) {
        $check = "SELECT * FROM " . USER . " WHERE `email` = '{$email}' AND `id`<> $userID";
        $check_exe = $conn->query($check);

        if ($check_exe->num_rows > 0) {
            $status['error']++;
            array_push($status['msg'], "EMAIL ALREADY EXISTS");
        }
    } else {
        $status['error']++;
        array_push($status['msg'], "RECORD NOT FOUND");
    }

    if ($status["error"] > 0) {
        foreach ($status['msg'] as $key => $value) {
            ErrorMsg($value);
        }
        RefreshUrl(2, DASHBOARD);
    } else {
        $H_password = password_hash($pswd, PASSWORD_BCRYPT);
        $encrpt = base64_encode($pswd);
        $SAVE_CHANGES_q = "UPDATE " . USER . " SET `username`='{$userName}' , `email`='{$email}', `password`='{$H_password}' WHERE `id`= '{$userID}' ";
        $SAVE_CHANGES_exe = $conn->query($SAVE_CHANGES_q);

        if ($SAVE_CHANGES_exe) {
            if ($conn->affected_rows > 0) {
                SuccessMsg("DATA HAS BEEN saved");
            } else {
                ErrorMsg("DATA HAS NOT BEEN saved");
            }
        } else {
            ErrorMsg("ERROR IN QUERY {$SAVE_CHANGES_q}");
        }
        RefreshUrl(2, DASHBOARD);
    }
}

//PUBLISH==========
if (isset($_POST["PUBLISH"]) && !empty($_POST["PUBLISH"])) {
    $ext = ["jpg", "png"];
    // pre($file);
    $file = File_upload("profile", $ext, "/includes/publish/");

    if ($file == 1) {

        $s = implode(" ", $ext);

        $s = strtoupper($s);

        ErrorMsg("{$s}  ONLY ALLOWED");
    }
    if ($file == 7) {
        ErrorMsg("UPLOADING ERROR");
    }
    echo json_encode($file);


}

?>


<!-- -=--========================================================= -->

<?php require_once dirname(__FILE__) . "/../layouts/footer.php"; ?>