<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/editors/quill/katex.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/editors/quill/monokai-sublime.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/editors/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/editors/quill/quill.bubble.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/plugins/forms/form-quill-editor.css"> -->
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
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/dashboard"); ?>"><i class="bx bx-home-alt"></i></a>
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
                                <form id="jquery-val-form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/berita/tambah_berita');?>">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="first-name" class="col-form-label">JUDUL</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="first-name" class="form-control" name="judul" placeholder="Judul Berita" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">SUB JUDUL</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="last-name" class="form-control" name="sub_judul" placeholder="Sub Judul" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">VIDEO YOUTUBE</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="last-name" class="form-control" name="video" placeholder="Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU" required/>
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
                                                        <textarea type="text" class="form-control" style="height:260px" name="isi_berita"></textarea>
                                                        <!-- <div class="editor" style="height:260px"  id="test">
                                                        </div>
                                                        <input type="text" hidden name="isi_berita" id="isi" required> -->
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
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_berita" required/>
                                                <label class="custom-file-label" for="inputGroupFile01">PILIH GAMBAR</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">KETERANGAN GAMBAR</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="last-name" class="form-control" name="keterangan" placeholder="Keterangan..." required/>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label for="last-name" class="col-form-label">TAG</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <div class="form-group">
                                                <select class="select2 form-control" multiple="multiple" id="default-select-multi" name="tag[]" required>
                                                    <?php foreach ($dt_tag as $dt) : ?>
                                                        <option value="<?php echo $dt['id_tag'] ?>"><?php echo$dt['nama_tag'] ?></option>
                                                    <?php endforeach ?> 
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function()
    {
        $("#submit").click(function(){
            var node = document.getElementById('test');
            var text  = node.textContent || node.innerText;
            // alert(text);
            document.getElementById('isi').value = text;

            // document.getElementById('jquery-val-form').submit();
        })
    })
    
</script>
<!-- <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/vendors.min.js"></script> -->
  
<!-- <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/editors/quill/katex.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/editors/quill/highlight.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/editors/quill/quill.min.js"></script>
  
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/editors/editor-quill.js"></script> -->