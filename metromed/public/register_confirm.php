<?php

  require_once('../private/initialize.php');

  $page_title = 'Confirm Registration';

  include(SHARED_PATH . '/metromed_header.php');

?>

<div class="">
  <div class="">
    <br />
  </div>
  <h1 class="text-center"><strong>Registration Successfull</strong><br><br></h1>
  <?php
      // echo '<p>You have successfully registered.</p>';
      echo '<p>Please sign in to continue.</p>';
  ?>
  <p><a href="<?php echo url_for('login.php') ?>">Sign In</a></p>
  <h3><br><br></h3>
  <h3></h3>

</div>




<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
