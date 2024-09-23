<?php

require_once dirname(__DIR__) . "/../layouts/admin/header.php";

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
if (isset($_POST["signup"]) && !empty($_POST["signup"])) {

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

        // http://localhost/11_30_muqadas/php/project/edit.php?id=14
        $H_password = password_hash($pswd, PASSWORD_BCRYPT);

        $encrpt = base64_encode($pswd);

        $insert_q = "INSERT INTO `" . USER . "`(`email`, `password`, `ptoken`)
        VALUES ('{$email}','{$H_password}','{$encrpt}')";

        $insert_exe = $conn->query($insert_q);

        if ($insert_exe) {

            if ($conn->affected_rows > 0) {
                SuccessMsg("DATA HAS BEEN INSERTED");

                $_SESSION["user_id"] = $conn->insert_id;

            } else {
                ErrorMsg("DATA HAS NOT BEEN INSERTED");
            }
        } else {
            ErrorMsg("ERROR IN QUERY  {$insert_q}");
        }


        RefreshUrl(2, DASHBOARD);

    }

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

require_once dirname(__DIR__) . "/../layouts/admin/footer.php";


?>