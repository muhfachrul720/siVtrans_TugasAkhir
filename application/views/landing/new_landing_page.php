<link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/dist/css/adminlte.min.css">
<div class="wrapper" style="padding-top:25vh;">
    <div class="row d-flex justify-content-center" style="position:absolute;">
        <div class="col-12 text-center">
            <h1>SIPENTAS</h1>
            <p>SISTEM INFORMASI PEMBERIAN TANDA TANGAN TRANSCRIPT</p>
        </div>

        <div class="col-5">
        <?= form_open_multipart('public/verification/verified')?>
            <label for="fileTrans" class="form-control form-control-sm text-center" style="background-color:rgb(231, 231, 231)">Upload file transkrip tanda tangan disini</label>   
            <input type="file" name="fileTrans" style="display:none" id="fileTrans" accept="application/pdf">
        </div>
        <div class="col-1">
            <button class="btn btn-sm btn-primary w-100">Verifikasi</button>
        <?= form_close() ?> 
        </div>

        <div class="col-12 text-center mt-2">
            <small>Untuk menandatangani dokumen transcript silahkan lakukan Login dengan menekan link berikut</small>
            <br>
            <a href="<?= base_url() ?>auth">Tanda Tangan Transkrip Nilai</a>
        </div>
    </div>
</div>

<?php $ck=''; if($ck = $this->session->flashdata('success')){?> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="icon-notif py-2">
            <i class="fa fa-check" style="font-size:36px; color:rgb(109, 188, 112)"></i> 
        </div>
        Dokumen Transkrip adalah asli dan belum di modifikasi sama sekali <br>
        <hr>
        <small><?= $ck ?></small> <br>
      </div>
    </div>
  </div>
</div>
<?php } else if($ck = $this->session->flashdata('fail')) {?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="icon-notif py-2">
            <i class="fa fa-times" style="font-size:36px; color:rgb(247, 102, 94)"></i> 
        </div>
        Terdapat perubahan pada dokumen Transkrip Nilai atau tanda tangan yang berada pada dokumen Palsu dan tidak benar <br>
        <hr>
        <small><?= $ck ?></small> <br>
      </div>
    </div>
  </div>
</div>
<?php };?>

<script>
    $('#fileTrans').on('change', function(){
        var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
        $(this).prev().text(filename);
    })

    $(document).ready(function() {
        $('#myModal').modal('show');
    } );
</script>