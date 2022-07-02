<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/vendors.min.css"> -->
<!-- <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/vendors.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/animate/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/sweetalert2.min.css">
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/polyfill.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/extensions/sweet-alerts.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/toastr.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/plugins/extensions/toastr.css">

<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/toastr.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/extensions/toastr.js"></script>

<body>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Super Admin</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="<?php echo base_url("superadmin/Dashboard"); ?>"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Data User
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('toast');?>
            <?= $this->session->flashdata('test');?><br>
            
            <div class="content-body">
                <div id="content">
                    
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-2" role="tablist">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="add" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="bx bxs-down-arrow-square"></i>
                                            <span class="align-middle ml-25">Tambah Data</span>                            
                                        </a>
                                        
                                    </li>
                                </ul>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Data Superadmin | Tabel Data Superadmin</h4>
                                    </div>

                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>E-mail</th>
                                                        <th>Username</th>
                                                        <th>No Telp.</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                        $no = 1;
                                                        foreach($spadmin_detail as $dt_spadmin):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?= $dt_spadmin['nama_user'] ?></td>
                                                        <td><?= $dt_spadmin['email_user'] ?></td>
                                                        <td><?= $dt_spadmin['username_user'] ?></td>
                                                        <td><?= $dt_spadmin['nomor_user'] ?></td>
                                                        <td>
                                                            <span class="badge badge-light-success"><?= $dt_spadmin['role_user'] ?></span>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Data Admin | Tabel Data Admin</h4>
                                    </div>
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                            <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>E-mail</th>
                                                        <th>Username</th>
                                                        <th>No Telp.</th>
                                                        <th>Role</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                        $no = 1;
                                                        foreach($admin_detail as $dt_admin):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?= $dt_admin['nama_user'] ?></td>
                                                        <td><?= $dt_admin['email_user'] ?></td>
                                                        <td><?= $dt_admin['username_user'] ?></td>
                                                        <td><?= $dt_admin['nomor_user'] ?></td>
                                                        <td>
                                                            <span class="badge badge-light-success"><?= $dt_admin['role_user'] ?></span>
                                                        </td>
                                                        <td>
                                                            <div  class="form-row">
                                                                <!-- <button type="button" class="btn btn-icon btn-warning mr-1 mb-1" onclick="window.location.href='<?php echo base_url('superadmin/Data_user/edit_view/'.$dt_admin['id_user']) ?>'"><i class="bx bx-edit" ></i></button> -->
                                                                <button type="button" class="btn btn-icon btn-warning mr-1 mb-1" onclick="edit(<?php echo $dt_admin['id_user'] ?>)"><i class="bx bx-edit" ></i></button>
                                                                <button type="button" class="btn btn-icon btn-danger mr-1 mb-1" onclick="hapus(<?php echo $dt_admin['id_user'] ?>)"><i class="bx bxs-trash"></i></button>
                                                            </div>   
                                                        </td> 
                                                    </tr>
                                                    <?php endforeach;?>
                                                    
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="simple-validation" id="form" style="display:none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Add Data User</h4>
                                    </div><hr>
                                    <div class="card-body">
                                        <form id="jquery-val-form" method="post" action="<?php echo base_url('superadmin/Data_user/tambah_data') ?>" enctype="multipart/form-data">
                                            <div>
                                                <h6 class="card-title">Akun User</h6>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-name">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="basic-default-name" name="name" placeholder="John Doe" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-username">Username</label>
                                                <input type="text" class="form-control" id="basic-default-username" name="username" placeholder="John Doe" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-email">E-mail</label>
                                                <input type="email" id="basic-default-email" name="email" class="form-control" placeholder="john.doe@email.com" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-password">Password</label>
                                                <input type="password" id="basic-default-password" name="basic-default-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                                <input type="password" id="confirm-password" name="confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            </div>
                                            <br>
                                            <div>
                                                <h6 class="card-title">Data Diri User</h6>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label" >No. Telepon</label>
                                                <input type="number" name="mobile_add" class="form-control" placeholder="No. Telepom" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control pickadate-months-year" name="date_edit" placeholder="Select Date" required>
                                                    <div class="form-control-position">
                                                        <i class='bx bx-calendar'></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label>Profile pic</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="foto_user" />
                                                    <label class="custom-file-label" for="customFile">Choose profile pic</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block">Jenis Kelamin</label>
                                                <div class="custom-control custom-radio my-50">
                                                    <input type="radio" id="validationRadiojq1" name="gender" class="custom-control-input" value="laki-laki" required/>
                                                    <label class="custom-control-label" for="validationRadiojq1">Laki-Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="validationRadiojq2" name="gender" class="custom-control-input" value="perempuan" required/>
                                                    <label class="custom-control-label" for="validationRadiojq2">Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block" for="validationBio">Alamat</label>
                                                <textarea class="form-control" id="validationBio" name="alamat" rows="3" required></textarea>
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="validationCheck" name="validationCheck" />
                                                    <label class="custom-control-label" for="validationCheck">Agree to our terms and conditions</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="reset" onclick="tutup_add()" class="btn btn-danger glow mr-1 mb-1"><i class="bx bxs-x-square"></i>
                                                        <span class="align-middle ml-25">Clear Data</span> 
                                                    </button>
                                                    <button type="submit" class="btn btn-success glow mr-1 mb-1"><i class="bx bxs-add-to-queue"></i>
                                                        <span class="align-middle ml-25">Tambah Data</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php 
                        foreach($admin_detail as $dt_admin):
                    ?>
                    <section class="simple-validation" id="edit<?= $dt_admin['id_user']?>" style="display:none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Edit Data User</h4>
                                    </div><hr>
                                    <div class="card-body">
                                        <form id="jquery-val-form" class="submit<?= $dt_admin['id_user']?>" method="post" action="<?php echo base_url('superadmin/Data_user/update/'.$dt_admin['id_user']) ?>" enctype="multipart/form-data">
                                            <div>
                                                <h6 class="card-title">Akun User</h6>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-name">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="basic-default-name" name="name_edit" placeholder="John Doe" value="<?= $dt_admin['nama_user']?>" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-username">Username</label>
                                                <input type="text" class="form-control" id="basic-default-username" name="username_edit" placeholder="John Doe" value="<?= $dt_admin['username_user']?>" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-default-email">E-mail</label>
                                                <input type="email" id="basic-default-email" name="email_edit" class="form-control" placeholder="john.doe@email.com" value="<?= $dt_admin['email_user']?>" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="pass1">Password</label>
                                                <input type="password" id="pass1<?= $dt_admin['id_user']?>" name="pass1" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="pass2">Confirm Password</label>
                                                <input type="password" id="pass2<?= $dt_admin['id_user']?>" name="pass2"  class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                                            </div>
                                            <br>
                                            <div>
                                                <h6 class="card-title">Data Diri User</h6>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label" >No. Telepon</label>
                                                <input type="number" name="mobile_edit" class="form-control" placeholder="No. Telepom" value="<?= $dt_admin['nomor_user']?>" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control pickadate-months-year" name="date_edit" placeholder="Select Date" value="<?= $dt_admin['tgl_lahir']?>" required>
                                                    <div class="form-control-position">
                                                        <i class='bx bx-calendar'></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label>Profile pic</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="customFile_edit" value="<?= $dt_admin['foto_user']?>" />
                                                    <label class="custom-file-label" for="customFile">Choose profile pic</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block">Jenis Kelamin</label>
                                                <div class="custom-control custom-radio my-50">
                                                    <input type="radio" id="validationRadiojq1" name="gender_edit" class="custom-control-input" value="laki-laki" <?php if($dt_admin['jenis_kelamin']=='laki-laki') echo 'checked'?> required/>
                                                    <label class="custom-control-label" for="validationRadiojq1">Laki-Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="validationRadiojq2" name="gender_edit" class="custom-control-input" value="perempuan" <?php if($dt_admin['jenis_kelamin']=='perempuan') echo 'checked'?> required/>
                                                    <label class="custom-control-label" for="validationRadiojq2">Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block" for="validationBio">Alamat</label>
                                                <textarea class="form-control" id="validationBio" name="alamat_edit" rows="3" value="<?php echo $dt_admin['alamat_user']?>"  required><?php echo $dt_admin['alamat_user']?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="validationCheck" name="validationCheck" />
                                                    <label class="custom-control-label" for="validationCheck">Agree to our terms and conditions</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="button" onclick="tutup_edit()" class="btn btn-danger glow mr-1 mb-1"><i class="bx bxs-x-square"></i>
                                                        <span class="align-middle ml-25">Clear Data</span> 
                                                    </button>
                                                    <button type="button" onclick="konfirm(<?= $dt_admin['id_user']?>)" class="btn btn-success glow mr-1 mb-1"><i class="bx bxs-add-to-queue"></i>
                                                        <span class="align-middle ml-25">Tambah Data</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   
    <script>
        $(document).ready(function(){
            $("#add").click(function(){
                $("#form").show();
                $("#basic-datatable").hide();
                <?php foreach($admin_detail as $dt_admin):?>;
                $("#edit"+<?= $dt_admin['id_user']?> ).hide();
                <?php endforeach ?>
            });
            $("#data").click(function(){

                $("#basic-datatable").show();
                $("#form").hide();
                <?php foreach($admin_detail as $dt_admin):?>;
                $("#edit"+<?= $dt_admin['id_user']?> ).hide();
                <?php endforeach ?>
            });
        });
    </script>
    <script>
        function edit(id_user)
        {
            $("#edit"+id_user).show();
            $("#basic-datatable").hide();
            $("#form").hide();
        }
    </script>
    <script>
        function hapus(id_user)
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
                    window.location = "<?php echo base_url('superadmin/Data_user/hapus/') ?>" + id_user;
                }
                else{
                    var isRtl = $('html').attr('data-textdirection') === 'rtl';
                    $(document).ready(function(){
                        toastr['warning']('Data tidak terhapus', 'Cancel', { rtl: isRtl, positionClass: 'toast-top-center',showMethod: 'fadeIn', hideMethod: 'fadeOut', timeOut: 2000, });
                    });
                }
            })
            // swal({
            //     title: "Hapus Data?",
            //     text: "Once deleted, you will not be able to recover this imaginary file!",
            //     icon: "warning",
            //     buttons: true,
            //     dangerMode: true,
            //     })
            //     .then((willDelete) => {
            //     if (willDelete) {
            //         window.location = "<?php echo base_url('superadmin/Data_user/hapus/') ?>" + id_user;
            //     } else {
            //         var isRtl = $('html').attr('data-textdirection') === 'rtl';
            //         $(document).ready(function(){
            //             toastr['warning']('Data tidak terhapus', 'Cancel', { rtl: isRtl, positionClass: 'toast-top-center',showMethod: 'fadeIn', hideMethod: 'fadeOut', timeOut: 2000, });
            //         });
            //     }
            // });
        }
    </script>
    <script>
        function tutup_edit()
        {
            Swal.fire({
                title: 'Kembali Ke Halaman Utama?',
                text: "Data yang telah diubah akan direset ulang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Kembali',
                confirmButtonClass: 'btn btn-warning',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
                }).then(function (result) {
                if (result.value) {
                    $("#basic-datatable").show();
                    $("#form").hide();
                    <?php foreach($admin_detail as $dt_admin):?>;
                    $("#edit"+<?= $dt_admin['id_user']?> ).hide();
                    <?php endforeach ?>
                    Swal.fire({
                        position: 'top-center-start',
                        icon: 'info',
                        title: 'Mereset Data',
                        showConfirmButton: false,
                        timer: 2000,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })
                }
                else if (result.dismiss === Swal.DismissReason.cancel) {
                   
                }
            })
        }
        function tutup_add()
        {
            Swal.fire({
                title: 'Kembali Ke Halaman Utama?',
                text: "Data yang telah diubah akan direset ulang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Kembali',
                confirmButtonClass: 'btn btn-warning ml-1',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    $("#basic-datatable").show();
                    $("#form").hide();
                    <?php foreach($admin_detail as $dt_admin):?>;
                    $("#edit"+<?= $dt_admin['id_user']?> ).hide();
                    <?php endforeach ?>
                    Swal.fire({
                        position: 'top-center-start',
                        icon: 'info',
                        title: 'Mereset Data',
                        showConfirmButton: false,
                        timer: 2000,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })
                }
                else{
                    
                }
            })
        }
    </script>
    <script type="text/javascript">
        function konfirm(id)
        {
            var pass1 = $('#pass1'+ id).val();
            var pass2 = $('#pass2'+ id).val();
            console.log(pass1 + "_" + pass2);
            if (pass1 != pass2) {				
                $(function () {
                    'use strict';

                    var isRtl = $('html').attr('data-textdirection') === 'rtl';
                    $(document).ready(function(){
                        toastr['error']('Konfirmasi Password Tidak Sesuai!', 'Password INVALID', { rtl: isRtl, positionClass: 'toast-top-center',showMethod: 'fadeIn', hideMethod: 'fadeOut', timeOut: 2000, });
                    });
                });
            }
            else{
                $('.submit'+ id).submit();
            }
            
        }
        function test()
        {
            Swal.fire({
                position: 'top-center-start',
                icon: 'info',
                title: 'Mereset Data',
                showConfirmButton: false,
                timer: 5000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
        }
    </script>
</body>
</html>