<?php session_start();
include("./conn.php");

$getU = $_GET["u"];
$getP = sha1($_GET["p"]);
$getE = $_GET["e"];
$getType = $_GET["a"];
$getAge = $_GET["ag"];
$getGender = $_GET["g"];

if($getU != "" && $getP != "")
{
    //todo login only active users
    $queryLogin = mysqli_query($db, "INSERT INTO users (username, passwordval, usertype, email, age, mf, active) VALUES ('$getU', '$getP', '$getType', '$getE', '$getAge', '$getGender', '1') ");
    if(!$queryLogin){die("Err");}
    $_SESSION['sessusername'] = $getU;
    echo "1";


}else{
        echo "0";
     }

?>