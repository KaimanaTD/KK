jQuery(document).ready(function() {
  var $LV = ('.LV');
  // URL for LV women: https://www.leaguevine.com/tournaments/19435/kaimana-klassik-women/
  var ID_women = 19435;
  // URL for LV open: https://www.leaguevine.com/tournaments/19436/kaimana-klassik-open/
  var ID_open = 19436;
  var tournament_params = [ID_women, ID_open];
  /*
   * Display Teams
   */
  get_LV('19436').done(function(data, textStatus, jqXHR){
    console.log(data);
  });
});

function get_LV(id) {
  return $.ajax("control/LV.php", {
    type: "GET",
    data: {
      'tournament_id':id
    },
    dataType: "json"
  }).always(function(){
    // Do me all of the times!
  }).fail(function(){
    // D'oh!
  });
}