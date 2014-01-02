function get_LV(param_obj) {
  return $.ajax("control/LV.php", {
    type: "GET",
    data: param_obj,
    dataType: "json"
  }).always(function(){
    // Do me all of the times!
  }).fail(function(){
    // D'oh!
  });
}