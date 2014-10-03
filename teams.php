<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <?php 
    require('partial/head.php');
    define('SECURE_CONSTANT_173945d5ecd6224993ffc110dfb30fa0',1);
	require_once('control/dates.php');
  ?>
  <title><?php echo $str['abbreviation'];?> | Teams</title>
  <meta name="description" content="This year's crop of teams attending Kaimana Klassik.">
  <meta name="keywords" content="Kaimana Klassik ultimate Hawaii frisbee Waimanalo Oahu open women disc teams">
  <style>
    #ajaxloader {background: url('img/ajax-loader.gif') no-repeat; width:16px; height:16px; margin: 0 auto;}
  </style>
  <link rel="stylesheet" href="css/LV.css">
</head>
<body>
  <?php include('partial/oldBrowser.php'); ?>
  <div class="wrapper grid-parent">
  <header>
    <?php include('partial/banner.php'); ?>
    <?php require('partial/nav.php'); ?>
	
	
  </header>
  <!-- Add your site or application content here -->
  <div class="content" id="teams">
	<section class="grid-60 LV">
		<h1>Teams</h1>
		<article id="LV_list_teams">
			<p>This year's lineup features teams from all over the globe: Australia to France and back to Hawaii.</p>
            <div id="ajaxloader"></div>
		</article>
	</section>
    <aside class="grid-40">
      <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/KaimanaKlassik/kaimana-teams" data-widget-id="441843347980697600">Tweets from https://twitter.com/KaimanaKlassik/kaimana-teams</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </aside>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
</body>
</html>
