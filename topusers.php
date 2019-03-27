<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php");
include("./conn.php");
?>
<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingRightLeftZero'>
        <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/events/0';" class='backToMenuBtn'>Back to events</button>
    </div>
</div>
</div>
<div class='container'>
    <div class='row margin5050Suta'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <h1>TOP USERS</h1>
            </div>
        </div>

    <div class='row bgdWhite'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Rating</th>
                            <th>Favorites</th>
                        </tr>
                    </thead>
                    <?php 

                    $currentUser = $_SESSION['sessusername'];
                    $queryCurrentFavs = mysqli_query($db, "SELECT favusers FROM users WHERE username='$currentUser' ");
                    $db_field = mysqli_fetch_assoc($queryCurrentFavs);


                    $topUsersQuery = $db -> query("SELECT username, rating, favusers FROM users ORDER BY rating DESC");
                    while(list($username, $rating, $favusers) = $topUsersQuery -> fetch_row()) {
                        echo '<tbody>
                                <tr>';
                                echo '<td>'.$username.'</td>';
                                echo '<td>';
                                    for($i = 0; $i < $rating; $i++) {
                                        echo '<img src="/c4d/upload/ratingStar.png" alt="raing star" />';
                                    }
                                echo '</td>';
                                
                                
                                if(strpos($db_field['favusers'], $username) !== false)
                                {
                                    //already added
                                    echo '<td><img src="/c4d/upload/checked.png" alt="already added" /></td>';
                                }else{
                                        if($username == $currentUser)
                                        {
                                            //can't add itself
                                            echo "<td></td>";
                                        }else{
                                                //can be added
                                                echo '<td><a href="/c4d/do_add_to_fav.php?u='.$username.'"><img src="/c4d/upload/favorite-icon.png" alt="favorite icon" /></a></td>';
                                            }
                                     }

                                
                            echo '</tr>
                         </tbody>';            
                    }
                    ?>
                </div>
            </div>
        
    </table>
</div>

<?php include("./footer.php"); ?>