<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url("assets"); ?>/user/img/favicon.png" rel="icon">
  <link href="<?php echo base_url("assets"); ?>/user/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url("assets"); ?>/user/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url("assets"); ?>/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url("assets"); ?>/user/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url("assets"); ?>/user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url("assets"); ?>/user/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url("assets"); ?>/user/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url("assets"); ?>/user/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url("assets"); ?>/user/css/style.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url("assets"); ?>/user/css/element.css" rel="stylesheet"> -->

  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

  <meta content="culture, Nantes, musée, bibliothèque, médiathèque, ludothèque,
        salle de spectacle, théâtre, concert, cinéma, exposition, 
        école culturelle, école de musique, monument">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/map/normalize.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/map/main.css">

  <script src="<?php echo base_url("assets"); ?>/user/map/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  
  <!-- Include Leaflet CSS & JavaScript -->
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.css" />
  <!--[if lte IE 8]>
      <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.ie.css" />
  <![endif]-->
  <script src="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.js"></script>
  <!-- =======================================================
  * Template Name: Arsha - v4.7.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <!-- sweet alert 2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js" integrity="sha512-vDRRSInpSrdiN5LfDsexCr56x9mAO3WrKn8ZpIM77alA24mAH3DYkGVSIq0mT5coyfgOlTbFyBSUG7tjqdNkNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js" integrity="sha512-aYkxNMS1BrFK2pwC53ea1bO8key+6qLChadZfRk8FtHt36OBqoKX8cnkcYWLs1BR5sqgjU5SMIMYNa85lZWzAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.min.js" integrity="sha512-hDt6c6JA9ytE/b7OF73Bhj1lXT0wucQXm9yKjSV7BrJ6o5CVs1hq7nIQWU4OhOyrUbbL1KhN7Jt00v7UZA18og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.css" integrity="sha512-40/Lc5CTd+76RzYwpttkBAJU68jKKQy4mnPI52KKOHwRBsGcvQct9cIqpWT/XGLSsQFAcuty1fIuNgqRoZTiGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.js" integrity="sha512-C2iWRhCelHs4nZ9wCFBSh/e/V9U8ACVFhl0JC1x3WZm2zVUS7oo9db3tmxiFk4TfOhT7vMqcOOPTZqHiEOvrEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">    
    <div class="col-lg-1 col-md-1 col-1 d-flex justify-content-center">
      <img style="width:75px; height:50px;" src="<?php echo base_url("assets"); ?>/user/img/Kota-madiun.png" class="img-fluid" alt="">
    </div>
    <h1 class="logo me-auto"><a href="index.html">SIGMA</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="<?php echo base_url("assets"); ?>/user/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto " href="<?php echo base_url("welcome"); ?>">Home</a></li>
        <li><a class="nav-link scrollto" href="<?php echo base_url("user/pengaduan"); ?>">Pengaduan</a></li>
        <li><a class="nav-link scrollto" href="<?php echo base_url("user/webgis"); ?>">Webgis</a></li>
        <li><a class="nav-link scrollto" href="<?php echo base_url("user/berita"); ?>">Portal Berita</a></li>
        <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
        <li><a  href="<?php echo base_url("user/login"); ?>">Login</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->
