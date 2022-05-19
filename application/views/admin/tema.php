<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Admin</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/dashboard"); ?>"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Konten
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Collapse start -->
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
                                    <form method="post" action="<?php echo base_url('admin/tema/edit_tema') ?>" enctype="multipart/form-data">
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
                                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> -->
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
    <div>
</div>
<!-- <script>
    function hapus(id)
        {
            window.location = "<?php echo base_url('admin/tema/edit_tema/') ?>" + id;
        }
</script> -->
