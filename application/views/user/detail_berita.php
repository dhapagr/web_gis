<style>
    .berita-link:hover{
        color: deepskyblue;
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <div class="container detail-berita">
        <div class="col-sm-12 card-berita">
            <div class="card" data-aos="fade-up">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="col header-berita">
                                <h1 class="judul-berita" style="text-align: justify;"><strong><?=$berita->sub_judul?></strong></h1>
                                <span class="">
                                    <?php 
                                        $hari = date('N', strtotime($berita->created_at));
                                        if($hari == 1){echo "Minggu, ";}
                                        elseif($hari == 2){echo "Senin, ";}
                                        elseif($hari == 3){echo "Selasa, ";}
                                        elseif($hari == 4){echo "Rabu, ";}
                                        elseif($hari == 5){echo "Kamis, ";}
                                        elseif($hari == 6){echo "Jumat, ";}
                                        elseif($hari == 7){echo "Sabtu, ";}
                                    ?>
                                    <?= date('d-M-Y', strtotime($berita->created_at))?>
                                    <?= "<span class='ml-1'></span>".date('H:i', strtotime($berita->created_at))." WIB"?>
                                </span>
                                <div class="mt-3 d-flex align-items-center">
                                    <li style="display: inline; margin-right: 10px;">
                                        <span>Bagikan: </span>
                                    </li>
                                    <li style="display: inline; margin-right: 10px; cursor: pointer; height: 28px; width: 28px; border-radius: 3px;" class="bg-dark d-flex align-items-center justify-content-center url-copy">
                                        <i class="fas fa-link fa-1x text-white bg-dark"></i>
                                    </li>
                                    <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                        <i class="fab fa-facebook-square fa-2x text-dark"></i>
                                    </li>
                                    <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                        <i class="fab fa-twitter-square fa-2x text-dark"></i>
                                    </li>
                                    <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                        <i class="fab fa-linkedin fa-2x text-dark"></i>
                                    </li>
                                    <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                        <i class="fab fa-whatsapp-square fa-2x text-dark"></i>
                                    </li>
                                    <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                        <img src="<?=base_url()?>assets/berita/images/telegram.png" style="width:28.5px; height: auto; position: absolute; margin-top: -15px; margin-left: 3px; border-radius: 3px;" alt="">
                                    </li>
                                </div>
                            </div>
                            <div align="center" class="mt-4">
                                <style>
                                    .hover-zoomin img {
                                        width: 100%;
                                        height: auto;
                                        -webkit-transition: all 0.5s ease-in-out;
                                        -moz-transition: all 0.5s ease-in-out;
                                        -o-transition: all 0.5s ease-in-out;
                                        -ms-transition: all 0.5s ease-in-out;
                                        transition: all 0.5s ease-in-out;
                                    }
                                    .hover-zoomin:hover img {
                                        -webkit-transform: scale(1.1);
                                        -moz-transform: scale(1.1);
                                        -o-transform: scale(1.1);
                                        -ms-transform: scale(1.1);
                                        transform: scale(1.1);
                                    }
                                </style>
                                <div class="col-md-11 hover-zoomin gambar-berita">
                                    <img src="<?=base_url('assets/admin/images/berita/'.$berita->foto_berita)?>" width="100%" alt="" style="border-radius: 1.5%;">
                                    <p class="fs-13 text-muted mb-0"><?= $berita->keterangan_berita?></p>
                                </div>
                            </div>
                            <div class="mt-1 col isi-berita">
                                <?php
                                    $arr = explode("\n", $berita->isi_berita);
                                    $jumlah_kl = count($arr);
                                    $new = [];
                                
                                    for($i = 0; $i < $jumlah_kl; $i++) {
                                        array_push($new, "<br>".$arr[$i]);
                                    }
                                
                                    if($new){
                                        $new = implode("\n", $new);
                                    }
                                ?>
                                <h4 style="text-align: justify; font-family: 'Times New Roman', Times, serif;">
                                    <?= $new?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <h2 class="text-primary font-weight-600">Berita Terbaru</h2>
                            <?php foreach($berita_terbaru as $terbaru): ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="border-bottom pb-4 pt-4">
                                        <div class="row align-items-center">
                                            <div class="col-sm-8">
                                                <h5 class="font-weight-600 mb-1 berita-link" style="text-align: justify;"><?=$terbaru['sub_judul']?></h5>
                                                <p class="fs-13 text-muted mb-0">
                                                    <span class="mr-2">Diunggah
                                                        <?php
                                                            date_default_timezone_set('Asia/Jakarta');
                                                            $awal  = date_create($terbaru['created_at']);
                                                            $akhir = date_create(date('Y-m-d H:i:s')); // waktu sekarang
                                                            $diff  = date_diff($awal, $akhir);
                                                            // pecah waktu
                                                            if($diff->y != 0){echo $diff->y." tahun ";}
                                                            if($diff->m != 0){echo $diff->m." bulan ";}
                                                            if($diff->d != 0){echo $diff->d." hari ";}
                                                            if($diff->h != 0){echo $diff->h." jam ";}
                                                            if($diff->i != 0){echo $diff->i." menit ";}
                                                            // if($diff->s != 0){echo $diff->s." detik ";}
                                                        ?> yang lalu.
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="rotate-img">
                                                    <img src="<?=base_url('assets/admin/images/berita/'.$terbaru['foto_berita'])?>" alt="banner" class="img-fluid"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="trending">
                                <h2 class="mb-4 text-primary font-weight-600">Trending</h2>
                                <div class="mb-4">
                                    <div class="rotate-img">
                                        <img src="<?=base_url('assets/admin/images/berita/'.$tranding->foto_berita)?>" alt="banner" class="img-fluid" style="border-radius: 1%;"/>
                                    </div>
                                    <h3 class="mt-3 font-weight-600 berita-link"><?= $tranding->sub_judul?></h3>
                                    <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2">Diunggah
                                            <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                $awal  = date_create($tranding->created_at);
                                                $akhir = date_create(date('Y-m-d H:i:s')); // waktu sekarang
                                                $diff  = date_diff($awal, $akhir);
                                                // pecah waktu
                                                if($diff->y != 0){echo $diff->y." tahun ";}
                                                if($diff->m != 0){echo $diff->m." bulan ";}
                                                if($diff->d != 0){echo $diff->d." hari ";}
                                                if($diff->h != 0){echo $diff->h." jam ";}
                                                if($diff->i != 0){echo $diff->i." menit ";}
                                                // if($diff->s != 0){echo $diff->s." detik ";}
                                            ?> yang lalu.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var x = window.innerWidth;
        if(x <= 450){
            $('.detail-berita').attr('class', 'detail-berita');
            $('.card-berita').attr('class', 'ml-2 mr-2 card-berita');
            $('.header-berita').attr('class', 'header-berita text-center');
            $('.judul-berita').attr('style', 'text-align: center;');
            $('.gambar-berita').attr('class', 'hover-zoomin gambar-berita');
            $('.isi-berita').attr('class', 'isi-berita');
        }

        $('.berita-link').on('click', function(){
            var judul   = $(this).text()
            var param = judul.replace(/ /gi, "-")
            window.location.href="<?=base_url('user/berita/detail_berita/')?>"+param
        })

        $('.url-copy').on('click', function(){
            var dummy = document.createElement('input'),
            text = window.location.href;

            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);
            
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Halaman Url berhasil disalin di clipboard'
            })
        })
    });
</script>