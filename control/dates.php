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
  'bids_close' => mktime(23,59,59,11,7,2014),
  'bid_notification' => mktime(23,59,59,11,15,2014),
  'late_start' => mktime(0,0,0,1,16,2015),
  'reg_end' => mktime(0,0,0,2,12,2015),
  'play_start' => mktime(8,0,0,2,14,2015),
  'play_end' => mktime(17,0,0,2,16,2015),
  'hat_start' => mktime(8,0,0,2,21,2015),
  'hat_end' => mktime(17,0,0,2,22,2015)
);
$str = array(
  'number' => '28',
  'abbreviation' => 'KK28'
);
$secsperday = 60*60*24;
?>
