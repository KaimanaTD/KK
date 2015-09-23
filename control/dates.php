<?php
if (
    !(
      defined('SECURE_CONSTANT_173945d5ecd6224993ffc110dfb30fa0')
      ||
      defined('SECURE_CONSTANT_IPN_f4ad6a26fd873896aec4f48f50208fe4')
      )
  ) {
    die("Access denied.");  
  }
date_default_timezone_set('Pacific/Honolulu');
# mktime(hh,mm,ss,MM,DD,YYYY)
$date = array(
  'bids_close' => mktime(23,59,59,11,20,2015),
  'bid_notification' => mktime(23,59,59,11,30,2015),
  'late_start' => mktime(0,0,0,1,16,2016),
  'reg_end' => mktime(0,0,0,2,5,2016),
  'play_start' => mktime(8,0,0,2,13,2016),
  'play_end' => mktime(17,0,0,2,15,2016),
  'hat_start' => mktime(8,0,0,2,20,2016),
  'hat_end' => mktime(17,0,0,2,21,2016)
);
$str = array(
  'number' => '29',
  'abbreviation' => 'KK29'
);
$secsperday = 60*60*24;
?>
