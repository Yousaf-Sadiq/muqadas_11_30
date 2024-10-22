<?php
require_once dirname(__DIR__) . "/app/database.php";
// require_once dirname(__DIR__) . "/include/table.php";
// require_once dirname(__DIR__) . "/include/web.php";

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        #error {
            width: 350px;
            position: fixed;
            top: 10px;
            right: 10px;
            z-index:9999999999999;
        }
    </style>

</head>

<body>

    <?php
    require_once "nav.php";
    ?>

    <div id="error"></div>