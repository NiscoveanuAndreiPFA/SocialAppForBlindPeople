<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php"); 

include("./conn.php");

$getSource = $_GET['s'];
//$getSource = $_SESSION["sessusername"];
$getDest = $_GET['d'];

//first check if this chat exists
$queryCheck = mysqli_query($db, "SELECT id FROM chat WHERE source='$getSource' AND destination='$getDest' ");
$db_fieldCheck = mysqli_fetch_assoc($queryCheck);

if($db_fieldCheck['id'] != "")
{
    //chat exists, show it


}else{
        //chat doesn't exist, create it
        $queryCreate = mysqli_query($db, "INSERT INTO chat (source, destination) VALUES ('$getSource', '$getDest')");
        if($queryCreate){header("location:/c4d/chat/".$getDest);}else{die("Could not create chat.");}

     }

?>

<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingRightLeftZero'>
        <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/events/0';" class='backToMenuBtn'>Back to events</button>
    </div>
</div>
    
<div class='container'>
    
    <div class='row margin5050Suta'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <h1>CHAT with <?php echo $getDest; ?></h1>
                </div>
    </div>
   


    <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <?php
                    
                    $queryForumTopics = mysqli_query($db, "SELECT * FROM chat WHERE source='$getSource' AND destination='$getDest' ");
                    $db_field = mysqli_fetch_assoc($queryForumTopics);
                    
                        $getContent = explode(",,,", $db_field["chatlog"]);

                        foreach($getContent as $k => $v)
                        {
                            if($v != "")
                            {
                            $explodeMore = explode("][", $v);

                            echo "<div class='forumreply'><h3>".$explodeMore[0]."</h3><i style='color:#999;'>".$explodeMore[1]."</i><br>".substr($explodeMore[2], 0, 100)."</div>";
                            }
                        }

 
                    
                ?>

            <form method="POST" action="/c4d/do_add_chat_reply.php?s=<?php echo $getSource; ?>&d=<?php echo $getDest; ?>">
                <textarea style="width:100%; height:200px;" name="postmsg"></textarea> 
                <br><br>
                <input type="submit" value="Reply" class="signInBtn" />
            </form>


            </div>
        </div>






</div>

<?php include("./footer.php"); ?>