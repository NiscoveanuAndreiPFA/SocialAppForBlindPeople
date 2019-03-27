<?php session_start();

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./conn.php");

$getMessage = $_POST['postmsg'];

if($getMessage != "")
{
    $setMessage = $_SESSION["sessusername"]."][".date('d-m-Y H:i:s')."][".$getMessage.",,,";
    $queryAdd = mysqli_query($db, "INSERT INTO forum (forumlog) VALUES ('$setMessage') ");

    if($queryAdd)
    {
        //ok
        header("location: /c4d/forum/");
    }else{
            header("location: /c4d/add_forum_topic/");
         }

}else{
        header("location: /c4d/add_forum_topic/");
     }


?>