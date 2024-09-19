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
if (isset($_POST["login"]) && !empty($_POST["login"])) {

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






    if ($status["error"] > 0) {

        foreach ($status['msg'] as $key => $value) {
            ErrorMsg($value);
        }

        RefreshUrl(2, DASHBOARD);
    } else {

        // http://localhost/11_30_muqadas/php/project/edit.php?id=14
        $H_password = password_hash($pswd, PASSWORD_BCRYPT);

        $encrpt = base64_encode($pswd);


        $check = "SELECT * FROM `" . USER . "` WHERE `email` = '{$email}' AND  `ptoken`='{$encrpt}'";
        $check_exe = $conn->query($check);

        if ($check_exe->num_rows > 0) {

            $data = $check_exe->fetch_assoc();
            $id = $data['user_id'];

            $_SESSION['user_id'] = $id;
           
           
            SuccessMsg("LOGIN SUCCESSFULL");
           
            RefreshUrl(2, DASHBOARD);


        } else {
            ErrorMsg("INVALID CREDENTIAL");
            RefreshUrl(2, LOGIN);
        }


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