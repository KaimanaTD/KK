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
  <title><?php echo $str['abbreviation'];?> | Logistics</title>
  <meta name="description" content="Details and logistics for Kaimana Klassik">
  <meta name="keywords" content="Kaimana Klassik ultimate Hawaii frisbee Waimanalo Oahu open women disc logistics">
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
		<h1>Logistics</h1>
		<dl>
          <dt><h2>Who?</h2></dt>
          <dd>
            Up to 16 Open teams and 16 Women's teams. 
            In past years, teams have hailed from Asia to Australia to Europe to mainland U.S. to just down the street. 
            Check back in November for specific teams.
          </dd>
          <dt><h2>What?</h2></dt>
          <dd> Food. Fun. Camping. Dancing. Swimming. AND ULTIMATE!</dd>
          <dt><h2>When?</h2></dt>
          <dd>
            <?php 
              echo date('F j', $date['play_start']);
              $ndays = floor(($date['play_end'] - $date['play_start'])/$secsperday);
              while ($ndays > 0) {
                echo ', '.date('j',$date['play_end']-($ndays-1)*$secsperday);
                $ndays = $ndays - 1;
              }
              echo ', '.date('Y').'. ';
            ?>
            Important days/times to note:
            <dl>
              <dt><?php echo date('l, F j', $date['play_start']-$secsperday); ?></dt>
              <dd><ul>
                <li>5:00 to 9:00 pm - Player check-in</li>
                <li>6:00 to 8:00 pm - Dinner is served</li>
                <li>8:00 pm - Captains meeting</li>
              </ul></dd>
              <dt><?php echo date('l, F j',$date['play_start']); ?></dt>
              <dd><ul>
                <li>7:00 am - Breakfast starts</li>
                <li>7:00 to 7:50 am - Player check-in</li>
                <li>8:00 am - Opening Ceremony</li>
                <li>8:45 am to 5:30 pm - Games</li>
                <li>6:00 pm - Dinner</li>
              </ul></dd>
              <dt><?php echo date('l, F j',$date['play_start']+$secsperday); ?></dt>
              <dd><ul>
                <li>7:00 am - Breakfast starts</li>
                <li>8:45 am to 5:30 pm - Games</li>
                <li>6:00 pm - Dinner</li>
              </ul></dd>
              <dt><?php echo date('l, F j',$date['play_end']); ?></dt>
              <dd>
                <ul>
                  <li>7:00 am - Breakfast starts</li>
                  <li>8:45 am - Bracket play starts</li>
                  <li>~12:30 and 3:00 pm - Finals</li>
                  <li>~5:00 - Closing Ceremony (immediately follows Finals)</li>
                </ul>
                <p>
                  Don't schedule your flight too early or you'll miss the Finals and the Closing Ceremony.
                </p>
              </dd>
              <dt><?php 
                echo date('l',$date['hat_start']).'-'.date('l',$date['hat_end']).', ';
                echo date('F j',$date['hat_start']).'-'.date('j',$date['hat_end']);
              ?></dt>
              <dd>Post-Kaimana Hat Draw, Maui.  Stay around for some interisland fun!</dd>
            </dl>
          <dt><h2>Where?</h2></dt>
          <dd>
            Waimanalo Polo Fields, 41-1200 Kalanianaole Highway, Waimanalo, Oahu.  For your reference we have <a href="maps.php">maps of Oahu and Waimanalo</a>.
            <dl>
              <dt>Where do I stay?</dt>
              <dd>
                Free camping is provided just across the streets from the fields at Waimanalo Bay Beach Park for Friday through Monday evenings. 
                By state law, all campsites are closed on Wednesday and Thursday nights. 
                There is no camping directly on the beach. 
                Campsites have running water, restrooms, and cold showers. 
                Check back closer to the tournament for more detailed camping information.
              </dd>
              <dt>How do I get there?</dt>
              <dd><ul>
                <li>
                  By Plane: Fly into Honolulu International Airport (HNL). 
                  Just about every major airline serves HNL. 
                </li>
                <li>
                  By car from the airport, Waikiki, or anywhere in Honolulu: Get on H1 East. 
                  Take it until it ends! 
                  H1 turns into Kalanianaole Highway, which passes by Hawaii Kai, Hanauma Bay, Sandy Beach, Sea Life Park, and through Waimanalo. 
                  When you see the McDonald's on your right, in Waimanalo, you've got less than a half-mile to go. 
                  The fields will be on your left; camping is at Waimanalo Bay Beach Park, on your right. 
                </li>
                <li>
                  By bus from the airport: Get on bus 19 or 20 heading towards Waikiki Beach. 
                  Get off at Hotel and Alakea. 
                  Cross Hotel Street, walk up Alakea a few meters (by the District Court House) and transfer to bus 57 heading towards Kailua/Sea Life Park. 
                  The bus ride is 30 minutes to an hour after you transfer, so be patient! 
                  Get off at the bus stop right outside of the Waimanalo Polo Fields/Waimanalo Beach Recreation Area. 
                </li>
                <li>
                  By bus from Waikiki: Catch bus 58 heading towards Hawaii Kai/Sea Life Park from any of a number of bus stops on Kuhio Avenue. 
                  After a long (45 min or so) ride, get off in Waimanalo at the bus stop right outside of the Waimanalo Polo Fields/Waimanalo Beach Recreation Area. 
                </li>
                <li>
                  General bus notes: Bus fares are $2.50 and include one transfer within an hour of your first boarding.
                  Officially, no luggage is allowed on the bus, so pack light!
                  This rule is enforced sporadically, but if you can fit all your bags on your lap, you should be OK.
                  Real-time transit info can be found via <a href="http://hea.thebus.org/">The Bus</a> or <a href="http://www.google.com/transit">Google Transit</a>.
                </li>
              </ul></dd>
            </dl>
          </dd>
          <dt><h2>Why?</h2></dt>
          <dd>'Cause it's the most fun you've ever had at a tournament.</dd>
		</dl>
	</section>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
</body>
</html>
