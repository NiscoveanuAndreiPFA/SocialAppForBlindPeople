<?php session_start();
include("./conn.php");

$getU = $_GET["u"];
$getP = sha1($_GET["p"]);

if($getU != "" && $getP != "")
{
    //todo login only active users
    $queryLogin = mysqli_query($db, "SELECT id FROM users WHERE username='$getU' AND passwordval='$getP' ");
    if(!$queryLogin){die("Err");}
    $db_field = mysqli_fetch_assoc($queryLogin);

    if($db_field['id'] != "" )
    {
        $_SESSION['sessusername'] = $getU;
        echo "1";
    }else{
            echo "2";
         }


}else{
        echo "0";
     }

?>