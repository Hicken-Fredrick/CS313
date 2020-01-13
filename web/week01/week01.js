$(document).ready(function(){
  $("#click").click(function(){
    alert("Clicked!");
  });
  
  $("#color").click(function(){
    $("#second").css({"color":$("#choice").val()});
  });
  
  $("#fade").click(function(){
    $("#third").fadeToggle(2000);
  });
});