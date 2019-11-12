<?php require_once('../../../private/initialize.php'); ?>


<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['user_id'] ?? '1'; // PHP > 7.0

$patient = find_patient_by_id($id);

?>

<?php $page_title = 'View Patient'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/administrator/patients/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    <h1>Patient Details: <?php echo h($patient['first_name'] . " " . $patient['last_name'] ); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First Name</dt>
        <dd><?php echo h($patient['first_name'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><?php echo h($patient['last_name'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Middle Initial</dt>
        <dd><?php echo h($patient['middle_name'] ?? 'false'); ?></dd>
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
        <dt>SSN</dt>
        <dd><?php echo h($patient['SSN'] ?? 'false'); ?></dd>
      </dl>
      <dl>
        <dt>DOB</dt>
        <dd><?php echo h($patient['birth_dt'] ?? 'false'); ?></dd>
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
