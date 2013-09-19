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
      <article class="paypal">
        <h1>Team Bid Payment</h1>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="S6CZGX43UQEBW">
          <table>
            <tr><td><input type="hidden" name="on0" value="Kaimana Klassik 27 Team Deposit">Kaimana Klassik 27 Team Deposit</td></tr><tr><td><select name="os0">
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
</body>
</html>
