<?php
define('SECURE_CONSTANT_173945d5ecd6224993ffe110dfb30fa0',1);
date_default_timezone_set('Pacific/Honolulu');
require_once 'LV_settings.php';
$out = array();
if (isset($_GET['tournament_id'])) {
  array_push($out,"Found set key.");
  define('LV_TOURNAMENT_ID',$_GET['tournament_id']);
  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_URL => KK_LEAGUEVINE_API_URL . 'tournaments/' . LV_TOURNAMENT_ID . '/?access_token=' . KK_LEAGUEVINE_ACCESS_TOKEN,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_HTTPHEADER => array(
          'Content-type' => 'application/x-www-form-urlencoded',
          'Accept' => 'application/json',
          'Authorization' => 'bearer ' . KK_LEAGUEVINE_ACCESS_TOKEN 
      )
  ));
  $result = curl_exec($curl);
  curl_close($curl);
  array_push($out, $result, curl_getinfo($curl), KK_LEAGUEVINE_API_URL . 'tournaments/' . LV_TOURNAMENT_ID . '/?access_token=' . KK_LEAGUEVINE_ACCESS_TOKEN);
} else {
  array_push($out, "Nothing Found.");
}
echo $result;
?>
