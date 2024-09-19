<?php
require_once dirname(__DIR__) . "/layouts/admin/header.php";



if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {

    
    Redirect_url(DASHBOARD);
}
?>


<div class="container mt-5">


    <h1> SIGN UP</h1>
    <form action="<?php echo signup; ?>" method="post" class="p-5 text-bg-dark">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pswd" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>


        <input type="submit" value="INSERT" name="signup" class="btn btn-primary">
    </form>

</div>




<?php
require_once dirname(__DIR__) . "/layouts/admin/footer.php";
// echo dirname(__FILE__);
?>


<!-- 
1st NF => duplication and multi value is not allowed in single cell
2nd NF => primary key is must to make and all secondary field should dependent on it    
3rd NF => remove transitivity 

-->