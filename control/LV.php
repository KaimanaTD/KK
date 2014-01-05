<?php
define('SECURE_CONSTANT_173945d5ecd6224993ffe110dfb30fa0',1);
date_default_timezone_set('Pacific/Honolulu');
require_once 'LV_settings.php';
if (isset($_GET['trunk'])) {
  $trunk = $_GET['trunk'];
} else {
  trigger_error('No trunk defined in the LV request.');
  return null;
}
if (isset($_GET['query'])) {
  $query_string = $_GET['query'];
  $query_string = $query_string . '&access_token=' . KK_LEAGUEVINE_ACCESS_TOKEN;
} else {
  $query_string = 'access_token=' . KK_LEAGUEVINE_ACCESS_TOKEN;
}
$url = KK_LEAGUEVINE_API_URL . $trunk . '/?' . $query_string;
$curl = curl_init();
curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_HTTPHEADER => array(
          'Content-type' => 'application/x-www-form-urlencoded',
          'Accept' => 'application/json',
          'Authorization' => 'bearer ' . KK_LEAGUEVINE_ACCESS_TOKEN 
      )
  )
);
$result = curl_exec($curl);
curl_close($curl);
$out1 = json_decode($result, true);
$out = array_merge($out1, array($url));
$outJSON = json_encode($out);
echo $outJSON;
?>