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