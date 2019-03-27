<?php session_start(); 

if($_SESSION["sessusername"] != "")
{
    //continue
}else{
        header("location: https://niandrei.com/c4d/");
     }

include("./header.php"); 

$getActiveTab = $_GET['t'];

if($getActiveTab == '0') {
    $selectedA = 'active';
    $selectedB = '';
} else {
    $selectedA = '';
    $selectedB = 'active';
}

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
    border-color:#ffffff !important;
    color:#000000;
    border:1px solid #c0c0c0;
    border-radius:10px;
    background-color:#dfdfdf;
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
        <button type='button' value='Back to menu' onClick="window.location.href = '/c4d/menu';" class='backToMenuBtn'>Back to menu</button>
    </div>
</div>
    
<div class='container'>
    <a href="/c4d/addevent/"><div class='addBtn'>+</div></a>
    <div class='row margin5050Suta'>
         <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link <?php echo $selectedA; ?>" href="/c4d/events/0">Help needed</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php echo $selectedB; ?>" href="/c4d/events/1">Events</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/c4d/top_users/">Top users</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="helpNeeded" class="container tab-pane <?php echo $selectedA; ?>">
                    <?php
                        $eventsQuery = $db -> query("SELECT eventid, createdBy, deadline, title, details, minPeople, applied, createdOn, visibleTo, repeats, isDone, eventType, locationv FROM event WHERE eventType = '0' ORDER BY deadline");
                        while(list($eventid, $createdBy, $deadline, $title, $details, $minPeople, $applied, $createdOn, $visibleTo, $repeats, $isDone, $eventType, $locationv) = $eventsQuery -> fetch_row()) {

                            if($isDone == "1"){$eventDoneBg = "eventDesignDone";}else{$eventDoneBg = "eventDesign";}

                            echo '<div class="'.$eventDoneBg.'">';
                                echo '<div class="row cursorPointer" onClick="window.location.href=\'/c4d/event/'.$eventid.'\'">';
                                    echo '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                                    list($username, $mf, $rating, $active) = $db -> query("SELECT username, mf, rating, active FROM users WHERE username = '$createdBy' ") -> fetch_row();
                                        if($mf == 0) {
                                            echo '<img src="/c4d/upload/icon-boy.png" alt="profile picture" style="width:100%;" />';
                                        } else {
                                            echo '<img src="/c4d/upload/icon-girl.png" alt="profile picture" style="width:100%;" />';
                                        }

                                    if($active == "0"){$setBannedText = "<br><span style='color:white; background-color:red; padding:3%;'>Banned</span>";}else{$setBannedText = "";}

                                        echo '<div class="textAlignCenter fontSize1P4Em">'.$username.' '.$setBannedText.'</div>';
                                        echo '<div class="textAlignCenter fontSize1P4Em">'.$rating.' / 5 <img src="/c4d/upload/ratingStar.png" alt="raing star" /></div>';
                                    echo '</div>';
                                    echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">';
                                        echo '<div class="fontSize1P4Em">'.$deadline.'</div>';
                                        echo '<div class="fontSize1P4Em"><i>'.$locationv.'</i></div>';
                                        echo '<div class="fontSize2Em">'.$title.'</div>';
                                        echo '<div class="textAlignJustify">'.substr($details, 0, 250).'...</div>';
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
                        }
                        ?>
                </div>
                <div id="events" class="container tab-pane <?php echo $selectedB; ?>">
                    <?php
                        $eventsQuery = $db -> query("SELECT eventid, createdBy, deadline, title, details, minPeople, applied, createdOn, visibleTo, repeats, isDone, eventType FROM event WHERE eventType = '1' ORDER BY deadline");
                            while(list($eventid, $createdBy, $deadline, $title, $details, $minPeople, $applied, $createdOn, $visibleTo, $repeats, $isDone, $eventType) = $eventsQuery -> fetch_row()) {

                                if($isDone == "1"){$eventDoneBg = "eventDesignDone";}else{$eventDoneBg = "eventDesign";}

                                echo '<div class="'.$eventDoneBg.'">';

                                
                                    echo '<div class="row cursorPointer" onClick="window.location.href=\'/c4d/event/'.$eventid.'\'">';
                                        echo '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                                        list($username, $mf, $rating, $active) = $db -> query("SELECT username, mf, rating, active FROM users WHERE username = '$createdBy' ") -> fetch_row();
                                            if($mf == 0) {
                                                echo '<img src="/c4d/upload/icon-boy.png" alt="profile picture" style="width:100%;" />';
                                            } else {
                                                echo '<img src="/c4d/upload/icon-girl.png" alt="profile picture" style="width:100%;" />';
                                            }

                                            if($active == "0"){$setBannedText = "<br><span style='color:white; background-color:red;'>Banned</span>";}else{$setBannedText = "";}

                                            echo '<div class="textAlignCenter fontSize1P4Em">'.$username.' '.$setBannedText.'</div>';
                                            echo '<div class="textAlignCenter fontSize1P4Em">'.$rating.' / 5 <img src="/c4d/upload/ratingStar.png" alt="raing star" /></div>';
                                        echo '</div>';
                                        echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">';
                                            echo '<div class="fontSize1P4Em">'.$deadline.'</div>';
                                            echo '<div class="fontSize2Em">'.$title.'</div>';
                                            echo '<div class="textAlignJustify">'.substr($details, 0, 250).'...</div>';
                                        echo '</div>';
                                        echo '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                                            if($applied != "") {
                                                $appliedE = explode(',', $applied);
                                                $nrApplied = count($appliedE)-1;
                                            }else{$nrApplied = "0";}

                                            echo '<div class="fontSize1P4Em"><img src="/c4d/upload/people-icon.png" alt="profile picture" />'.$nrApplied.' / '.$minPeople.'</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./footer.php"); ?>