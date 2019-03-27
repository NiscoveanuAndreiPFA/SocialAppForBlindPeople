<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php"); 


$getEventID = $_GET['e'];
$source = $_SESSION["sessusername"];


?>

<style>
.eventDesign {
    border-color:#ffffff;
    color:#000000;
    border:1px solid #c0c0c0;
    border-radius:10px;
    background-color:#ffffff;
    margin-bottom:2%;
    padding:2%;
}

.eventDesignDone {
    border-color:#000000 !important;
    color:#000000;
    border:1px solid #c0c0c0;
    border-radius:10px;
    background-color:#a8b6d4;
    margin-bottom:2%;
    padding:2%;
}

.fontSize1P4Em {
    font-size:1.4em;
}

.fontSize2Em {
    font-size:2em;
}

.textAlignJustify {
    text-align:justify;
}

.cursorPointer {
    cursor:pointer;
}


</style>

<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 paddingRightLeftZero'>
        <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/events/0';" class='backToMenuBtn'>Back to events</button>
    </div>
</div>
    
<div class='container'>
    
    <div class='row margin5050Suta'>
         <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            

<?php
        $eventsQuery = $db -> query("SELECT eventid, createdBy, deadline, title, details, minPeople, applied, createdOn, visibleTo, repeats, isDone, eventType, chosen, locationv FROM event WHERE eventid = '$getEventID' ");

        list($eventid, $createdBy, $deadline, $title, $details, $minPeople, $applied, $createdOn, $visibleTo, $repeats, $isDone, $eventType, $chosen, $locationv) = $eventsQuery -> fetch_row();

        if($isDone == "1"){$eventDoneBg = "eventDesignDone";}else{$eventDoneBg = "eventDesign";}

        echo '<div class="'.$eventDoneBg.'">';
                echo '<div class="row">';
                    echo '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                    list($username, $mf, $rating, $active) = $db -> query("SELECT username, mf, rating, active FROM users WHERE username = '$createdBy' ") -> fetch_row();
                        if($mf == 0) {
                            echo '<img src="/c4d/upload/icon-boy.png" alt="profile picture" style="width:100%;" />';
                        } else {
                            echo '<img src="/c4d/upload/icon-girl.png" alt="profile picture" style="width:100%;" />';
                        }

                        if($active == "0"){$setBannedText = "<br><span style='color:white; background-color:red;'>Banned</span>";}else{$setBannedText = "";}

                        echo '<div class="textAlignCenter fontSize1P4Em"><a href="/c4d/profile/'.$username.'">'.$username.'</a> '.$setBannedText.'</div>';
                        echo '<div class="textAlignCenter fontSize1P4Em">'.$rating.' / 5 <img src="/c4d/upload/ratingStar.png" alt="raing star" /></div>';
                    echo '</div>';
                    echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">';
                        echo '<div class="fontSize1P4Em">'.$deadline.'</div>';
                        echo '<div class="fontSize1P4Em"><i>'.$locationv.'</i></div>';
                        echo '<div class="fontSize2Em">'.$title.'</div>';
                        echo '<div class="textAlignJustify">'.$details.'</div>';
                    echo '</div>';
                    echo '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                        if($applied != "") {
                            $appliedE = explode(',', $applied);
                            $nrApplied = count($appliedE)-1;
                            
                        }else{$nrApplied = "0";}

                        echo '<div class="fontSize1P4Em"><img src="/c4d/upload/people-icon.png" alt="profile picture" />&nbsp;&nbsp;'.$nrApplied.' / '.$minPeople.'</div>';
                    echo '</div>';
                echo '</div>';
                echo '</div>';
        
        ?>

        <?php
            if(strstr($applied, $_SESSION["sessusername"]))
            {
                //already applied
                echo "<h2>You have applied to this event :)</h2>";

            }else{
                    if($isDone == "0"){
                        //chek if the requester is looking at his own event
                        if($_SESSION["sessusername"] == $createdBy)
                        {
                            //same user
                            if($applied == "")
                            {
                                echo "<h2>People interested in your event will appear here.</h2>";
                            }else{
                                    echo "<h2>List of people willing to help:</h2><br>";
                                    $appliedE = explode(',', $applied);
                                    foreach($appliedE as $k => $valU)
                                    {
                                        if($valU != "")
                                        {
                                            echo "<h3>&bull; ".$valU." [ <a href='/c4d/chat.php?s=".$source."&d=".$valU."'>Open chat</a> ] [ <a href='/c4d/accept/".$eventid."-".$valU."'>Accept user and close request</a> ]</h3>";
                                        }
                                    }
                                }

                        }else{

                                echo "<input type='button' value='Apply to this event' class='signInBtn' onClick=\"window.location.href = '/c4d/applytoevent.php?i=".$getEventID."';\" />";
                        }
                    }else{
                            echo "<h2>This event is closed.</h2>";
                            if($_SESSION["sessusername"] == $createdBy)
                            {
                                echo "<br><br><h3>You have chosen: ".$chosen." [ <a href='/c4d/rateuser/".$chosen."'>Rate user</a> ]</h3>";
                            }

                         }
                }
        ?>
        
            
        </div>
    </div>
</div>

<?php include("./footer.php"); ?>