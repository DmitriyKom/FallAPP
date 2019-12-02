<?php

require_once('../../private/initialize.php');

include(SHARED_PATH . '/metromed_header.php');

$page_title = 'User Insurance';

$u_id = $_SESSION['user_id'];

if(is_post()) {

  $user = array();
  $user['ins_id'] = $_POST['ins_id'] ?? '';
  $user['policy_number'] = $_POST['policy_number'] ?? '';
  $user['user_id'] = $_SESSION['user_id'] ?? '';

  $result = update_user_insurance($user);
  redirect_to(url_for('/userprofile/insurance.php'));

} else {

  $user_id = find_insurance_by_user_id($u_id);

}

?>

<div class="d-flex pt-5" id="wrapper">
  <div class="bg-light border-right" id="sidebar-left">
    <div class="list-group list-group-flush">
      <a href="<?php echo url_for('userprofile/index.php') ?>" class="list-group-item list-group-item-action bg-light">My Profile</a>
      <a href="<?php echo url_for('userprofile/insurance.php') ?>" class="list-group-item list-group-item-action active">Insurance</a>
      <a href="<?php echo url_for('userprofile/appointment.php') ?>" class="list-group-item list-group-item-action bg-light">Appointments</a>
    </div>
  </div>

  <div class="page-content">
    <form class="ml-3" action="<?php echo url_for('userprofile/insurance.php?user_id=' . h(u($u_id))); ?>" method="post">
      <input type="hidden" id="user_id" name="user_id" value="<?php echo $id; ?>">
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="ins_id">Insurance Provider</label>
            <select name="ins_id" class="form-control">
              <option value="1" <?php if($user_id['ins_id'] == "1") { echo " selected"; } ?>>Medica</option>
              <option value="2" <?php if($user_id['ins_id'] == "2") { echo " selected"; } ?>>United Healthcare</option>
              <option value="3" <?php if($user_id['ins_id'] == "3") { echo " selected"; } ?>>BlueCross/BlueShield</option>
              <option value="4" <?php if($user_id['ins_id'] == "4") { echo " selected"; } ?>>Cigna Health Group</option>
              <option value="5" <?php if($user_id['ins_id'] == "5") { echo " selected"; } ?>>Tricare</option>
              <option value="6" <?php if($user_id['ins_id'] == "6") { echo " selected"; } ?>>Medicare</option>
              <option value="7" <?php if($user_id['ins_id'] == "7") { echo " selected"; } ?>>Medicaid</option>
              <option value="8" <?php if($user_id['ins_id'] == "8") { echo " selected"; } ?>>HealthPartners</option>
              <option value="9" <?php if($user_id['ins_id'] == "9") { echo " selected"; } ?>>Aetna Group</option>
              <option value="10" <?php if($user_id['ins_id'] == "10") { echo " selected"; } ?>>Insurance Provider</option>
            </select>
          </div>
        <div class="form-group col-md-4">
          <label for="policy_number">Policy Number</label>
          <input type="text" class="form-control" name="policy_number" id="policy_number" placeholder="Policy Number" value="<?php echo h($user_id['policy_number']); ?>">
        </div>
      </div>
      <div id="operations">
      <input type="submit" class="btn btn-primary" value="Update" />
      </div>

    </form>

</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>

<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
