    <!-- <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/vendors.min.js"></script> -->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
               
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Statistics</h4>
                            <?php foreach($data_user as $data) :?>
                                <h4><?php echo $data['email_user']?></h4>
                            <?php endforeach?>
                            <hr>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="card widget-order-activity">
                                <section id="collapsible">
                            
                                    <div class="collapsible">
                                        <div class="card collapse-header">
                                            <div id="headingCollapse1" class="card-header" data-toggle="collapse" role="button" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                <span class="collapse-title">
                                                        Tema
                                                </span>
                                            </div>
                                            <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <form method="post" action="<?php echo base_url('superadmin/dashboard/edit_tema') ?>" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <ul class="list-unstyled mb-0">
                                                                            <li class="d-inline-block mr-2 mb-1">
                                                                                <fieldset>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input value="main-menu menu-fixed menu-dark menu-accordion menu-shadow_vertical-layout vertical-menu-modern 2-columns navbar-sticky footer-static1" type="radio" class="custom-control-input bg-primary" name="semi" id="customColorRadio1" <?php foreach($tema as $theme); if($theme->kode_tema == '1'){echo 'checked';}?>>
                                                                                        <label class="custom-control-label" for="customColorRadio1">Gelap terang</label>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </li>
                                                                            <li class="d-inline-block mr-2 mb-1">
                                                                                <fieldset>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input value="main-menu menu-fixed menu-light menu-accordion menu-shadow_vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static2" type="radio" class="custom-control-input bg-info" name="semi" id="customColorRadio5" <?php foreach($tema as $theme); if($theme->kode_tema == '2'){echo 'checked';}?>>
                                                                                        <label class="custom-control-label" for="customColorRadio5">Terang</label>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </li>
                                                                            <li class="d-inline-block mr-2 mb-1">
                                                                                <fieldset>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input  value="main-menu menu-fixed menu-dark menu-accordion menu-shadow_vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-sticky footer-static3" type="radio" class="custom-control-input bg-secondary" name="semi" id="customColorRadio2" <?php foreach($tema as $theme); if($theme->kode_tema == '3'){echo 'checked';}?>>
                                                                                        <label class="custom-control-label"  for="customColorRadio2">Gelap</label>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Ganti Tema</button>
                                                                </div>
                                                            </form>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div> -->
                    <div class="justify-content-center">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                                            <i class="bx bx-target-lock font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Data Kecelakaan</p>
                                        <h2 class="mb-0"><?php echo $dt_kecelakaan?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
                                            <i class="bx bxs-file-blank font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Data Wilayah | Kelurahan</p>
                                        <h2 class="mb-0"><?php echo $dt_kelurahan?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                                            <i class="bx bxs-comment-error font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Data Laporan</p>
                                        <h2 class="mb-0">29</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
                                            <i class="bx bxs-message-rounded-dots font-medium-5"></i>
                                        </div>
                                        <p class="text-muted mb-0 line-ellipsis">Feedback</p>
                                        <h2 class="mb-0">72</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                   
                    <div class="row">
                        <!-- Order Activity Chart Starts -->
                        <div class="col-12">
                            <div class="card widget-order-activity">
                                <div class="card-header d-md-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Order Activity</h4>
                                    <div class="heading-elements mt-md-0 mt-50 d-flex align-items-center">
                                        <fieldset class="d-inline-block form-group position-relative has-icon-left mb-0 mr-1">
                                            <input type="text" class="form-control daterange">
                                            <div class="form-control-position">
                                                <i class='bx bx-calendar'></i>
                                            </div>
                                        </fieldset>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary">Monthly</button>
                                            <button type="button" class="btn btn-outline-primary">Annually</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="order-activity-line-chart"></div>
                                </div>
                                <div class="card-footer border-top widget-order-activity-footer">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 mb-1">
                                            <div class="d-flex flex-column">
                                                <span>Direct</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge-circle badge-circle-lg badge-circle-light-secondary flex-column mr-1">
                                                        <i class='bx bx-caret-up text-success font-medium-4'></i>
                                                        <small class="text-muted">+31%</small>
                                                    </div>
                                                    <h4 class="mb-0">$2,931</h4>
                                                </div>
                                                <small class="text-muted mt-1">Look Up In The Sky</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-1">
                                            <div class="d-flex flex-column">
                                                <span>Email</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge-circle badge-circle-lg badge-circle-light-secondary flex-column mr-1">
                                                        <i class='bx bx-caret-down text-danger font-medium-4'></i>
                                                        <small class="text-muted">-1%</small>
                                                    </div>
                                                    <h4 class="mb-0">$1,231</h4>
                                                </div>
                                                <small class="text-muted mt-1">Crunch time</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-1">
                                            <div class="d-flex flex-column">
                                                <span>Cut corners</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge-circle badge-circle-lg badge-circle-light-secondary flex-column mr-1">
                                                        <i class='bx bx-caret-down text-danger font-medium-4'></i>
                                                        <small class="text-muted">-12%</small>
                                                    </div>
                                                    <h4 class="mb-0">$545</h4>
                                                </div>
                                                <small class="text-muted mt-1">Choose The Perfect</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="d-flex flex-column">
                                                <span>Other</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="badge-circle badge-circle-lg badge-circle-light-secondary flex-column mr-1">
                                                        <i class='bx bx-caret-up text-success font-medium-4'></i>
                                                        <small class="text-muted">+31%</small>
                                                    </div>
                                                    <h4 class="mb-0">$332</h4>
                                                </div>
                                                <small class="text-muted mt-1">Piece of cake</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Order Activity Chart Ends -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->
               
            </div>
        </div>
    </div>
    <!-- END: Content-->

