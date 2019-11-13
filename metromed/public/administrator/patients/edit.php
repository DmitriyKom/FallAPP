<?php require_once('../../../private/initialize.php'); ?>

<?php

if (is_post()) {
  $patient = [];
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
  redirect_to(url_for('/public/administrator/patient/view.php?id=' . $id));


}
else {
  $patient = find_patient_by_id($id);
}
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['user_id'] ?? '1'; // PHP > 7.0

?>

<?php $page_title = 'Edit Patient'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/administrator/patients/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    <h1>Patient Details: <?php echo h($patient['f_name'] . " " . $patient['l_name'] ); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="f_name" id="f_name" value="<?php echo
        h($patient['f_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name='l_name' <?php echo h($patient['l_name'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Middle Initial</dt>
        <dd><?php echo h($patient['m_name'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><?php echo h($patient['address'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>City</dt>
        <dd><?php echo h($patient['city'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>State</dt>
        <dd><?php echo h($patient['state'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Zip Code</dt>
        <dd><?php echo h($patient['zip'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Phone Number</dt>
        <dd><?php echo h($patient['phone_number'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>DOB</dt>
        <dd><?php echo h($patient['dob'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Insurance Provider</dt>
        <dd><?php echo h($patient['ins_id'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Insurance Policy Number</dt>
        <dd><?php echo h($patient['policy_number'] ?? 'false'); ?></dd>
      </dl>
    </div>

  </div>

</div>


<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
