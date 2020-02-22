$(".delete").click( function() {
  var data = $($(this).parent()).serializeArray();
  $.post( $(this).parent().attr("action"), data, function(info) { $(this).parent().remove(); });
});

$(".vanish").submit( function() {
  return false;
});