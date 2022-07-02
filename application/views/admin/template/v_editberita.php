<style>
    .chscroll { border:2px solid #ccc; height:120px;overflow-y: scroll};
</style>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Admin</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/Dashboard"); ?>"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Data Berita
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="simple-validation">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Berita Baru</h4>
                            </div>
                            <div class="card-body">
                                <?php foreach ($data_by_id as $data) : ?>
                                <form id="jquery-val-form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/Berita/edit_berita/'.$data['id_berita']);?>">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="first-name" class="col-form-label">JUDUL</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="first-name" class="form-control" name="judul" placeholder="Judul Berita" value="<?= $data['judul_berita']?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">SUB JUDUL</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="last-name" class="form-control" name="sub_judul" placeholder="Sub Judul" value="<?= $data['sub_judul']?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">VIDEO YOUTUBE</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="last-name" class="form-control" name="video" placeholder="Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU" value="<?= $data['video_berita']?>" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">ISI BERITA</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <section class="full-editor">
                                                <div id="full-wrapper">
                                                    <div id="full-container">
                                                        <textarea type="text" class="form-control" style="height:260px" name="isi_berita" required ><?= $data['isi_berita']?></textarea>
                                                        <!-- <div class="editor" style="height:260px"  id="test" >
                                                        </div>
                                                        <input type="text" hidden name="isi_berita" id="isi" value="<?= $data['isi_berita']?>" > -->
                                                    </div>
                                                </div>
                                            </section>              
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">GAMBAR</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_berita" value="<?= $data['foto_berita']?>" />
                                                <label class="custom-file-label" for="inputGroupFile01">PILIH GAMBAR</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">KETERANGAN BERITA</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="last-name" class="form-control" name="keterangan" placeholder="Keterangan..."value="<?= $data['keterangan_berita']?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">TAG</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <div class="form-group">
                                                <select class="select2 form-control" multiple="multiple" id="default-select-multi" name="tag[]" required>
                                                    <?php foreach ($select as $key => $val) :
                                                        foreach($select[$key] as $data): 
                                                        $data_slc[] = $data['id_tag']?>
                                                        <option selected value="<?= $data['id_tag']?>"><?= $data['nama_tag']?></option>
                                                    <?php endforeach; endforeach ?>
                                                    <?php foreach ($dt_tag as $k ) :
                                                        if(!in_array($k['id_tag'], $data_slc)): ?>
                                                            <option value="<?= $k['id_tag']?>"><?= $k['nama_tag']?></option>
                                                    <?php endif; endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="chscroll">
                                        <?php foreach ($dt_tag as $dt) : ?>
                                            <option value="<?php echo $dt['id_tag'] ?>" selected><?php echo$dt['nama_tag'] ?></option>
                                        <?php endforeach ?>
                                    </div> -->
                                    <hr>
                                    <fieldset class="form-group">
                                        <button type="reset" class="btn btn-danger glow mr-1 mb-1"><i class="bx bxs-x-square"></i>
                                            <span class="align-middle ml-25">Clear Data</span> 
                                        </button>
                                        <button id="submit" type="submit" class="btn btn-success glow mr-1 mb-1"><i class="bx bxs-add-to-queue"></i>
                                            <span class="align-middle ml-25">Tambah Data</span>
                                        </button>
                                    </fieldset>
                                </form>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // var isi = $("#isi").val();
        // $("p").text(isi);

        // setInterval(function(){
        //     var isi = $("p").text();
        //     $("#isi").val(isi);
        // }, 1);

        // $("#submit").click(function(){
        //     var isi = $("p").text();
        //     if(isi != ''){
        //         $("#isi").val(isi);
        //     }else{
        //         alert('isi berita tdk boleh kosong');
        //         return false;
        //     }
        // });
    });
</script>