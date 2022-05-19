<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/animate/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/sweetalert2.min.css">
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/polyfill.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/extensions/sweet-alerts.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/toastr.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/plugins/extensions/toastr.css">
<!-- <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/vendors.min.js"></script> -->
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/toastr.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/extensions/toastr.js"></script>
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
                            <li class="breadcrumb-item active">Tag Berita
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->session->flashdata('test');?>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-primary">Tag Berita</h4>
                            </div>
                            <div class="ml-2">
                                <a data-toggle="modal" data-target="#default">
                                    <button type="button" class="btn btn-success glow mr-1 mb-1">
                                        <i class="bx bxs-down-arrow-square"></i>
                                        <span class="align-middle ml-25">Tambah Data</span>
                                    </button>
                                </a>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered complex-headers">
                                        <thead>
                                            <tr>
                                                <th style="width:100px;">No</th>
                                                <th>Nama Tag</th>
                                                <th>Date</th>
                                                <th style="width:100px;">Aksi</th>
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                            <?php $no = 1;
                                                foreach ($data_tag as $data) :
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?= $data['nama_tag'] ?></td>
                                                <td><?= $data['date'] ?></td>
                                                <td> 
                                                    <div  class="form-row">
                                                        <button type="button"  class="btn btn-icon btn-danger mr-1 mb-1" onclick="hapus(<?php echo $data['id_tag'] ?>)"><i class="bx bxs-trash"></i></button>
                                                    </div>    
                                                </td>
                                            </tr>
                                            <?php endforeach; ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel1">Tambah Tag Berita</h3>
                        </div>
                        <form action="<?php echo base_url('admin/tag/add');?>" method=POST enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="col-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="first-name" class="col-form-label">nama Tag</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="first-name" class="form-control" name="tag" placeholder="Nama Tag.." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger mr-1 mb-1" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>
                                <button type="submit" class="btn btn-outline-success mr-1 mb-1" >
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tambah</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function hapus(id_tag)
    {
        Swal.fire({
            title: 'HAPUS DATA?',
            text: "Apakah Ingin Menghapus Data Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            confirmButtonClass: 'btn btn-warning ml-1',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                window.location = "<?php echo base_url('admin/tag/hapus/') ?>" + id_tag;
            }
        })
    }
</script>
