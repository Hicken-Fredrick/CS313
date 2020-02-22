$("#listAdd").click( function() {
  var data = $("#listInsert :input").serializeArray();
  $.post( $("#listInsert").attr("action"), data, function(info) { $("#listsList").append(info); });
  cleanupList();
});

$("#itemAdd").click( function() {
  var data = $("#itemInsert :input").serializeArray();
  $.post( $("#itemInsert").attr("action"), data, function(info) { $("#itemsList").append(info); });
  cleanupItem();
});

$("#listInsert").submit( function() {
  return false;
});

$("#itemInsert").submit( function() {
  return false;
});

function cleanupList() {
  $("#listInsert").each( function () { this.reset(); });
}

function cleanupItem() {
  $("#itemInsert").each( function () { this.reset(); });
}