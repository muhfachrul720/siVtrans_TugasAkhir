<div class="row justify-content-center">   
    <?php $ck=''; if($ck = $this->session->flashdata('notif')){?>
    <div class="col-11">
        <div class="alert alert-<?=explode('|',$ck)[0]?>" role="alert">
        <?= explode('|', $ck)[1] ?>
        </div>
    </div>
    <?php }?>
    <div class="col-11">
        <h3>Data Angkatan</h3>
        <p>Halaman untuk menambah angkatan</p>
    </div>  
    <div class="col-11">

        <?= form_open('user/mahasiswa/insert_angkatan') ?> 
        <div class="form-group row">
            <div class="col-8">
                <input class="form-control form-control-sm" name="angkatanName" placeholder="Masukkan angkatan">
            </div>
            <div class="col-4">
                <input type="submit" value="Tambahkan Angkatan" class="btn btn-success btn-sm w-100">
            </div>
        </div>
        <?= form_close() ?>

    </div>  
    <div class="col-11">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered nowrap table-font-sm" id="angkatanTable" style="width:100% !important; font-size:12px" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Angkatan</th>
                            <th>Jumlah Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($result as $r) {?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $r['nama']?></td>
                            <td><?= $r['jumlah_siswa']?></td>
                            <td>
                                <button class="btn btn-sm btn-warning editTrig" data-toggle="modal" data-target="#editModal" value="<?= $r['nama'].'|'.$r['jumlah_siswa'].'|'.$r['id']?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger btn-send" data-toggle="modal" data-target="#deleteModal" value="<?= $r['id']?>"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                    $('#angkatanTable').DataTable();
                } );

                $('.editTrig').on('click', function(){
                    let value = $(this).val().split('|');
                    $('#inputAngkatan').val(value[0]);
                    $('#inputSiswa').val(value[1]);
                    $('#idAngkatan').val(value[2]);
                });
            </script>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">

        <?= form_open('user/mahasiswa/update_angkatan') ?>
        <label for="">Edit Informasi Angkatan</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <hr class="my-1">
        <input type="hidden" name="idAngkatan" value="" id="idAngkatan">
        <div class="form-group">
            <small>Nama Angkatan :</small> 
            <input type="text" id="inputAngkatan" name="updateNama" class="form-control form-control-sm">
        </div>
        <div class="form-group">
            <small>Jumlah Siswa :</small> 
            <input type="text" id="inputSiswa" name="updateJmlSiswa" class="form-control form-control-sm">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

        <?= form_open('user/mahasiswa/delete_angkatan') ?>
        <input type="hidden" class="id" name="idAng" value="">
        <div class="text-center">
            <h5 class="text-center">Apakah Anda Yakin Ingin Menghapus Angkatan Ini</h5>
            <small>Apabila Data Ini Dihapus Maka Data Transkrip Nilai Untuk Angkatan Tersebut akan Dihapus</small>
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
