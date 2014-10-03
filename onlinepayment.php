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
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="S6CZGX43UQEBW">
          <table>
            <tr><td><input type="hidden" name="on0" value="Kaimana Klassik 28 Team Deposit">Kaimana Klassik 28 Team Deposit</td></tr><tr><td><select name="os0">
                <option value="Team Deposit">Team Deposit $420.00 USD</option>
            </select> </td></tr>
          </table>
          <input type="hidden" name="currency_code" value="USD">
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
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
