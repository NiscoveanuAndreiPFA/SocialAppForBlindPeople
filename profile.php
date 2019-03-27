<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php"); 

$getUsername = $_GET['u'];
if($getUsername == ""){$getUsername = $_SESSION["sessusername"];}

list($username, $usertype, $age, $age_visible, $mf, $active, $email, $phone, $phone_visible, $bio, $favusers) = $db -> query("SELECT username, usertype, age, age_visible, mf, active, email, phone, phone_visible, bio, favusers FROM users WHERE username = '$getUsername'") -> fetch_row();
?>
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingRightLeftZero'>
            <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/menu';" class='backToMenuBtn'>Back to menu</button>
        </div>
    </div>
    
    <div class='container bgkProfile'>
        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <h1><?php echo strtoupper($getUsername); ?>'s PROFILE</h1>
            </div>
        </div>

        <div class='row margin5050Suta'>
            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
                <?php 
                    if($mf == 0) {
                        echo '<img src="/c4d/upload/icon-boy.png" alt="profile picture" />';
                        echo '<p class="genderProfile">Gender: Male</p>'; 
                    } else {
                        echo '<img src="/c4d/upload/icon-girl.png" alt="profile picture" />';
                        echo '<p class="genderProfile">Gender: Female</p>';
                    } 
                ?>
            </div> 
            <div class='col-lg-9 col-md-9 col-sm-9 col-xs-12'>
                <?php  
                    echo '<p class="emailProfile">Email: '.$email.'</p>';
                    echo '<p class="genderProfile">Age: '.$age.'</p>';
                ?>
            </div>
        </div>

        <div class='row margin5050Suta'>
            <div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
                <?php
                    switch ($usertype) {
                        case 0:
                            echo '<p class="genderProfile">Profile type: blind</p>';
                            break;
                        case 1:
                            echo '<p class="genderProfile">Profile type: partially blind</p>';
                            break;
                        case 2:
                            echo '<p class="genderProfile">Profile type: typical user</p>';
                            break;
                        case 3:
                            echo '<p class="genderProfile">Profile type: admin</p>';
                            break;
                        case 4:
                            echo '<p class="genderProfile">Profile type: moderator</p>';
                            break;
                    }
                ?> 
            </div>
            <div class='col-lg-10 col-md-10 col-sm-10 col-xs-12'>
                <?php
                    if(strlen($bio)) {
                        echo '<p>Bio: '.$bio.'</p>';
                    }
                ?>
            </div>

            <div class='col-lg-10 col-md-10 col-sm-10 col-xs-12'>
                <?php
                    if($getUsername == $_SESSION["sessusername"])
                    {
                        echo "<h3>Favorite users</h3>";
                        $favusers = explode(",", $favusers);
                        foreach($favusers as $k => $v)
                        {
                            if($v != "")
                            {
                                echo "&bull; <a href='/c4d/profile/".$v."'>".$v."</a><br>";   
                            }
                        }
                    }
                ?>
            </div>

        </div>
    </div>

<?php include("./footer.php"); ?>