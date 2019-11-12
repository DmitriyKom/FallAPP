<?php require_once('../../../private/initialize.php'); ?>

<?php
  // $first_name = '';
  // $last_name = '';
  // $middle_name = '';
  // $address = '';
  // $city = '';
  // $state = '';
  // $zip = '';
  // $phone_number = '';
  // $SSN = '';
  // $birth_dt = '';
  // $ins_id = '';
  // $policy_number = '';

?>

<?php $page_title = 'New Patient'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div class="schedule">

  <a class="back-link" href="<?php echo url_for('/administrator/patients/index.php'); ?>">&laquo; Back to List</a>

  <div class="page new">
    <h1>Add New Patient</h1>

    <form action="<?php echo url_for('/administrator/patients/create.php'); ?>" method="post">
          <label class="label" for="f_name">First Name</label>
          <input type="text" name="first_name" id="f_name" value="<?php echo h($first_name); ?>" / autofocus>

        <label class="label" for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo h($last_name); ?>" />

        <label class="label" for="middle_name">Middle Name</label>
        <input type="text" name="middle_name" id="middle_name" value="<?php echo h($middle_name); ?>" />

        <label class="label" for="address">Address</label>
        <input type="text" name="address" id="address" value="<?php echo h($address); ?>" />

        <label class="label" for="city">City</label>
        <input type="text" name="city" id="city" value="<?php echo h($city); ?>" />

        <label class="label" for="state">State</label>
        <input type="text" name="state" id="state" value="<?php echo h($state); ?>" />

        <label class="label" for="zip">Zip</label>
        <input type="text" name="zip" id="zip" value="<?php echo h($zip); ?>" />

        <label class="label" for="phone_number">Phone Number</label>
        <input type="tel" name="phone_number" pattern="[0-9]{10}" id="phone_number" value="<?php echo h($phone_number); ?>" /required>

        <label class="label" for="SSN">SSN</label>
        <input type="text" name="SSN" pattern="[0-9]{9}" id="SSN" value="<?php echo h($SSN); ?>" / autocomplete="off">

        <label class="label" for="birth_dt">DOB</label>
        <input type="date" name="birth_dt" id="birth_dt" value="<?php echo h($birth_dt); ?>" />

        <label class="label" for="ins_id">Insurance ID</label>
        <select name="ins_id" id="ins_id">
          <option value="1"<?php if($ins_id == "1") { echo " selected"; } ?>>1</option>
          <option value="2"<?php if($ins_id == "2") { echo " selected"; } ?>>2</option>
        </select>

        <label class="label" for="policy_number">Policy Number</label>
        <dd><input type="text" name="policy_number" value="<?php echo h($policy_number); ?>" /></dd>

      <div id="operations">
        <input type="submit" value="Add Patient" />
      </div>
    </form>

  </div>

</div>


<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
