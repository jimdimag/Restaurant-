$("#sign").hide();
$("#reg").hide();
$("#sub").hide();
$("#food").hide();

$("#signIn").click(function(){
    $("#sign").fadeToggle("slow");
});
$("#make").click(function(){
    $("#reg").fadeToggle("slow");
    $("#fname").focus();
});

/**
 *register form validation 
 */
/*$("#add").validate({
    rules: {
        fname: 'required',
        lname: 'required',
        email: {
            required: true,
            email: true
                },
        username:'required',
        password: {
            required: true,
            rangelength: [8,16]
        },
        confirm:{
            equalTo:'#pass'
        }
    }, //END OF RULES
    messages: {
        fname: {
            required: "Please enter your first name"
        },
        lname: {
            required: "Please enter your last name"
        },
        email: {
            required: "Please enter your email address (in case you forget it later on)",
            email: "Please enter a valid email address"
        },
        username: {
            required: "Please enter a username."
        },
        password: {
            required: "Please enter a password",
            rangelength: "Password must be between 8 and 16 characters long."
        },
        confirm: {
            equalTo: "The two passwords do not match"
        }
    }, // END OF MESSAGES
});*/
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
                if(data.message == null){
                    $("#message").html("there was an error entering your information.");
                } else {
                $(".message").html(data.message);
                }
        }
    }); //END OF AJAX
}); //END OF REGISTER

/**
 *find out if user name is already taken 
 */

/**
 *find a sub item for the main restaurant look up 
 */
$("#craving").change(function() {
    $("#food").show();
	$("#sub").show();
	$.ajax({
        type: "POST",
        async: true,
        url: "sub.php",
        dataType:"json",
        data: ({craving: $('#craving').val()}),
        success: function(data) {
                    
        $('select#sub').empty();   
        
        //Populate options of the second dropdown
        if(data.id==null){
            $('select#sub').append('<option value="0">No Options available</option>');
        } else {
            $('select#sub').append('<option value="0">Select Option</option>'); 
                for(var x=0;x<data.id.length;x++)
                    {   
                    
                    $('select#sub').append('<option value="'+data.id[x]+'">'+data.item[x]+'</option>');
                    }
                }
        } //END OF SUCCESS
	});
}); //END OF CRAVING CHANGE FUNCTION
