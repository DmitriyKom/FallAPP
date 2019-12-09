<?php

require_once('../../../private/initialize.php');

include(SHARED_PATH . '/metromed_header.php');

if($_SESSION['role'] != '3'){
  redirect_to(url_for('/index.php'));
}

  $patient_set = find_all_providers();
  // echo $patient_set;
?>

<?php $page_title = 'Providers'; ?>

<div class="d-flex pt-5" id="wrapper">
  <div class="bg-light border-right" id="sidebar-left">
    <div class="list-group list-group-flush">

      <a href="<?php echo url_for('userprofile/index.php') ?>" class="list-group-item list-group-item-action bg-light">My Profile</a>

      <?php
        if ($_SESSION['role'] == "1") {
          echo '<a href="';
          echo url_for('userprofile/insurance.php');
          echo '"';
          echo 'class="list-group-item list-group-item-action active">Insurance</a>';
        }
      ?>

      <a href="<?php echo url_for('userprofile/appointment.php') ?>" class="list-group-item list-group-item-action bg-light">Appointments</a>

      <?php
        if ($_SESSION['role'] == "3") {
          echo '<a href="';
          echo url_for('administrator/patients/show_patients.php');
          echo '"';
          echo 'class="list-group-item list-group-item-action bg-light">Patients</a>';
        }
      ?>
      <?php
        if ($_SESSION['role'] == "3") {
          echo '<a href="';
          echo url_for('administrator/patients/show_providers.php');
          echo '"';
          echo 'class="list-group-item list-group-item-action active">Providers</a>';
        }
      ?>
      <?php
        if ($_SESSION['role'] == "3") {
          echo '<a href="';
          echo url_for('administrator/patients/show_administrators.php');
          echo '"';
          echo 'class="list-group-item list-group-item-action bg-light">Administrators</a>';
        }
      ?>
    </div>
  </div>

  <div id="content">
    <div class="subjects listing">
      <h1>Providers</h1>

      <div class="actions">
        <a class="actions" href="<?php echo url_for('/administrator/patients/new.php'); ?>">Add New Provider</a>
      </div>

    	<table class="list">
    	  <tr>
          <th>ID</th>
          <th>First</th>
          <th>Last</th>
    	    <th>M.I.</th>
          <th>Phone</th>
    	    <th>&nbsp;</th>
    	    <th>&nbsp;</th>
          <th>&nbsp;</th>
    	  </tr>

        <?php while($patient = mysqli_fetch_assoc($patient_set)) { ?>
          <tr>
            <td><?php echo h($patient['user_id']); ?></td>
            <td><?php echo ucfirst(h($patient['f_name'])); ?></td>
            <td><?php echo ucfirst(h($patient['l_name'])); ?></td>
      	    <td><?php echo ucfirst(h($patient['m_name'])); ?></td>
            <td><?php echo phone_number_format(h($patient['phone_number'])); ?></td>

            <td><a class="action" href="<?php echo url_for('/administrator/patients/view.php?user_id=' . h(u($patient['user_id']))); ?>">View</a></td>
            <td><a class="action" href="<?php echo url_for('/administrator/patients/edit.php?user_id=' . h(u($patient['user_id']))); ?>">Edit</a></td>
            <td><a class="action" href="<?php echo url_for('/administrator/patients/remove.php?user_id=' . h(u($patient['user_id']))); ?>">Delete</a></td>
      	  </tr>
        <?php } ?>
    	</table>

      <?php mysqli_free_result($patient_set); ?>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
