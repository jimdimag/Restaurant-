$("#sign").hide();
$("#reg").hide();

$("#signIn").click(function(){
    $("#sign").fadeToggle("slow");
});
$("#make").click(function(){
    $("#reg").fadeToggle("slow");
    $("#fname").focus();
});

/**
 *register a new user 
 */
$("#register").click(function(event) {
    event.preventDefault();
    $.ajax ({
            type: "POST",
            url: "register.php",
            dataType: "json",
            data: ({fname:$("#fname").val(), lname:$("#lname").val(),email:$("#email").val(),username:$("#uname").val(),pass:$("#pass").val()}),
            success: function(data){
                $("#message").html(data.message);
        }
    }); //END OF AJAX
}); //END OF REGISTER

/**
 *find out if user name is already taken 
 */
