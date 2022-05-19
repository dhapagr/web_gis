
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
                <!-- <div class="panel-heading">
                    <h1 align="center">Form Registrasi Mahasiswa</h1>
                </div> -->
                <br>
                <hr>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url('user/register/registrasi') ?>">
                        <div class="row">
                        
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center">
                                    <h3>Data Pribadi</h3>
                                </div>
                                <hr>
                            
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="nama">Nama Lengkap :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="ttl">Tempat, Tanggal Lahir :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ttl" name="ttl" required>
                                    </div>
                                </div>
                             
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="agama">Agama :</label>
                                    <div class="col-sm-8"><select id="agama" name="agama" class="form-control select2" style="width: 100%;">
                                        <option value="-" selected="selected">---</option>
                                        <option value="muslim">Muslim</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="konghucu">Konghucu</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="gender">Jenis Kelamin :</label>
                                    <div class="col-sm-8"><select id="gender" name="gender" class="form-control select2" style="width: 100%;">
                                        <option value="-" selected="selected">---</option>
                                        <option value="L">Laki laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="alamat">Alamat :</label>
                                    <div class="col-sm-8">
                                        <textarea id="smk_almt" name="alamat" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="telephone">No. Telepon :</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="telephone" id="telephone" required>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-lg-6">
                                
                                <div class="d-flex justify-content-center">
                                    <h3>Akun</h3>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="username">Username   :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="email">Email   :</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="password">Password  :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="conf_password">Konfirmasi Password   :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="conf_password" name="conf_password" required>
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="box-footer" style="margin-top: 50px" >
                                    <!-- <input type="submit" name="submit" class="btn btn-primary" value="Register Data"> -->
                                    <button type="submit" class="btn btn-primary">Registrasi Akun</button>
                                    <a href="<?php echo base_url("user/login"); ?>" class="btn btn-danger">Login</a>
                                </div>
                            </div><!-- /.box-footer -->
                        
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