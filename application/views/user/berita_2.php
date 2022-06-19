<style>
    .berita-link:hover{
        color: deepskyblue;
        cursor: pointer;
    }
    .video-link:hover{
        color: deepskyblue;
        cursor: pointer;
    }
</style>
<div class="content-wrapper">
    <div class="container hal-berita">
        <div class="row" data-aos="fade-up">
            <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                    <img src="<?=base_url('assets/admin/images/berita/'.$berita_banner->foto_berita)?>" width="100%" height="auto" alt="banner" class="img-fluid"/>
                    <div class="banner-content" style="background: linear-gradient(to bottom, #0000 0%, #000000 110%)">
                        <?php $tag_berita = explode(",", $berita_banner->tag_berita); 
                            for($i=0; $i<count($tag_berita); $i++):
                                foreach($tag as $tagar): 
                                    if($tag_berita[$i] == $tagar['id_tag']): ?>
                                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                            <?= $tagar['nama_tag'];?>
                                        </div>
                        <?php endif; endforeach; endfor; ?>
                        <h1 class="mb-2 berita-link"><?=$berita_banner->sub_judul?></h1>
                        <div class="fs-12">
                            <span class="mr-2">Diunggah
                                <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $awal  = date_create($berita_banner->created_at);
                                    $akhir = date_create(date('Y-m-d H:i:s')); // waktu sekarang
                                    $diff  = date_diff($awal, $akhir);
                                    // pecah waktu
                                    if($diff->y != 0){echo $diff->y." tahun ";}
                                    if($diff->m != 0){echo $diff->m." bulan ";}
                                    if($diff->d != 0){echo $diff->d." hari ";}
                                    if($diff->h != 0){echo $diff->h." jam ";}
                                    if($diff->i != 0){echo $diff->i." menit ";}
                                    // if($diff->s != 0){echo $diff->s." detik ";}
                                ?> 
                                yang lalu.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h2>Berita Terbaru</h2>
                        <?php foreach($berita_terbaru as $terbaru): ?>
                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                            <div class="pr-3">
                                <h5 class="berita-link"><?=$terbaru['sub_judul']?></h5>
                                <div class="fs-12">
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
                                        ?> 
                                        yang lalu.
                                    </span>
                                </div>
                            </div>
                            <div class="rotate-img">
                                <img src="<?=base_url('assets/admin/images/berita/'.$terbaru['foto_berita'])?>" alt="thumb" class="img-fluid"
                                style="width: 150px; height: 70px; object-fit: cover;"/>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2>Kategori</h2>
                        <ul class="vertical-menu">
                            <?php foreach($tag as $tagar): ?>
                            <li><a href="<?= base_url('user/berita/kategori/'.$tagar['nama_tag'])?>"><?= $tagar['nama_tag']?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <?php foreach($berita_terbaru as $terbaru): ?>
                        <div class="row">
                            <div class="col-sm-4 grid-margin align-self-center">
                                <div class="position-relative">
                                    <div class="rotate-img">
                                        <img src="<?=base_url('assets/admin/images/berita/'.$terbaru['foto_berita'])?>" alt="thumb" class="img-fluid"/>
                                    </div>
                                    <div class="badge-positioned">
                                        <?php $tag_berita = explode(",", $terbaru['tag_berita']); 
                                            for($i=0; $i<count($tag_berita); $i++):
                                                foreach($tag as $tagar): 
                                                    if($tag_berita[$i] == $tagar['id_tag']): ?>
                                                        <span class="badge badge-danger font-weight-bold"><?= $tagar['nama_tag'];?></span>
                                        <?php endif; endforeach; endfor; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 grid-margin align-self-center">
                                <h2 class="mb-2 font-weight-600 berita-link" style="text-align: justify;"><?=$terbaru['sub_judul']?></h2>
                                <div class="fs-13 mb-2">
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
                                        ?> 
                                        yang lalu.
                                    </span>
                                </div>
                                <p class="mb-0" style="text-align: justify;">
                                    <?php 
                                        $arr = explode(" ", $terbaru['isi_berita']);
                                        $limit = 20; // batasan jumlah kata
                                        $new = [];
                                    
                                        if (count($arr) > $limit) {
                                            for($i = 0; $i < $limit; $i++) {
                                                array_push($new, $arr[$i]);
                                            }
                                        }
                                    
                                        if($new){
                                            // tampil kata max 25
                                            $new = implode(" ", $new);
                                            echo $new.' ... <a style="color: deepskyblue;" href="'.base_url().'">Baca Selengkapnya</a>';
                                        }else {
                                            // tampil semua kata
                                            echo $terbaru['isi_berita'].' ... <a style="color: deepskyblue;" href="'.base_url().'">Baca Selengkapnya</a>';
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-title">
                                        Video Terbaru
                                    </div>
                                </div>
                                <?php foreach($video_berita as $terbaru): ?>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3 video-link" data-id="<?=$terbaru['video_berita']?>">
                                    <div style="max-width: 70px; max-height: auto; margin-right: 15px;">
                                        <div class="rotate-img">
                                            <embed src="http://img.youtube.com/vi/<?=substr($terbaru['video_berita'], -11)?>/maxresdefault.jpg"/ width="100%" height="auto" style="border-radius: 7px;">
                                        </div>
                                    </div>
                                    <h3 class="font-weight-600 mb-0" style="text-align: justify;"><?=$terbaru['sub_judul']?></h3>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-title">Video</div>
                                <div class="row">
                                    <?php foreach($video_berita as $terbaru): ?>
                                    <div class="col-sm-6 grid-margin">
                                        <div class="position-relative">
                                            <embed src="http://img.youtube.com/vi/<?=substr($terbaru['video_berita'], -11)?>/maxresdefault.jpg"/ width="100%" height="auto">
                                            <div class="badge-positioned w-90 d-flex justify-content-between align-items-center">
                                                <div class="col-9">
                                                    <div class="row">
                                                        <?php $tag_berita = explode(",", $terbaru['tag_berita']); 
                                                            for($i=0; $i<count($tag_berita); $i++):
                                                                foreach($tag as $tagar): 
                                                                    if($tag_berita[$i] == $tagar['id_tag']): ?>
                                                                        <span class="badge badge-danger font-weight-bold mr-1 mb-1"><?= $tagar['nama_tag'];?></span>
                                                        <?php endif; endforeach; endfor; ?>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="video-icon">
                                                        <a href="<?=$terbaru['video_berita']?>" target="_blank" style="cursor: pointer;"><i class="mdi mdi-play"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
div
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var x = window.innerWidth;
        if(x <= 450){
            $('.hal-berita').attr('class', 'container-fluid');
        }

        $('.berita-link').on('click', function(){
            var judul   = $(this).text()
            var param = judul.replace(/ /gi, "-")
            window.location.href="<?=base_url('user/berita/detail_berita/')?>"+param
        })

        $('.video-link').on('click', function(){
            var judul = $(this).data('id')
            window.open(judul, '_blank').focus()
        })
    });
</script>