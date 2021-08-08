<?= form_open('user/mahasiswa/insert_individual')?>
<div class="row justify-content-center">   
    <div class="col-11">
        <h3>Data Mahasiswa</h3>
        <p>Halaman untuk Menambah Data Mahasiswa</p>
    </div>
    <?php $ck=''; if($ck = $this->session->flashdata('notif')){?>
    <div class="col-11">
        <div class="alert alert-<?=explode('|',$ck)[0]?>" role="alert">
        <?= explode('|', $ck)[1] ?>
        </div>
    </div>
    <?php }?>
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
                        <div class="col-3">
                            <small>Nama</small>
                            <input type="text" name="namaMhsInfo" id="" class="form-control form-control-sm">
                        </div>
                        <div class="col-3">
                            <small>STB / NIM</small>
                            <input type="text" name="nimMhsInfo" id="" class="form-control form-control-sm">
                        </div>
                        <div class="col-3">
                            <small>Program Studi</small>
                            <input type="text" name="programStudiInfo" id="" class="form-control form-control-sm">
                        </div>
                        <div class="col-3">
                            <small>Angkatan</small>
                            <?= cmb_dinamis('idAngkatan','tbl_angkatan','nama','id','','ASC') ?>
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
                                <td><input type="number" name="sksNilai[]" id="" class="form-control form-control-sm sks_mk" value="0" min="0" onchange="calc_ip_sums_sks()"></td>
                                <td>
                                <?php echo form_dropdown('nilai[]', array(
                                    '4' => 'A',    
                                    '3' => 'B',
                                    '2' => 'C',
                                    '1' => 'D',
                                ), '', array('class' => 'form-control form-control-sm nilai_mk', 'onchange' => 'calc_ip_sums_sks()')); ?>
                                </td>
                                <td><textarea name="keteranganNilai[]" id="" cols="30" rows="1" class="form-control form-control-sm">-</textarea><input type="hidden" class="sksTimesNilai" name="angka[]" value=""></td>
                                <td class="text-center"><button type="button" class="btn btn-danger btn-sm" onclick="deleteThisNilai(1)"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary btn-sm" id="nilaiTrig"><i class="fas fa-plus pr-2"></i> Tambah Nilai</button>
                </div>
                <hr>
                <div class="form-group row mb-0">
                    <div class="col-6">
                        <small>Jumlah SKS</small>
                        <h4 class="jml_sks">0</h4><input type="hidden" value="0" name="jmlSks" class="jml_sks">
                    </div>
                    <div class="col-6">
                        <small>Nilai IPK</small>
                        <h4 class="nilai_ipk">0.00</h4><input type="hidden" value="0" name="nilaiIpk" class="nilai_ipk">
                        <input type="hidden" value="0" name="jml_sksxangka" class="jml_sksxangka">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-11">
        <button class="w-100 btn-success btn-sm btn">Tambahkan Data</button>
    </div>
</div>
<?= form_close()?>

<script>
    let index = 1;
    $('#nilaiTrig').on('click', function(){
        let cont = $('#nilaiCont');
        let html = `
        <tr id="nilai${++index}">
            <td>${index}</td>
            <td><input type="text" name="kodeMkNilai[]" id="" class="form-control form-control-sm"></td>
            <td><input type="text" name="mataKuliahNilai[]" id="" class="form-control form-control-sm"></td>
            <td><input type="number" name="sksNilai[]" id="" class="form-control form-control-sm sks_mk" value="0" min="0" onchange="calc_ip_sums_sks()"></td>
            <td>
            <?php echo form_dropdown('nilai[]', array(
                '4' => 'A',    
                '3' => 'B',
                '2' => 'C',
                '1' => 'D',
            ), '', array('class' => 'form-control form-control-sm nilai_mk', 'onchange' => 'calc_ip_sums_sks()')); ?>
            </td>
            <td><textarea name="keteranganNilai[]" id="" cols="30" rows="1" class="form-control form-control-sm">-</textarea><input type="hidden" class="sksTimesNilai" name="angka[]" value=""></td>
            <td class="text-center"><button type="button" class="btn btn-danger btn-sm" onclick="deleteThisNilai(${index})"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
        `;
        cont.append(html); calc_ip_sums_sks();
    })

    function deleteThisNilai(params) {
        let target = document.querySelector("#nilai"+params);
        target.remove(); calc_ip_sums_sks();
    }


    function calc_ip_sums_sks() {
        var returnArray = {ip : 0, sks : 0};
        var i = 0; var angka = 0;
        var nilai = document.querySelectorAll('.nilai_mk');

        var hiddenVal = document.querySelectorAll('.sksTimesNilai');

        $('.sks_mk').each(function(e) {
            var val_sks = parseInt($(this).val());
            var val_times = val_sks * parseInt(nilai[i].value);
            angka = angka + val_times;
            hiddenVal[i].value = val_times;
            returnArray.angka = angka;
            returnArray.sks = returnArray.sks + val_sks;
            returnArray.ip = angka / returnArray.sks;
            i++;
        });

        update_ip_sks(returnArray);
    }

    function update_ip_sks(obj) {
        $('.jml_sks').text(obj.sks);
        $('.jml_sks').val(obj.sks);
        $('.jml_sksxangka').val(obj.angka);
        $('.nilai_ipk').text(obj.ip.toFixed(2));
        $('.nilai_ipk').val(obj.ip.toFixed(2));
    }

</script>