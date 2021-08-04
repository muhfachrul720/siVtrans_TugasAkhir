<!-- [ breadcrumb ] start -->
<div class="page-header px-2">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 class="m-b-10">Riwayat Tanda Tangan Dokumen</h3>
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
            <div class="card-body" style="display:flex">
                <div class="logo-info">
                    <i class="fa fa-info-circle pr-3 pt-3"></i>
                </div>
                <div class="desc">
                    <small>Berikut merupakan halaman riwayat penanda tanganan dokumen, pada halaman ini dapat dilakukan aksi berupa mengunduh file transcript hasil tanda tangan serta mengirim file tersebut menuju Nomor tujuan whatsapp</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap table-font-sm" id="simpleTable" style="width:100% !important; font-size:12px" >

                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File Tanda Tangan</th>
                                <th>Penanda Tangan</th>
                                <th>Tanggal Tanda Tangan</th>
                                <th>Nomor Tujuan</th>
                                <th>Aksi</th>
                            </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; foreach($log as $l) {?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= substr($l['file_name'], 15)?></td>
                            <td><?= $l['username']?></td>
                            <td><?= dateindo(date('Y-m-d', $l['date_sign']))?></td>
                            <td><?= $l['target_whatsapp']?></td>
                            <td>
                                <a href="<?= base_url()?><?=$l['file_name']?>" class="btn btn-primary btn-sm" target="_blank"><i class="icon-sm fas fa-download"></i></a>
                                <button class="btn btn-success btn-sm btn-send" data-toggle="modal" data-target="#whatsappModal" value="<?= $l['id']?>"><i class="icon-sm fab fa-whatsapp"></i></button>
                                <a href="<?= base_url()?>user/log/delete_log/<?= $l['id']?>" class="btn btn-danger btn-sm"><i class="icon-sm fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $no++; }; ?>
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $ck=''; if($ck = $this->session->flashdata('filePath')){?> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="icon-notif py-2">
            <i class="fa fa-info-circle" style="font-size:36px"></i> 
        </div>
        Dokumen Transkrip Telah Berhasil <br> Di Bentuk dan Dikirim ke Nomor Whatsapp Tujuan <br>
        <small>Klik Dibawah Untuk Mendownload File Transkrip</small> <br>
        <a href="<?= base_url($ck) ?>" class="btn btn-primary mt-2" target="_blank"><i class="icon-sm fas fa-download pr-2"></i> Unduh Transcript</a>
      </div>
    </div>
  </div>
</div>
<?php }; ?>

<div class="modal fade" id="whatsappModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered w-50" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class=""><i class="fas fa-times" style="font-size:16px;"></i></span>
        </button>

        <?= form_open('user/send/send_whatsapp') ?>
        <input type="hidden" id="id" name="idDoc" value="">
        <div class="text-center">
            <p style="padding-top:3px;">Kirim Dokumen Ke Nomor Tujuan</p>
            <h5 id="noTujuan"></h5>
        </div>
        <hr class="mb-2 mt-3">
        <div>
            <small>Silahkan mengisi inputan dibawah untuk mengirim ke nomor baru, biarkan kosong untuk mengirim ke nomor tujuan yang telah terdaftar</small>
            <input type="tel" name="telephone" class="form-control form-control-sm mt-1" pattern="[0-9]{12}">
            <input type="submit" class="btn btn-success btn-sm w-100 mt-2" value="Kirim">
        </div>
        <?= form_close() ?>
       
        </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $('#simpleTable').DataTable();
        $('#myModal').modal('show');
    } );

    $('.btn-send').on('click', function(){
        var val = $(this).val();
        console.log(val);
        $('#id').val(val);
        $('#noTujuan').text(val);
    });
</script>