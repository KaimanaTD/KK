<?php 
  $pagenames = array(
    array("Home", array("index.php")),
    array("Bids and Fees", 
      array("bidding.php", 
        array("Player Registration Form", "playerregistration.php"),
        array("Player Payment", "playerpayment.php"),
        array("Team Bid Form", "onlinebidform.php"), 
        array("Team Bid Payment", "onlinepayment.php")
      )
    ),
    array("Logistics", array("logistics.php")),
    array("Teams", array("teams.php")),
    array("Hat Draw", array("hatdraw.php")),
    array("History", array("history.php")),
    array("Contact", array("contacts.php"))
  );
?>
<nav>
  <ul id="nav"> 
    <?php foreach ($pagenames as $page) { ?>
      <li>
        <a href="<?php echo $page[1][0];?>"><?php echo $page[0];?></a>
        <?php if (count($page[1]) > 1) {
          echo "<ul>";
          for ($sub = 1; $sub < count($page[1]); $sub++) {
            echo "<li><a href=".$page[1][$sub][1].">".$page[1][$sub][0]."</a></li>";
          };
          echo "</ul>";
        }; ?>
      </li>
    <?php }; ?>
  </ul>
  <select onchange="if (this.value) window.location.href = this.value;">
    <?php foreach ($pagenames as $page) { ?>
      <option value="<?php echo $page[1][0];?>"><?php echo $page[0];?></option>
      <?php if (count($page[1]) > 1) {
        for ($sub = 1; $sub < count($page[1]); $sub++) {
          echo "<option value=\"".$page[1][$sub][1]."\">&mdash; ".$page[1][$sub][0]."</option>";
        };
      }; ?>
    <?php } ?>
  </select>
</nav>