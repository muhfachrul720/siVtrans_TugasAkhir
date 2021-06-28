 <!-- Hero Section  -->
  <section id="hero">
    <div class="container text-center">
      <div>
        <?php $ck = ''; if($ck = $this->session->flashdata('message')) {?>
        <div class="" style="background-color:rgb(220, 20, 60); margin-bottom:30px; padding:5px;">
            <p style="color:white;"><?= $ck ?></p>
        </div>
        <?php };?>

        <h1 style="padding-bottom:10px; border-bottom: 2px solid rgb(220, 20, 60)" >VERIFIKASI <span></span></h1>
        <p style="padding-top:10px; font-size:12px !important; color:white;">Upload File Transkrip yang telah ditanda tangani dibawah <br> untuk verifikasi modifikasi, pengubahan, serta kepalsuan File<span></span></p>
        <h1><span></span></h1>
        <br>
        <br>
        <div>
        <?= form_open_multipart('public/verification/verified')?>
            <label for="fileTrans" class="file-input">Upload file transkrip tanda tangan disini</label>   
            <input type="file" name="fileTrans" style="display:none" id="fileTrans" accept="application/pdf">
            <button class="button-verif">Verifikasi</button>
        <?= form_close() ?> 
        </div>
      </div>
    </div>
  </section>

