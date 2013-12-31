<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <?php require('partial/head.php'); ?>
  <title>KK27 | Teams</title>
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
	<section class="grid-70 LV">
		<h1>Teams</h1>
		<article id="LV_list_teams">
			<p>This year's lineup features teams from all over the globe: Australia to France and back to Hawaii.</p>
            <div id="ajaxloader"></div>
		</article>
	</section>
    <aside class="grid-30">
      <p>
        Is your team social?  Contact the <a href="mailto:webmaster@hawaiiultimate.com">webmaster</a> to feature your team's online presence here.
      </p>
	</aside>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
</body>
</html>
