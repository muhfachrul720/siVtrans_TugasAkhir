<div class="row justify-content-center">   
    <div class="col-11">
        <h3>Data Mahasiswa</h3>
        <p>Halaman untuk Menambah Data Mahasiswa</p>
    </div>
    <div class="col-11">
        <a href="<?= base_url()?>user/mahasiswa" class="btn btn-primary btn-sm mb-3">Import Nilai Keseluruhan</a>
        <div class="card">
            <div class="card-body">
                <h5>Tambah Data Mahasiswa </h5>
                <small>Berikut merupakan bagian untuk menambahkan data nilai mahasiswa</small>
                <hr>
                <div class="form-group">
                    <label for="">Informasi Umum</label>
                    <div class="row">
                        <div class="col-4">
                            <small>Nama</small>
                            <input type="text" name="namaMhsInfo" id="" class="form-control form-control-sm">
                        </div>
                        <div class="col-4">
                            <small>STB / NIM</small>
                            <input type="text" name="nimMhsInfo" id="" class="form-control form-control-sm">
                        </div>
                        <div class="col-4">
                            <small>Program Studi</small>
                            <input type="text" name="programStudiInfo" id="" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <table class="table cst-table" style="font-size:12px; border-top:none;">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Kode M.K</th>
                                <th width="30%">Mata Kuliah</th>
                                <th width="7%">Sks</th>
                                <th width="10%">Nilai</th>
                                <th width="20%">Ket</th>
                            </tr>
                        </thead>
                        <tbody id="nilaiCont">
                            <tr>
                                <td>1</td>
                                <td><input type="text" name="kodeMkNilai[]" id="" class="form-control form-control-sm"></td>
                                <td><input type="text" name="mataKuliahNilai[]" id="" class="form-control form-control-sm"></td>
                                <td><input type="number" name="sksNilai[]" id="" class="form-control form-control-sm sks_mk"></td>
                                <td>
                                <?php echo form_dropdown('nilai[]', array(
                                    '4' => 'A',    
                                    '3' => 'B',
                                    '2' => 'C',
                                    '1' => 'D',
                                ), '', array('class' => 'form-control form-control-sm nilai_mk')); ?>
                                </td>
                                <td><textarea name="keteranganNilai[]" id="" cols="30" rows="1" class="form-control form-control-sm"></textarea><input type="hidden" class="sksTimesNilai" name="angka[]" value=""></td>
                                <td class="text-center"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm" id="nilaiTrig"><i class="fas fa-plus pr-2"></i> Tambah Nilai</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-11">
        <button class="w-100 btn-success btn-sm btn">Tambahkan Data</button>
    </div>
</div>

<script>
    let index = 2;
    $('#nilaiTrig').on('click', function(){
        let cont = $('#nilaiCont');
        let html = `
        <tr>
            <td>${index++}</td>
            <td><input type="text" name="kodeMkNilai[]" id="" class="form-control form-control-sm"></td>
            <td><input type="text" name="mataKuliahNilai[]" id="" class="form-control form-control-sm"></td>
            <td><input type="number" name="sksNilai[]" id="" class="form-control form-control-sm sks_mk"></td>
            <td>
            <?php echo form_dropdown('nilai[]', array(
                '4' => 'A',    
                '3' => 'B',
                '2' => 'C',
                '1' => 'D',
            ), '', array('class' => 'form-control form-control-sm nilai_mk')); ?>
            </td>
            <td><textarea name="keteranganNilai[]" id="" cols="30" rows="1" class="form-control form-control-sm"></textarea><input type="hidden" class="sksTimesNilai" name="angka[]" value=""></td>
            <td class="text-center"><button class="btn btn-danger btn-sm" id="nilaiTrig"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
        `;
        cont.append(html);
    })
</script>