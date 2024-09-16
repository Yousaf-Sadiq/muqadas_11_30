<?php

require_once dirname(__DIR__) . "/layouts/admin/header.php";

// __FILE__
// __DIR__ 
?>

<!-- ======================================================= -->
<?php

/**
 
    $_POST[]
    $_GET[]
    $_FILES[]

    $_SERVER[]
    
    $_SESSION[]
    $_COOKIE[]

    $_REQUEST[]
 */
if (isset($_POST["inserts"]) && !empty($_POST["inserts"])) {

    $email = filterData($_POST["Email"]);
    $pswd = filterData($_POST["pswd"]);


    $status = [
        "error" => 0,
        "msg" => []
    ];


    if (!isset($email) || empty($email)) {
        $status['error']++;
        //    $status['msg'][]="Email is required";
        array_push($status['msg'], "EMAIL IS REQUIRED");
    } else {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $status['error']++;
            array_push($status['msg'], "Invalid Email");
        }
    }



    if (!isset($pswd) || empty($pswd)) {
        $status['error']++;

        //    $status['msg'][]="Email is required";
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

        $insert_q = "INSERT INTO `" . USER . "`(`email`, `password`, `ptoken`)
        VALUES ('{$email}','{$H_password}','{$encrpt}')";

        $insert_exe = $conn->query($insert_q);

        if ($insert_exe) {

            if ($conn->affected_rows > 0) {
                SuccessMsg("DATA HAS BEEN INSERTED");
            } else {
                ErrorMsg("DATA HAS NOT BEEN INSERTED");
            }
        } else {
            ErrorMsg("ERROR IN QUERY  {$insert_q}");
        }


        RefreshUrl(2, DASHBOARD);

    }

}



// update ===============

if (isset($_POST["updates"]) && !empty($_POST["updates"])) {

    $email = filterData($_POST["Email"]);
    $pswd = filterData($_POST["pswd"]);
    $userName = filterData($_POST["userName"]);
    $userID = filterData($_POST["_token"]);

    $file_input = "profile";

    $status = [
        "error" => 0,
        "msg" => []
    ];


    if (!isset($email) || empty($email)) {
        $status['error']++;
        //    $status['msg'][]="Email is required";
        array_push($status['msg'], "EMAIL IS REQUIRED");
    } else {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $status['error']++;
            array_push($status['msg'], "Invalid Email");
        }
    }



    if (!isset($pswd) || empty($pswd)) {
        $status['error']++;

        //    $status['msg'][]="Email is required";
        array_push($status['msg'], "PASSWORD IS REQUIRED");
    }

    if (!isset($userName) || empty($userName)) {
        $status['error']++;

        //    $status['msg'][]="Email is required";
        array_push($status['msg'], "USERNAME IS REQUIRED");
    }

    $check_id = "SELECT * FROM `" . USER . "` WHERE `user_id`= '{$userID}'";

    $check_id_result = $conn->query($check_id);

    if ($check_id_result->num_rows > 0) {

        // =========================================================================
        $check = "SELECT * FROM `" . USER . "` WHERE `email` = '{$email}' AND `user_id`<> $userID";
        $check_exe = $conn->query($check);

        if ($check_exe->num_rows > 0) {

            $status['error']++;
            array_push($status['msg'], "EMAIL ALREADY EXISTS");
        }


        // ---------------------------------
        # code...
    } else {
        $status['error']++;
        array_push($status['msg'], "RECORD NOT FOUND");
    }


    // if file is uploading then
    if (isset($_FILES[$file_input]["name"]) && !empty($_FILES[$file_input]["name"])) {


        $adrs = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$userID}'";
        $adrs_exe = $conn->query($adrs);

        if ($adrs_exe->num_rows > 0) {

            $row_adrs = $adrs_exe->fetch_assoc();

            // $image = json_decode($row_adrs["images"], true);
            if (isset($row_adrs["images"]) && !empty($row_adrs["images"])) {
                # code...
                $old_image = json_decode($row_adrs["images"], true);


                if (file_exists($old_image["rel_path"])) {
                    unlink($old_image["rel_path"]);
                }
            }

        }




        $ext = ["jpg", "png"];

        $file = File_upload($file_input, $ext, "assets/uploads/");





        if ($file == 1) {

            $s = implode(" ", $ext); // array to string 

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

    // if file is not uploading then
    else {

        $adrs = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$userID}'";
        $adrs_exe = $conn->query($adrs);

        if ($adrs_exe->num_rows > 0) {

            $row_adrs = $adrs_exe->fetch_assoc();

            // $image = json_decode($row_adrs["images"], true);
            if (!isset($row_adrs["images"]) && empty($row_adrs["images"])) {
                # code...
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



            // one to one 
            $output = false;
            // update
            $update_adrs = "UPDATE `" . ADDRESS . "` SET  `images`='{$file}',
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
            // insert
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






        $update_q = "UPDATE `" . USER . "` SET 
        `user_name`='{$userName}' , `email`='{$email}', 
        `password`='{$H_password}', `ptoken`='{$encrpt}'  
        ,`address_id`='{$address_id}'
        WHERE `user_id`= '{$userID}'
        ";

        $update_exe = $conn->query($update_q);

        if ($update_exe) {

            if ($conn->affected_rows > 0) {
                SuccessMsg("DATA HAS BEEN UPDATED");
            } else {
                ErrorMsg("DATA HAS NOT BEEN UPDATED");
            }
        } else {
            ErrorMsg("ERROR IN QUERY  {$update_q}");
        }


        RefreshUrl(2, DASHBOARD);

    }

}



if (isset($_POST["deletes"]) && !empty($_POST["deletes"])) {

    $userID = $_POST["id"];





    $adrs = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$userID}'";
    $adrs_exe = $conn->query($adrs);

    if ($adrs_exe->num_rows > 0) {

        $row_adrs = $adrs_exe->fetch_assoc();

        // $image = json_decode($row_adrs["images"], true);
        if (isset($row_adrs["images"]) && !empty($row_adrs["images"])) {
            # code...
            $old_image = json_decode($row_adrs["images"], true);


            if (file_exists($old_image["rel_path"])) {
                unlink($old_image["rel_path"]);
            }
        }
        // ====================================================================

        $address_delete = "DELETE FROM `" . ADDRESS . "` WHERE `user_id`='{$userID}'";
        $address_delete_exe = $conn->query($address_delete);

    }



    
    $address_delete = "DELETE FROM `" . USER . "` WHERE `user_id`='{$userID}'";
    $address_delete_exe = $conn->query($address_delete);

    if ($address_delete_exe) {
        if ($conn->affected_rows > 0) {
            SuccessMsg("DATA HAS BEEN DELETED");
        }
    }

    RefreshUrl(2,DASHBOARD);

}



//  uploads 
if (isset($_POST["upload"]) && !empty($_POST["upload"])) {


    // pre($_FILES["profile"]);

    // die();
    $ext = ["jpg", "png"];

    $file = File_upload("profile", $ext, "assets/uploads/");

    if ($file == 1) {

        $s = implode(" ", $ext); // array to string 

        $s = strtoupper($s);

        ErrorMsg("{$s}  ONLY ALLOWED");
    }


    if ($file == 7) {
        ErrorMsg("UPLOADING ERROR");
    }




    // pre($file);
// 

    echo json_encode($file);


}


/**
 
one to one 

one to many 

many to many 

many to one



 */
?>

<!-- -=--========================================================= -->


<?php

require_once dirname(__DIR__) . "/layouts/admin/footer.php";


?>