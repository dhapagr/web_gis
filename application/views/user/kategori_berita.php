<style>
    .berita-link:hover{
        color: deepskyblue;
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <div class="container berita-kategori">
        <div class="col-sm-12 card-kategori">
            <div class="card" data-aos="fade-up">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="font-weight-600 mb-4"><?=$kategori?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <?php foreach($kategori_berita as $berita): ?>
                                <div class="row align-items-center">
                                    <div class="col-sm-4 grid-margin">
                                        <div class="rotate-img">
                                            <img src="<?=base_url('assets/admin/images/berita/'.$berita['foto_berita'])?>" alt="banner" class="img-fluid"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 grid-margin">
                                        <h2 class="font-weight-600 mb-2 berita-link"><?=$berita['sub_judul']?></h2>
                                        <p class="fs-13 text-muted mb-0">
                                            <span class="mr-2">Diunggah pada 
                                                <?php 
                                                    $hari = date('N', strtotime($berita['created_at']));
                                                    if($hari == 1){echo "Minggu";}
                                                    elseif($hari == 2){echo "Senin";}
                                                    elseif($hari == 3){echo "Selasa";}
                                                    elseif($hari == 4){echo "Rabu";}
                                                    elseif($hari == 5){echo "Kamis";}
                                                    elseif($hari == 6){echo "Jumat";}
                                                    elseif($hari == 7){echo "Sabtu";}
                                                ?>,
                                                <?= date('d-m-Y', strtotime($berita['created_at']))?>
                                                <?= "<span class='ml-1'></span>".date('H:i', strtotime($berita['created_at']))." WIB"?>
                                            </span>
                                        </p>
                                        <p class="fs-15" style="text-align: justify;">
                                            <?php 
                                                $arr = explode(" ", $berita['isi_berita']);
                                                $limit = 25; // batasan jumlah kata
                                                $new = [];
                                            
                                                if (count($arr) > $limit) {
                                                    for($i = 0; $i < $limit; $i++) {
                                                        array_push($new, $arr[$i]);
                                                    }
                                                }

                                                $judul = str_replace(' ', '-', $berita['sub_judul']);
                                            
                                                if($new){
                                                    // tampil kata max 25
                                                    $new = implode(" ", $new);
                                                    echo $new.' ... <a href="'.base_url("user/berita/detail_berita/".$judul).'">Baca Selengkapnya</a>';
                                                }else {
                                                    // tampil semua kata
                                                    echo $berita['isi_berita'].' ... <a href="'.base_url("user/berita/detail_berita/".$judul).'">Baca Selengkapnya</a>';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="mb-4 text-primary font-weight-600">Berita Terbaru</h2>
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
                                        <img src="<?=base_url('assets/admin/images/berita/'.$tranding->foto_berita)?>" alt="banner" class="img-fluid"/>
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
                    <div align="center">
                        <style>
                            .pagination{
                                padding-bottom: 0px;
                                padding-top: 0px;
                            }
                        </style>
                        <?= $this->pagination->create_links();?>
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
            $('.berita-kategori').attr('class', 'berita-kategori');
            $('.card-kategori').attr('class', 'px-2');
        }

        $('.berita-link').on('click', function(){
            var judul   = $(this).text()
            var param = judul.replace(/ /gi, "-")
            window.location.href="<?=base_url('user/berita/detail_berita/')?>"+param
        })
    });
</script>