<!-- [ breadcrumb ] start -->
<div class="page-header px-2">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 class="m-b-10">Riwayat Tanda Tangan Dokumen</h3>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap table-font-sm" id="simpleTable" style="width:100% !important; font-size:12px" >

                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File Tanda Tangan</th>
                                <th>Nama Dokumen Asli</th>
                                <th>Kunci Privat</th>
                                <th>Tanggal Tanda Tangan</th>
                                <th>Email Tujuan</th>
                                <th>Aksi</th>
                            </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; foreach($log as $l) {?>
                           <tr>
                               <td><?= $no++ ?></td>
                               <td><?= $l['signature_name']?></td>
                               <td><?= $l['original_name']?></td>
                               <td><?= $l['private_key']?></td>
                               <td><?= dateindo(date('Y-m-d', $l['date_sign']))?></td>
                               <td><?= $l['target_email']?></td>
                               <td>
                                   <a href="<?= base_url()?>upload/sign_file/zip_file/<?= $l['signature_name']?>" class="btn btn-primary btn-sm"><i class="icon-sm fas fa-download"></i>Unduh File</a>
                                   <a href="" class="btn btn-success btn-sm"><i class="icon-sm fas fa-envelope"></i>Kirim Email</a>
                               </td>
                           </tr>
                        <?php }; ?>
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#simpleTable').DataTable();
    } );
</script>