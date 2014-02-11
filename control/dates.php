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
  'late_start' => mktime(0,0,0,1,16,2014),
  'reg_end' => mktime(0,0,0,2,12,2014)
);
?>
