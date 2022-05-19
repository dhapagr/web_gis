<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Sistem Informasi Titik Rawan Kecelakaan Kota Madiun</title>
    <link rel="apple-touch-icon" href="<?php echo base_url("assets"); ?>/admin/images/ico/apple-icon-120.png">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets"); ?>/admin/images/ico/favicon.ico"> -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/dragula.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/pickers/daterange/daterangepicker.css">    <!-- END: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/tables/datatable/buttons.bootstrap4.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/animate/animate.css"> -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/plugins/maps/maps-leaflet.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/pages/widgets.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/pages/dashboard-ecommerce.css">

    <!-- Leaflets-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/maps/leaflet.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/plugins/maps/maps-leaflet.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/pages/page-user-profile.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/pages/app-users.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/plugins/forms/validation/form-validation.css">

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/plugins/extensions/toastr.css"> -->

   
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">

    <!-- Data AOS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/aos.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css">
    <link rel="stylesheet" href="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.css"> -->
    <!-- <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
     -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/sweetalert2.min.css"> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <!-- <script src="<?php echo base_url("assets"); ?>/admin/js/scripts/maps/geojson_madiun_kota.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/js/scripts/maps/geojson_kecamatan_indonesia.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/js/leaflet_search.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css">
    <link rel="stylesheet" href="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
    <script type="text/javascript" src="https://tiles.unwiredlabs.com/js/leaflet-unwired.js?v=1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
    <script src="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.js"></script>     -->
</head>
