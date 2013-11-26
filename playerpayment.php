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
        <h1>Registration Payment</h1>
        <p>
          After submitting your registration form, please find select your team and find your name below.
          Guests are listed on the "Guest" team.
          You may pay for more than one person on a team by Control/Command-clicking names (may not work on touch devices).
          You may pay for people on more than one team (e.g. a player and a guest) by selecting "Add players from another team" and repeating the process.
        </p>
        <p>
          When everyone has been selected, select "Calculate total" and check the names and prices.
        </p>
        <p>
          When ready, the "Buy Now" button will ask you to authorize the payment via PayPal.  
          You will receive a confirmation message to your PayPal email shortly.
        </p>
        <p>
          Any problems with registration or payments should be directed to <a href="mailto:webmaster@hawaiiultimate.com">the webmaster</a>.
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
              data-notify_url="http://kaimanaklassik.com/control/ipn.php"
              data-return="http://kaimanaklassik.com/paymentconfirmation.php"
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
    var prices = {'player_early': 140, 'guest': 80};
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
  //var reg_url = "http://spreadsheets.google.com/feeds/list/0ApzvRgA17RKMdFpyNUh0eWJKWVBuRmJlSkh5TGpNeWc/";
  var div_order = ["Open","Women","Guests"];
  var reg_url_open = "http://spreadsheets.google.com/feeds/list/0ApzvRgA17RKMdGJsaVZHTjZsb204bUJRQUtCcS1Id1E/";
  var reg_url_women = "http://spreadsheets.google.com/feeds/list/0ApzvRgA17RKMdGxRdmpRcUxnNmZuRS1adkFYTmZUTkE/";
  var reg_url_guests = "http://spreadsheets.google.com/feeds/list/0ApzvRgA17RKMdEktVnhnczRJWEJOUzd3Wkd2dmR1cUE/";
  var reg_url_array = [reg_url_open, reg_url_women, reg_url_guests];
  var format_suffix = '/public/values?alt=json';
  //var team_url = reg_url+"1"+format_suffix;
  var team_request_array = [];
  for (var div=0; div<reg_url_array.length; div++) {team_request_array.push(reg_get(reg_url_array[div]+"1"+format_suffix));};
  var teamdic = {
    'playerid':'gsx$_cre1l',
    'firstname':'gsx$_cn6ca',
    'lastname':'gsx$_cokwr',
    'team':'gsx$_cpzh4'
  };
  var $fieldset = $('<fieldset/>');
  // Multiple async calls handled via method here:
  // http://stackoverflow.com/questions/9865586/jquery-when-troubleshooting-with-variable-number-of-arguments
  var defer = $.when.apply($, team_request_array);
  defer.done(function(){
    var $teamselect = $('<select/>', {id: 'team'+n, name: 'team'+n})
        .append('<option value="" selected="selected">Please select a team</option>');
    // Possibly handle situation in which responses is not an array.
    // But for now:
    $.each(arguments, function(index, data){
      var data_array = data[0].feed.entry;
      var team_info = [];
      // HACKY!  We know the feed.link[0].href is of the form https://spreadsheets.google.com/pub?key=0ApzvRgA17RKMdGJsaVZHTjZsb204bUJRQUtCcS1Id1E, so just take what's after the = sign.
      var division_key = data[0].feed.link[0].href.split('=')[1];
      $teamselect.append('<optgroup label="'+div_order[index]+'">');
      for (var t = 0; t < data_array.length; t++) {
        team_info = data_array[t];
        $teamselect.append('<option value="'+division_key+','+team_info.gsx$sheetnumber.$t+'">'+team_info.gsx$teamname.$t+'</option>');
      };
      $teamselect.append('</optgroup>');
    });
    var $playerselect = $('<select/>', {id: 'players'+n, name: 'players'+n, multiple: 'true'})
      .append('<option class="loading" value="">Waiting for team selection...</option>');
    $teamselect.change(function(){
      $playerselect.find('option').remove();
      $playerselect.append('<option class="loading" value="">Loading...</option>');
      // Know the value is passed of the form KEYSTRING,Sheet#.
      var team_vals = $teamselect.val().split(',');
      reg_get('http://spreadsheets.google.com/feeds/list/'+team_vals.join('/')+format_suffix).done(function(data, textStatus, jqXHR){
        $playerselect.find('option.loading').remove();
        var data_array = data.feed.entry;
        var player_info = [];
        for (var p = 0; p < data_array.length; p++){
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
  </script>
<!--  <script src="http://spreadsheets.google.com/feeds/list/0ApzvRgA17RKMdFpyNUh0eWJKWVBuRmJlSkh5TGpNeWc/3/public/values?alt=json-in-script&amp;callback=callbackfun"></script>-->
</body>
</html>
