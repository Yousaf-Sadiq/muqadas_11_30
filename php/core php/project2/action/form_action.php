<?php

require_once dirname(__FILE__) . "/../layouts/header.php";

if (isset($_POST["inserts"]) && !empty($_POST["inserts"])) {
    $email = filterData($_POST["Email"]);
    $pswd = filterData($_POST["pswd"]);
    $status = [ "error" => 0, "msg" => [] ];

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
    $file_input = "profile";
    $status = [ "error" => 0, "msg" => [] ];
 
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
if (isset($_FILES[$file_input]["name"]) && !empty($_FILES[$file_input]["name"])) {


    $adrs = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$userID}'";
    $adrs_exe = $conn->query($adrs);

    if ($adrs_exe->num_rows > 0) {

        $row_adrs = $adrs_exe->fetch_assoc();
        if (isset($row_adrs["images"]) && !empty($row_adrs["images"])) {
            # code...
            $old_image = json_decode($row_adrs["images"], true);


            if (file_exists($old_image["rel_path"])) {
                unlink($old_image["rel_path"]);
            }
        }
  }
  $ext = ["jpg", "png"];
    $file = File_upload($file_input, $ext, "includes/publish/");
   if ($file == 1) {

            $s = implode(" ", $ext); 

            $s = strtoupper($s);


            $status["error"]++;

            array_push($status["msg"], "{$s}  ONLY ALLOWED");

        } else if ($file == 7) {
            $status["error"]++;

            array_push($status["msg"], "uploading  failed");
        } else {


            $file = json_encode($file);
        }
 }
    else {

        $adrs = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$userID}'";
        $adrs_exe = $conn->query($adrs);

        if ($adrs_exe->num_rows > 0) {

            $row_adrs = $adrs_exe->fetch_assoc();
            if (!isset($row_adrs["images"]) && empty($row_adrs["images"])) {
                $file = "";
            } else {
                $image = $row_adrs["images"];

                $file = $image;
            }
        } else {
            $file = "";
        }
 }
   if ($status["error"] > 0) {

        foreach ($status['msg'] as $key => $value) {
            ErrorMsg($value);
        }

        RefreshUrl(2, DASHBOARD);
    } else {
        $H_password = password_hash($pswd, PASSWORD_BCRYPT);
        $encrpt = base64_encode($pswd);
        $adrs = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$userID}'";
        $adrs_exe = $conn->query($adrs);

        $address_id = null;

        if ($adrs_exe->num_rows > 0) {

            $row_adrs = $adrs_exe->fetch_assoc();

            $address_id = $row_adrs["id"];
            $output = false;
             $update_adrs = "UPDATE `"  . ADDRESS . "` SET  `images`='{$file}',
             `address_name`='NULL',`contact_info`='1234',`user_id`='{$userID}'
             WHERE `user_id`='{$userID}'";

    $update_adrs_exe = $conn->query($update_adrs);
         if ($update_adrs_exe) {

             if ($conn->affected_rows > 0) {
                 $output = true;
             }
         }
     } else {
         $output = false;
          $insert_adrs = "INSERT INTO `" . ADDRESS . "` (`images`, `address_name`, `contact_info`, `user_id`)
          VALUES ('{$file}', 'none',1234,'{$userID}');";
        $insert_adrs_exe = $conn->query($insert_adrs);
          if ($insert_adrs_exe) {

              if ($conn->affected_rows > 0) {
                  $output = true;

                  $address_id = $conn->insert_id;

              }
          }
      }
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
$file = File_upload("profile", $ext, "includes/publish/");

if ($file == 1) {

    $s = implode(" ", $ext); 

    $s = strtoupper($s);

    ErrorMsg("{$s}  ONLY ALLOWED");
}
if ($file == 7) {
    ErrorMsg("UPLOADING ERROR");
}



}

?>


<!-- -=--========================================================= -->

<?php require_once dirname(__FILE__) . "/../layouts/footer.php"; ?>


