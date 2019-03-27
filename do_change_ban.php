<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php");

$id = str_replace("chk", "", $_GET['id']);
$st = $_GET['st'];

//$db -> query("UPDATE users SET active = $st WHERE id = $id");

$queryUpdate = mysqli_query($db, "UPDATE users SET active = '$st' WHERE id = '$id' ");

if($queryUpdate) {
    echo '1';
} else {
    echo '0';
}


?>