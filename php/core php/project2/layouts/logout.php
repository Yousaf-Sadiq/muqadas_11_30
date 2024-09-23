<?php
require_once dirname(__FILE__) . "/layouts/header.php";
if (!isset($_SESSION["id"]) && empty($_SESSION["username"])) {

    Redirect_url(LOGIN);
}


session_destroy();

SuccessMsg("LOGOUT SUCCESSFULL");

RefreshUrl(2, LOGIN);


?>





<?php
require_once dirname(__FILE__) . "/layouts/footer.php";

?>
