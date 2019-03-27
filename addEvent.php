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
        <button type='button' value='Back to menu' class='backToMenuBtn' onClick="window.location.href = '/c4d/menu';">Back to menu</button>
    </div>
</div>
    
<div class='container'>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <br><br><br>
            <form action="/c4d/doAddEvent.php" method="post">
            <label for="eventType" class="labelInput">Event type:</label><br>
                <select name="eventType" id="eventType" class="input">
                    <option value="0">Help needed</option>
                    <option value="1">Large scale event</option>
                </select>
                <br><br>
                <label for="deadline" class="labelInput">Deadline*</label><br>
                <input type="date" name="date" id="deadline" class="input" value="<?php echo date('Y-m-d'); ?>" />
                <br><br>
                <label for="time" class="labelInput">Select a time*</label><br>
                <input type="time" name="time" class="labelInput" value="<?php echo date('H:i:s'); ?>">
                <br><br>
                <label for="title" class="labelInput">Event title*</label><br>
                <input name="title" type="text" id="title" class="input" required aria-required="true" />
                <br><br>
                <label for="details" class="labelInput">Event details</label><br>
                <textarea style="width:100%; height:200px;" name="details" id="details" class="input"></textarea>
                <br><br>
                <label for="minPeople" class="labelInput">Required people*</label><br>
                <input name="minPeople" type="number" value="1" min="1" max="99" id="minPeople" class="input" required aria-required="true" />
                <br><br>


                <label for="address" class="labelInput">Event location*</label><br>
                <input name="address" type="text" id="address" class="input" required aria-required="true" />



                <br><br>
                <label for="visivleTo" class="labelInput">Visible to:</label><br>

                <select name="visivleTo" id="visivleTo" class="input">
                    <option value="0">Everyone</option>
                    <option value="1">Favorites</option>
                    <option value="2">Top rated users</option>
                </select>
                <br><br>
                <label for="repeat" class="labelInput">Event will repeat:</label><br>
                <select name="repeat" id="repeat" class="input">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                <br><br>

                

                <input type="submit" value="Create event" class="signInBtn">
<br><br><br>

            </form>
        </div>
    </div>
</div>



<?php include("./footer.php"); ?>