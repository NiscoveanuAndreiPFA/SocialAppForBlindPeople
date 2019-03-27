<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php"); 

$createdBy = $_SESSION["sessusername"];

$deadline = $_POST['date'];
$time = $_POST['time'];
$title = $_POST['title'];
$details = $_POST['details'];
$minPeople = $_POST['minPeople'];
$visivleTo = $_POST['visivleTo'];
$repeat = $_POST['repeat'];
$eventType = $_POST['eventType'];
$address = $_POST["address"];

$deadlineTemp = $deadline.' '.$time;

$eventidTemp = rand(111111111111111, 999999999999999);
$createdOn = date("Y-m-d h:i:s");

$queryAdd = mysqli_query($db, "INSERT INTO event (locationv, eventid, createdBy, deadline, title, details, minPeople, createdOn, visibleTo, repeats, eventType) values ('$address', '$eventidTemp', '$createdBy', '$deadlineTemp', '$title', '$details', '$minPeople', '$createdOn', '$visivleTo', '$repeat', '$eventType')");

if($queryAdd)
{
    header("location:/c4d/events/".$eventType);
}

?>