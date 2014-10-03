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
  <title><?php echo $str['abbreviation'];?> | Contact</title>
    <meta name="description" content="Contact information and Komittee bios for Kaimana Klassik">
    <meta name="keywords" content="Kaimana Klassik ultimate Hawaii frisbee Waimanalo Oahu open women disc contact contacts email kommittee committee">
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
        <section class="main">
          <article class="grid-100 mobile-grid-100">
            <h1>Contact Us</h1>
            <p>
              If you have questions or comments, please <a href="mailto:kaimanatd@gmail.com">email the tournament directors</a>.
            </p>
          </article>
          <article class="grid-100 mobile-grid-100 grid-parent">
            <h1 class="grid-100 mobile-grid-100">Kaimana Klassik Kommittee</h1>
            <div class="testifier kommitteeposition grid-50 mobile-grid-100 grid-parent">
              <h2>Tournament Directors</h2>
              <div class="grid-50 mobile-grid-50">
                <img class="avatar" src="img/kommittee/JackWade.jpg" />
                <a href="mailto:kaimanatd@gmail.com">Jack Wade</a>          
              </div>
              <div class="grid-50 mobile-grid-50">
                <img class="avatar" src="img/kommittee/NickDeBoer.jpg" />
                <a href="mailto:kaimanatd@gmail.com">Nick DeBoer</a>          
              </div>
            </div>
            <div class="clear hide-on-desktop"></div>
            <div class="testifier kommitteeposition grid-25 mobile-grid-50">
              <h2>Open Coordinator</h2>
              <img class="avatar" src="img/kommittee/BenBergen.jpg" />
              <a href="mailto:kaimanaopen@gmail.com">Ben Bergen</a>          
            </div>
            <div class="testifier kommitteeposition grid-25 mobile-grid-50">
              <h2>Women's Coordinator</h2>
              <img class="avatar" src="img/kommittee/JenaKline.jpg" />
              <a href="mailto:kaimanawomen@gmail.com">Jena Kline</a>
            </div>
            <div class="clear"></div>
            <div class="testifier kommitteeposition grid-25 mobile-grid-50">
              <h2>Kaimana Guru</h2>
              <img class="avatar" src="img/kommittee/MondoChun.jpg" />
              Mondo Chun
            </div>
            <div class="testifier kommitteeposition grid-25 mobile-grid-50">
              <h2>Entertainment Director</h2>
              <img class="avatar" src="img/kommittee/AlexGloberson.jpg" />
              Alex Globerson
            </div>
            <div class="clear hide-on-desktop"></div>
            <div class="testifier kommitteeposition grid-25 mobile-grid-50">
              <h2>Schwag</h2>
              <img class="avatar" src="img/kommittee/MarkSlivka.jpg" />
              Mark Slivka
            </div>
            <div class="testifier kommitteeposition grid-25 mobile-grid-50">
              <h2>Welcome Committee</h2>
              <img class="avatar" src="img/kommittee/KimbaTowler.jpg" />
              Kimba Towler
            </div>
            <div class="clear"></div>
            <div class="testifier kommitteeposition grid-50 mobile-grid-100 gridparent">
              <h2>Volunteer Coordinators</h2>
              <div class="grid-50 mobile-grid-50">
                <img class="avatar" src="img/kommittee/StephenParrish.jpg" />
                Stephen Parrish
              </div>
              <div class="grid-50 mobile-grid-50">
                <img class="avatar" src="img/kommittee/CaleJorgenson.jpg" />
                Cale Jorgenson
              </div>
            </div>
            <div class="clear hide-on-desktop"></div>
            <div class="testifier kommitteeposition grid-50 mobile-grid-100 gridparent">
              <h2>Grinds</h2>
              <div class="grid-50 mobile-grid-50">
                <img class="avatar" src="img/kommittee/JeanetteClark.jpg" />
                Jeanette Clark
              </div>
              <div class="grid-50 mobile-grid-50">
                <img class="avatar" src="img/kommittee/BeckyMia.jpg" />
                Becky Mia
              </div>
            </div>
            <div class="clear"></div>
            <div class="testifier kommitteeposition grid-50 mobile-grid-100 gridparent">
              <h2>Website</h2>
              <div class="grid-50 mobile-grid-50">
                <img class="avatar" src="img/kommittee/ClayMcKell.jpg" />
                <a href="mailto:webmaster@hawaiiultimate.com">Clay "Dukes" McKell</a>
              </div>
              <div class="grid-50 mobile-grid-50">
                <img class="avatar" src="img/kommittee/JenaKline.jpg" />
                Jena Kline
              </div>
            </div>
          </article>
        </section>
      </div>
      <?php include('partial/foot.php'); ?>
    </div> <!-- /wrapper -->
    <?php require('partial/scripts.php'); ?>
  </body>
</html>
