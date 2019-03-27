<?php session_start();

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php");

$getUser = $_GET['u'];
$getRating = $_GET['r'];

$newRating = 0;
$queryGetCurr = mysqli_query($db, "SELECT rating FROM users WHERE username='$getUser' ");
$db_field = mysqli_fetch_assoc($queryGetCurr);
$newRating = ($db_field['rating']+$getRating)/2;
$newRating = round($newRating, 0);
if($newRating > 5){$newRating = 5;}


$queryUpdate = mysqli_query($db, "UPDATE users SET rating='$newRating' WHERE username='$getUser' ");
header("location:/c4d/top_users/");

?>