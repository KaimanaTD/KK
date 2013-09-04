jQuery(document).ready(function(){
  // Stupid nav bar spacing.
  var $alllistitems = $('nav li');
  var $irelement = $('.banner .ir');
  navbar($alllistitems);
  bannerResize($irelement, $(window).width());
  $(window).resize(function(){
    navbar($alllistitems);
    bannerResize($irelement, $(window).width());
  });
  // Carousel kickoff
  // Configuration options available: http://caroufredsel.dev7studios.com/configuration.php
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
  var mar = Math.min(0, Math.floor((width-960)/2));
  $imagereplaced.css({'margin-left':mar});
}