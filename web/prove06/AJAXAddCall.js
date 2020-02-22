$("#listAdd").click( function() {
  $.ajaxSetup({ cache: false });
  var data = $("#listInsert :input").serializeArray();
  $.post( $("#listInsert").attr("action"), data, function(info) { $("#listsList").append(info); });
  cleanupList();
});

$("#itemAdd").click( function() {
  $.ajaxSetup({ cache: false });
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
  $("#listInsert :input").each( function () { $(this).val(''); });
}

function cleanupItem() {
  $("#itemInsert :input").each( function () { $(this).val(''); });
}