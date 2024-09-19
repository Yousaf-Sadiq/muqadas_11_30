<?php
require_once dirname(__FILE__) . "/layouts/admin/header.php";
// echo dirname(__FILE__); // relative url
// echo __FILE__;
// echo __DIR__;

// echo rel_url;

// session_destroy();
if (!isset($_SESSION["user_id"]) && empty($_SESSION["user_name"])) {

        Redirect_url(LOGIN);
}

?>


<div class="container mt-5">
        <!-- <form action="<?php echo INSERTS; ?>" enctype="multipart/form-data" class="p-5 text-bg-dark" method="post">

                <div class="mb-3">
                        <label for="" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="profile" id="" placeholder=""
                                aria-describedby="fileHelpId" />
                        <div id="fileHelpId" class="form-text">Help text</div>
                </div>

                <input type="submit" name="upload">

        </form> -->

        <h1> DASHBOARD</h1>
        <!-- <form action="<?php echo INSERTS; ?>" method="post" class="p-5 text-bg-dark">

                <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="Email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
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
        </form> -->

</div>


<div class="table-responsive mt-3">
        <?php

        $all = "SELECT * FROM `" . USER . "` WHERE `user_id`='{$_SESSION["user_id"]}'";
        $all_exe = $conn->query($all);

        if ($all_exe->num_rows > 0) {
                ?>

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

                                <?php
                                while ($row = $all_exe->fetch_assoc()) {
                                        # code...
                                        // [
                                        //         "user_id"=>3,
                                        //         "user_name"=>"guest"
                                        // ]
                                        // http://localhost/11_30_muqadas/php/project/dashboard.php?id=dksa&name=djskajdls
                                        // url uri
                        
                                        $addr_f = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$row["user_id"]}'";
                                        $addr_f = $conn->query($addr_f);

                                        //  default keys made by me 
                                        $addres_row = [
                                                "images" => domain1 . "assets/default.jpg",
                                                "address" => "none",
                                                "contact_info" => "none"
                                        ];


                                        if ($addr_f->num_rows > 0) {

                                                $adres_r = $addr_f->fetch_assoc();

                                                $image = json_decode($adres_r["images"], true);

                                                // echo $image["abs_path"]."<br>";
                        
                                                $addres_row = [
                                                        "images" => $image["abs_path"],
                                                        "address" => "none",
                                                        "contact_info" => "none"
                                                ];
                                        }

                                        ?>
                                        <!-- http://localhost/11_30_muqadas/php/project/edit.php?id=9 -->
                                        <tr class="">
                                                <td scope="row"><?php echo $row["user_id"]; ?></td>

                                                <td>

                                                        <a href="<?php echo $addres_row["images"] ?>" target="_blank">

                                                                <img src="<?php echo $addres_row["images"] ?>"
                                                                        class="img-responsive img-rounded" width="100" height="100"
                                                                        alt="">

                                                        </a>
                                                </td>
                                                <td><?php echo $row["user_name"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td>
                                                        <a href="<?php echo EDIT ?>?id=<?php echo $row["user_id"]; ?>"
                                                                class="btn btn-sm btn-info">
                                                                EDIT
                                                        </a>



                                                        <a href="javascript:void(0)" class="btn btn-sm btn-danger"
                                                                onclick="OnDelete('<?php echo $row["user_id"]; ?>')">
                                                                DELETE
                                                        </a>

                                                </td>

                                        </tr>

                                <?php } ?>

                        </tbody>
                </table>
        <?php } else { ?>

                <h3> NO RECORD FOUND</h3>

        <?php } ?>
</div>

<!-- login and sign up -->
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
                                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                <form action="<?php echo DELETES ?>" method="post">
                                        <input type="hidden" name="id" id="deletes">
                                        <input type="submit" class="btn btn-success" name="deletes" value="YES">
                                </form>

                        </div>
                </div>
        </div>
</div>


<?php
require_once dirname(__FILE__) . "/layouts/admin/footer.php";
// echo dirname(__FILE__);
?>

<script>

        function OnDelete(id) {
                let MyModal = document.querySelector("#abc");

                let BootstrapMOdal = new bootstrap.Modal(MyModal);

                BootstrapMOdal.show(MyModal);

                let deletes = document.querySelector("#deletes");
                deletes.value = id;

                // console.log(id)
        }
</script>

<!-- 
1st NF => duplication and multi value is not allowed in single cell
2nd NF => primary key is must to make and all secondary field should dependent on it    
3rd NF => remove transitivity 

-->