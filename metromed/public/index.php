<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Metro Medical Center'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>



    <div class="jumbotron jumbotron main-bg-cover">
      <h1>Welcome</h1>
      <p><a class="btn btn-lg btn-primary" href="appointment.php">Schedule an appointment</a></p>
    </div>

    <div class="row mb-2">
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">Learn</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">Our research</a>
            </h3>
            <p class="card-text mb-auto">At Metro Medical, we conduct hundreds of research studies
              every year which helps advance treatments and improve lives.</p>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" src="images/research.jpg" width="250" height="250" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-success">Community</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">Outreach Program</a>
            </h3>
            <p class="card-text mb-auto">Metro Med associates also partner with local organizations
              to offer volunteer services at local hospitals and clinics to help increase their community engagement.</p>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" src="images/community.jpg" width="250" height="250" alt="Card image cap">
        </div>
      </div>
    </div>



  <?php include(SHARED_PATH . '/metromed_footer.php'); ?>
