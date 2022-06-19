<div class="content-wrapper">
    <div class="container detail-berita">
        <div class="col-sm-12 card-berita">
            <div class="card" data-aos="fade-up">
                <div class="card-body">
                    <div>
                        <h1 style="text-align: justify;"><strong><?=$berita->sub_judul?></strong></h1>
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
                            <li class="" style="display: inline; margin-right: 10px;">
                                <span>Bagikan: </span>
                            </li>
                            <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                <i style="cursor: pointer;" class="fab fa-facebook-square fa-2x text-dark"></i>
                            </li>
                            <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                <i style="cursor: pointer;" class="fab fa-twitter-square fa-2x text-dark"></i>
                            </li>
                            <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                <i style="cursor: pointer;" class="fab fa-linkedin fa-2x text-dark"></i>
                            </li>
                            <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                <i style="cursor: pointer;" class="fab fa-whatsapp-square fa-2x text-dark"></i>
                            </li>
                            <li style="display: inline; margin-right: 10px; cursor: pointer;">
                                <img src="<?=base_url()?>assets/berita/images/telegram.png" style="width:28.5px; height: auto; position: absolute; margin-top: -15px; margin-left: 3px; border-radius: 3px;" alt="">
                            </li>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-center">
                                <div class="col-11">
                                    <img src="<?=base_url('assets/admin/images/berita/'.$berita->foto_berita)?>" width="100%" alt="">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="fs-13 text-muted mb-0"><?= $berita->keterangan_berita?></p>
                            </div>
                            <div class="mt-4">
                                <h4 style="text-align: justify; font-family: 'Times New Roman', Times, serif;">
                                    <?= $berita->isi_berita?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="mb-4 text-primary font-weight-600">Berita Terbaru</h2>
                            <?php foreach($berita_terbaru as $terbaru): ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="border-bottom pb-4 pt-4">
                                        <div class="row align-items-center">
                                            <div class="col-sm-8">
                                                <h5 class="font-weight-600 mb-1" style="text-align: justify;"><?=$terbaru['sub_judul']?></h5>
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
                                    <h3 class="mt-3 font-weight-600">
                                        <?= $tranding->sub_judul?>
                                    </h3>
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
            $('.detail-berita').attr('class', 'detail-berita');
            $('.card-berita').attr('class', 'ml-2 mr-2 card-berita');
        }
    });
</script>