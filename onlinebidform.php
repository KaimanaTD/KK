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
        <div class="googleform">
          <iframe src="https://docs.google.com/a/hawaiiultimate.com/forms/d/1kKmjSfAUAeIAbmy_p2jJj71U-SLRba-sh29u9PAYpKM/viewform?embedded=true" width="760" height="850" frameborder="0" marginheight="0" marginwidth="0">Your browser may not support the technology used to display this registration form.  Please fill out the form on its <a href="https://docs.google.com/forms/d/1kKmjSfAUAeIAbmy_p2jJj71U-SLRba-sh29u9PAYpKM/viewform">external site</a>.</iframe>
        </div>
      </article>
	</section>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
</body>
</html>
