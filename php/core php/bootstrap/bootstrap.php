<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Bites</title>
    <link rel="stylesheet" href="./bootstrap.css">
    <style>
        .background-image {
            height: 100vh;
            background-image: url('./purple-sky-palm-trees-lake.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .navbar2 {
           
            background-color: #660066; /* deep plum color */
        }
        .navbar-nav .nav-link {
            color: #fff; /* white color */
            font-size: 18px;
            font-weight: bold;
        }
        .navbar-brand {
            color: #fff; /* white color */
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-text {
            color: #fff; /* white color */
        }
        .dropdown-menu {
            background-color: #660066; /* deep plum color */
        }
        .dropdown-item {
            color: #fff; /* white color */
        }
        .nav-pills .nav-link {
            color: #fff; /* white color */
        }
        .btn-outline-success {
            color: #fff; /* white color */
            border-color: #fff; /* white color */
        }
        

    </style>
</head>
<body>
    <div class="background-image">
        <nav
            class="navbar navbar2 navbar-expand-md  "
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
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page"
                                >Home
                                <span class="visually-hidden">(current)</span></a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="dropdownId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Dropdown</a
                            >
                            <div
                                class="dropdown-menu"
                                aria-labelledby="dropdownId"
                            >
                                <a class="dropdown-item" href="#"
                                    >Action 1</a
                                >
                                <a class="dropdown-item" href="#"
                                    >Action 2</a
                                >
                            </div>
                        </li>
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
        
        <!-- <nav class="navbar navbar2 navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Tasty Bites</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Menu</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Breakfast</a></li>
                            <li><a class="dropdown-item" href="#">Lunch</a></li>
                            <li><a class="dropdown-item" href="#">Dinner</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Desserts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav> -->
    </div>
    
    <script src="./bootstrap.bundle.js"></script>
</body>
</html>


