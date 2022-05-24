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
            <h2>SAMPAIKAN PENGADUAN ANDA</h2>
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
                    <?php if($this->session->userdata('nama') == ''):?>
                        <a class="cta-btn2 align-middle w-600" href="<?php echo base_url('user/login'); ?>">BUAT PENGADUAN</a>
                    <?php else: 
                        echo $this->session->flashdata('pesan_pengaduan');
                        $riw_input = $this->session->flashdata('input');
                    ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <span><b class="text-secondary">Form Pengaduan</b></span>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('user/pengaduan/post_pengaduan/')?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-group mb-3" align="left">
                                                    <span>Subjek</span>
                                                    <input id="subjek" class="form-control" type="text" name="subjek" value="<?= $riw_input['subjek']?>">
                                                </div>
                                                <div class="form-group mb-3" align="left">
                                                    <label for="my-input">Text</label>
                                                    <textarea name="pesan" class="form-control" placeholder="Ketik disini ..." style="height: 150px;"><?= $riw_input['pesan']?></textarea>
                                                </div>
                                                <div class="form-group mb-3" align="left">
                                                    <span>Nama</span>
                                                    <input class="form-control" type="text" name="nama" value="<?= $riw_input['nama'] ? $riw_input['nama'] : $this->session->userdata('nama')?>">
                                                </div>
                                                <div class="form-group mb-3" align="left">
                                                    <span>Email</span>
                                                    <input class="form-control" type="text" name="email" value="<?= $riw_input['email'] ? $riw_input['email'] : $this->session->userdata('email')?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-2" align="left">
                                                    <span>Gambar</span>
                                                    <div class="col-12">
                                                        <small class="text-danger">Catatan: Format gambar [*.jpg;*.jpeg;*.png;]. Ukuran maksimal pergambar 5 mb.</small>
                                                    </div>
                                                </div>
                                                <!-- jumlah gambar -->
                                                <input type="text" id="jml_gb" name="jml_gb" hidden>
                                                <div class="tempel_gambar">
                                                </div>
                                                <div class="mt-3">
                                                    <button class="btn btn-sm btn-info text-white" type="button" id="tambah_gambar">
                                                        <i class="fa fa-plus mr-2" aria-hidden="true"></i> Tambah Gambar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-success text-white col-6 col-md-3" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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
    $(document).ready(function(){
        var wrapper = $(".tempel_gambar");
        a = 0; b = 0; c = 0; d = 0; f = 0;

        $('#tambah_gambar').on('click', function(e){
            e.preventDefault(); a++;

            if(wrapper.children().length >= 5){
                Swal.fire('Informasi','Gambar maksimal 5','info');
            }else{
                $(wrapper).append(''+
                    '<div class="d-flex align-items-center justify-content-between mb-3">'+
                        '<div class="col-6">'+
                            '<input id="form_gambar'+ b +'" name="gambar['+ f++ +']" type="file" class="form-control form-control-sm form_gambar" data-id="'+ c++ +'" accept="image/*">'+
                        '</div>'+ 
                        '<div class="col-1">'+
                            '<button class="btn btn-sm btn-danger hapus_gambar"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                        '</div>'+ 
                        '<div class="col-4">'+
                            '<img alt="your image" id="output'+ d++ +'" width="100%" height="auto"/>'+
                        '</div>'+    
                    '</div>'+
                '');
            }
        });

        $(wrapper).on('click', '.hapus_gambar', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            a--;
        });

        $(document).on('change', '.form_gambar', function(event){
            var id = $(this).data("id");
            readURL(this, id);
        });

        setInterval(function(){
            var jumlah_gb = wrapper.children().length;
            $('#jml_gb').val(jumlah_gb);
        }, 1);
    });

    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#output'+id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>

</html>