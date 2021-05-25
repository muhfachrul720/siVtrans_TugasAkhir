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

<?= form_open('user/setting/update_default_key')?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5>Kunci Bawaan</h5>
            <hr>
            <div class="form-group">
                <p class="mb-2">Kunci Publik Bawaan</p>
                <input type="text" name="" id="" class="form-control form-control-sm" disabled value="<?= $key['public_key']?>">
            </div>
            <div class="form-group">
                <p class="mb-2">Kunci Privat Bawaan</p>
                <input type="text" name="" id="" class="form-control form-control-sm" disabled value="<?= $key['private_key']?>">
            </div>
            <hr>
            <div class="form-group">
                <small>Silahkan memasukkan 2 kunci prima untuk membentuk Kunci Baru</small>
            </div>
            <div class="form-group row">
                <div class="col-5">
                    <p class="mb-2">Angka Pertama</p>
                    <input type="number" name="number1" id="" class="form-control form-control-sm">
                    <small style="color:red"><?= form_error('number1')?></small>
                </div>
                <div class="col-2 text-center">
                    <p></p>
                    &
                </div>
                <div class="col-5">
                    <p class="mb-2">Angka Kedua</p>
                    <input type="number" name="number2" id="" class="form-control form-control-sm">
                    <small style="color:red"><?= form_error('number2')?></small>

                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Ganti Default Key" class="btn btn-success w-100">
    </div>
</div>
<?= form_close()?>