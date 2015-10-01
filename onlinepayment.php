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
  <title>Kaimana Team Bid Payment</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
</head>
<body>
  <?php include('partial/oldBrowser.php'); ?>
  <div class="wrapper grid-parent">
  <header>
    <?php include('partial/banner.php'); ?>
    <?php require('partial/nav.php'); ?>
  </header>
  <!-- Add your site or application content here -->
  <div class="content">
	<section class="grid-100">
      <article class="paypal">
        <h1>Team Bid Payment</h1>
		<p id="deadline_warning" class="hidden">
			<strong>NOTICE: Team bid payments submitted after midnight Hawaii Standard Time on <?php echo date('M j, Y',$date['bids_close']); ?>  will be considered late.</strong>
		</p>
        <li>Team Bid Registration can be found at <a href="http://ultimatecentral.com/en_US/e/kaimana-klassik-29">Ultimate Central</a></li>
      </article>
	</section>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
  <script>
	var now = new Date(<?php echo json_encode(date('c',$_SERVER['REQUEST_TIME'])); ?>);
	var deadline = new Date( <?php echo "'".date('c',$date['bids_close'])."'";?> );
	var latewarningDOM = document.getElementById("deadline_warning");
	var interval = setInterval(clocktick, 1000);
	function clocktick() {
		now = Date(Date.parse(now)+1000);
		var d = new Date(now);
		if (d > deadline) {
			latewarningDOM.className = latewarningDOM.className.replace(/(?:^|\s)hidden(?!\S)/,'');
		};
	};
  </script>
</body>
</html>
