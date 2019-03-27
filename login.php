<?php include("./header.php"); ?>
<div class='container'>
    <div class='row margin5050Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <h1>C4D AMAis APP</h1>
        </div>
    </div>

    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <label for="username" class="labelInput">Username:</label><br>
            <input type='text' placeholder='Username' class='input' title='Username' id='username' />
        </div>
    </div>
    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <label for="password" class="labelInput">Password:</label><br>
            <input type='password' placeholder='Password' class='input' title='Password' id='password' />
        </div>
    </div>

    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <button type="button" id='btnSignIn' value='Sign in' class='signInBtn'>Sign in</button>
        </div>
    </div>
    
    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            OR
        </div>
    </div>

    <div class='row marginTop2Suta'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 textAlignCenter'>
            <button type="button" onClick="window.location.href = '/c4d/signup';" value='Sign up' class='signUpBtn'>Sign up</button>
        </div>
    </div>
</div>

<?php include("./footer.php"); ?>