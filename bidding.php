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
  <title><?php echo $str['abbreviation'];?> | Bids & Fees</title>
  <meta name="description" content="Instructions for bids and fees for Kaimana Klassik.">
  <meta name="keywords" content="Kaimana Klassik ultimate Hawaii frisbee Waimanalo Oahu open women disc bids bidding fees payment">
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
	<section class="grid-70">
      <h1>Bids & Fees</h1>
      <article>
		<p>
          Player fee is $140.00 per player<a id="note1_ref" class="notesymbol" href="#note1_text">*</a> this year. 
          Fee includes all breakfasts and dinners, entertainment, camping, players' pack (cup, disc, and Kaimana logo surprise), plus all field supplies (water, fruit, juice, EMT).
		</p>
        <p>
          All players should <a href="playerregistration.php">register</a> and <a href="playerpayment.php">pay online</a>, if possible.  
          Individual online registration and payment will be open once team bids have been accepted (mid to late November).  
<!--
          If you cannot pay online, please do so by sending a check made out to <strong>Kaimana Klassik</strong> to: 
<blockquote>Jack Wade 
1308 Center Street 
Apartment B2
Honolulu, HI 96816
</blockquote>
          If paying by check, please register using the online form and choose the pay by check option.  
          Players should also register on-site either Friday night or Saturday morning.
		</p>
        <p>
          After January 15, 2014, late registration fee is $165 (you must have registered and PAID before January 15 in order to avoid the late fee).  
          Only players who have registered and paid before January 15 are guaranteed a complete players' pack.
        </p>
        <p>
          A full player's fee refund is available to players who notify the tournament director (via writing or email) before January 25th that they will not be attending the tournament. 
          After January 25th, players withdrawing from the tournament will receive a partial refund.
        </p>
        <p>
          Guest fee is $80 for the weekend. 
          Guests should register and pay online.  
          The guest fee covers all breakfasts and dinners, entertainment, camping, and a guest pack.
        </p>
        <p>
          A nightly guest pass can be purchased at the door for $30/night.  
          This fee covers dinner and entertainment for one evening.
          <span class="allcaps">
          All guests must have a player "sponsor" them.
          Players should notify us prior to the tournament of guest names.
          No one will be allowed to enter the party without a player "sponsor".
          </span>
        </p>
-->
		</article>
		<article>
          <h2>How to submit an individual bid</h2>
		<p>
		  Depending on the number of team bids, we may have an Aloha Spirit team in the Open and Womens 
		  division for individual players.  To register, complete the online registration and select "Aloha Spirit" 
		  for your team.  If there is not an Aloha Spirit team option, we may be able to place you on a team 
		  that needs players and will be in touch as the tournament approaches.
		</p>
		</article>
		<article>
          <h2>Team Bids</h2>
          <p>
            Caveats of the bidding process:
          </p>
          <ul>
            <li>The $420 initial deposit can later be applied to three individual player's fees (the captain plus two other players). For those teams that do not make the final cut, we will refund your full deposit.</li>
            <li>Bid-winning teams will be notified via email (as will wait-listed teams) by <?php echo date('F j',$date['bid_notification']);?>. 
              Bid-winning teams must respond via e-mail or letter by November 22, whether or not they wish to accept the bid. If no response is received, that team will forfeit its bid, and the next wait-listed team will be contacted. At this point, the declining bid-winning team will receive a 100% refund on its deposit.</li>
            <li>Bid-winning teams are required to secure their bid by submitting entrance fees for at least 8 players (at $140 per player) by December 13.</li>
            <li>If a bid-winning and bid-accepting team fails to submit the above mentioned players' fees, its bid will be lost, and the next wait-listed team will be given priority. If we are able to fill this new vacancy, we will issue only a partial deposit refund of $160. If we are unable to fill the vacancy, no refund of deposit will be issued.</li>
            <li>The remainders of each team's entrance fees are due by January 15. Any entrance fee not paid in full by this date will be assessed the late registration fee of $175.</li>
            <li>If any team forfeits its position after January 1, the deposit will be forfeited, regardless of our success in filling the vacancy.  </li>        
          </ul>
        </article>
	</section>
		<aside class="grid-30">
          <h2>Announcements</h2>
          <dl>
            <!--<dt>December 2, 2013</dt><dd><a href="playerregistration.php">Player and guest registration</a> is now open.</dd>-->
            <dt>October 2, 2014</dt><dd><a href="onlinebidform.php">Team bids</a> are now being accepted.</dd>
          </dl>
          <h2 class="hidden">Important Dates</h2>
          <dl class="hidden">
                  <dt>November 8, 2013</dt><dd> Deadline for team bids (we must receive info and payment by then).</dd>     
                  <dt>November 15, 2013</dt><dd> Accepted, wait-listed, and declined teams will be notified.</dd>    
                  <dt>November 22, 2013</dt><dd> Teams must accept/decline bids.</dd>    
                  <dt>December 13, 2013</dt><dd> Half of player fees due (based on up-to-date roster).</dd>    
                  <dt>January 1, 2014</dt><dd> No refunds of team deposits upon forfeiture after this date.</dd>    
                  <dt>January 15, 2014</dt><dd> Deadline for regular registration fee.</dd>    
                  <dt>January 25, 2014</dt><dd> Deadline for full refunds on player fee.</dd>    
                  <dt>February 9, 2014</dt><dd> Last day to register online.</dd>    
          </dl>
		</aside>
		<aside class="notecontainer grid-30">
				<h3>Notes</h3>
				<p id="note1_text" class="notetext">
						<span class="notesymbol">*</span>
						Kaimana fees are based on an ideal budget divided by a realistic average of the number of players who have attended the tournament in recent years. Any excess monies earned by the tournament go towards supporting the events, activities, and outreach of the Hawaii Ultimate League Association (HULA).
						<a class="notebacklink" href="#note1_ref">Back</a>
				</p>
		</aside>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
</body>
</html>
