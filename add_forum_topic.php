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
                <h1>ADD NEW TOPIC</h1>
            </div>
        </div>



        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            
            <form method="POST" action="/c4d/do_add_forum_topic.php">
                <textarea style="width:100%; height:200px;" name="postmsg"></textarea> 
                <br><br>
                <input type="submit" value="Post" class="signInBtn" />
            </form>

            </div>
        </div>

        

        
    </div>

<?php include("./footer.php"); ?>