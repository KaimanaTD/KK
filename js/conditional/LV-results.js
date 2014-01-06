// URL for LV women: https://www.leaguevine.com/tournaments/19435/kaimana-klassik-women/
var ID_women = 19435;
// URL for LV open: https://www.leaguevine.com/tournaments/19436/kaimana-klassik-open/
var ID_open = 19436;
var no_content = "This information is not currently available.";

jQuery(document).ready(function() {
  var $articles = $('article');
  $.getScript('js/conditional/LV-utils.js', function(){
    //
    // Display Pools
    //
    var trunk = 'pools';
    var o_query = 'tournament_id=' + JSON.stringify(ID_open);
    var w_query = 'tournament_id=' + JSON.stringify(ID_women);
    get_LV({'trunk':trunk,'query':o_query}).done(render_pools);
    get_LV({'trunk':trunk,'query':w_query}).done(render_pools);
  })
})

function render_pools(data,Textstatus,jqXHR){
  console.log(data);
  var gender = -1;
  if (data["0"].indexOf(ID_women)>0) {
    gender = 0;
  } else if (data["0"].indexOf(ID_open)>0) {
    gender = 1;
  }
  if (gender == -1) {console.log("Could not determine division."); return null;}
  var content = [$('<h3>'+(gender ? 'Open' : 'Womens')+' Pools</h3>')];
  var $poolwrapper,
    $poolname,
    $poolgame,
    pool;
  if (data.objects.length>0) {
    $poolwrapper = $('<div/>',{
      'class':'pool_wrapper'
    });
    for (var p=0; p<data.objects.length; p++) {
      /*
       * TODO:
       * Get game info for every team in the pool.  How?
       */
      pool = data.objects[p];
      $poolname = $('<div/>',{
        'class':'grid-100 pool_name'
      }).html('<a href="'+pool.leaguvine_url+'">Pool '+pool.name+'</a>');
      $poolname.append($('<div/>'),{
        'class':'pool_fields',
        'text':'' // TODO Get field info for the pool here.
      });
      
    }
  } else {
    content.push($('<p>'+no_content+'</p>'));
  }
  var target = (gender ? $('#LV_sat_pools_open') : $('#LV_sat_pools_women'));
  target.append(content);
};