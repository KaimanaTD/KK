jQuery(document).ready(function(){
  // Stupid nav bar spacing.
  var $alllistitems = $('nav li');
  navbar($alllistitems);
  $(window).resize(function(){
    navbar($alllistitems);
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