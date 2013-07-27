<?php 
  $pagenames = array(
    array("Home","#"),
    array("Bids and Fess","bidding.php"),
    array("Logistics","logistics.php"),
    array("Teams","teams.php"),
    array("Hat Draw","hatdraw.php"),
    array("History","history.php"),
    array("Contact","contacts.php")
  );
?>
<nav class="grid-100 grid-parent">
  <ul> 
    <?php foreach ($pagenames as $page) { ?>
      <li class="grid-10"><a href="<?php echo $page[1];?>"><?php echo $page[0];?></a></li>
    <?php } ?>
	<li class="grid-30 hide-on-mobile"></li>
  </ul>
  <select onchange="if (this.value) window.location.href = this.value;">
    <?php foreach ($pagenames as $page) { ?>
      <option value="<?php echo $page[1];?>"><?php echo $page[0];?></option>
    <?php } ?>
  </select>
</nav>