<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

     include("./header.php"); 
include("./conn.php"); 

$createdBy = $_SESSION["sessusername"];

$getUser = $_GET['u'];

?>

<div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingRightLeftZero'>
            <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/menu';" class='backToMenuBtn'>Back to menu</button>
        </div>
    </div>
    
    <div class='container'>
        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <h1>RATE USER</h1>
            </div>
        </div>
    </div>


    <div class='container'>
        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                Click on a star to give a rating between 1 to 5 to <?php echo strtoupper($getUser); ?>.<br><br>
                <img src="/c4d/upload/ratingStar.png" alt="1 star" title="1 star" style="width:40px; height:40px;" onClick="giveRating('<?php echo $getUser; ?>', '1');" />
                <img src="/c4d/upload/ratingStar.png" alt="2 stars" title="2 stars" style="width:40px; height:40px;" onClick="giveRating('<?php echo $getUser; ?>', '2');" />
                <img src="/c4d/upload/ratingStar.png" alt="3 stars" title="3 stars" style="width:40px; height:40px;" onClick="giveRating('<?php echo $getUser; ?>', '3');" />
                <img src="/c4d/upload/ratingStar.png" alt="4 stars" title="4 stars" style="width:40px; height:40px;" onClick="giveRating('<?php echo $getUser; ?>', '4');" />
                <img src="/c4d/upload/ratingStar.png" alt="5 stars" title="5 stars" style="width:40px; height:40px;" onClick="giveRating('<?php echo $getUser; ?>', '5');" />
            </div>
        </div>
    </div>



<?php include("./footer.php"); ?>

