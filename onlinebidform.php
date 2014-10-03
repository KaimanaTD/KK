<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php  ?>
<head>
  <?php 
	require('partial/head.php'); 
	define('SECURE_CONSTANT_173945d5ecd6224993ffc110dfb30fa0',1);
	require_once('control/dates.php');
  ?>
  <title>Kaimana Team Bid Form</title>
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
		<?php if ($_SERVER['REQUEST_TIME'] < $date["reg_end"]) {?>
			<p>
			  Please complete the form below and submit your payment of $420 either via <a href="onlinepayment.php">PayPal</a> or <a href="bidding.php">check</a>.
			</p>
			<p id="deadline_warning" class="hidden">
				<strong>NOTICE: Team bid payments submitted after midnight Hawaii Standard Time on November 8, 2013 will be considered late.</strong>
			</p>
			<div class="googleform">
			  <iframe src="https://docs.google.com/forms/d/1XGdHafa8j4MB1oX0Y7_rEvRO6EBxxq5_JgTrtzHJGug/viewform?embedded=true" width="760" height="850" frameborder="0" marginheight="0" marginwidth="0">Your browser may not support the technology used to display this registration form.  Please fill out the form on its <a href="https://docs.google.com/forms/d/1XGdHafa8j4MB1oX0Y7_rEvRO6EBxxq5_JgTrtzHJGug/viewform?usp=send_form">external site</a>.</iframe>
			</div>
		<?php } else { ?>
			<p>
			  Sorry, the team bid window has closed.  Please <a href="mailto:kaimanatd@gmail.com">contact the TD's</a> to see if another team would like to merge with yours.
			</p>
		<?php } ?>
      </article>
	</section>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
  <script>
	var now = new Date(<?php echo json_encode(date('c',$_SERVER['REQUEST_TIME'])); ?>);
	var deadline = new Date( '2014-11-07T23:59:59-10:00');
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
