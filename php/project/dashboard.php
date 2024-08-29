<?php
require_once dirname(__FILE__) . "/layouts/admin/header.php";
// echo dirname(__FILE__); // relative url
// echo __FILE__;
// echo __DIR__;
?>


<div class="container mt-5">

        <form action="<?php echo INSERTS; ?>" method="post" class="p-5 text-bg-dark">

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
        </form>

</div>


<div class="table-responsive mt-3">
        <?php

        $all = "SELECT * FROM `" . USER . "`";
        $all_exe = $conn->query($all);

        if ($all_exe->num_rows > 0) {
                ?>

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

                                <?php
                                while ($row = $all_exe->fetch_assoc()) {
                                        # code...
                                        // [
                                        //         "user_id"=>3,
                                        //         "user_name"=>"guest"
                                        // ]
                        
                                        ?>
                                        <tr class="">
                                                <td scope="row"><?php echo $row["user_id"]; ?></td>
                                                <td><?php echo $row["user_name"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                        </tr>

                                <?php } ?>

                        </tbody>
                </table>
        <?php } 
        else { ?>

                <h3> NO RECORD FOUND</h3>

        <?php } ?>
</div>



<?php
require_once dirname(__FILE__) . "/layouts/admin/footer.php";
// echo dirname(__FILE__);
?>