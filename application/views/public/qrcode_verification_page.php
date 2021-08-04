<?php if($this->session->flashdata('fail')) {?>
<section id="hero">
    <div class="container text-center">
      <div>
        <h2 style="padding-bottom:14px; color:white" >  <i class="fa fa-times" style="font-size:72px"></i> <span></span></h2>
        <h5 style="color:white; margin:auto; width:70%; font-size:16px; border-bottom: 2px solid rgb(220, 20, 60); padding-bottom:10px; ">Dokumen yang discan tidak tercatat didalam Database Penanda tanganan Sistem</h5>
        <p style="padding-top:10px; width:70%; margin:auto; font-size:16px !important; color:white;">Kemungkinan file adalah palsu <br> dan sengaja dibuat oleh pihak yang tidak berwenang, <br> Untuk verifikasi lebih lengkapnya, <br> Silahkan melakukan verifikasi Tanda tangan digital dengan menakan link dibawah</p>
        <h1><span></span></h1>
        <br>
        <br>
        <a class="button-verif" href="<?= base_url()?>welcome/verifikasi">Verifikasi Tanda Tangan Dokumen</a>
      </div>
    </div>
</section>

<?php } else {?>
<section id="hero">
    <div class="container text-center">
      <div>
        <p style="color:white">Nama Mahasiswa</p>
        <h2 style="font-size:36px; color:white; border-bottom: 2px solid rgb(220, 20, 60); padding-bottom:10px"><?= $detail['nama_mhs_info']?></h2>
        <p style="color:white"><?= $detail['nim_mhs_info']?></p>
        <br>
        <p style="color:white">Nilai IPK dari mahasiswa</p>
        <h5 style="font-size:28px; color:white"><?= $detail['nilai_ipk']?></h5>
        <!-- <h2 style="padding-bottom:10px; color:white" >  <i class="fa fa-check" style="font-size:72px"></i> <span></span></h2>
        <h5 style="color:white; margin:auto; width:70%; font-size:16px; border-bottom: 2px solid rgb(220, 20, 60); padding-bottom:10px; ">Dokumen yang discan   <br> tercatat didalam Database <br> Penanda tanganan Sistem</h5>
        <p style="padding-top:10px; width:70%; margin:auto; font-size:16px !important; color:white;">Untuk lebih memverifikasi asli tidak nya dokumen <br> silahkan melakukan verifikasi tanda tangan digital dengan menekan tombol di bawah</p>
        <h1><span></span></h1>
        <br>
        <br>
        <a class="button-verif" href="<?= base_url()?>welcome/verifikasi">Verifikasi Tanda Tangan Dokumen</a>
      </div> -->
    </div>
</section>
<?php }?>

