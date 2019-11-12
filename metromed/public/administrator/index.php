<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Administrator'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Administrator Dashboard</h2>
    <ul>
      <li><a href="<?php echo url_for('/administrator/patients/index.php'); ?>">Patients</a></li>
      <li><a href="<?php echo url_for('/administrator/providers/index.php'); ?>">Providers</a></li>
    </ul>
  </div>

</div>




<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
