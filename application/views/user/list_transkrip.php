<div class="row justify-content-center">   
    <div class="col-11">
        <h3>Data Transkrip Nilai Mahasiswa</h3>
        <p>Halaman berikut berisikan transkrip nilai mahasiswa per angkatan</p>
    </div>  
    <div class="col-11">
        <?= form_open('user/transkrip/search') ?>
        <div class="form-group row">
            <div class="col-8">
                <?= cmb_dinamis('angkatanID','tbl_angkatan','nama','id','','ASC') ?>
            </div>
            <div class="col-4">
                <input type="submit" value="Cari Berdasar Angkatan" class="btn btn-success btn-sm w-100">
            </div>
        </div>
        <?= form_close() ?>
    </div>
    <div class="col-11">
        <div class="card">
            <div class="card-body">
                <?php if(isset($result)) { ?>
                <table class="table table-bordered nowrap table-font-sm" id="angkatanTable" style="width:100% !important; font-size:12px" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Angkatan</th>
                            <th>IPK</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($result as $r) {?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $r['nama_mhs_info'] ?></td>
                            <td><?= $r['nim_mhs_info'] ?></td>
                            <td><?= $r['nama'] ?></td>
                            <td><?= $r['nilai_ipk'] ?></td>
                            <td class="text-center" width="20%">
                                <a href="<?= base_url()?>user/mahasiswa/edit_individual/<?= $r['id_info_trans'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit Nilai dan Informasi</a>
                                <button class="btn btn-sm btn-danger btn-send" data-toggle="modal" data-target="#deleteModal" value="<?=$r['id_info_trans']?>"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td class="text-center" width="20%">
                                <a href="<?= base_url()?>user/transkrip/generate_trans/<?= $r['id_info_trans'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Unduh Transkrip</a>
                                <button class="btn btn-sm btn-success btn-send" data-toggle="modal" data-target="#whatsappModal" value="<?=$r['id_info_trans']?>"><i class="fab fa-whatsapp"></i> Kirim WA</button> 
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
                <?php } else {?> 
                    <h4 class="text-center">Silahkan Mencari berdasarkan Angkatan</h4>
                <?php }; ?> 
            </div>
            <script>
                $(document).ready(function() {
                    $('#angkatanTable').DataTable();
                } );
            </script>
        </div>
    </div>
</div>

<div class="modal fade" id="whatsappModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered w-50" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class=""><i class="fas fa-times" style="font-size:16px;"></i></span>
        </button>

        <?= form_open('user/transkrip/send_trans') ?>
        <input type="hidden" class="id" name="id" value="">
        <div>
            <small>Silahkan mengisi inputan dibawah untuk mengirim ke nomor </small>
            <input type="tel" name="telephone" class="form-control form-control-sm mt-1" pattern="[0-9]{12}">
            <input type="submit" class="btn btn-success btn-sm w-100 mt-2" value="Kirim">
        </div>
        <?= form_close() ?>
       
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered w-50" role="document">
    <div class="modal-content">
      <div class="modal-body">

        <?= form_open('user/mahasiswa/delete_individual') ?>
        <input type="hidden" class="id" name="idInfo" value="">
        <div class="text-center">
            <h5 class="text-center">Apakah Anda Yakin Ingin <br> Menghapus Data Transkrip Tersebut</h5>
            <hr>
            <input type="submit" class="btn btn-sm btn-danger" value="Iya">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" aria-label="Close">Tidak</button>
        </div>
        <?= form_close() ?>
       
        </div>
    </div>
  </div>
</div>

<script>
     $('.btn-send').on('click', function(){
        var val = $(this).val();
        console.log(val);
        $('.id').val(val);
        $('#noTujuan').text(val);
    });
</script>
