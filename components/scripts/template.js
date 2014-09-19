$(function() {
  var Mustache = require('mustache');
 
  $.getJSON('js/data.json', function(data) {
    var template = $('#reviewstpl').html();
    var html = Mustache.to_html(template, data);
    $('#reviews').html(html);    
  }); //getJSON
  
}); //function