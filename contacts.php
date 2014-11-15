<?php
class KommitteeMember {
  public $name = '<i>(vacant)</i>';
  public $img = 'img/PersonIcon.png';
  public $email = NULL;
  function __construct() {
    /*
     * Arguments (all optional): 
     * 1. Name
     * 2. Image path
     * 3. Email address
     */
    $nargs = func_num_args();
    if ($nargs >= 1) {
      $this->name = func_get_arg(0);
      if ($nargs >= 2) {
        $this->img = func_get_arg(1);
        if ($nargs >= 3) {
          $this->email = func_get_arg(2);
        }
      }
    }
  }
}
class KommitteePosition {
  public $title = NULL;
  public $email = NULL;
  public $person = NULL;
  public $npeople = 0;
  function __construct($t,$p,$e = NULL) {
    /*
     * Arguments:
     * 1. Title
     * 2. Array of KommitteeMember objects.
     * 3. [optional] Email address
     */
    $this->title = $t;
    $this->person = $p;
    $this->email = $e;
    $this->npeople = (is_array($p) ? count($p) : 1);
  }
  public function render() {
    $out = '<div class="testifier kommitteeposition';
    if ($this->npeople==1) {
      $out .= ' grid-25 mobile-grid-50">';
    } else {
      $out .= ' grid-50 mobile-grid-100 grid-parent">';
      $this->title = $this->title.'s';
    }
    $out .= '<h2>'.$this->title.'</h2>';
    $email_link = FALSE;
    if ($this->npeople==1) {
      $out .= '<img class="avatar" src="'.$this->person->img.'" />';
      if ($this->email != NULL || $this->person->email != NULL) {
        $out .= '<a href="mailto:'.($this->email!=NULL ? $this->email : $this->person->email).'">';
        $email_link = TRUE;
      }
      $out .= $this->person->name . ($email_link ? '</a>' : '');
      $out .= '</div>';
    } else {
      # Assume $this->npeople = 2.
      $position_email_bool = $this->email != NULL;
      for ($pn = 0; $pn < 2; $pn++) {
        $out .= '<div class="grid-50 mobile-grid-50">';
        $out .= '<img class="avatar" src="'.$this->person[$pn]->img.'" />';
        $person_email_bool = $position_email_bool || $this->person[$pn]->email != NULL;
        if ($person_email_bool) {
          $out .= '<a href="mailto:'.($position_email_bool ? $this->email : $this->person[$pn]->email).'">';
          $email_link = TRUE;
        }
        $out .= $this->person[$pn]->name . ($person_email_bool ? '</a>' : '');
        $out .= '</div>';
      }
      $out .= '</div>';
    }
    return $out;
  }
}
# Kommittee Members
$jena = new KommitteeMember('Jena Kline','img/kommittee/JenaKline.jpg');
$nick = new KommitteeMember('Nick DeBoer','img/kommittee/NickDeBoer.jpg');
$jack = new KommitteeMember('Jack Wade','img/kommittee/JackWade.jpg');
$clay = new KommitteeMember('Clay "Dukes" McKell','img/kommittee/ClayMcKell.jpg','webmaster@hawaiiultimate.com');
$mark = new KommitteeMember('Mark Slivka','img/kommittee/MarkSlivka.jpg');
$stephen = new KommitteeMember('Stephen Parrish','img/kommittee/StephenParrish.jpg');
$mondo = new KommitteeMember('Mondo Chun','img/kommittee/MondoChun.jpg');
$alex = new KommitteeMember('Alex Globerson','img/kommittee/AlexGloberson.jpg');
$christine = new KommitteeMember('Christine Kline','img/kommittee/ChristineKline.jpg');
$bill = new KommitteeMember('Bill Sumrow','img/kommittee/BillSumrow.jpg');
# Kommittee Positions
$women_coord = new KommitteePosition("Women's Coordinator", $jena, 'kaimanawomen@gmail.com');
$all_positions = array(
  new KommitteePosition('Tournament Director', array($nick,$stephen), 'kaimanatd@gmail.com'),
  new KommitteePosition('Open Coordinator', $bill, 'kaimanaopen@gmail.com'),
  $women_coord,
  new KommitteePosition('Kaimana Guru', $mondo),
  new KommitteePosition('Entertainment Director',$alex),
  new KommitteePosition('Schwag',$mark),
  new KommitteePosition('Welcome Committee', new KommitteeMember()),
  new KommitteePosition('Volunteer Coordinator', $christine),
  new KommitteePosition('Grinds', $jack),
  new KommitteePosition('Website', $clay)
);
?>
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
            <?php 
              $c = 0;
              for ($p = 0; $p < count($all_positions); $p++) {
                echo $all_positions[$p]->render();
                $c += $all_positions[$p]->npeople;
                if ($c % 2 == 0) {
                  echo '<div class="clear'.($c % 4 == 0 ? '' : 'hide-on-desktop').'"></div>';
                }
              }
            ?>
            <div class="clear"></div>
          </article>
        </section>
      </div>
      <?php include('partial/foot.php'); ?>
    </div> <!-- /wrapper -->
    <?php require('partial/scripts.php'); ?>
  </body>
</html>
