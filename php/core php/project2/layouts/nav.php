<nav
    class="navbar navbar-expand-md navbar-dark bg-dark"
>
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <style>
                    .active {
                        background-color: #4CAF50;

                    }
                </style>

                <li class="nav-item">
                <?php
               $activeDashbord = (GetFileURLNAME($_SERVER["PHP_SELF"]) == "dashboard.php") ? "active" : "";
               ?>


               <a class="nav-link  <?php echo $activeDashbord ?>" href="<?php echo DASHBOARD; ?>"
                   aria-current="page">Home
                   <span class="visually-hidden">(current)</span></a>
           </li>
           <?php
                
                $activeDashbord = (GetFileURLNAME($_SERVER["PHP_SELF"]) == "login.php") ? "active" : "";
                ?>
          <?php

         if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {


          ?>
    <li class="nav-item">
                        <a class="nav-link" href="<?php echo LOGIN; ?>">LOGIN</a>

                    </li>
                    <?php
                
                $activeDashbord = (GetFileURLNAME($_SERVER["PHP_SELF"]) == "signup.php") ? "active" : "";
                    ?>

                
                    <li class="nav-item">
                     <a class="nav-link" href="<?php echo SIGNUP; ?>">SIGNUP</a>
                    </li>
                    <?php } else { ?>

<li class="nav-item">
    <a class="nav-link" href="<?php echo LOGOUT; ?>">LOGOUT</a>

</li>      

<?php } ?>
                
            </ul>
            <form class="d-flex my-2 my-lg-0">
                <input
                    class="form-control me-sm-2"
                    type="text"
                    placeholder="Search"
                />
                <button
                    class="btn btn-outline-success my-2 my-sm-0"
                    type="submit"
                >
                    Search
                </button>
            </form>
        </div>
    </div>
</nav>
