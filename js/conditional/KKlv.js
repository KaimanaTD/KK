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
  get_LV({'tournaments':JSON.stringify(tournament_params)}).done(function(data, textStatus, jqXHR){
    console.log(data);
    var $target = $('#LV_list_teams');
    for (var d = 0; d < data.objects.length; d++) {
      var thisdiv = data.objects[d];
      var $d = $('<div/>', {'class': 'grid-parent'});
      $d.append('<h2><a href="' + thisdiv.leaguevine_url + '">' + thisdiv.name + '</a></h2>');
      get_LV({'tournament_teams':thisdiv.id}).done(function(teamdata, textStatus, jqXHR){
        for (var t = 0; t < teamdata.objects.length; t++) {
          var thisteam = teamdata.objects[t];
          var $t = $('<div/>', {'class': 'team_row'});
          $t.append([
            $('<span/>', {
              'class': 'grid-10',
              'text': thisteam.seed
            }),
            $('<span/>', {
              'class': 'grid-90',
              'text': '<a href="' + thisteam.team.leaguevine_url + '">' + thisteam.team.name + '</a>'
            })
          ]);
          $d.append($t);
        }
        $target.append($d);
      });
    }
  });
});

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