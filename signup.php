<?php include("./header.php"); ?>
<div class='container'>
    <div class='row margin5050Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <h1>C4D AMAis APP</h1>
        </div>
    </div>

    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <label for="username">Username:</label><br>
            <input type='text' placeholder='Username' class='input' title='Username' id='username' />
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter marginTop2Suta'>
            <label for="username">Email:</label><br>
            <input type='email' placeholder='Email' class='input' title='Email' id='email' />
        </div>
    </div>
    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <label for="username">Password:</label><br>
            <input type='password' placeholder='Password' class='input' title='Password' id='password' />
        </div>
    </div>
    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <label for="age">Age:</label><br>
            <select id="age" class="input">
                <?php
                    for($x=18; $x<=90; $x++)
                    {
                        echo "<option value=".$x.">".$x."</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <label for="gender">Gender:</label><br>
            <select id="gender" class="input" >
                <option value='0'>Male</option>
                <option value='1'>Female</option>
            </select>
    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <label for="acctype">Account type:</label><br>
            <select id="acctype" class="input" >
                <option value='0'>Person with visual impairment</option>
                <option value='1'>Partial visual impairment</option>
                <option value='2'>Typical person</option>
            </select>
            <br><br><br><br>
        </div>
    </div>

    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <button type="button" id='btnSignUp' value='Sign up' class='signInBtn'>Sign up</button>
        </div>
    </div>
    
    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            Already registered?
        </div>
    </div>

    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <button type="button" onClick="window.location.href = '/c4d/login';" value='Sign in' class='signUpBtn'>Sign in</button>
            <br><br><br>
        </div>
    </div>
</div>

<?php include("./footer.php"); ?>