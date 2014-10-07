$("#sign").hide();
$("#reg").hide();
$("#sub").hide();
$("#food").hide();
$(".dropnav").hide();

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
$("form#add").submit(function() {
        
        //make sure required fields have content
        if (($("input:#fname").val() == "") || ($("input:#lname").val() == "") || ($("input:#username").val() == "") || ($("input:#email").val() == "") || ($("input:#pass").val() == "")) {    
            return false;
        }
        return true;
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

/**
 *find a specific item  
 */
$("#specific").click(function() {
    $.ajax({
        type: "POST",
        async: true,
        url: "sub.php",
        dataType:"json",
        data: ({cat: $('#search').val(), item:$("#find").val()}),
        success: function(data) {
            
        } //END OF SUCCESS
    }); // END OF AJAX
}); // END OF CLICK FUNCT.


/**
 *dropdown navigation area 
 */
var $target = $("nav > ul > li");
        $target.hover(function (e) {
   $('> .dropnav', this).slideDown();
},function () {
   $('> .dropnav', this).fadeOut();
});