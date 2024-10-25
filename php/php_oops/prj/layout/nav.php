<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">


                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo DASHBOARD ?>" aria-current="page">DASHBOARD
                        <span class="visually-hidden">(current)</span></a>
                </li>

                <?php
                if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
                    # code...
                

                    ?>


                    <li class="nav-item">


                        <a class="nav-link" id="logout" href="javascript:void(0)">LOGOUT</a>

                    </li>
                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo lOGIN ?>">LOGIN</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo signUp ?>">SIGNUP</a>
                    </li>

                <?php } ?>



            </ul>
            <form class="d-flex my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Search" />
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    Search
                </button>
            </form>
        </div>
    </div>
</nav>