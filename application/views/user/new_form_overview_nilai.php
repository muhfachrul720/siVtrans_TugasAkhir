<!-- [ breadcrumb ] start -->
<div class="page-header px-2">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 class="m-b-10">Overview Nilai, Kirim dan Download File</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<?= form_open('user/sign/generate_trans', array('formtarget' => '_blank'))?>
<div class="row px-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="display:flex">
                <div class="logo-info">
                    <i class="fa fa-info-circle pr-3 pt-3"></i>
                </div>
                <div class="desc">
                    <small>Berikut merupakan halaman untuk review nilai transcript mahasiswa, pada halaman pengubahan dan koreksi nilai serta informasi umum mengenai transcript dapat dilakukan sebelum, diubah menjadi format PDF dan diberikan tanda tangan Digital</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-0">
                    <input type="hidden" class="jmlTotalAngka" name="jmlTotalAngka" value="">
                    <div class="col-6">
                        <small>Jumlah SKS</small>
                        <h4 class="jml_sks"></h4><input type="hidden" value="0" name="jmlSks" class="jml_sks">
                    </div>
                    <div class="col-6">
                        <small>Nilai IPK</small>
                        <h4 class="nilai_ipk"></h4><input type="hidden" value="0" name="nilaiIpk" class="nilai_ipk">
                        <input type="hidden" value="0" name="jml_sksxangka" class="jml_sksxangka">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5>Transcript Nilai</h5>
                        <hr>
                    </div>
                    <div class="col-4">
                        <small>Nama</small>
                        <input type="text" name="namaMhsInfo" id="" class="form-control form-control-sm" value="<?= $info_umum['NAMA']?>">
                    </div>
                    <div class="col-4">
                        <small>STB / NIM</small>
                        <input type="text" name="nimMhsInfo" id="" class="form-control form-control-sm" value="<?= $info_umum['STB']?>">
                    </div>
                    <div class="col-4">
                        <small>Program Studi</small>
                        <input type="text" name="programStudiInfo" id="" class="form-control form-control-sm" value="<?= $info_umum['PROG.STUDI']?>">
                    </div>
                    <div class="col-12 mt-3">
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
                            <tbody>
                                <?php $no = 1; foreach($trans as $t) {?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><input type="text" name="kodeMkNilai[]" id="" value="<?= $t['kodeMatkul']?>" class="form-control form-control-sm"></td>
                                    <td><input type="text" name="mataKuliahNilai[]" id="" value="<?= $t['namaMatkul']?>" class="form-control form-control-sm"></td>
                                    <td><input type="number" name="sksNilai[]" id="" value="<?= $t['sksMatkul']?>" class="form-control form-control-sm sks_mk"></td>
                                    <td>
                                    <?php echo form_dropdown('nilai[]', array(
                                        '4' => 'A',    
                                        '3' => 'B',
                                        '2' => 'C',
                                        '1' => 'D',
                                    ), $t['nilaiMatkul'], array('class' => 'form-control form-control-sm nilai_mk')); ?>
                                    </td>
                                    <td><textarea name="keteranganNilai[]" id="" cols="30" rows="1" class="form-control form-control-sm"></textarea><input type="hidden" class="sksTimesNilai" name="angka[]" value=""></td>
                                </tr>
                                <?php $no++; }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5>Penerima</h5>
                <small>Silahkan memasukkan nomor whatsapp penerima File Transcript Nilai nantinya</small>
                <hr>
                <input type="text" name="noTargetWhatsapp" id="validNumberPhone" class="form-control" placeholder="Contoh : 082273352503">
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-secondary w-100" id="submitButton" disabled>Masukkan Nomor Penerima</button>
    </div>
</div>
<?= form_close()?>

<script>
    // Trigger
    $(document).ready(function(e) {
        update_ip_sks(calc_ip_sums_sks());

    });

    $('.nilai_mk').on('change', function(e) {  
        update_ip_sks(calc_ip_sums_sks());
    });

    $('.sks_mk').on('change', function(e) {
        update_ip_sks(calc_ip_sums_sks());
    }); 

    // Function
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

        // console.log(returnArray.ip.toFixed(2));
        return returnArray;
    }

    function update_ip_sks(obj) {
        $('.jml_sks').text(obj.sks);
        $('.jml_sks').val(obj.sks);
        $('.jmlTotalAngka').val(obj.angka);
        $('.nilai_ipk').text(obj.ip.toFixed(2));
        $('.nilai_ipk').val(obj.ip.toFixed(2));
    }
    
    $('#validNumberPhone').on('keyup', function() {
        var target = $(this).val(); var btn = $('#submitButton');
        if($.isNumeric(target) && target.length >= 10){ 
            btn.removeClass('btn-secondary').addClass('btn-success');
            btn.text('Buat Transkrip Nilai Dan Tanda Tangan'); btn.attr('disabled', false)
        }  else {
            btn.removeClass('btn-success').addClass('btn-secondary');
            btn.text('Masukkan Nomor Penerima'); btn.attr('disabled', true)
        }
    }); 
</script>




