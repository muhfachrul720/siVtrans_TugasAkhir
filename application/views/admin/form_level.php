<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Kelola Level Pengguna</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/level/add_level">Tambah Level Pengguna</a></li>
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
                <?= form_open($action)?>
                <?= form_hidden('id_level', $data['id'])?>
                <div class="row">
                    <div class="col-12 mb-0">
                        <div class="form-group p-0 m-0">
                            <label for="nlv">Nama Level</label>
                            <input class="form-control form-control-sm" type="text" name="nama_level" id="nlv" placeholder="Tuliskan nama Level disini" value="<?= $data['nama']?>">
                            <small style="color:red; padding-left:10px;"><?= form_error('nama_level')?></small>
                        </div>
                    </div>
                </div>
                <hr class="mt-0">
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