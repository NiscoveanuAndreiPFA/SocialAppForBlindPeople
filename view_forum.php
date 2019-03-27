<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php"); 


?>
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingRightLeftZero'>
            <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/forum';" class='backToMenuBtn'>< Back to forum</button>
        </div>
    </div>
    
    <div class='container'>
        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <h1>VIEWING TOPIC #<?php echo $_GET['i']; ?></h1>
            </div>
        </div>



        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <?php
                    $getID = $_GET['i'];
                    $queryForumTopics = mysqli_query($db, "SELECT * FROM forum WHERE id='$getID' ");
                    $db_field = mysqli_fetch_assoc($queryForumTopics);
                    
                        $getContent = explode(",,,", $db_field["forumlog"]);

                        foreach($getContent as $k => $v)
                        {
                            if($v != "")
                            {
                            $explodeMore = explode("][", $v);

                            echo "<div class='forumreply'><h3>".$explodeMore[0]."</h3><i style='color:#999;'>".$explodeMore[1]."</i><br>".substr($explodeMore[2], 0, 100)."</div>";
                            }
                        }

 
                    
                ?>

            <form method="POST" action="/c4d/do_add_forum_reply.php?i=<?php echo $getID; ?>">
                <textarea style="width:100%; height:200px;" name="postmsg"></textarea> 
                <br><br>
                <input type="submit" value="Reply" class="signInBtn" />
            </form>


            </div>
        </div>


        
        
    </div>

<?php include("./footer.php"); ?>