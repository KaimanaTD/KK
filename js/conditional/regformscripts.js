jQuery(document).ready(function(){
  //  console.log('Now:');
  //  console.log(now);
  //  console.log('Deadline:');
  //  console.log(deadline);
  if (deadline - now < 24*60*60*1000 && deadline - now > -2000) {
    displayTimeWarning(deadline-now);
    var interval = setInterval(clocktick, 1000);
  } 
  //	var latewarningDOM = document.getElementById("deadline_warning");
  function clocktick() {
    now = Date(Date.parse(now)+1000);
    var d = new Date(now);
    var s = (deadline-d)/1000;
    //console.log("We are "+(d>deadline?"after":"before")+" the deadline.");
    if (d > deadline) {
      reloadWithinTime(deadline-d);
      $('p#time_warning').remove();
    } else {
      if (s > 3600) {
        $('span#increase_time').html(Math.floor(s/3600));
        $('span#increase_time_units').html('hour'+(Math.floor(s/3600)==1 ? '' : 's'));
      } else {
        if (s > 60 ) {
          $('span#increase_time').html(Math.floor(s/60));
          $('span#increase_time_units').html('minute'+(Math.floor(s/60)==1 ? '' : 's'));
        } else {
          $('span#increase_time').html(s);
          $('span#increase_time_units').html('seconds');
        }
      }
    };
  };
});

function displayTimeWarning(t){
  var $target = $('#registration_instruction_wrapper>p:last-of-type');
  $target.after(
    '<p id="time_warning">'+
    'WARNING: Online registration will only be available for another '+
    '<span id="increase_time">'+
    ( t<1000*60*60 
      ?
      ( t<1000*60 ? t/1000 : Math.floor(t/1000/60) )
      :
      Math.floor(t/1000/60/60)
    )+
    '</span>'+
    ' '+
    '<span id="increase_time_units">'+
    ( t<1000*60*60 
      ?
      ( t<1000*60 ? 'seconds' : 'minute'+( Math.floor(t/1000/60)==1 ? '' : 's' ) )
      :
      'hour'+( Math.floor(t/1000/60/60)==1 ? '' : 's' )
    )+
    '</span>.  '+
    'If you miss the online registration period, you must register and pay at the fields on Friday or Saturday.'+
    '</p>'
    );
};

function reloadWithinTime(t){
  var tol = 1001;
  if (t<tol) location.reload();
  return null;
}