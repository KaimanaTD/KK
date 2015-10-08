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
        <h1>Post-Kaimana Big Island Hat Draw</h1>
        <h2>
          <?php echo date('F j',$date['hat_start']).'-'.date('j, Y',$date['hat_end']).' '; ?>
          on Big Island</h2>
       <p>
When: February 20th - 21st, 2016.
Where: Hilo, Hawaii on the Big Island of Hawaii.
What:  Coed hat draw format (all participants will be placed on a coed team based upon their skills).
Cost:  $95 entry fee for payments recieved prior to 1/15/16.  $125 entry fee for payments recieved after 1/15/16.
Included:  2 free nights camping, and 2 dinners at Big Kahuna Ranch on 2/19 and 2/20/16.  A simple breakfast before the games on 2/20 and 2/21/16.  Also included will be lots of fun, prizes, entertainment, beer, and Ultimate.
 
This tournament will take place in beautiful Hilo, Hawaii.  You may want to take an extra week to enjoy some of the marvelous sites here on the Big Island.  Within a few minutes are jungles, beaches, volcanoes, water falls, museums, farmer's markets and historic downtown Hilo.  There is also the Kona side of the island with sunny beach resorts and amazing snorkeling.  This tournament will occur during the height of the Humpback whale migration, so keep an eye out for them splashing around while you are visiting.       </p>
      Register Here! <a href="http://ultimatecentral.com/en_US/e/hilo-hat-draw-2016">Ultimate Central</a></li> 
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
