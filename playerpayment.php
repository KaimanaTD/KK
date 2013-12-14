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
  <style>
    div.select_pair_wrapper {line-height:.75rem;}
    form#registration select.player {vertical-align:top;}
    form#registration button {-moz-appearance:none; padding:.2rem; margin-top:.5rem; margin-bottom:.5rem;}
    div#payment_summary table {width:100%; font-size:110%; margin-bottom:1rem;}
    div#payment_summary table td:first-child {text-align:left; padding-left:.5rem;}
    div#payment_summary table tr:last-of-type {font-weight:bold; border-top:1px solid white;}
    div#payment_summary table tr:last-of-type td:first-of-type {text-align:right;}
    div#reg_pay {text-align:center;}
  </style>
  <title>Player Payment</title>
  <meta name="description" content="Kaimana Klassik 27 player registration payment portal">
  <meta name="keywords" content="Kaimana ultimate frisbee credit card paypal oahu">
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
      <article class="grid-parent">
        <div class="grid-100">
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
        </div>
        <div id="reg_form" class="grid-50 mobile-grid-100 grid-parent">
          <form id="registration">
            <?php #NOTE: Form contents injected by jQuery, below. ?>
            <button id="calculate" class="grid-100 mobile-grid-100" type="submit">Calculate total</button>
          </form>
        </div>
        <div id="payment_summary" class="grid-50 mobile-grid-100">
          <table></table>
          <div id="reg_pay">
            <script src="js/paypal-button.min.js?merchant=mondochun@juno.com" 
                data-button="buynow" 
                data-name="KK27Registration" 
                data-amount="1" 
                data-shipping="0" 
                data-tax="0" 
                data-notify_url="http://kaimanaklassik.com/control/ipn.php"
                data-return="http://kaimanaklassik.com/paymentconfirmation.php"
            ></script>
          </div>
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
    // Magic constants
    var prices = {'player_early': 140, 'player_late':165, 'guest': 80};
    prices['player'] = prices.player_early;
    var PAYPAL_ITEM_MAXLEN = 127;
    // Registration fanciness
	var $PPbutton = $('div#reg_pay');
	$PPbutton.hide();
    // Nifty Ajax methodology:
    // http://stackoverflow.com/questions/8840257/jquery-ajax-handling-continue-responses-success-vs-done
    var $regform = $('form#registration');
    $regform.on('click', 'button.add_team', function(){
      var $all_fs = $regform.find('fieldset');
      var n = $all_fs.length;
      var $next_fs = build_team_list(n+1);
      $all_fs.last().after($next_fs);
    }).on('click', 'button.rem_team', function(){
      var $fs_to_remove = $(this).parent();
      $fs_to_remove.remove();
    });
    var $firstfs = build_team_list(1);
    $regform.prepend($firstfs);
    $regform.on('submit',function(e){
      e.preventDefault();
      var form_vals = $(this).serializeArray();      
      var players = [];
      var guests = [];
      var subtotal = 0;
      var all_ids = [];
      var all_names = [];
      $.each(form_vals.filter(function(el){return el['name'].match(/^players.*$/gi);}), function(ind,val){
        // Should be in the form [ ID, First  Last ]
        var item = val.value.split(',');
        all_names.push(item[1]);
        if (item[0][2] == 2) {
          subtotal += prices.guest;
          all_ids.push(item[0]);
          guests.push('<tr><td>'+item.slice(1).join()+'</td><td>$'+prices.guest+'</td></tr>');
        } else if (item[0][2] == 0 || item[0][2] == 1) {
          subtotal += prices.player;
          all_ids.push(item[0]);
          players.push('<tr><td>'+item.slice(1).join()+'</td><td>$'+prices.player+'</td></tr>');
        };
      });
      if (subtotal > 0) {$PPbutton.show();};
      var table = '<tr><th>Name</th><th>Price</th></tr>';
      if (players.length > 0) {
        table += '<tr><td style="font-style:italic; padding:.25rem 1.5rem;">Players</td><td></td></tr>';
        for (var p = 0; p < players.length; p++) {
          table += players[p];
        };
      };
      if (guests.length > 0) {
        table += '<tr><td style="font-style:italic; padding:.25rem 1.5rem;">Guests</td><td></td></tr>';
        for (var g = 0; g < guests.length; g++) {
          table += guests[g];
        };
      };
      table += '<tr><td>Total:</td><td>$'+subtotal+'</td>';
      var $table = $('div#payment_summary table').html(table);
      var $paypal_button = $('form.paypal-button');
      var $amount = $paypal_button.find('input[name="amount"]').attr({"value":subtotal});
      var $custom = $paypal_button.find('input[name="custom"]');
      if ($custom.length > 0) {
        $custom.attr({"value":all_ids.join(',')});
      } else {
        $paypal_button.prepend('<input type="hidden" name="custom" value="'+all_ids.join(',')+'">');
      };
      var $itemname = $paypal_button.find('input[name="item_name"]');
      var all_names_string = 'KK27Registration for ';
      var name_to_add = '';
      var num_names_rem = 0;
      while (all_names.length>0) {
        if (name_to_add === '') {
          name_to_add = all_names.shift();
          all_names_string += name_to_add;
        } else if (all_names.length == 1) {
          name_to_add = ', and ' + all_names.shift();
          if (all_names_string.length + name_to_add.length > PAYPAL_ITEM_MAXLEN) {
            num_names_rem = 1+all_names.length;
            break
          }
          all_names_string += name_to_add;
        } else {
          name_to_add = ', ' + all_names.shift();
          if (all_names_string.length + name_to_add.length > PAYPAL_ITEM_MAXLEN) {
            num_names_rem = 1+all_names.length;
            break
          }
          all_names_string += name_to_add;
        }
      }
      if (num_names_rem > 0) all_names_string += ', and ' + num_names_rem + ' more';
      $itemname.attr({"value":all_names_string});
    });
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
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
      // handle request failure
  });
};

function build_team_list(n) {
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
    'receiveddate':'_ciyn3',
    'privatereg':'_ckd7g',
    'paymentmeth':'_clrrx'
  };
  var $fieldset = $('<fieldset/>');
  var $teamselect = $('<select/>', {'id':'team'+n, 'name':'team'+n, 'class':'reg team'})
        .append('<option class="loading" value="" disabled="disabled" selected="selected">Loading teams...</option>');
  var $playerselect = $('<select/>', {'id':'players'+n, 'name':'players'+n, 'multiple':'true', 'class':'reg player'})
    .append('<option class="loading" value="" disabled="disabled" selected="selected">Waiting for team selection...</option>');
  $.when(reg_get(sskey_open), reg_get(sskey_women), reg_get(sskey_guests))
    .done(function(resp_open,resp_women,resp_guests){
      var $opengroup = $('<optgroup/>',{'label':'OPEN'}),
        $womengroup = $('<optgroup/>',{'label':'WOMEN'}),
        $guestgroup = $('<optgroup/>',{'label':'GUESTS'});
      $opengroup.append(write_team_names(resp_open,sskey_open).join(''));
      $womengroup.append(write_team_names(resp_women,sskey_women).join(''));
      $guestgroup.append(write_team_names(resp_guests,sskey_guests).join(''));
      $teamselect.find('option.loading').remove();
      $teamselect.append('<option class="instructions" value="" disabled="disabled" selected="selected">Select a team...</option>')
        .append($opengroup).append($womengroup).append($guestgroup);
    }); // end .when.done
  $teamselect.change(function(){
    $playerselect.find('option').remove();
    $playerselect.append('<option class="loading" value="">Loading...</option>');
    // Know the value is passed of the form KEYSTRING,Sheet Name.
    var team_vals = $teamselect.val().split(',');
    reg_get(team_vals[0],team_vals[1]).done(function(data, textStatus, jqXHR){
      $playerselect.find('option.loading').remove();
      var data_array = data;
      var player_info = [];
      var $opt;
      for (var p = 0; p < data_array.length; p++){
        player_info = data_array[p];
        if ( player_info[teamdic["privatereg"]] != 1 ) {
          $opt = $('<option/>', {
              'value':player_info[teamdic["playerid"]]+','+player_info[teamdic["firstname"]]+' '+player_info[teamdic["lastname"]],
              'text':player_info[teamdic["firstname"]]+' '+player_info[teamdic["lastname"]]
          });
          if (player_info[teamdic["paymentmeth"]]!=="" || player_info[teamdic["paymentmeth"]]=="FRAUD") {
            $opt.attr({'disabled':'disabled'});
            // Add help message explaining the grey-ness.
          };
          $playerselect.append($opt);
        };
      };
    });
  });
  var $add_button = $('<button/>', {
    'class':"add_team grid-50 mobile-grid-50",
    'type':"button",
    'name':"add_team",
    'text':'Add team'
  });
  var $rem_button = $('<button/>', {
    'class':"rem_team grid-50 mobile-grid-50",
    'type':"button",
    'name':"rem_team",
    'text':'Remove team'
  });
  var $team_pair = $('<div/>', {'class':'grid-100 grid-parent select_pair_wrapper'})
    .append('<label for="team'+n+'" class="grid-20 mobile-grid-100">Team</label>')
    .append($teamselect.addClass("grid-80 mobile-grid-100"));
  var $player_pair = $('<div/>', {'class':'grid-100 grid-parent select_pair_wrapper'})
    .append('<label for="players'+n+'" class="grid-30 mobile-grid-100">Players and Guests</label>')
    .append($playerselect.addClass("grid-70 mobile-grid-100"));
  $fieldset.append($team_pair).append($player_pair)
  if (n==1) {
    $add_button.addClass("prefix-50 mobile-prefix-50");
    $fieldset.append($add_button);
  } else {
    $fieldset.append($rem_button).append($add_button);;
  };
  return $fieldset;
  // SUBFUNCTION
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
