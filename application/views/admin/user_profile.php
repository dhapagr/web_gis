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
                                <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active"> Akun User
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('test');?>

            <div class="content-body">
            <!-- account setting page start -->
            <?php foreach($data_user as $data) :?>
                <section class="users-view">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-xl-4 col-md-12 weather-card">
                                        <div class="row">
                                            <!-- User Widget Starts -->
                                                <div class="col-xl-12 col-md-6 col-12 user-profile-card">
                                                    <div class="card">
                                                        <div class="card-header mx-auto pt-3">
                                                            <div class="avatar bg-rgba-primary p-50">
                                                                <img src="<?php echo base_url('assets') . '/admin/images/profil/' . $data["foto_user"]; ?>" class="img-fluid" id="ft1" alt="avatar" height="170" width="170">
                                                            </div>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h4><?php echo $data['nama_user']?></h4>
                                                            <p><?php echo $data['role_user']?></p>
                                                            
                                                            <!-- <a href="javascript:void(0);" class="btn btn-sm btn-light-secondary">Preview</a> -->
                                                           
                                                        </div>
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Last Update:</td>
                                                                    <td><?php echo $data['date']?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Verified:</td>
                                                                    <td class="users-view-verified">Yes</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Role:</td>
                                                                    <td class="users-view-role"><?php echo $data['role_user']?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Status:</td>
                                                                    <td><span class="badge badge-light-success users-view-status">Active</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                    <form method="post" action="<?php echo base_url('admin/User_profile/update/'.$data['id_user']) ?>" enctype="multipart/form-data">
                                        <h6>
                                            <i class="step-icon"></i>
                                            <span class="fonticon-wrap">
                                                <i class="livicon-evo" data-options="name:settings.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                                            </span>
                                            <span>Edit Data User</span>
                                        </h6>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="first-name-icon">Name</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="first-name-icon" class="form-control" value="<?php echo $data['nama_user']?>" name="name_edit" placeholder="Name">
                                                        <div class="form-control-position">
                                                            <i class="bx bx-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email-id-icon">Email</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="email" id="email-id-icon" class="form-control" value="<?php echo $data['email_user']?>" name="email_edit" placeholder="Email">
                                                        <div class="form-control-position">
                                                            <i class="bx bx-mail-send"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Username</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control" placeholder="Username" value="<?php echo $data['username_user']?>" name="username_edit">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-user-circle"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control pickadate-months-year" name="date_edit" placeholder="Select Date" value="<?php echo $data['tgl_lahir']?>">
                                                        <div class="form-control-position">
                                                            <i class='bx bx-calendar'></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                               
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" value="laki-laki" class="custom-control-input bg-primary" name="gender" id="customColorRadio1" <?php if($data['jenis_kelamin']=='laki-laki') echo 'checked'?>>
                                                                    <label class="custom-control-label" for="customColorRadio1">Laki-Laki</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" value="perempuan" class="custom-control-input bg-primary" name="gender" id="customColorRadio2" <?php if($data['jenis_kelamin']=='perempuan') echo 'checked'?>>
                                                                    <label class="custom-control-label" for="customColorRadio2">Perempuan</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Alamat</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control" placeholder="Alamat" value="<?php echo $data['alamat_user']?>" name="alamat_edit">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-home"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact-info-icon">NO. HP</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="number" id="contact-info-icon" class="form-control" value="<?php echo $data['nomor_user']?>" name="nomor_edit" placeholder="Nomor Hp"> 
                                                        <div class="form-control-position">
                                                            <i class="bx bx-mobile"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Foto Profil</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="profil_edit" onchange="readURL('ft1',this);" value="<?php echo $data['foto_user']; ?>"/>
                                                        <label class="custom-file-label" for="customFile">Choose profile pic</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <!-- <button type="button" onclick="tutup()" class="btn btn-danger glow mr-1 mb-1"><i class="bx bx-x-circle"></i>
                                                        <span class="align-middle ml-25">Cancel Data</span> 
                                                    </button> -->
                                                    <button type="submit" class="btn btn-success glow mr-1 mb-1"><i class="bx bx-pencil"></i>
                                                        <span class="align-middle ml-25">Edit Data</span>
                                                    </button>
                                                </fieldset>
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
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script> -->
<script>
    function readURL(id, input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#' + id)
					.attr('src', e.target.result)
					.width(170)
					.height(170);
			};

			reader.readAsDataURL(input.files[0]);
			$("#" + id).show();
		}
	}
    
</script>