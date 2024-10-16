<?php
require_once dirname(__FILE__) . "/layout/header.php";

use app\database\DB as DB;
use app\database\helper as help;

$db = new DB();
$help = new help();

// $t = [
//     "email" => "xs2321321adsad",
//     "password" => "xs1234",
//     "ptoken" => "xs1234",
// ];

// $db->update("users",$t,"sdadksa");
// echo $a->inserts("users", $t);
?>



<div class="container-fluid p-5">

    <form class="text-bg-dark p-5" id="insert_form">
        <input type="hidden" name="inserts" value="inserts">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">user name</label>
            <input type="text" class="form-control" name="user_name" id="exampleInputEmail1"
                aria-describedby="emailHelp">

            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="table-responsive container">
    <?php
    $fetch = $db->select(USER, "*");

    if ($fetch) {
        echo "QUERY OK";
        $row = $db->get_result();
        // $help->pre($row);
    }
    ?>
    <table class="table table-dark table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">EMAIL</th>
                <th scope="col">USER NAME</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($row as $key => $value) {
                # code...
            
                ?>
                <tr class="">
                    <td scope="row"><?php echo $count; ?></td>
                    <td><?php echo $value["email"] ?></td>
                    <td><?php echo $value["user_name"] ?></td>
                    <td>
                        <?php
                        $id = $value["user_id"];
                        $email = $value["email"];
                        $user_name = $value["user_name"];
                        $ptoken = base64_decode($value["ptoken"]);

                        ?>
                        <a href="javascript:void(0)"
                            onclick="onEdit('<?php echo $id ?>','<?php echo $email ?>','<?php echo $user_name ?>','<?php echo $ptoken ?>',)"
                            class="btn btn-sm btn-info"> UPDATE</a>
                    </td>
                </tr>
                <?php
                $count++;
            } ?>
        </tbody>
    </table>
</div>



<!-- edit  Modal -->
<div class="modal fade" id="edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- ==================================================== -->

                <form class="text-bg-dark p-5" id="edit_form">
                    <input type="hidden" name="updates" value="update">
                    <input type="hidden" name="user_id" id="userID">
                    <div class="mb-3">
                        <label for="user_name" class="form-label">user name</label>

                        <input type="text" class="form-control" name="user_name" id="user_name"
                            aria-describedby="emailHelp">

                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>



                <!-- ==================================================== -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<?php
require_once dirname(__FILE__) . "/layout/footer.php";


?>

<script>

    //==========================insert start======
    let insert_form = document.querySelector("#insert_form");


    insert_form.addEventListener("submit", async function (e) {
        e.preventDefault();

        let Formdata = new FormData(insert_form)
        let url = "<?php echo insert_form; ?>";

        let option = {
            method: "POST",
            body: Formdata
        }


        let data = await fetch(url, option);

        let res = await data.json();

        if (res.error > 0) {

            for (const key in res.msg) {
                alertMsg(res.msg[key], "danger", "error")
            }
        } else {

            alertMsg(res.msg, "success", "error")

            insert_form.reset()

        }

    })

    //==========================insert end ======



    // -----------------------EDIT START ------------------------------

    function onEdit(id, Email, userName, pswd) {
    // ======================= edit modal show ============================= 
        let editModal = document.querySelector("#edit_modal");
        const myModal = new bootstrap.Modal(editModal);

        myModal.show(editModal);


        // ================== data printing ======================================
        let userID = document.querySelector("#userID");
        userID.value = id;

        let user_name = document.querySelector("#user_name");
        user_name.value = userName;

        let email = document.querySelector("#email");
        email.value = Email;

        let password = document.querySelector("#password");
        password.value = pswd;



    }


    let edit_form = document.querySelector("#edit_form");

    edit_form.addEventListener("submit", async (e) => {
        e.preventDefault();

        let formData = new FormData(edit_form);
        let url = "<?php echo Edit_form ?>";

        let option = {
            method: "POST",
            body: formData
        }


        let data = await fetch(url, option);

        let res = await data.json();

        if (res.error > 0) {

            for (const key in res.msg) {
                alertMsg(res.msg[key], "danger", "error")
            }
        } else {

            alertMsg(res.msg, "success", "error")

            // insert_form.reset()
            setTimeout(() => {
                location.reload()
            }, 1000);

        }
    })
</script>