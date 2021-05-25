<!-- [ breadcrumb ] start -->
<div class="page-header px-2">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 class="m-b-10">Pengaturan</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio placeat eos accusamus ipsa repudiandae voluptas</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<?php if($msg = $this->session->flashdata('msg')){?>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Berhasil!</h4>
                <!-- <p style="padding-bottom:0"><?= $msg ?></p> -->
            </div>
        </div>
    </div>
<?php };?>

<?= form_open_multipart('user/setting/update_account')?>
<div class="row px-2"> 
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h5 class="m-0">Akun</h5>
                <small>Dibawah merupakan form untuk mengganti username dan password</small>
                <hr>
                <div class="form-group">
                    <p class="mb-2">Username</p>
                    <input type="text" name="username" id="" class="form-control form-control-sm" value="<?= ucwords($account['username'])?>" required>
                    <small style="color:red"><?= form_error('username')?></small>
                    <small style="color:red"><?= $this->session->flashdata('fail')?></small>
                </div>
                <div class="form-group">
                    <p class="mb-2">Password</p>
                    <input type="text" name="pass" id="" class="form-control form-control-sm">
                    <small style="color:red"><?= form_error('pass')?></small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5>Foto Profile</h5>
                <small>Dibawah untuk mengubah Foto Profil</small>
                <hr>
                <div class="form-group">
                    <small>Nama File :</small>
                    <p class="label_name"></p>
                    <label for="fp_images" class="btn btn-primary w-100">Pilih File</label>
                    <input name="fp_images" id="fp_images" type="file" style="display:none">
                </div>
                <script>
                    var inputElement = document.querySelector('#fp_images');
                    var btn = inputElement.previousElementSibling;

                    inputElement.addEventListener('change', e => {
                        document.querySelector('.label_name').innerHTML = inputElement.files[0].name;
                        btn.classList.remove('btn-primary');
                        btn.classList.add('btn-success')
                        btn.innerHTML = 'File Telah Diupload';
                    })
                </script>
            </div>
        </div>
    </div>
</div>
<input type="submit" value="Simpan perubahan" class="btn btn-success w-100">
<?= form_close()?>
