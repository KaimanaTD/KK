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
	<section class="grid-70">
      <article>
        <h1>Article Title</h1>
        <p>
          Body text.
        </p>
        <form id="registration">
          <fieldset>
            <label for="team">
              Team
            </label>
            <select id="team" name="team">
              <option class="loading" value="" selected="selected">Loading...</option>
            </select>
          </fieldset>
          <fieldset>
            <label for="players">
              Players and Guests
            </label>
            <select id="players" name="players" multiple>
              <option class="loading" value="" selected="selected">Waiting for team selection...</option>
            </select>
          </fieldset>
        </form>
      </article>
	</section>
    <aside class="grid-30">
      <p>
        Sample Text.
      </p>
	</aside>
  </div>
  <?php include('partial/foot.php'); ?>
  </div> <!-- /wrapper -->
  <?php require('partial/scripts.php'); ?>
</body>
</html>
