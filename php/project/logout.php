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


session_destroy();

SuccessMsg("LOGOUT SUCCESSFULL");

RefreshUrl(2, LOGIN);


?>





<?php
require_once dirname(__FILE__) . "/layouts/admin/footer.php";
// echo dirname(__FILE__);
?>


<!-- 
1st NF => duplication and multi value is not allowed in single cell
2nd NF => primary key is must to make and all secondary field should dependent on it    
3rd NF => remove transitivity 

-->