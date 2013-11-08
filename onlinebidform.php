<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <?php require('partial/head.php'); ?>
  <title></title>
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
      <article>
        <h1>Team Bids</h1>
        <p>
          Please complete the form below and submit your payment of $420 either via <a href="onlinepayment.php">PayPal</a> or <a href="bidding.php">check</a>.
        </p>
		<p id="deadline_warning" class="hidden">
			<strong>NOTICE: Team bid payments submitted after midnight Hawaii Standard Time on November 8, 2013 will be considered late.</strong>
		</p>
        <div class="googleform">
          <iframe src="https://docs.google.com/a/hawaiiultimate.com/forms/d/1kKmjSfAUAeIAbmy_p2jJj71U-SLRba-sh29u9PAYpKM/viewform?embedded=true" width="760" height="850" frameborder="0" marginheight="0" marginwidth="0">Your browser may not support the technology used to display this registration form.  Please fill out the form on its <a href="https://docs.google.com/forms/d/1kKmjSfAUAeIAbmy_p2jJj71U-SLRba-sh29u9PAYpKM/viewform">external site</a>.</iframe>
        </div>
      </article>
	</section>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
  <script>
	var now = new Date(<?php echo json_encode(date('c',$_SERVER['REQUEST_TIME'])); ?>);
	var deadline = new Date( '2013-11-08T23:59:59-10:00');
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
