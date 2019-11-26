<?php

require_once('../../private/initialize.php');

include(SHARED_PATH . '/metromed_header.php');

$page_title = 'User Insurance';

$u_id = $_SESSION['user_id'];

if(is_post()) {

  $user = array();
  $user['ins_id'] = $_POST['ins_id'] ?? '';
  $user['policy_number'] = $_POST['policy_number'] ?? '';
  $user['ins_co'] = $_POST['ins_co'] ?? '';
  $user['user_id'] = $_SESSION['user_id'] ?? '';

  $result = update_user($user);
  redirect_to(url_for('/userprofile.php'));

} else {

  $user_id = find_insurance_by_user_id($u_id);

}

?>

<div class="d-flex pt-5" id="wrapper">
  <div class="bg-light border-right" id="sidebar-left">
    <div class="list-group list-group-flush">
      <a href="<?php echo url_for('userprofile/index.php') ?>" class="list-group-item list-group-item-action active">My Profile</a>
      <a href="<?php echo url_for('userprofile/insurance.php') ?>" class="list-group-item list-group-item-action bg-light">Insurance</a>
      <a href="<?php echo url_for('userprofile/appointments.php') ?>" class="list-group-item list-group-item-action bg-light">Appointments</a>
    </div>
  </div>

  <div class="page-content">

    <form class="ml-3" action="<?php echo url_for('userprofile/insurance.php?user_id=' . h(u($u_id))); ?>" method="post">
      <input type="hidden" id="user_id" name="user_id" value="<?php echo $id; ?>">
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="ins_co">Insurance Provider</label>
            <select name="ins_co" class="form-control">
              <option selected>
                <?php echo h($user_id['ins_co']); ?>
              </option>
              <option value="blueCross/blueShield">BlueCross/BlueShield</option>
              <option value="medica">Medica</option>
              <option value="cigna">Cigna Health Group</option>
              <option value="tricare">Tricare</option>
              <option value="medicare">Medicare</option>
              <option value="medicaid">Medicaid</option>
              <option value="healthpartners">HealthPartners</option>
              <option value="aetna">Aetna Group</option>
            </select>
          </div>
        <div class="form-group col-md-4">
          <label for="policy_number">Policy Number</label>
          <input type="text" class="form-control" name="policy_number" id="policy_number" placeholder="Policy Number" value="<?php echo h($user_id['policy_number']); ?>">
        </div>
      </div>
    <div class=" form-row">
      <div class="form-group col-md-4">
        <label for="ins_co">Insurance Provider</label>
        <input type="text" class="form-control" name="ins_co" id="ins_co" placeholder="Insurance Provider" value="<?php echo h($user_id['ins_co']); ?>">
      </div>
    </div>
      <div id="operations">
      <input type="submit" class="btn btn-primary" value="Update" />
        <!-- <input type="submit" value="Add Patient" /> -->
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
