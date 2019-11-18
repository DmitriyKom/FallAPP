<?php
if (!isset($page_title)) {
  $page_title = 'Metromed Home';
}

session_start();

 ?>

 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Metromed</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="<?php echo url_for('/assets/css/metromed.css'); ?>" />
 </head>

 <body>
     <script src="assets/js/jquery.min.js"></script>
     <script src="assets/bootstrap/js/bootstrap.min.js"></script>


  <div class="container">

     <header class="site-header py-3">
       <div class="row flex-nowrap justify-content-between align-items-center">
         <div class="col-4 pt-1">
           <a class="text-muted">145 West 29th Street, Suite 451 <br>St Paul, MN 55012</a>
         </div>
         <div class="col-4 text-center">
           <a class="site-header-logo text-dark" href="<?php echo url_for('index.php') ?>">Metro Medical Center</a>
         </div>
         <div class="col-4 d-flex justify-content-end align-items-center">
           <a class="btn btn-sm btn-primary" href="login.php">Login</a>
         </div>
       </div>
     </header>

     <div class="nav-scroller py-1 mb-2">
       <nav class="nav d-flex justify-content-between">
         <a class="p-2 text-primary" href="<?php echo url_for('about.php') ?>">About</a>
         <a class="p-2 text-primary" href="<?php echo url_for('services.php') ?>">Services</a>
         <a class="p-2 text-primary" href="<?php echo url_for('careers.php') ?>">Careers</a>
         <a class="p-2 text-primary" href="<?php echo url_for('community.php') ?>">Community</a>
         <a class="p-2 text-primary" href="<?php echo url_for('contact.php') ?>">Contact</a>

       </nav>
     </div>
