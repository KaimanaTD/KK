<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
  <head>
    <?php
    require('partial/head.php');
    define('SECURE_CONSTANT_173945d5ecd6224993ffc110dfb30fa0', 1);
    require_once 'control/dates.php';
    ?>
    <title>Player Registration</title>
    <meta name="description" content="Kaimana 27 player registration form">
    <meta name="keywords" content="Kaimana Klassik Hawaii player registration ultimate Oahu frisbee">
    <script>
      now = new Date(<?php echo json_encode(date('c', $_SERVER['REQUEST_TIME'])); ?>);
      deadline = new Date(1000*<?php echo json_encode($date["reg_end"]); ?>);
    </script>
  </head>
  <body>
    <?php include('partial/oldBrowser.php'); ?>
    <div class="wrapper grid-parent">
      <header>
        <?php include('partial/banner.php'); ?>
        <?php require('partial/nav.php'); ?>
      </header>
      <div class="content">
        <section class="grid-100">
          <article class="registration_form">
            <h1>Player Registration</h1>
            <div id="registration_instruction_wrapper">
              <?php if ($_SERVER['REQUEST_TIME'] < $date["reg_end"]) {?>
              <p>
                Please complete the registration form below.  Prior to submitting, please read the <a href="KK27Waiver.pdf" target="_blank">waiver</a>.
              </p>
              <div class="googleform">
                <iframe src="https://docs.google.com/forms/d/1g05kkyGYl45vNeyDpklFxtwgHe8JxU-JGKq4rXRP-dQ/viewform?embedded=true" width="700" height="1650" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
              </div>
              <?php } else {?>
                  <p>
                    Online registration has ended for Kaimana 27.  If you still need to register, please go to the registration tent on Friday night or Saturday morning.
                  </p>
                  <p>
                    The <a href="KK27Waiver.pdf" target="_blank">waiver</a> is still available online.
                  </p>
              <?php } ?>
            </div>
          </article>
        </section>
      </div>
      <?php include('partial/foot.php'); ?>
    </div> <!-- /wrapper -->
    <?php require('partial/scripts.php'); ?>
  </body>
</html>
