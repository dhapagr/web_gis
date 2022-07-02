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
                                <li class="breadcrumb-item active">Edit User 
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('test');?><br>
            <div class="content-body">
                <div id="content">
                    <section class="simple-validation" id="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Add Data User</h4>
                                    </div><hr>
                                    <div class="card-body">
                                        <form id="jquery-val-form" method="post" action="<?php echo base_url('superadmin/Data_user/tambah_data_testing') ?>" enctype="multipart/form-data">
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
                                                <?= form_error('email')?>
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
                                            <div class="form-group" hidden>
                                                <label class="form-label" for="basic-default-email">role</label>
                                                <input type="text" id="basic-default-email" name="role" class="form-control" value="admin"/>
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
                </div>
            </div>
        </div>
    </div>