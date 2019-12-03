<?php

require_once('../../../private/initialize.php');

include(SHARED_PATH . '/metromed_header.php');

//Restrict page to administrators
if($_SESSION['role'] != '3'){
  redirect_to(url_for('/index.php'));
}

$user_id = $_GET['user_id'] ? $_GET['user_id'] : '1';
// $user_id = $_GET['user_id'] ?? '1'; // PHP > 7.0

// $patient = array();
$patient = find_user_by_id($user_id);

$page_title = 'View Patient';

?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/administrator/patients/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    <h1>Patient Details: <?php echo h($patient['f_name'] . " " . $patient['l_name'] ); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First Name</dt>
        <dd><?php echo h($patient['f_name'] ? $patient['f_name'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><?php echo h($patient['l_name'] ? $patient['l_name'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Middle Initial</dt>
        <dd><?php echo h($patient['m_name'] ? $patient['m_name'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><?php echo h($patient['address'] ? $patient['address'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>City</dt>
        <dd><?php echo h($patient['city'] ? $patient['city'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>State</dt>
        <dd><?php echo h($patient['state'] ? $patient['state'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Zip Code</dt>
        <dd><?php echo h($patient['zip'] ? $patient['zip'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Phone Number</dt>
        <dd><?php echo h($patient['phone_number'] ? $patient['phone_number'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>DOB</dt>
        <dd><?php echo h($patient['dob'] ? $patient['dob'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Insurance Provider</dt>
        <dd><?php echo h($patient['ins_id'] ? $patient['ins_id'] : 'false'); ?></dd>
      </dl>
      <dl>
        <dt>Insurance Policy Number</dt>
        <dd><?php echo h($patient['policy_number'] ? $patient['policy_number'] : 'false'); ?></dd>
      </dl>
    </div>

  </div>

</div>


<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
