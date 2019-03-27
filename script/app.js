$("document").ready( function (){
    console.log("App init OK.");
    speechSynthesis.cancel();

    
    // signup action
    $("#btnSignUp").click( function () {
     
        let getUser = $("#username").val();
        let getPass = $("#password").val();
        let getEmail = $("#email").val();
        let getAccType = $("#acctype").val();
        let getAge = $("#age").val();
        let getGender = $("#gender").val();

        $.ajax({
            url: "./do_sign_up.php?u="+getUser+"&p="+getPass+"&e="+getEmail+"&a="+getAccType+"&ag="+getAge+"&g="+getGender,
            success: function(result){
                if(result == "1")
                {
                    //login ok, redirect
                    speakThis("Welcome. Swipe left or right to navigate the menu");
                    setTimeout(function(){window.location.href = "/c4d/menu";}, 4200);
                    
                }else{
                        //login error
                        alert("Could not create account! Try again later.");
                     }
            }
        });
        
    });


    //login action
    $("#btnSignIn").click( function () {
     
        let getUser = $("#username").val();
        let getPass = $("#password").val();

        $.ajax({
            url: "./do_login.php?u="+getUser+"&p="+getPass,
            success: function(result){
                if(result == "1")
                {
                    //login ok, redirect
                    speakThis("Hello. Swipe left or right to navigate the menu");
                    setTimeout(function(){window.location.href = "/c4d/menu";}, 4200);
                    
                }else{
                        //login error
                        alert("Username or password is wrong!");
                        $("#username").attr("value", "");
                        $("#password").attr("value", "");
                     }
            }
        });
        
    });



//menu page
var availOptions = ["Profile", "Settings", "Events", "Notifications", "Forum", "Admin"];
var availLinks = ["profile/", "settings/", "events/0", "notifications/", "forum/", "admin/"];
var screenMin = 0;
var screenNow = 2;
var screenMax = 5;


if(window.location.pathname == "/c4d/menu"){refreshMenu(screenNow);}

//add menu listener
$("#menuitem0").on( "swipeleft", swipeLeftHandler );
$("#menuitem0").on( "swiperight", swipeRightHandler );
$("#menuitem0").click(function () {goToMenuLink('0')});

$("#menuitem1").on( "swipeleft", swipeLeftHandler );
$("#menuitem1").on( "swiperight", swipeRightHandler );
$("#menuitem1").click(function () {goToMenuLink('1')});

$("#menuitem2").on( "swipeleft", swipeLeftHandler );
$("#menuitem2").on( "swiperight", swipeRightHandler );
$("#menuitem2").click(function () {goToMenuLink('2')});

$("#menuitem3").on( "swipeleft", swipeLeftHandler );
$("#menuitem3").on( "swiperight", swipeRightHandler );
$("#menuitem3").click(function () {goToMenuLink('3')});

$("#menuitem4").on( "swipeleft", swipeLeftHandler );
$("#menuitem4").on( "swiperight", swipeRightHandler );
$("#menuitem4").click(function () {goToMenuLink('4')});

$("#menuitem5").on( "swipeleft", swipeLeftHandler );
$("#menuitem5").on( "swiperight", swipeRightHandler );
$("#menuitem5").click(function () {goToMenuLink('5')});

//keys
$("body").keydown(function(e) {
    if(e.which == 37) { // left     
        swipeLeftHandler();
    }
    else if(e.which == 39) { // right     
        swipeRightHandler();
    }
  });


 

 



function swipeRightHandler()
{
    screenNow = parseInt(screenNow)+parseInt(1);
    if(screenNow >= screenMax){screenNow = screenMax;}
    refreshMenu(screenNow);
}

function swipeLeftHandler()
{
    screenNow = parseInt(screenNow)-parseInt(1);
    if(screenNow <= screenMin){screenNow = screenMin;}
    refreshMenu(screenNow);
}



function goToMenuLink(whichKey)
{
    window.location.href = "/c4d/"+availLinks[whichKey];
    //console.log(whichKey);
}



function refreshMenu(whichCard)
{
    screenNow = whichCard;

    //console.log(whichCard);

    var textLeft = "";
    var textRight = "";

    //hide all cards
    for(var x=0; x<=screenMax; x++)
    {
        $("#menuitem"+x).css("display", "none");
    }

    //show selected card only
    $("#menuitem"+whichCard).css("display", "block");

    if(typeof availOptions[screenNow-1] !== 'undefined'){var textLeft = "Left for "+availOptions[screenNow-1]+".";}
    if(typeof availOptions[screenNow+1] !== 'undefined'){var textRight = "Right for "+availOptions[screenNow+1];}
    
    var instructionText = availOptions[screenNow]+". "+textLeft+" "+textRight;
    $("#menuitem"+whichCard).html(instructionText);

    //build nice text menu for seeing people
    var niceMenuText = "";

    for(var y=0; y<=screenMax; y++)
    {
        niceMenuText += "<a href='/c4d/"+availLinks[y]+"' target='_self' >"+availOptions[y]+"</a>&nbsp;&nbsp;";
    }

    $("#niceTextMenu").html(niceMenuText);

    speakThis(instructionText);



    $(".ui-loader").css("display", "none");
}


function speakThis(whatText)
{
        //speak text
        speechSynthesis.cancel();
        speechSynthesis.speak(new SpeechSynthesisUtterance(whatText));
}


});



function changeban(whichId)
{

  var setstatus = "0";
  if(document.getElementById(whichId).checked){setstatus = "0";}else{setstatus = "1";}

  $.ajax({
      url: "/c4d/do_change_ban.php?id="+whichId+"&st="+setstatus,
      success: function(result){
          if(result == "1")
          {
              //login ok, redirect
              alert("Ok!");
              
          }else{
                  //login error
                  alert("Error!");
                  
               }
      }
  });
}


function giveRating(theUser, theRating)
{
    if(theUser != "")
    {
        window.location.href = "/c4d/do_rateuser.php?u="+theUser+"&r="+theRating;
    }
}