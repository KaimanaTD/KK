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
	<section class="grid-100">
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
          <script src="js/paypal-button.min.js?merchant=photo-facilitator@claymckell.com" 
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
<!--    <aside class="grid-30">
      <p>
        Sample Text.
      </p>
	</aside>-->
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

function reg_get(key,sheetname) {
  sheetname = (typeof sheetname !== 'undefined' ? sheetname : 'TeamSheetMap');
  return $.ajax("control/reg.php",{
      type: "GET",
      data: {
        'sskey':key,
        'sheetname':sheetname
      },
      dataType: "json"
  }).always(function(){
      // remove loading image?
//      console.log('Have ajaxed');
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
      // handle request failure
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
  });
};

function build_team_list(n) {
//  reg_get('0ApzvRgA17RKMdGJsaVZHTjZsb204bUJRQUtCcS1Id1E').done(function(data){
//        alert(data);
//      });
  //var reg_url = "http://spreadsheets.google.com/feeds/list/0ApzvRgA17RKMdFpyNUh0eWJKWVBuRmJlSkh5TGpNeWc/";
  var div_order = ["Open","Women","Guests"];
  var sskey_open = "0ApzvRgA17RKMdGJsaVZHTjZsb204bUJRQUtCcS1Id1E";
  var sskey_women = "0ApzvRgA17RKMdGxRdmpRcUxnNmZuRS1adkFYTmZUTkE";
  var sskey_guests = "0ApzvRgA17RKMdEktVnhnczRJWEJOUzd3Wkd2dmR1cUE";
  var sskeys = [[sskey_open], [sskey_women], [sskey_guests]];
  var teamdic = {
    'playerid':'_cre1l',
    'firstname':'_cn6ca',
    'lastname':'_cokwr',
    'team':'_cpzh4',
    'receivedamt':'_chk2m',
    'receiveddate':'_ciyn3'
  };
  var $fieldset = $('<fieldset/>');
  var $teamselect = $('<select/>', {id: 'team'+n, name: 'team'+n})
        .append('<option class="loading" value="" selected="selected">Loading teams...</option>');
  var $playerselect = $('<select/>', {id: 'players'+n, name: 'players'+n, multiple: 'true'})
    .append('<option class="loading" value="">Waiting for team selection...</option>');
  $.when(reg_get(sskey_open), reg_get(sskey_women), reg_get(sskey_guests))
    .done(function(resp_open,resp_women,resp_guests){
      console.log(resp_open);
      var $opengroup = $('<optgroup/>',{label:'OPEN'}),
        $womengroup = $('<optgroup/>',{label:'WOMEN'}),
        $guestgroup = $('<optgroup/>',{label:'GUESTS'});
      $opengroup.append(write_team_names(resp_open,sskey_open).join(''));
      $womengroup.append(write_team_names(resp_women,sskey_women).join(''));
      $guestgroup.append(write_team_names(resp_guests,sskey_guests).join(''));
      $teamselect.find('option.loading').remove();
      $teamselect.append('<option class="instructions" value="" selected="selected">Select a team...</option>')
        .append($opengroup).append($womengroup).append($guestgroup);
    }); // end .when.done
  $teamselect.change(function(){
    $playerselect.find('option').remove();
    $playerselect.append('<option class="loading" value="">Loading...</option>');
    // Know the value is passed of the form KEYSTRING,Sheet Name.
    var team_vals = $teamselect.val().split(',');
    reg_get(team_vals[0],team_vals[1]).done(function(data, textStatus, jqXHR){
      console.log(data);
      $playerselect.find('option.loading').remove();
      var data_array = data;
      var player_info = [];
      for (var p = 0; p < data_array.length; p++){
        player_info = data_array[p];
        $playerselect.append(
          '<option value="'
          +player_info[teamdic["playerid"]]+','
          +player_info[teamdic["firstname"]]+' '
          +player_info[teamdic["lastname"]]+'">'
          +player_info[teamdic["firstname"]]+' '
          +player_info[teamdic["lastname"]]
          +'</option>'
        );
      };
    });
  });
  $fieldset.append('<label for="team'+n+'">Team</label>')
    .append($teamselect)
    .append('<label for="players'+n+'">Players and Guests</label>')
    .append($playerselect);
  return $fieldset;
  
  function write_team_names(response,div_key) {
    var out = [];
    $.each(response[0],function(ind,val){
      out.push('<option value="' + div_key + ',' + val.teamname + '">' + val.teamname + '</option>');
    });
    return out;
  };
};


  </script> 
</body>
</html>
