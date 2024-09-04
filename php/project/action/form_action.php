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






    if ($status["error"] > 0) {

        foreach ($status['msg'] as $key => $value) {
            ErrorMsg($value);
        }

        RefreshUrl(2, DASHBOARD);
    } else {

        $H_password = password_hash($pswd, PASSWORD_BCRYPT);

        $encrpt = base64_encode($pswd);

        $update_q = "UPDATE `" . USER . "` SET 
        `user_name`='{$userName}' , `email`='{$email}', 
        `password`='{$H_password}', `ptoken`='{$encrpt}'  
        
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



//  uploads 


if (isset($_POST["upload"]) && !empty($_POST["upload"])) {


    $file = $_FILES["profile"];

    // pre($file);
//   abc.jpg

    $file_name = rand(1, 88) . "_" . $file["name"];

    $tmp_name = $file["tmp_name"];

    $dest = rel_url . "assets/uploads/" . $file_name;

    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);


    $file_ext = strtolower($file_ext); // png



    $ext = ["jpg","png"];

    //            T 
    if (!in_array($file_ext, $ext)) {

        echo "FILE EXTENTION INVALID";

        return;
    }



    if (move_uploaded_file($tmp_name, $dest)) {
        echo "UPLOADED";
    } else {
        echo "NOT UPLOADED";
    }

// relative path => upload and delete
// abs path => fetch or show/display 

}

?>

<!-- -=--========================================================= -->


<?php

require_once dirname(__DIR__) . "/layouts/admin/footer.php";


?>