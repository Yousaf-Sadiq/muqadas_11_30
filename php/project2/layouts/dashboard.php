
<?php
require_once dirname(__DIR__) . "/layouts/header.php";
echo rel_url;
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
  <!-- Choose file form -->
  <div class="form-container">
    <form action="<?php echo INSERTS; ?>" enctype="multipart/form-data" method="post" class="p-5">
      <div class="mb-3">
        <label for="" class="form-label">Choose file</label>
        <input type="file" class="form-control" name="profile" id="" placeholder="" aria-describedby="fileHelpId" />
        <div id="fileHelpId" class="form-text">Help text</div>
      </div>
      <input type="submit" name="PUBLISH" class="btn btn-primary">
    </form>
  </div>

  <!-- Control panel heading -->
  <h1>CONTROL_PANEL</h1>

  <!-- Email form -->
  <div class="form-container">
    <form action="<?php echo INSERTS; ?>" method="post" class="p-5">
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
      <input type="submit" value="INSERT" name="inserts" class="btn btn-primary">
    </form>
  </div>

  <!-- Table -->
  <div class="table-responsive mt-3">
    <?php $all = "SELECT * FROM `" . USER . "`"; $all_exe = $conn->query($all); if ($all_exe->num_rows > 0) { ?>
    <table class="table table-dark table-hover text-center text-bg-dark table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">USER NAME</th>
          <th scope="col">EMAIL</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $all_exe->fetch_assoc()) { ?>
        <tr class="">
          <td scope="row"><?php echo $row["id"]; ?></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td>
            <a href="enroll.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info"> ENROLL </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } else { ?>
    <h3> NO RECORD FOUND</h3>
    <?php } ?>
  </div>
</div>


