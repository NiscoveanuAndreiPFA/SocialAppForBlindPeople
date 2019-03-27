<?php session_start();

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php");

$getMessage = $_POST['postmsg'];
//$getPostId = $_GET['i'];
$getSource = $_GET['s'];
$getDest = $_GET['d'];

if($getMessage != "")
{
    $setMessage = $_SESSION["sessusername"]."][".date('d-m-Y H:i:s')."][".$getMessage.",,,";

    $queryAdd = mysqli_query($db, "UPDATE chat SET chatlog=CONCAT(chatlog, '$setMessage') WHERE source='$getSource' AND destination='$getDest' ");

    if($queryAdd)
    {
        //ok
        header("location: /c4d/chat.php?s=".$getSource."&d=".$getDest);
    }else{
            die("Can't post in chat. Try again later.");
         }

}else{
        header("location: /c4d/events/0");
     }


?>