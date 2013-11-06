if (!Array.prototype.filter) {
  Array.prototype.filter = function (fn, context) {
    var i,
        value,
        result = [],
        length;

        if (!this || typeof fn !== 'function' || (fn instanceof RegExp)) {
          throw new TypeError();
        }

        length = this.length;

        for (i = 0; i < length; i++) {
          if (this.hasOwnProperty(i)) {
            value = this[i];
            if (fn.call(context, value, i, this)) {
              result.push(value);
            }
          }
        }
    return result;
  };
}

jQuery(document).ready(function(){
  // Select navigation syncing.
  // Note this only works for pages in the top level directory.
  var path_split = window.location.pathname.split("/");
  var needle = path_split[path_split.length-1];
  $("nav select option").filter(function(ind) {return $(this).attr("value") == needle;}).attr({"selected":"selected"});
  // Carousel kickoff
  // Configuration options available: http://caroufredsel.dev7studios.com/configuration.php
  if ($('div[class="carousel"]').length > 0) {
	  $('div[class="carousel"][id="lead"]').carouFredSel({
		width: "100%",
		padding: 10,
		align: "center",
		items: {
		  visible: 1
		},
		scroll: {
		  pauseOnHover: "immediate-resume",
		  fx: "fade"
		},
		auto: {
		  timeoutDuration: 2000
		}
	  });
      var sponsor_carousel = $('div[class="carousel"][id="sponsors"]');
      sponsor_carousel.carouFredSel({
        circular: true,
    //    responsive: true,
        width: "100%",
        align: "center",
        items: {
          visible: 1,
          width: "variable"
        },
        scroll: {
          pauseOnHover: "immediate-resume",
          fx: "fade"
        },
        auto: {
          timeoutDuration: 4000
        }
      });
      sponsor_carousel.children('img').each(function(){
        var sponsor_url = $(this).attr('data-url');
        if (sponsor_url) {
          $(this)
            .css({'cursor':'pointer'})
            .click(function(){
                        console.log(sponsor_url);
              window.open(sponsor_url,'_blank');
            });          
        };
      });
  };
  var $allVideos = $('iframe[src^="//player.vimeo.com"]'),
      $fluidEl = $('aside');
  $allVideos.each(function(){
    $(this).data('aspectRatio',this.height / this.width)
      .removeAttr('height')
      .removeAttr('width');
  });
  $(window).resize(function(){
    var newWidth = $fluidEl.width();
    $allVideos.each(function(){
      var $el = $(this);
      $el.width(newWidth).height(newWidth * $el.data('aspectRatio'));
    });
  }).resize();
  // Registration fanciness
  // Nifty Ajax methodology:
  // http://stackoverflow.com/questions/8840257/jquery-ajax-handling-continue-responses-success-vs-done
  var $regform = $('form#registration');
  var prices = {'player_early': 140, 'guest': 60};
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
        if (val["value"][2] == 2) {
          subtotal += prices.guest;
          all_ids.push(val[0]);
          guests.push('<tr><td>'+render_player_name(val[1],val[2])+'</td><td>'+prices.guest+'</td></tr>');
        } else {
          subtotal += prices.player;
          all_ids.push(val[0]);
          players.push('<tr><td>'+render_player_name(val[1],val[2])+'</td><td>'+prices.player+'</td></tr>');
        };
      });
      console.log(players);
      console.log(guests);
      var table = '<table><tr><th>Name</th><th>Price</th></tr>';
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
      var $summary = ('<div></div>').append(table);
      console.log($summary);
      $regform.after($summary);
      // PSEUDOCODE:
//      var $paypalbutton; 
//      $paypalbutton.attr({'price': price, 'item': all_ids.join(',')});
//      $paypalbutton.show;
    });
  };
})

function navbar($lilist) {
  $lilist.each(function(ind){
    var w = $(this).width();
    var $anchor = $(this).children();
    var dif = w - $anchor.width();
    var lp = Math.floor(dif/2);
    var rp = Math.ceil(dif/2);
    $anchor.css({
      'padding-left':lp+'px',
      'padding-right': rp+'px'
    });
  });
}

function bannerResize($imagereplaced, width) {
  // The 560px breakpoint corresponds to a 35em mobile breakpoint.  This value is also used in main.css.
  var mar = (width>560 ? Math.min(0, Math.floor((width-960)/2)) : 0);
  $imagereplaced.css({'margin-left':mar});
}

function reg_get(url) {
  return $.ajax(url,{
      type: "GET",
      dataType: "text"
  }).always(function(){
      // remove loading image?
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
      // handle request failure
  });
};

function build_team_list(n) {
  var reg_url = "https://docs.google.com/spreadsheet/pub?key=0ApzvRgA17RKMdFpyNUh0eWJKWVBuRmJlSkh5TGpNeWc&output=csv";
  var team_url = reg_url+'&single=true&gid=2';
  var $fieldset = $('<fieldset/>');
  reg_get(team_url).done(function(data, textStatus, jqXHR){
    var $teamselect = $('<select/>', {id: 'team'+n, name: 'team'+n})
      .append('<option value="" selected="selected">Please select a team</option>');
    var data_array = data.split("\n");
    var team_info = [];
    for (var t = 1; t < data_array.length; t++) {
      team_info = data_array[t].split(',');
      $teamselect.append('<option value="'+team_info[1]+'">'+team_info[0]+'</option>');
    };
    var $playerselect = $('<select/>', {id: 'players'+n, name: 'players'+n, multiple: 'true'}).append('<option class="loading" value="">Waiting for team selection...</option>');
    $teamselect.change(function(){
      $playerselect.find('option').remove();
      $playerselect.append('<option class="loading" value="">Loading...</option>');
      reg_get(reg_url+'&single=true&gid='+$teamselect.val()).done(function(data, textStatus, jqXHR){
        $playerselect.find('option.loading').remove();
        var data_array = data.split("\n");
        var player_info = [];
        for (var p = 1; p < data_array.length; p++){
          player_info = data_array[p].match(/(".*?"|[^",]+)(?=\s*,|\s*$)/g);
          $playerselect.append('<option value="'+player_info[3]+'">'+player_info[0].replace(/^\"|\"$/g,"")+' '+player_info[1].replace(/^\"|\"$/g,"")+'</option>');
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

// Son of Suckerfish JS.  http://www.htmldog.com/articles/suckerfish/
sfHover = function() {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
