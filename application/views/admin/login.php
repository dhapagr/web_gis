<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/toastr.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/plugins/extensions/toastr.css">
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/vendors.min.js"></script>
   
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/toastr.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/extensions/toastr.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/animate/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/sweetalert2.min.css">
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/polyfill.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/extensions/sweet-alerts.js"></script>

<html class="loading" lang="en" data-textdirection="rtl">
<body class="vertical-layout vertical-menu-modern light-layout 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="dark-layout">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="auth-login" class="row flexbox-container">
                    
                    <div class="col-md-4 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">Selamat Datang Admin</h4>
                                </div>
                            </div>
                        <div>

                            <?php echo $this->session->flashdata('pesan') ?>
                            <form id="jquery-val-form" action="<?php echo base_url('admin/Welcome/prosesLogin'); ?>" method="post" enctype="multipart/form-data">
                                <center>
                                    <div class="dashboard-content-right">   
                                        <img class="img-fluid" src="<?php echo base_url("assets"); ?>/admin/images/pages/Logo-DIR-Lantas-Polri.png" height="200" width="200" class="img-fluid" alt="Dashboard Ecommerce"/>
                                    </div>      
                                </center>
                                <br>
                                <div class="form-group ">
                                    <label class="form-label" for="basic-default-email">E-mail</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="basic-default-email" class="form-control" name="email_user" placeholder="email_user@email.com" required>
                                        <div class="form-control-position">
                                            <i class="bx bx-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="form-label" for="basic-default-email">E-mail</label>
                                    <input type="email" id="basic-default-email" name="email_user" class="form-control" placeholder="email_user@email.com" required/>
                                    <div class="form-control-position">
                                        <i class="bx bx-user"></i>
                                    </div>         
                                </div> -->
                                <div class="form-group">
                                    <label class="text-bold-600" for="inputPassword1">Password</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="password" id="inputPassword1" class="form-control" name="password_user" placeholder="Password">
                                        <div class="form-control-position">
                                            <i class="bx bx-lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="text-bold-600" for="inputPassword1">Password</label>
                                    <input type="password" class="form-control" id="inputPassword1" name="password_user" placeholder="Password">
                                </div> -->
                                <?php echo $this->session->flashdata('error') ?>
                                <!-- <div class="form-group">
                                    <?php if($this->session->flashdata('error')){ ?>
                                        <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata("error"); ?>
                                    </div>
                                    <?php } ?>
                                </div> -->
                                <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                    <div class="text-left">
                                        <div class="checkbox checkbox-sm">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="checkboxsmall" for="exampleCheck1"><small>Keep me logged in</small></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <button type="button" class="btn btn-info glow w-100 position-relative">Homepage</button>
                                    </div>
                               
                                    <div class="col-12 col-sm-6">
                                        <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
