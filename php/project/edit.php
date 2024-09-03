<?php
require_once dirname(__FILE__) . "/layouts/admin/header.php";
// echo dirname(__FILE__); // relative url
// echo __FILE__;
// echo __DIR__;
// http://localhost/11_30_muqadas/php/project/edit.php?id=9&name=dsads
$id = filterData($_GET["id"]);

$edit_chk = "SELECT * FROM `" . USER . "` WHERE `user_id`='{$id}'";

$edit_chk_result = $conn->query($edit_chk);

if ($edit_chk_result->num_rows > 0) {

    $row_edit = $edit_chk_result->fetch_assoc();

} else {

    Redirect_url(DASHBOARD);
}


?>
<!-- http://localhost/11_30_muqadas/php/project/edit.php?id=11 -->

<div class="container mt-5">
    <h1> DASHBOARD EDIT </h1>
    <form action="<?php echo UPDATES; ?>" method="post" class="p-5 text-bg-dark">
        <input type="hidden" value="<?php echo $row_edit["user_id"] ?>" name="_token">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">USER NAME</label>
            <input type="text" value="<?php echo $row_edit["user_name"] ?>" name="userName" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" value="<?php echo $row_edit["email"] ?>" name="Email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="text" value="<?php echo base64_decode($row_edit["ptoken"]) ?>" name="pswd"
                class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>


        <input type="submit" value="UPDATE" name="updates" class="btn btn-primary">
    </form>

</div>




<?php
require_once dirname(__FILE__) . "/layouts/admin/footer.php";
// echo dirname(__FILE__);
?>