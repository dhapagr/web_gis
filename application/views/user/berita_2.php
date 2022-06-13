<div class="content-wrapper">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                    <img src="<?=base_url('assets/admin/images/berita/'.$berita_banner->foto_berita)?>" width="100%" height="auto" alt="banner" class="img-fluid"/>
                    <div class="banner-content" style="background: linear-gradient(to bottom, #0000 0%, #000000 120%)">
                        <?php $tag_berita = explode(",", $berita_banner->tag_berita); 
                            for($i=0; $i<count($tag_berita); $i++):
                                foreach($tag as $tagar): 
                                    if($tag_berita[$i] == $tagar['id_tag']): ?>
                                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                            <?= $tagar['nama_tag'];?>
                                        </div>
                        <?php endif; endforeach; endfor; ?>
                        <h1 class="mb-0"><?=$berita_banner->judul_berita?></h1>
                        <h1 class="mb-2"><?=$berita_banner->sub_judul?></h1>
                        <div class="fs-12">
                            <span class="mr-2">Diupload
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
                                <h5><?=$terbaru['sub_judul']?></h5>
                                <div class="fs-12">
                                    <span class="mr-2">Diupload
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
                                <img src="<?=base_url('assets/admin/images/berita/'.$terbaru['foto_berita'])?>" alt="thumb" class="img-fluid img-lg"
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
                        <h2>Category</h2>
                        <ul class="vertical-menu">
                            <li><a href="#">Politics</a></li>
                            <li><a href="#">International</a></li>
                            <li><a href="#">Finance</a></li>
                            <li><a href="#">Health care</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Media</a></li>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Game</a></li>
                            <li><a href="#">Art</a></li>
                            <li><a href="#">Kids</a></li>
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
                                                        <!-- <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                                            <?= $tagar['nama_tag'];?>
                                                        </div> -->
                                                        <span class="badge badge-danger font-weight-bold"><?= $tagar['nama_tag'];?></span>
                                        <?php endif; endforeach; endfor; ?>
                                        <!-- <span class="badge badge-danger font-weight-bold">Flash news</span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 grid-margin align-self-center">
                                <h2 class="mb-2 font-weight-600" style="text-align: justify;"><?=$terbaru['sub_judul']?></h2>
                                <div class="fs-13 mb-2">
                                    <span class="mr-2">Diupload
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
                                    <?=substr($terbaru['isi_berita'], 0, 80)."..."?>
                                    <a href="" <?=$terbaru['id_berita']?> class="text-cyan">Baca Selengkapnya</a>
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
                            <div class="col-lg-8">
                                <div class="card-title">Video</div>
                                <div class="row">
                                    <?php foreach($berita_terbaru as $terbaru): ?>
                                    <div class="col-sm-6 grid-margin">
                                        <div class="position-relative">
                                            <embed src="http://img.youtube.com/vi/<?=substr($terbaru['video_berita'], -11)?>/maxresdefault.jpg"/ width="100%" height="auto">
                                            <div class="badge-positioned w-90">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <?php $tag_berita = explode(",", $terbaru['tag_berita']); 
                                                        for($i=0; $i<count($tag_berita); $i++):
                                                            foreach($tag as $tagar): 
                                                                if($tag_berita[$i] == $tagar['id_tag']): ?>
                                                                    <!-- <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                                                        <?= $tagar['nama_tag'];?>
                                                                    </div> -->
                                                                    <span class="badge badge-danger font-weight-bold"><?= $tagar['nama_tag'];?></span>
                                                    <?php endif; endforeach; endfor; ?>
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
                            <div class="col-lg-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-title">
                                        Video Terbaru
                                    </div>
                                    <p class="mb-3">See all</p>
                                </div>
                                <?php for($i=0; $i<5; $i++): ?>
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                    <div class="div-w-80 mr-3">
                                        <div class="rotate-img">
                                            <img src="<?=base_url()?>assets/berita/images/dashboard/home_11.jpg" alt="thumb" class="img-fluid"/>
                                        </div>
                                    </div>
                                    <h3 class="font-weight-600 mb-0">
                                        Apple Introduces Apple Watch
                                    </h3>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>