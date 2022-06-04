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

<!-- image slide -->
<style>
    * {box-sizing: border-box}
    body {font-family: Verdana, sans-serif; margin:0}
    .mySlides {display: none}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 53%;
        width: auto;
        margin-top: -22px;
        color: white;
        transition: 0.6s ease;
        border-radius: 100%;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 100%;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    <?php foreach($dt_pengaduan as $i => $pengaduan): 
        if(count($pengaduan['gambar_pengaduan']) != 0):?>
    .dot<?=$pengaduan['id_pengaduan']?> {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }
    <?php endif; endforeach;?>

    .active, .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
  
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

    <!-- form pengaduan -->
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
                                    <h4><b class="text-secondary">Form Pengaduan</b></span>
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
                                                    <span>Pesan</span>
                                                    <textarea name="pesan" class="form-control" placeholder="Ketik disini ..." style="height: 150px;"><?= $riw_input['pesan']?></textarea>
                                                </div>
                                                <div class="form-group mb-3" align="left">
                                                    <span>Lokasi</span>
                                                    <input class="form-control" type="text" name="lokasi" value="<?= $riw_input['lokasi']?>">
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

    <!-- daftar pengaduan -->
    <section id="cta" class="ctalogin"></section>
    <section id="about" class="about">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-title">
                <h2>DAFTAR PENGADUAN</h2>
            </div>
            <div class="row">
                <?php foreach($dt_pengaduan as $i => $pengaduan): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="d-flex">
                            <div class="col-3 bg-primary text-white d-flex align-items-center justify-content-center">
                                <div class="">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h4><?= date('d', strtotime($pengaduan['tanggal_pengaduan']))?></h4>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <small><?= date('m-Y', strtotime($pengaduan['tanggal_pengaduan']))?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 d-flex align-items-center justify-content-center">
                                <h5 class="text-secondary text-center"><b><?=$pengaduan['subjek']?></b></h5>
                            </div>
                        </div>
                        <div id="sekilas<?=$i?>" style="text-align: justify; margin-left: 20px; margin-right: 20px; margin-top: 10px;">
                            <?php if (strlen($pengaduan['pesan']) > 10){
                                $str = substr($pengaduan['pesan'], 0, 90) . '...';
                            } echo "<span class='text-secondary'>".$str."</span>";?>
                        </div>
                        <div id="demo<?=$i?>" class="collapse">
                            <div style="margin-left: 20px; margin-right: 20px; margin-top: 10px;">
                                <div style="text-align: justify; margin-bottom: 10px;">
                                    <span class="text-secondary"><?=$pengaduan['pesan']?></span>
                                </div>
                                <?php if(count($pengaduan['gambar_pengaduan']) != 0): ?>
                                    <div class="slideshow-container">
                                        <?php foreach($pengaduan['gambar_pengaduan'] as $gambar):
                                            if($gambar['id_pengaduan'] == $pengaduan['id_pengaduan']): ?>
                                        <div class="text-center mySlides<?=$pengaduan['id_pengaduan']?> show">
                                            <img src="<?=base_url('./assets/user/img/gb_pengaduan/'.$gambar['gambar'])?>" width="80%" alt="" style="border-radius: 10px;">
                                        </div>
                                        <?php endif; endforeach; ?>

                                        <a class="prev" onclick="plusSlides<?=$pengaduan['id_pengaduan']?>(-1)">
                                            <i class="fas fa-chevron-circle-left text-secondary" style="width: 25px; height: auto;"></i>
                                        </a>
                                        <a class="next" onclick="plusSlides<?=$pengaduan['id_pengaduan']?>(1)">
                                            <i class="fas fa-chevron-circle-right text-secondary" style="width: 25px; height: auto;"></i>
                                        </a>
                                    </div><br>
                                    <div style="text-align:center">
                                        <?php foreach($pengaduan['gambar_pengaduan'] as $key => $gambar):
                                            if($gambar['id_pengaduan'] == $pengaduan['id_pengaduan']):?>
                                            <span class="dot<?=$pengaduan['id_pengaduan']?>" onclick="currentSlide<?=$pengaduan['id_pengaduan']?>(<?=$key+1?>)"></span>
                                        <?php endif; endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <i class="fas fa-user-circle text-secondary"></i>
                                    <label class="text-secondary"> Pelapor: </label>
                                    <span class="text-primary"><?=$pengaduan['data_user']->nama?></span>
                                </div>
                                <div>
                                    <i class="fas fa-venus-mars text-secondary"></i>
                                    <label class="text-secondary"> Gender: </label>
                                    
                                    <span class="text-primary"><?=$pengaduan['data_user']->gender == "L" ? "Pria" : "Wanita"?></span>
                                </div>
                                <div>
                                    <i class="fas fa-compass text-secondary"></i>
                                    <label class="text-secondary"> Lokasi: </label>
                                    <span class="text-primary"><?=$pengaduan['lokasi']?></span>
                                </div>
                                <div>
                                    <i class="fa fa-info-circle text-secondary"></i>
                                    <label class="text-secondary"> Status: </label>
                                    <span class="text-primary"><?=$pengaduan['jawaban'] == "" ? "Belum ditanggapi" : "Sudah ditanggapi"?></span>
                                </div>
                                <div>
                                    <i class="fa fa-check-circle text-secondary"></i>
                                    <label class="text-secondary"> Jawaban: </label>
                                </div>
                                <?php if($pengaduan['jawaban'] != ""):?>
                                <div style="text-align: justify; margin-bottom: 10px;">
                                    <span class="text-secondary"><?=$pengaduan['jawaban']?></span>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <a data-toggle="collapse" data-target="#demo<?=$i?>" id="lengkap<?=$i?>" data-id="<?=$i?>" class="text-primary lengkap" style="cursor: pointer;">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div> 
                <?php endforeach;?>   
            </div>
            <?= $this->pagination->create_links();?>
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

        $('.lengkap').on('click', function(){
            var id = $(this).data('id');
            var konten = $('#demo'+id).attr('class');
            if(konten == 'collapse'){
                $('#lengkap'+id).text('Lebih Sedikit');
                $('#sekilas'+id).hide();
            }else{
                $('#lengkap'+id).text('Baca Selengkapnya');
                setTimeout(function(){
                    $('#sekilas'+id).show();
                },150);
            }
        });
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
    
    // js slide image
    <?php foreach($dt_pengaduan as $i => $pengaduan): if(count($pengaduan['gambar_pengaduan']) != 0):?>
        
    let slideIndex<?=$i?> = 1;
    showSlides<?=$pengaduan['id_pengaduan']?>(slideIndex<?=$i?>);

    function plusSlides<?=$pengaduan['id_pengaduan']?>(n) {
        showSlides<?=$pengaduan['id_pengaduan']?>(slideIndex<?=$i?> += n);
    }
    
    function currentSlide<?=$pengaduan['id_pengaduan']?>(n) {
        showSlides<?=$pengaduan['id_pengaduan']?>(slideIndex<?=$i?> = n);
    }

    function showSlides<?=$pengaduan['id_pengaduan']?>(n) {
        let i;
        let slides<?=$pengaduan['id_pengaduan']?> = document.getElementsByClassName("mySlides<?=$pengaduan['id_pengaduan']?>");
        let dots = document.getElementsByClassName("dot<?=$pengaduan['id_pengaduan']?>");
        if (n > slides<?=$pengaduan['id_pengaduan']?>.length) {slideIndex<?=$i?> = 1}    
        if (n < 1) {slideIndex<?=$i?> = slides<?=$pengaduan['id_pengaduan']?>.length}
        for (i = 0; i < slides<?=$pengaduan['id_pengaduan']?>.length; i++) {
            slides<?=$pengaduan['id_pengaduan']?>[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides<?=$pengaduan['id_pengaduan']?>[slideIndex<?=$i?>-1].style.display = "block";  
        dots[slideIndex<?=$i?>-1].className += " active";
    }
    <?php endif; endforeach?>
    
</script>
</body>

</html>