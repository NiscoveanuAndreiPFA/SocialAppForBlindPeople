<!DOCTYPE html>
<?php
//connect to database
include("./conn.php");
?>
<head>
    <title>C4D 2.0 App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 

    if($_SERVER["PHP_SELF"] == "/c4d/menu.php")
    {
        echo "<script src='".PATH."script/jquery-1.10.1.min.js'></script>";
    }else{
            echo "<script src='".PATH."script/jquery-3.3.1.min.js'></script>";
         }
    ?>

    <script src="<?php echo PATH ?>script/bootstrap.bundle.min.js"></script>
    <script src="<?php echo PATH ?>script/jquery.mobile-1.4.2.min.js"></script>
    <script src="<?php echo PATH ?>script/app.js"></script>

    <link rel="stylesheet" href="<?php echo PATH ?>style/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo PATH ?>style/app.css" >
</head>
<body>
<div class='container-fluid'>

