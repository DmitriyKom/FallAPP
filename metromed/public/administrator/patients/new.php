<?php require_once('../../../private/initialize.php'); ?>

<?php
  $menu_name = '';
  $position = '';
  $visible = '';

  if(is_post()) {

    // Handle form values sent by new.php

    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo "Form parameters<br />";
    echo "Menu name: " . $menu_name . "<br />";
    echo "Position: " . $position . "<br />";
    echo "Visible: " . $visible . "<br />";
  }
?>

<?php $page_title = 'New Patient'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/administrator/patients/index.php'); ?>">&laquo; Back to List</a>

  <div class="page new">
    <h1>Add New Patient</h1>

    <form action="<?php echo url_for('/administrator/patients/new.php'); ?>" method="post">
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>Middle Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>City</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>State</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>Zip</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>Phone Number</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>SSN</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <dl>
        <dt>DOB</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>

      <dl>
        <dt>Insurance ID</dt>
        <dd>
          <select name="position">
            <option value="1"<?php if($position == "1") { echo " selected"; } ?>>1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
      </dl>
      <!-- <dl>
        <dt>Policy Number</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php if($visible == "1") { echo " checked"; } ?> />
        </dd>
      </dl> -->
      <div id="operations">
        <input type="submit" value="Add Patient" />
      </div>
    </form>

  </div>

</div>


<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
