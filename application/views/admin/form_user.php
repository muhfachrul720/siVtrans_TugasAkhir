<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Kelola Data Pengguna</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/user/add_user">Tambah Pengguna</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= form_open_multipart($action)?>
                <?= form_hidden('id_user', $data['id_user'])?>
                <div class="row">
                    <div class="col-6 pr-5" style="border-right:1px solid gray">
                        <div class="form-group">
                            <label class="thin" for="">Username</label>
                            <input type="text" name="username" id="" class="form-control form-control-sm" placeholder="Tulis Username Disini" value="<?= $data['username']?>">
                            <small style="color:red"><?= form_error('username')?></small>
                            <small style="color:red"><?= $this->session->flashdata('fail')?></small>
                        </div>
                        <div class="form-group">
                            <label class="thin" for="">Password</label>
                            <input type="text" name="pass" id="" class="form-control form-control-sm" placeholder="Tulis Password Disini">
                            <small style="color:red"><?= form_error('pass')?></small>
                        </div>
                        <div class="form-group">
                            <label class="thin" for="">Level Pengguna</label>
                            <?= cmb_dinamis('level', 'tbl_user_level', 'nama', 'id', $data['user_level'], 'DESC', '') ?>            
                        </div>
                    </div>
                    <div class="col-6 pl-4">
                        <div class="form-group">
                            <label for="">Foto Profil</label><br>
                            <label for="fp" class="btn btn-primary btn-sm">Unggah Foto Profil</label>
                            <small style="color:red; padding-left:10px;">Foto Profile tidak boleh melebihi 1 Mb</small>
                            <input type="file" name="fp_images" id="fp" style="display:none">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Simpan Perubahan" class="btn btn-sm btn-success">
                    </div>
                </div>
                <?= form_close()?>
            </div>
        </div>
    </div>
</div>