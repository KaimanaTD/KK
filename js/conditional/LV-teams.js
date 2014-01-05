jQuery(document).ready(function() {
  $.getScript('js/conditional/LV-utils.js', function(){
    var $LV = ('.LV');
    // URL for LV women: https://www.leaguevine.com/tournaments/19435/kaimana-klassik-women/
    var ID_women = 19435;
    // URL for LV open: https://www.leaguevine.com/tournaments/19436/kaimana-klassik-open/
    var ID_open = 19436;
    var tournament_params = [ID_women, ID_open];
    /*
   * Display Teams
   */
    $(document).ajaxStop(function(){
      $('#ajaxloader').hide();
    });
    get_LV({
      'trunk':'tournaments',
      'query':'tournament_ids=' + JSON.stringify(tournament_params)
    }).done(function(data, textStatus, jqXHR){
      var $target = $('#LV_list_teams');
      $.each(data.objects, function(ind, d){
        var $d = $('<div/>', {
          'class': 'LV_division_list'
        });
        if (d.season.league.name.match(/(O|o)pen/)) {
          $d.attr({
            'id':'LV_list_open'
          });
        } else {
          $d.attr({
            'id':'LV_list_women'
          });
        };
        $d.append('<h2><a href="' + d.leaguevine_url + '">' + d.name + '</a></h2>');
        get_LV({
          'trunk':'tournament_teams',
          'query':'tournament_ids=' + '[' + d.id + ']'
        }).done(function(data, tS, jq){
        
          var team_ids = [];
          $.each(data.objects, function (ind,t){
            team_ids[t.seed-1] = t.team_id;
          })
          get_LV({
            'trunk':'teams',
            'query':'team_ids=' + JSON.stringify(team_ids)
          }).done(function(data, tS, jq){
            var team_array = [];
            var $t;
            var seed;
            $.each(data.objects, function(ind,t){
              seed = (1+team_ids.indexOf(t.id));
              $t = $('<div/>', {
                'class': 'team_row grid-parent'
              }).append([
                $('<span/>', {
                  'class': 'grid-10 seed',
                  'text': seed
                }),
                $('<span/>', {
                  'class': 'grid-60 team_name'
                }).append('<a href="' + t.leaguevine_url + '">' + t.name + '</a>')
                ]);
              if (t.city || t.country) {
                $t.append($('<span/>', {
                  'class': 'grid-30',
                  'text': t.city + (t.city ? ', ' : '') + t.country
                }));
              } else {
                $t.find('.team_name').addClass('suffix-30');
              }
              team_array[seed-1] = $t;
            })
            $d.append(team_array);
            $target.append($d);
          })
        })
          
      });
      
    });
  });    
});