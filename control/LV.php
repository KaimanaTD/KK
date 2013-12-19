<?php
define('SECURE_CONSTANT_173945d5ecd6224993ffe110dfb30fa0',1);
date_default_timezone_set('Pacific/Honolulu');
require_once 'LV_settings.php';
$single_params = array(
    'tournament_id' => 'tournaments/',
    'tournament_team' => 'tournament_teams/',
    'team_id' => 'teams/'
);
$multiple_params = array(
    'tournaments' => 'tournaments/?tournament_ids=',
    'tournament_teams' => 'tournament_teams/?tournament_ids=',
    'teams' => 'teams/?team_ids='    
);
$curl = curl_init();
curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_HTTPHEADER => array(
          'Content-type' => 'application/x-www-form-urlencoded',
          'Accept' => 'application/json',
          'Authorization' => 'bearer ' . KK_LEAGUEVINE_ACCESS_TOKEN 
      )
  ));
foreach ($multiple_params as $k => $v) {
  if (isset($_GET[$k])) {
    curl_setopt_array($curl, array(
        CURLOPT_URL => KK_LEAGUEVINE_API_URL . $v . urlencode($_GET[$k]) . '&access_token=' . KK_LEAGUEVINE_ACCESS_TOKEN
    ));
    break;
  }
}
foreach ($single_params as $k => $v) {
  if (isset($_GET[$k])) {
    curl_setopt_array($curl, array(
        CURLOPT_URL => KK_LEAGUEVINE_API_URL . $v . $_GET[$k] . '/?access_token=' . KK_LEAGUEVINE_ACCESS_TOKEN
    ));
    break;
  }
}
$result = curl_exec($curl);
curl_close($curl);
echo $result;
?>
