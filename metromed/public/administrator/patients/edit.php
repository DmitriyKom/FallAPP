<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['user_id'])) {
  redirect_to(url_for('/administrator/patients/index.php'));
}
$user_id = $_GET['user_id'];

if (is_post()) {
  $patient = [];
  $patient['user_id'] = $user_id;
  $patient['f_name'] = $_POST['f_name'] ?? '';
  $patient['l_name'] = $_POST['l_name'] ?? '';
  $patient['m_name'] = $_POST['m_name'] ?? '';
  $patient['address'] = $_POST['address'] ?? '';
  $patient['city'] = $_POST['city'] ?? '';
  $patient['state'] = $_POST['state'] ?? '';
  $patient['zip'] = $_POST['zip'] ?? '';
  $patient['phone_number'] = $_POST['phone_number'] ?? '';
  $patient['dob'] = $_POST['dob'] ?? '';
  $patient['ins_id'] = $_POST['ins_id'] ?? '';
  $patient['policy_number'] = $_POST['policy_number'] ?? '';
  $patient['email'] = $_POST['email'] ?? '';
  $patient['role'] = $_POST['role'] ?? '';
  $patient['enabled'] = $_POST['enabled'] ?? '';

  $result = update_patient($patient);
  redirect_to(url_for('/administrator/patients/view.php?user_id=' . $user_id));


} else {

  $patient = find_patient_by_id($user_id);

}

?>

<?php $page_title = 'Edit Patient'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/administrator/patients/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">
    <h1>Patient Details: <?php echo h($patient['f_name'] . " " . $patient['l_name'] ); ?></h1>

    <form action="<?php echo url_for('/administrator/patients/edit.php?user_id=' . h(u($id))); ?>" method="post">
      <div class="attributes">
        <dl>
          <dt>First Name</dt>
          <dd><input type="text" name="f_name" value="<?php echo h($patient['f_name']); ?>" /></dd>
        </dl>
        <dl>
          <dt>Last Name</dt>
          <dd><input type="text" name='l_name' value="<?php echo h($patient['l_name'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>Middle Initial</dt>
          <dd><input type="text" name='m_name' value="<?php echo h($patient['m_name'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>Address</dt>
          <dd><input type="text" name='address' value="<?php echo h($patient['address'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>City</dt>
          <dd><input type="text" name='city' value="<?php echo h($patient['city'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>State</dt>
          <dd><input type="text" name='state' value="<?php echo h($patient['state'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>Zip Code</dt>
          <dd><input type="text" name='zip' value="<?php echo h($patient['zip'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>Phone Number</dt>
          <dd><input type="text" name='phone_number' value="<?php echo h($patient['phone_number'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>DOB</dt>
          <dd><input type="text" name='dob' value="<?php echo h($patient['dob'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>Insurance Provider</dt>
          <dd><input type="text" name='ins_id' value="<?php echo h($patient['ins_id'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>Insurance Policy Number</dt>
          <dd><input type="text" name='policy_number' value="<?php echo h($patient['policy_number'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>Email Address</dt>
          <dd><input type="text" name='email' value="<?php echo h($patient['email'] ?? 'false'); ?>" /></dd>
        </dl>
        <dl>
          <dt>User Role</dt>
          <dd>
            <select name="role" id="role" value="<?php echo h($patient['role']); ?>" />">
              <option value="1"<?php if($role == "patient") { echo " selected"; } ?>>Patient</option>
              <option value="2"<?php if($role == "provider") { echo " selected"; } ?>>Provider</option>
              <option value="3"<?php if($role == "administrator") { echo " selected"; } ?>>Administrator</option>
            </select>
          </dd>
        </dl>
        <dl>
          <dt>Enabled</dt>
          <dd><input type="checkbox" name='enabled' value="<?php echo h($patient['enabled']); ?>" /></dd>
        </dl>
        <div id="operations">
          <input type="submit" value="Edit Subject" />
        </div>
      </div>
    </form>

  </div>

</div>


<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
