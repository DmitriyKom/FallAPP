<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Services'; ?>
<?php include(SHARED_PATH . '/metromed_header.php'); ?>



    <div class="jumbotron jumbotron services-bg-cover">
      <h1>Services</h1>
    </div>
  </div>

  <div class="services-body py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="card-deck mt5">
          <div class="col-md-4">
            <div class="card md-4 box-shadow">
              <img class="card-img-top" src="<?php echo url_for('assets/images/primary_care.jpg'); ?>" alt="Card image cap">
              <div class="card-body text-centered">
                <a class="text-dark" href="#">
                  <h4><strong>Primary Care</strong></h4>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card md-4 box-shadow">
              <img class="card-img-top" src="<?php echo url_for('assets/images/pediatrics.jpg'); ?>" alt="Card image cap">
              <div class="card-body text-centered">
                <a class="text-dark" href="#">
                  <h4><strong>Pediatrics</strong></h4>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card md-4 box-shadow">
              <img class="card-img-top" src="<?php echo url_for('assets/images/OBGYN.jpg'); ?>" alt="Card image cap">
              <div class="card-body text-centered">
                <a class="text-dark" href="#">
                  <h4><strong>OB/GYN</strong></h4>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card-deck mt-5">
        <div class="col-md-4">
          <div class="card md-4 box-shadow">
            <img class="card-img-top" src="<?php echo url_for('assets/images/women_health.jpg'); ?>" alt="Card image cap">
            <div class="card-body text-centered">
              <a class="text-dark" href="#">
                <h4><strong>Womans Care</strong></h4>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card md-4 box-shadow">
            <img class="card-img-top" src="<?php echo url_for('assets/images/nutrition1.jpg'); ?>" alt="Card image cap">
            <div class="card-body text-centered">
              <a class="text-dark" href="#">
                <h4><strong>Nutrition Counseling</strong></h4>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card md-4 box-shadow">
            <img class="card-img-top" src="<?php echo url_for('assets/images/kids_health.jpg'); ?>" alt="Card image cap">
            <div class="card-body text-centered">
              <a class="text-dark" href="#">
                <h4><strong>Kids Health</strong></h4>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php include(SHARED_PATH . '/metromed_footer.php'); ?>
