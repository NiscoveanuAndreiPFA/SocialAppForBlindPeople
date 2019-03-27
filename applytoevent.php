<?php session_start();

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php");

$getEventId = $_GET["i"];
$setUserNow = $_SESSION["sessusername"];

$queryApply = mysqli_query($db, "UPDATE event SET applied = CONCAT(applied, ',$setUserNow') WHERE eventid='$getEventId' ");

header("location: /c4d/event/".$getEventId);

?>