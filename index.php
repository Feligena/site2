<?php
    session_start();
    include_once("pages/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
    <div class="conteiner">
        <div class="row">
            <header class="col-sm-12 col-md-12 col-lg-12">
                <?php include_once("pages/login.php");?>
            </header>
        </div>

        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
                <?php 
                    include_once('pages/menu.php'); 
                    include_once('pages/functions.php');
                ?>
            </nav>
        </div>

        <div class="row">
            <section class="col-sm-12 col-md-12 col-lg-12">
                <?php
                    if(isset($_GET['page']))
                    {
                        $page = $_GET['page'];
                        
                        if($page == 1)include_once('pages/tours.php');
                        if($page == 2)include_once('pages/comments.php');
                        if($page == 3)include_once('pages/registration.php');
                        if($page == 4)include_once('pages/admin.php');
                        if($page == 6 && isset($_SESSION['radmin']))include_once("pages/private.php");
                    }
                ?>
            </section>
        </div>
        <hr>
        <div class="row">
            <footer>Step Academy &copy;</footer>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>