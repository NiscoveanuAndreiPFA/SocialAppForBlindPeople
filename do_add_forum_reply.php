<?php session_start();

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php");

$getMessage = $_POST['postmsg'];
$getPostId = $_GET['i'];

if($getMessage != "")
{
    $setMessage = $_SESSION["sessusername"]."][".date('d-m-Y H:i:s')."][".$getMessage.",,,";

    $queryAdd = mysqli_query($db, "UPDATE forum SET forumlog=CONCAT(forumlog, '$setMessage') WHERE id='$getPostId' ");

    if($queryAdd)
    {
        //ok
        header("location: /c4d/view_forum/".$getPostId);
    }else{
            header("location: /c4d/view_forum/".$getPostId);
         }

}else{
        header("location: /c4d/view_forum/".$getPostId);
     }


?>