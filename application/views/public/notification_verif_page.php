  
<?php $ck=''; if($ck = $this->session->flashdata('success')){?> 
<section id="hero">
    <div class="container text-center">
      <div>
        <h1 style="padding-bottom:10px; border-bottom: 2px solid rgb(220, 20, 60)" ><i class="fa fa-check" style="font-size:72px; color:rgb(109, 188, 112)"></i> <span></span></h1>
        <p style="padding-top:10px; font-size:12px !important; color:white;">Dokumen Transkrip adalah asli dan belum di modifikasi sama sekali <span></span></p>
        <h1><span></span></h1>
        <br>
        <br>
        <div>
            <p style="color:white"><?= $ck ?></p> <br><br>
            <a href="<?= base_url()?>welcome/verifikasi" class="button-verif">Verifikasi Dokumen Lain</a>
        </div>
      </div>
    </div>
</section>
<?php } else if($ck = $this->session->flashdata('fail')) {?>
<section id="hero">
    <div class="container text-center">
      <div>
        <h1 style="padding-bottom:10px; border-bottom: 2px solid rgb(220, 20, 60)" ><i class="fa fa-times" style="font-size:72px; color:rgb(247, 102, 94)"></i>  <span></span></h1>
        <p style="padding-top:10px; font-size:12px !important; color:white;"> Terdapat perubahan pada dokumen Transkrip Nilai atau tanda tangan yang berada pada dokumen Palsu dan tidak benar <span></span></p>
        <h1><span></span></h1>
        <br>
        <br>
        <div>
            <p style="color:white"><?= $ck ?></p> <br>
            <a href="<?= base_url()?>welcome/verifikasi" class="button-verif">Verifikasi Dokumen Lain</a>
        </div>
      </div>
    </div>
</section>
<?php };?>