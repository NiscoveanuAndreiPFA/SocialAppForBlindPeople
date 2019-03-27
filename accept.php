<?php session_start();

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php");

$getInfo = explode("-", $_GET['info']);
$setChosenUser = $getInfo[1];
$setEventId = $getInfo[0];

$queryAccept = mysqli_query($db, "UPDATE event SET isDone='1', chosen='$setChosenUser' WHERE eventid='$setEventId' ");

if($queryAccept)
{
    header("location:/c4d/event/".$setEventId);
}else{
    die("Can't mark as done.");
}

?>