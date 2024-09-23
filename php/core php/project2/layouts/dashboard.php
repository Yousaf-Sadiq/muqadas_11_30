<?php
require_once dirname(__DIR__) . "/layouts/header.php";
if (!isset($_SESSION["id"]) && empty($_SESSION["username"])) {

  Redirect_url(LOGIN);
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
    <?php $all = "SELECT * FROM `" . USER ."` WHERE `id`='{$_SESSION["id"]}'";
     $all_exe = $conn->query($all); if ($all_exe->num_rows > 0) { ?>
    <table class="table table-dark table-hover text-center text-bg-dark table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">IMAGE</th>
          <th scope="col">USER NAME</th>
          <th scope="col">EMAIL</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $all_exe->fetch_assoc()) { 
          $addr_f = "SELECT * FROM `" . ADDRESS . "` WHERE `id`='{$row["id"]}'";
          $addr_f = $conn->query($addr_f);
          $addres_row = [
            "images" => domain1 . "includes/default.jpg",
            "address" => "none",
            "contact_info" => "none"
    ];


    if ($addr_f->num_rows > 0) {

            $adres_r = $addr_f->fetch_assoc();

            $image = json_decode($adres_r["images"], true);
         $addres_row = [
                    "images" => $image["abs_path"],
                    "address" => "none",
                    "contact_info" => "none"
            ];
    }
    ?>
    <tr class="">
            <td scope="row"><?php echo $row["id"]; ?></td>
            <td>
              <a href="<?php echo $addres_row["images"] ?>" target="_blank">
                <img src="<?php echo $addres_row["images"] ?>"
                 class="img-responsive img-rounded" width="100" height="100"alt="">
             </a>
             </td>
        <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td>
            <a href="enroll.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-info"> ENROLL </a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger"
            onclick="OnDelete('<?php echo $row["id"]; ?>')"> DELETE </a>
        </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php } else { ?>
    <h3> NO RECORD FOUND</h3>
    <?php } ?>
    </div>
<!-- Modal -->
<div class="modal fade" id="abc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <h1> ARE YOU SURE <span class="text-danger">!</span></h1>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                                <!-- <button type> -->
                                <form action="<?php echo DELETES ?>" method="post">
                                        <input type="hidden" name="id" id="deletes">
                                        <input type="submit" class="btn btn-success" name="deletes" value="YES">
                                </form>

                        </div>
                </div>
        </div>
</div>


<?php
require_once dirname(__FILE__) . "/footer.php";?>

<script>

        function OnDelete(id) {
                let MyModal = document.querySelector("#abc");

                let BootstrapMOdal = new bootstrap.Modal(MyModal);

                BootstrapMOdal.show(MyModal);

                let deletes = document.querySelector("#deletes");
                deletes.value = id;}
</script>