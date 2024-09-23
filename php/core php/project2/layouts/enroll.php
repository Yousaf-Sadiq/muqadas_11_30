<?php
require_once dirname(__DIR__) . "/layouts/header.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    Redirect_url(DASHBOARD);
}


$id = filterData($_GET["id"]);

$edit_chk = "SELECT * FROM `" . USER . "` WHERE `id`='{$id}'";

$edit_chk_result = $conn->query($edit_chk);

if ($edit_chk_result->num_rows > 0) {

    $row_edit = $edit_chk_result->fetch_assoc();

} else { Redirect_url(DASHBOARD);
}


?>
<style>

   .navbar {
    background-color: #7a288a !important;
    color: white;
}
.form-control {
    border: 1px solid #8bc34a;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    font-family: Arial, sans-serif;
    
}

.form-label {
        font-weight: bold;
        font-size: 18px;
        font-family: Arial, sans-serif;
        color: BLACK;
    }
    .btn-primary {
        background-color:#7a288a;
        color: #fff;
        padding: 10px 20px;
        font-size: 18px;
        font-family: Arial, sans-serif;
        border: none;
        border-radius: 5px;
    }
    .form-container { 
    background-color: #8bc34a; /* Purple color */ 
    padding: 20px; 
    border-radius: 5px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
}
</style>

<div class="container mt-5">
<h1>  CONTROL_PANEL EDIT</h1>
    <div class="form-container">
        <form action="<?php echo SAVE_CHANGES; ?> " enctype="multipart/form-data"method="post" class="p-5">
        <input type="hidden" value="<?php echo $row_edit["id"] ?>" name="id">

        <div class="mb-3">
    <label for="username" class="form-label">USER NAME</label>
    <input type="text" value="<?php echo $row_edit["username"] ?>" name="username" class="form-control" id="username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your UserName with anyone else.</div>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" value="<?php echo $row_edit["email"] ?>" name="Email" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>


        <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" value="<?php echo base64_decode($row_edit["password"]) ?>" name="pswd" class="form-control" id="exampleInputPassword1">
</div>

<div class="mb-3">
            <label for="" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="profile" id="" placeholder="" aria-describedby="fileHelpId" />
            <div id="fileHelpId" class="form-text">Help text</div>
        </div>



        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>


        <input type="submit" value="SAVE_CHANGES" name="SAVE_CHANGES" class="btn btn-primary">
    </form>
</div>




<?php
require_once dirname(__FILE__) . "/footer.php"



?>
