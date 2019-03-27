<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php"); ?>
<div class='container'>
    <?php /*
    <div class='row margin5050Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <h2>C4D AMAis APP</h2>
        </div>
    </div>
*/ ?>
    <div class='row margin5050Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <div id="niceTextMenu" class="menuDesign"></div>
        </div>
    </div>


    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            
            <div id="menuitem0" class="menucard">Profile</div>
            <div id="menuitem1" class="menucard">Settings</div>
            <div id="menuitem2" class="menucard">Events</div>
            <div id="menuitem3" class="menucard">Notifications</div>
            <div id="menuitem4" class="menucard">Forum</div>
            <div id="menuitem5" class="menucard">Admin</div>
        </div>
    </div>

   
</div>

<?php include("./footer.php"); ?>