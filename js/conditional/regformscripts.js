jQuery(document).ready(function(){
  var now = new Date(<?php echo json_encode(date('c', $_SERVER['REQUEST_TIME'])); ?>);
  var deadline = new Date(1000*<?php echo json_encode($date["reg_end"]); ?>);
  deadline = new Date(Date.parse(now)+1000*30);
  console.log('Now:'); console.log(now);
  console.log('Deadline:'); console.log(deadline);
  if (deadline - now < 10*60*1000 && deadline - now > -2000) {
    displayTimeWarning(deadline-now);
    var interval = setInterval(clocktick, 1000);
  } 
  //	var latewarningDOM = document.getElementById("deadline_warning");
  function clocktick() {
    now = Date(Date.parse(now)+1000);
    var d = new Date(now);
    var s = (deadline-d)/1000;
    console.log("We are "+(d>deadline?"after":"before")+" the deadline.");
    if (d > deadline) {
      reloadWithinTime(deadline-d);
      $('p#time_warning').remove();
    } else {
      if (s > 60 ) {
        $('span#increase_time').html(Math.floor(s/60));
        $('span#increase_time_units').html('minute'+(Math.floor(s/60)==1 ? '' : 's'));
      } else {
        $('span#increase_time').html(s);
        $('span#increase_time_units').html('seconds');
      }
    };
  };
});

function displayTimeWarning(t){
  var $target = $('#registration_instruction_wrapper');
  $target.append(
  '<p id="time_warning">'+
    'WARNING: Fee increase occurs in '+
    '<span id="increase_time">'+
    ( t<1000*60 ? t/1000 : Math.floor(t/1000/60) )+
    '</span>'+
    ' '+
    '<span id="increase_time_units">'+
    ( t<1000*60 ? 'seconds' : 'minute'+( Math.floor(t/1000/60)==1 ? '' : 's' ) )+
    '</span>.  '+
    'This will result in the page being reloaded, and you will have to start the payment process over.'+
    '</p>'
);
};