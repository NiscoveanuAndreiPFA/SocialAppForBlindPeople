<?php session_start();

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php");

$getUser = $_GET['u'];
$currentUser = $_SESSION["sessusername"];

$queryAdd = mysqli_query($db, "UPDATE users SET favusers = CONCAT(favusers, ',$getUser') WHERE username='$currentUser' ");
header("location:/c4d/top_users/");

?>