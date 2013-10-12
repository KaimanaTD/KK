jQuery(document).ready(function(){
  // Stupid nav bar spacing.
  var $alllistitems = $('nav li');
  var $irelement = $('.banner .ir');
  navbar($alllistitems);
  bannerResize($irelement, window.innerWidth);
  $(window).resize(function(){
    navbar($alllistitems);
    bannerResize($irelement, window.innerWidth);
  });
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
	  $('div[class="carousel"][id="sponsors"]').carouFredSel({
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