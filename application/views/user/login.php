<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"/>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script> -->
<link href="<?php echo base_url("assets"); ?>/user/css/auth.css" rel="stylesheet">

<body>
  
  <main id="main">
    <section id="cta" class="ctalogin">
    </section>
    <section class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>LOGIN USER</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>
    </section>
    <section id="cta" class="cta">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card py-3 px-2">
                    <!-- <h1 class="text-center mb-3 mt-2">LOGIN USER</h1> -->
                        <div class="d-flex justify-content-center">
                            <img style="width:150px; height:125px;" src="<?php echo base_url("assets"); ?>/user/img/Kota-madiun.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-12 d-flex justify-content-center"><span>LOGIN</span></div>
                    
                    <div class="division">
                        <div class="row">
                            <div class="col-3"><div class="line l"></div></div>
                           
                            <div class="col-3"><div class="line r"></div></div>
                        </div>
                    </div><br>
                    <?= $this->session->flashdata('sukses_registrasi')?>
                    <form class="myform" action="<?= base_url('user/login/auth')?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <?= form_error('email', '<div class="text-danger small ml-2" style="margin-top: -20px;">', '</div>') ?>
                        </div>
                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <i class="fa fa-eye toggle-password" style="cursor: pointer; margin-left: -30px; margin-bottom: 20px;"></i>
                            </div>
                            <?= form_error('password', '<div class="text-danger small ml-2 mb-2" style="margin-top: -20px;">', '</div>') ?>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-md-6 col-12">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 bn"><a href="<?php echo base_url("user/register"); ?>">Register</a></div>
                        </div>
                        <div class="form-group mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-block btn-primary btn-lg"><small class="mr-1"><i class="far fa-user"></i>Login</small></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $("body").on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            const type = $('#password').attr('type') === 'password' ? 'text' : 'password';
            $('#password').attr('type', type);
        });

        setTimeout(function(){
            $('#alert').remove();
        }, 5000);
    </script>

</body>

</html>