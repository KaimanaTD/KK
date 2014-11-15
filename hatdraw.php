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
  <title><?php echo $str['abbreviation'];?> | Hat Draw</title>
  <meta name="description" content="Information on the post-Kaimana Hat Draw.">
  <meta name="keywords" content="Kaimana Klassik ultimate Hawaii frisbee Waimanalo Oahu open women disc hat draw hatdraw">
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
      <!--<article>-->
        <h1>Post-Kaimana Maui Hat Draw</h1>
        <h2>
          <?php echo date('F j',$date['hat_start']).'-'.date('j, Y',$date['hat_end']).' '; ?>
          on Maui</h2>
       <p>
          Stay tuned for details regarding the Maui Hat Draw!  
        </p>
      <!--</article>-->
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
