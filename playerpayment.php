<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <?php require('partial/head.php'); ?>
  <script src="js/conditional/big-adapt.js"></script>
  <link rel="stylesheet" href="js/unsemantic/assets/stylesheets/unsemantic-grid-base.css">
  <script src="js/unsemantic/assets/javascripts/adapt.min.js"></script>
  <title></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
</head>
<body>
  <?php include('partial/oldBrowser.php'); ?>
  <div class="wrapper grid-parent">
  <header>
    <?php include('partial/banner.php'); ?>
    <?php require('partial/nav.php'); ?>
  </header>
  <!-- Add your site or application content here -->
  <div class="content">
	<section class="grid-70">
      <article>
        <h1>Article Title</h1>
        <p>
          Body text.
        </p>
        <div id="reg_form">
          <form id="registration">
            <button id="add_team" type="button" name="add_team">Add players from another team</button>
            <button id="calculate" type="submit">Calculate total</button>
          </form>
        </div>
        <div id="payment_summary">
          <table></table>
        </div>
        <div id="reg_pay">
          <script src="js/paypal-button.min.js?merchant=photo@claymckell.com" 
              data-button="buynow" 
              data-name="KK27Registration" 
              data-amount="1" 
              data-shipping="0" 
              data-tax="0" 
              data-env="sandbox"
          ></script>
        </div>
      </article>
	</section>
    <aside class="grid-30">
      <p>
        Sample Text.
      </p>
	</aside>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
    Modernizr.load({
			test: Modernizr.cssremunit,
			nope: 'js/conditional/REM-unit-polyfill/js/rem.min.js'
		});
  </script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script>
  jQuery(document).ready(function(){
  // Registration fanciness
  // Nifty Ajax methodology:
  // http://stackoverflow.com/questions/8840257/jquery-ajax-handling-continue-responses-success-vs-done
  var $regform = $('form#registration');
  var prices = {'player_early': 140, 'guest': 60};
  prices['player'] = prices.player_early;
  if ($regform) {
    var $add_team_button = $regform.find('button#add_team');
    var $firstfs = build_team_list(1);
    $regform.prepend($firstfs);
    $add_team_button.click(function(){
      var $all_fs = $regform.find('fieldset');
      var n = $all_fs.length;
      var $next_fs = build_team_list(n+1);
      $all_fs.after($next_fs);
    });
    $regform.on('submit',function(e){
      e.preventDefault();
      var form_vals = $(this).serializeArray();      
      var players = [];
      var guests = [];
      var subtotal = 0;
      var all_ids = [];
      $.each(form_vals.filter(function(el){return el['name'].match(/^players.*$/gi);}), function(ind,val){
        console.log(val);
        // Should be in the form [ ID, First, Last ]
        var item = val.value.split(',');
        if (item[0][2] == 2) {
          subtotal += prices.guest;
          all_ids.push(item[0]);
          guests.push('<tr><td>'+item.slice(1).join()+'</td><td>'+prices.guest+'</td></tr>');
        } else {
          subtotal += prices.player;
          all_ids.push(item[0]);
          players.push('<tr><td>'+item.slice(1).join()+'</td><td>'+prices.player+'</td></tr>');
        };
      });
      console.log(players);
      console.log(guests);
      var table = '<tr><th>Name</th><th>Price</th></tr>';
      if (players.length > 0) {
        table += '<tr><td>Players</td><td></td></tr>';
        for (var p = 0; p < players.length; p++) {
          table += players[p];
        };
      };
      if (guests.length > 0) {
        table += '<tr><td>Guests</td><td></td></tr>';
        for (var g = 0; g < guests.length; g++) {
          table += guests[g];
        };
      };
      table += '<tr><td>Total:</td><td>'+subtotal+'</td>';
      var $table = $('div#payment_summary table').html(table);
      var $paypal_button = $('form.paypal-button');
      var $amount = $paypal_button.find('input[name="amount"]').attr({"value":subtotal});
      var $custom = $paypal_button.find('input[name="custom"]');
      if ($custom.length > 0) {
        $custom.attr({"value":all_ids.join(',')});
      } else {
        $paypal_button.prepend('<input type="hidden" name="custom" value="'+all_ids.join(',')+'">');
      };
      // PSEUDOCODE:
//      var $paypalbutton; 
//      $paypalbutton.attr({'price': price, 'item': all_ids.join(',')});
//      $paypalbutton.show;
    });
  }; // endif $regform
  });

function reg_get(url) {
  return $.ajax(url,{
      type: "GET",
      dataType: "json"
  }).always(function(){
      // remove loading image?
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
      // handle request failure
  });
};

function build_team_list(n) {
  var reg_url = "http://spreadsheets.google.com/feeds/list/0ApzvRgA17RKMdFpyNUh0eWJKWVBuRmJlSkh5TGpNeWc/"
  var format_suffix = '/public/values?alt=json';
  var team_url = reg_url+"1"+format_suffix;
  var teamdic = {
    'playerid':'gsx$_cre1l',
    'firstname':'gsx$_cn6ca',
    'lastname':'gsx$_cokwr',
    'team':'gsx$_cpzh4'
  };
  var $fieldset = $('<fieldset/>');
  reg_get(team_url).done(function(data, textStatus, jqXHR){
    console.log(data);
    var $teamselect = $('<select/>', {id: 'team'+n, name: 'team'+n})
      .append('<option value="" selected="selected">Please select a team</option>');
    var data_array = data.feed.entry;
    var team_info = [];
    for (var t = 0; t < data_array.length; t++) {
      team_info = data_array[t];
      $teamselect.append('<option value="'+team_info.gsx$sheet.$t+'">'+team_info.gsx$teamname.$t+'</option>');
    };
    var $playerselect = $('<select/>', {id: 'players'+n, name: 'players'+n, multiple: 'true'}).append('<option class="loading" value="">Waiting for team selection...</option>');
    $teamselect.change(function(){
      $playerselect.find('option').remove();
      $playerselect.append('<option class="loading" value="">Loading...</option>');
      reg_get(reg_url+$teamselect.val()+format_suffix).done(function(data, textStatus, jqXHR){
        $playerselect.find('option.loading').remove();
        var data_array = data.feed.entry;
        var player_info = [];
        for (var p = 0; p < data_array.length; p++){
          console.log(data_array[p]);
          player_info = data_array[p];
          $playerselect.append(
            '<option value="'
            +player_info[teamdic["playerid"]].$t+','
            +player_info[teamdic["firstname"]].$t+' '
            +player_info[teamdic["lastname"]].$t+'">'
            +player_info[teamdic["firstname"]].$t+' '
            +player_info[teamdic["lastname"]].$t
            +'</option>'
          );
        };
      });
    });
    $fieldset.append('<label for="team'+n+'">Team</label>')
      .append($teamselect)
      .append('<label for="players'+n+'">Players and Guests</label>')
      .append($playerselect);
  });
  return $fieldset;
};
//function callbackfun(json){
//  open_json = json;
//}
  </script>
<!--  <script src="http://spreadsheets.google.com/feeds/list/0ApzvRgA17RKMdFpyNUh0eWJKWVBuRmJlSkh5TGpNeWc/3/public/values?alt=json-in-script&amp;callback=callbackfun"></script>-->
</body>
</html>
