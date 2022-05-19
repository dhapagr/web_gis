<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"/>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
<link href="<?php echo base_url("assets"); ?>/user/css/auth.css" rel="stylesheet"> -->
<style>
  html, body {
    height: 100%;
    margin: 0;
  }
  .leaflet-container {
    height: 400px;
    width: 600px;
    max-width: 100%;
    max-height: 100%;
  }
  
</style>
<body>
  
  <main id="main">
    <section id="cta" class="ctalogin"></section>
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>SAMPAIKAN PENGADUAN ANDAsss</h2>
            <h4><p class="mb-0">Jika ada permasalahan terkait kecelakaan atau lalu lintas jalan Kota Madiun</p></h4>
            <div class="row process process-shapes process-shapes-always-animate my-5">
                <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">
                    <div class="process-step-circle">
                        <h3><strong class="process-step-circle-content">01</strong></h3>
                    </div>
                    <div class="process-step-content">
                        <h4 class="mb-1 text-5 font-weight-bold">Login atau Register</h4>
                        <p class="mb-0">Pengguna melakukan Register (membuat akun baru) atau Login jika sudah mempunyai akun.</p>
                        <div></div>
                    </div>
                </div>
                <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                    <div class="process-step-circle process-shapes-always-animate-delay">
                        <h3><strong class="process-step-circle-content">02</strong></h3> 
                    </div>
                    <div class="process-step-content">
                        <h4 class="mb-1 text-5 font-weight-bold">Membuat Pengaduan</h4>
                        <p class="mb-0">Pengguna membuat pengaduan dengan mengisi form yang sudah disediakan.</p>
                    </div>
                </div>
                <div class="process-step col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                    <div class="process-step-circle">
                        <h3><strong class="process-step-circle-content">03</strong></h3>
                    </div>
                    <div class="process-step-content">
                        <h4 class="mb-1 text-5 font-weight-bold">Validasi Admin</h4>
                        <p class="mb-0">Admin akan memvalidasi pengaduan anda dan mengatasi permasalahan yang ada.</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="text-center" class="col-lg-3 cta-btn2-container text-center">
                    <a class="cta-btn2 align-middle w-600" href="<?php echo base_url('user/login'); ?>">BUAT PENGADUAN</a>
                </div>
            </div>
        </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>