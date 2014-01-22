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
	  }).children().removeClass("hidden")
		.filter(function(ind){return $(this).hasClass("spinner");})
		.remove();
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
      }).children().removeClass("hidden")
		.filter(function(ind){return $(this).hasClass("spinner");})
		.remove();
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