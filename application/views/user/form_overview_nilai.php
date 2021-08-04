<!-- [ breadcrumb ] start -->
<div class="page-header px-2">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 class="m-b-10">Overview Nilai, Kirim dan Download File</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio placeat eos accusamus ipsa repudiandae voluptas</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<?= form_open('user/sign/generate_trans') ?>
<input type="hidden" name="no_surat" value="<?= $no_surat ?>">
<div class="row px-2"> 
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <div class="form-group row">
                    <div class="col-6">
                        <b>Mata Kuliah</b>
                    </div>
                    <div class="col-2">
                        <b>SKS</b>
                    </div>
                    <div class="col-4">
                        <b>Nilai A - D</b>
                    </div>
                </div>
                
                <hr>
                <!-- ====================================== -->
                <?php foreach($trans as $ex) {?>
                <div class="form-group row">
                    <input type="hidden" name="kodemk[]" value="<?= $ex['kodeMatkul'] ?>">
                    <div class="col-6">
                        <?= $ex['namaMatkul']?>
                        <input type="hidden" value="<?= $ex['namaMatkul'] ?>" class="" name="matkul[]">
                    </div>
                    <div class="col-2">
                        <?= $ex['sksMatkul'] ?> 
                        <input type="hidden" value="<?= $ex['sksMatkul'] ?>" class="sks_mk" name="sks[]">
                    </div>
                    <div class="col-4">
                        <?php echo form_dropdown('nilai[]', array(
                            '4' => 'A',    
                            '3' => 'B',
                            '2' => 'C',
                            '1' => 'D',
                        ), $ex['nilaiMatkul'], array('class' => 'form-control form-control-sm nilai_mk')); ?>
                    </div>
                    <input type="hidden" class="sksTimesNilai" name="angka[]" value="">
                </div>
                <?php }; ?> 

            </div>
        </div>                    
    </div>
    <div class="col-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 style="font-weight:bold">Informasi Umum</h5>
                        <div class="form-group">
                            <small>Nama</small>
                            <input type="text" class="form-control form-control-sm" name="nama_mhs" value="<?= $info_umum['NAMA']?>">
                        </div>
                        <div class="form-group">
                            <small>Nim</small>
                            <input type="text" class="form-control form-control-sm" name="nim_mhs" value="<?= $info_umum['NOMORINDUKMAHASISWA']?>">
                        </div>
                        <div class="form-group">
                            <small>Tempat Tanggal Lahir</small>
                            <input type="text" class="form-control form-control-sm" name="ttl_mhs" value="<?= $info_umum['TEMPAT/TANGGALLAHIR']?>">
                        </div>
                        <div class="form-group">
                            <small>Fakultas</small>
                            <input type="text" class="form-control form-control-sm" name="fk_mhs" value="<?= $info_umum['FAKULTAS']?>">
                        </div>
                        <div class="form-group">
                            <small>Program Studi</small>
                            <input type="text" class="form-control form-control-sm" name="ps_mhs" value="<?= $info_umum['PROGRAMSTUDI']?>">
                        </div>
                        <div class="form-group">
                            <small>Tanggal Lulus Yudisium</small>
                            <input type="text" class="form-control form-control-sm" name="yudi_mhs" value="<?= $info_umum['TANGGALLULUS/YUDISIUM']?>">
                        </div>
                        <div class="form-group">
                            <small>Nomor Seri Ijazah</small>
                            <input type="text" class="form-control form-control-sm" name="noseri_mhs" value="<?= $info_umum['NOMORSERIIJAZAH']?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-6">
                                <small>Jumlah SKS</small>
                                <h4 class="jml_sks"></h4><input type="hidden" value="0" name="jml_sks" class="jml_sks">
                            </div>
                            <div class="col-6">
                                <small>Nilai IPK</small>
                                <h4 class="nilai_ipk"></h4><input type="hidden" value="0" name="nilai_ipk" class="nilai_ipk">
                                <input type="hidden" value="0" name="jml_sksxangka" class="jml_sksxangka">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-12">
                    <input type="submit" value="Buat Transkrip dan Tanda tangan" class="btn btn-primary w-100">   
                </form>
            </div>
        </div>       
    </div>
</div>
<?= form_close() ?>

<script>
    // Trigger
    $(document).ready(function(e) {
        update_ip_sks(calc_ip_sums_sks());

    });

    $('.nilai_mk').on('change', function(e) {  
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
        $('.jml_sksxangka').val(obj.angka);
        $('.nilai_ipk').text(obj.ip.toFixed(2));
        $('.nilai_ipk').val(obj.ip.toFixed(2));
    }
</script>


