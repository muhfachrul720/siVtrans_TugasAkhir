
<div class="container-fluid" style="width:100%;">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 ps-relative" style="height:100vh">
            <div class="m-auto vertical-centered-content" style="width:80%;"> 
                <div class="row">
                    <div class="col">
                        <img src="<?= base_url()?>assets/images/landing/logo.png" alt="" style="width:50px;">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <img src="<?= base_url()?>assets/images/landing/hero-image.png" alt="" style="width:390px;">
                    </div>
                </div>
                <div class="row text-center mt-5">
                    <div class="col" style="color:#094166; font-size:12px; font-weight:500">
                        &copy 2021 Fachrul Ys. All Rights Reserved
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 side-blue ps-relative" style="height:100vh">
            <div class="m-auto vertical-centered-content w-75">
                <h1 style="font-size:48px; padding-top:30px">SIVTrans</h1>
                <br>
                <p style="font-size:18px; font-weight:300">Sistem Informasi Pemberi Tanda Tangan Digital / Serta Verifikasi Keaslian Dokumen</p>
                <div class="row mt-5">
                    <button type="button" id="onModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="display:none">
                    </button>
                    <div class="col-sm-6">
                        <label for="onModal">
                            <img class="img-interact" src="<?= base_url()?>assets/images/landing/icon1.png" alt="Tanda Tangan Dokumen" style="width:200px">
                        </label>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?= base_url()?>public/verification">
                            <img class="img-interact" src="<?= base_url()?>assets/images/landing/icon2.png" alt="Verifikasi Dokumen" style="width:200px">
                        </a>
                    </div>
                </div>
                <div class="row text-right" style="padding-top:120px">
                    <div class="col-sm-12">
                        <img class="img-interact" src="<?= base_url()?>assets/images/landing/icon3.png" alt="" style="width:120px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content side-blue w-75 m-auto">
      <div class="modal-body">

        <?= form_open('auth/auth')?>
        <?= form_hidden('access', 'welcome')?>
        <div class="row">
            <div class="col-sm-12 text-center">
                <h5 class="p-0 m-0" style="font-weight:300">Selamat Datang Pengguna</h5>
            </div>
            <div class="col-sm-12">
                <hr>
            </div>
            <div class="col-sm-12">
                <?php if($this->session->flashdata('msg')){?>
                <div class="custom-card all-white mb-2 text-center">
                    <small>Username atau Password Yang Dimasukkan Sebelumnya Salah</small>
                </div>
                <?php }?>
                <div class="custom-card all-white">
                    <form action="">
                       <div class="form-group">
                           <label for=""><small style="font-weight:300">Username</small></label>
                           <input style="font-weight:300" type="text" name="username" class="form-control form-control-sm" placeholder="Masukkan Username Disini">
                       </div>
                       <div class="form-group">
                           <label for=""><small style="font-weight:300">Password</small></label>
                           <input style="font-weight:300" type="text" name="pass" class="form-control form-control-sm" placeholder="Masukkan Password Disini">
                       </div>
                       <div class="form-group">
                            <button class="btn side-blue w-100 thin">Login</button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
        <?= form_close()?>

      </div>
    </div>
  </div>
</div>