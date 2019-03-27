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
            <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/menu';" class='backToMenuBtn'>Back to menu</button>
        </div>
    </div>
    <div class='row margin5050Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <h1>SETTINGS</h1>
        </div>
    </div>
 

<?php include("./footer.php"); ?>