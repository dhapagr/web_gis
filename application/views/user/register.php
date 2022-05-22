
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="<?php echo base_url("assets"); ?>/user/js/bootstrap.min.js"></script>
</head>
<body>

<section id="cta" class="ctalogin">
</section>
<section class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>REGISTRASI USER</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="container">
            <div class="panel panel-default">
                <br>
                <hr>
                <div class="panel-body">
                <?php 
                    $pesan = $this->session->flashdata('pesan_register')?>
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url('user/register/registrasi') ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center">
                                    <h3>Data Pribadi</h3>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="nama">Nama Lengkap :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $pesan['nama']?>">
                                        <?= form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="ttl">Tempat, Tanggal Lahir :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $pesan['ttl']?>">
                                        <?= form_error('ttl', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="agama">Agama :</label>
                                    <div class="col-sm-8">
                                        <select id="agama" name="agama" class="form-control select2" style="width: 100%;">
                                            <option disabled hidden selected="selected">---</option>
                                            <option <?php if($pesan['agama'] == "muslim"){echo "selected";}?> value="muslim">Muslim</option>
                                            <option <?php if($pesan['agama'] == "kristen"){echo "selected";}?> value="kristen">Kristen</option>
                                            <option <?php if($pesan['agama'] == "hindu"){echo "selected";}?> value="hindu">Hindu</option>
                                            <option <?php if($pesan['agama'] == "budha"){echo "selected";}?> value="budha">Budha</option>
                                            <option <?php if($pesan['agama'] == "konghucu"){echo "selected";}?> value="konghucu">Konghucu</option>
                                            <option <?php if($pesan['agama'] == "lainnya"){echo "selected";}?> value="lainnya">Lainnya</option>
                                        </select>
                                        <?= form_error('agama', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="gender">Jenis Kelamin :</label>
                                    <div class="col-sm-8">
                                        <select id="gender" name="gender" class="form-control select2" style="width: 100%;">
                                            <option disabled hidden selected="selected">---</option>
                                            <option <?php if($pesan['gender'] == "L"){echo "selected";}?> value="L">Laki laki</option>
                                            <option <?php if($pesan['gender'] == "P"){echo "selected";}?> value="P">Perempuan</option>
                                        </select>
                                        <?= form_error('gender', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="alamat">Alamat :</label>
                                    <div class="col-sm-8">
                                        <textarea id="smk_almt" name="alamat" class="form-control"><?= $pesan['alamat']?></textarea>
                                        <?= form_error('alamat', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <style>
                                        /* Chrome, Safari, Edge, Opera */
                                        input::-webkit-outer-spin-button,
                                        input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;}
                                        /* Firefox */
                                        input[type=number] {-moz-appearance: textfield;}
                                    </style>
                                    <label class="control-label col-sm-4" for="telephone">No. Telepon :</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="telephone" id="telephone" value="<?= $pesan['telephone']?>">
                                        <?= form_error('telephone', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center">
                                    <h3>Akun</h3>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="email">Email   :</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $pesan['email']?>">
                                        <?= form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="password">Password  :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password" value="<?= $pesan['password']?>">
                                        <?= form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="conf_password">Konfirmasi Password   :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?= $pesan['confirm_password']?>">
                                        <?= form_error('confirm_password', '<div class="text-danger small ml-2">', '</div>') ?>
                                        <?= $this->session->flashdata('pwd_tdk_sesuai')?>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Registrasi Akun</button>
                                <a href="<?= base_url("user/login")?>" class="btn btn-danger">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
   
</body><br>
<section id="cta" class="ctalogin">
</section>
</html>