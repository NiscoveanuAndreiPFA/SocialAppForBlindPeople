<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php"); 

$setUser = $_SESSION["sessusername"];

?>
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingRightLeftZero'>
            <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/menu';" class='backToMenuBtn'>Back to menu</button>
        </div>
    </div>
    
    <div class='container'>
        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <h1>NOTIFICATIONS</h1>
            </div>
        </div>



        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <?php
                    $queryForumTopics = mysqli_query($db, "SELECT * FROM chat WHERE destination='$setUser' ORDER BY id DESC");
                    while($db_field = mysqli_fetch_assoc($queryForumTopics))
                    {
                        $getContent = explode(",,,", $db_field["chatlog"]);
                        $explodeMore = explode("][", $getContent[0]);
                        echo "<a href='/c4d/chat.php?s=".$db_field['source']."&d=".$setUser."' ><div class='forumtopic'><h3>".$explodeMore[0]."</h3><i style='color:#999;'>".$explodeMore[1]."</i><br>".substr($explodeMore[2], 0, 100)."</div></a>";
                    }
                ?>
            </div>
        </div>


        
    </div>

<?php include("./footer.php"); ?>