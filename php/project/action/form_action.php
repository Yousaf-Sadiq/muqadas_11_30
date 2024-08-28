<?php

require_once dirname(__DIR__) . "/layouts/admin/header.php";

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

        RefreshUrl(2,DASHBOARD);
    }

}

?>

<!-- -=--========================================================= -->


<?php

require_once dirname(__DIR__) . "/layouts/admin/footer.php";


?>