$("#sign").hide();
$("#reg").hide();

$("#signIn").click(function(){
    $("#sign").fadeToggle("slow");
});
$("#make").click(function(){
    $("#reg").fadeToggle("slow");
    $("#fname").focus();
});
