<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php");
include("./conn.php"); 

$getUsername = $_SESSION["sessusername"];

list($username, $usertype, $age, $age_visible, $mf, $active, $email, $phone, $phone_visible, $bio) = $db -> query("SELECT username, usertype, age, age_visible, mf, active, email, phone, phone_visible, bio FROM users WHERE username = '$getUsername'") -> fetch_row();

if($usertype != "3"){header("location:/c4d/menu");}

?>
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingRightLeftZero'>
            <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/menu';" class='backToMenuBtn'>Back to menu</button>
        </div>
    </div>
    <?php /*
    <div class='container'>
        
        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <h1><?php echo strtoupper($_GET['u']); ?>'s PROFILE</h1>
            </div>
        </div>
       
    </div>
     */ ?>
    <div class='container-fluid'>
        <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#user">User</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#chat">Chat</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#forum">Forum</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="overflow:auto;">
                <div id="user" class="tab-pane active"><br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Actions <br>(ban accounts)</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <?php
                        $usersQuery = $db -> query("SELECT id, username, email, active FROM users WHERE username != '$getUsername'"); 
                        while(list($id, $username, $email, $active) = $usersQuery -> fetch_row()) {
                            echo '<tbody>
                            <tr>';
                            echo '<td><input type="checkbox" id="chk'.$id.'" title="Ban account" onClick=\'changeban("chk'.$id.'")\'';
                            //echo "<td><input type='checkbox' id='chk".$id."' title='Ban account' onClick=\"changeban('chk".$id."')\"  ";
                            if($active == 0) {
                                echo 'checked';
                            }
                            echo '/></td>';
                            echo '<td>'.$username.'</td>';
                            echo '<td>'.$email.'</td>';
                            echo '</tr>
                            </tbody>';
                        }
                    ?>
                </table>
                </div>
                <div id="chat" class="tab-pane fade"><br>
                <h3>Chat</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div id="forum" class="tab-pane fade"><br>
                <h3>Forum</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
            </div>
            </div>
         </div>
       
    </div>

<?php include("./footer.php"); ?>