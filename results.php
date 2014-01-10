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
	<section id="results">
      <article class="grid-100">
        <h1>Schedule &amp; Results</h1>
        <p>
          For a quicker connection, you may want to see the <a href="https://www.leaguevine.com/tournaments/19436/kaimana-klassik-open/">Open</a> and <a href="https://www.leaguevine.com/tournaments/19435/kaimana-klassik-women/">Women</a> results on Leaguevine.
        </p>
      </article>
      <article class="grid-100 grid-parent">
        <h2>Saturday Pools</h2>
        <div id="LV_sat_pools_open" class="grid-50 mobile-grid-100 grid-parent"></div>
        <div id="LV_sat_pools_women" class="grid-50 mobile-grid-100 grid-parent"></div>
      <article class="grid-100 grid-parent">
        <h3>Sunday Games</h3>
      </article>
      <article class="grid-100 grid-parent">
        <h3>Monday Games</h3>
      </article>
	</section>
    <?php /*
    <aside class="grid-30">
      <p>
        Sample Text.
      </p>
	</aside>
     */ ?>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
</body>
</html>
