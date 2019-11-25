<?php
require_once('../../private/initialize.php');

$page_title = 'Administrator';
include(SHARED_PATH . '/metromed_header.php');

//Restrict page to administrators
if($_SESSION['role'] != 'administrator'){
  redirect_to(url_for('/index.php'));
}

?>

<div id="content">
  <div id="main-menu">
    <h2>Administrator Dashboard</h2>
    <ul>
      <li><a href="<?php echo url_for('/administrator/patients/index.php'); ?>">Patients</a></li>
      <li><a href="<?php echo url_for('/administrator/providers/index.php'); ?>">Providers</a></li>
      <li><a href="<?php echo url_for('/administrator/administrators/index.php'); ?>">Administrators</a></li>
    </ul>
  </div>

</div>




<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
