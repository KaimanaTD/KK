<?php 
  $pagenames = array(
    array("Home","index.php"),
    array("Bids and Fees","bidding.php"),
    array("Logistics","logistics.php"),
    array("Teams","teams.php"),
    array("Hat Draw","hatdraw.php"),
    array("History","history.php"),
    array("Contact","contacts.php")
  );
?>
<nav>
  <ul> 
    <?php foreach ($pagenames as $page) { ?>
      <li><a href="<?php echo $page[1];?>"><?php echo $page[0];?></a></li>
    <?php } ?>
  </ul>
  <select onchange="if (this.value) window.location.href = this.value;">
    <?php foreach ($pagenames as $page) { ?>
      <option value="<?php echo $page[1];?>"><?php echo $page[0];?></option>
    <?php } ?>
  </select>
</nav>