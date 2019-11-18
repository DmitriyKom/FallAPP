<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['user_id'])) {
  redirect_to(url_for('/administrator/patients/index.php'));
}
$user_id = $_GET['user_id'];

if (is_post()) {

  $result = delete_user($_GET['user_id']);
  redirect_to(url_for('/administrator/patients/index.php'));

} else {
  $patient = find_patient_by_id($user_id);
}

?>

<?php $page_title = 'Remove Patient'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('administrator/patients/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject delete">
    <h1>Remove User</h1>
    <p>Are you sure you want to remove this user?</p>
    <p class="item"><?php echo h($patient['user_id']); ?></p>

    <form action="<?php echo url_for('/administrator/patients/remove.php?user_id=' . h(u($patient['user_id'])))?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Remove user" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
