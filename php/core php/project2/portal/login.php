<?php
require_once dirname(__DIR__) . "/layouts/header.php";
if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
 Redirect_url(DASHBOARD);
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
    padding: 5px;
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
    background-color: #7a288a;
    color: #fff;
    padding: 10px 20px;
    font-size: 18px;
    font-family: Arial, sans-serif;
    border: none;
    border-radius: 5px;
    margin-bottom: 5px;
 }
 .form-container { 
    background-color: #8bc34a;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; 
   
}
</style>

<div class="container mt-5">
<!-- Control panel heading -->
  <h1>LOGIN</h1>

  <!-- Email form -->
  <div class="form-container">
    <form action="<?php echo login; ?>" method="post" class="p-5">
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
      <input type="submit" value="INSERT" name="login" class="btn btn-primary">
    </form>
  </div>
    
<?php
require_once dirname(__DIR__) . "/layouts/footer.php";?>

