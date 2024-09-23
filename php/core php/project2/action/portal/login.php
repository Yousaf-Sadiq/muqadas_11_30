<?php

require_once dirname(__DIR__) . "/../layouts/header.php";
?>

<!-- ======================================================= -->
<?php


if (isset($_POST["login"]) && !empty($_POST["login"])) {

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

        
        $check_exe = $conn->query($insert_q);

        if ($check_exe->num_rows > 0) {

            $data = $check_exe->fetch_assoc();
            $id = $data['id'];

            $_SESSION['id'] = $id;
           
           
            SuccessMsg("LOGIN SUCCESSFULL");
           
            RefreshUrl(2, DASHBOARD);


        } else {
            ErrorMsg("INVALID CREDENTIAL");
            RefreshUrl(2, LOGIN);
        }


    }

}

?>

<!-- -=--========================================================= -->


<?php

require_once dirname(__DIR__) . "/../layouts/footer.php";


?>
