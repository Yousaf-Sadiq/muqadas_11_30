<?php
require_once dirname(__FILE__) . "/layout/header.php";

use app\database\DB as DB;
use app\database\helper as help;

$db = new DB();
$help = new help();


if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
    header("Location:" . DASHBOARD);
}



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
        <input type="hidden" name="LOGIN" value="inserts">

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

<?php
require_once dirname(__FILE__) . "/layout/footer.php";


?>

<script>
    //  show image preview on selection 

    // ----------------------------------------------------------

    //==========================insert start======
    let insert_form = document.querySelector("#insert_form");


    insert_form.addEventListener("submit", async function (e) {
        e.preventDefault();

        let Formdata = new FormData(insert_form)
        let url = "<?php echo login_form; ?>";

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

            setTimeout(() => {
                location.href = "<?php echo DASHBOARD ?>";
            }, 1000);

        }

    })

    //==========================insert end ======



</script>