<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <?php require('partial/head.php'); ?>
  <title>Player Registration</title>
  <meta name="description" content="Kaimana 27 player registration form">
  <meta name="keywords" content="Kaimana Klassik Hawaii player registration ultimate Oahu frisbee">
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
        <h1>Player Registration</h1>
		<p>
			Please complete the registration form below.  Prior to submitting, please read the <a href="KK27Waiver.pdf" target="_blank">waiver</a>.
		</p>
        <div class="googleform">
          <iframe src="https://docs.google.com/forms/d/1g05kkyGYl45vNeyDpklFxtwgHe8JxU-JGKq4rXRP-dQ/viewform?embedded=true" width="700" height="1650" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
        </div>
      </article>
	</section>
<!--    <aside class="grid-30">
      <p>
        Sample Text.
      </p>
	</aside>-->
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
</body>
</html>
