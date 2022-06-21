<!-- partial:partials/_navbar.html -->
<header id="header" style="background-color: #3d4d6a;">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="col-12" style="height: 20px; background-color: #3d4d6a;">
            </div>
            <div class="navbar-bottom" style="background-color: #3d4d6a;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="#" style="position: absolute; margin-top: -35px;">
                            <div class="d-flex align-items-center">
                                <img src="<?=base_url()?>assets/user/img/Kota-madiun.png" alt="" style="width: 70px; height: 70px; object-fit: cover;">
                                <h1 class="text-white"><strong>SIGMA NEWS</strong></h1>
                            </div>
                        </a>
                    </div>
                    <div>
                        <button class="navbar-toggler bg-light" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent" style="background-color: #3d4d6a;">
                            <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                                <li>
                                    <button class="navbar-close">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link" href="<?=base_url("welcome")?>">Home</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link" href="<?=base_url("user/pengaduan")?>">Pengaduan</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link" href="<?=base_url("user/webgis")?>">Webgis</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link" href="<?=base_url("user/berita")?>">Portal Berita</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link" href="#kontak">Kontak</a>
                                </li>
                                <?php if($this->session->userdata('nama') ==''): ?>
                                    <li class="nav-item mb-3">
                                        <a class="nav-link" href="<?=base_url("user/login")?>">Login</a>
                                    </li>
                                <?php else: ?>
                                    <li class="nav-item mb-3">
                                        <a class="nav-link" href="javascript:js_logout();">
                                            <?=$this->session->userdata('nama')?>
                                        </a>
                                    </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </nav>
    </div>
</header>

<!-- sweet alert 2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js" integrity="sha512-vDRRSInpSrdiN5LfDsexCr56x9mAO3WrKn8ZpIM77alA24mAH3DYkGVSIq0mT5coyfgOlTbFyBSUG7tjqdNkNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js" integrity="sha512-aYkxNMS1BrFK2pwC53ea1bO8key+6qLChadZfRk8FtHt36OBqoKX8cnkcYWLs1BR5sqgjU5SMIMYNa85lZWzAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.min.js" integrity="sha512-hDt6c6JA9ytE/b7OF73Bhj1lXT0wucQXm9yKjSV7BrJ6o5CVs1hq7nIQWU4OhOyrUbbL1KhN7Jt00v7UZA18og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.css" integrity="sha512-40/Lc5CTd+76RzYwpttkBAJU68jKKQy4mnPI52KKOHwRBsGcvQct9cIqpWT/XGLSsQFAcuty1fIuNgqRoZTiGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.js" integrity="sha512-C2iWRhCelHs4nZ9wCFBSh/e/V9U8ACVFhl0JC1x3WZm2zVUS7oo9db3tmxiFk4TfOhT7vMqcOOPTZqHiEOvrEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- cdn fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    function js_logout(){
      Swal.fire({
        title: 'Logout',
        text: "Apakah Anda ingin keluar ?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href="<?= base_url('user/login/logout_umum')?>";
        }
      });
    }
  </script>