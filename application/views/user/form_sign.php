<!-- [ breadcrumb ] start -->
<div class="page-header px-2">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 class="m-b-10">Tanda Tangan Dokumen</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio placeat eos accusamus ipsa repudiandae voluptas</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<?= form_open_multipart('user/sign/generate')?>
<div class="row px-2">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h5>Upload File</h5>
                <small style="color:red"><?= $this->session->flashdata('mark')?></small>
                <label class="upload-box" for="file_original">
                    <div class="upload-icon">
                        <i class="icon fas fa-file-alt"></i> 
                        <br>
                        <small>Tekan Atau Drag File Kesini</small>
                    </div>
                    <input type="file" name="file_original" id="file_original" class="dropzone_input" style="display:none">

                    <script>
                        document.querySelectorAll('.dropzone_input').forEach(inputElement => {

                            inputElement.addEventListener("change", e => {
                                dropZoneElement.classList.add("upload-box--drag");
                                change_icon(inputElement.files[0].name);
                            })

                            const dropZoneElement = inputElement.closest('.upload-box');

                            dropZoneElement.addEventListener("dragover", e => {
                                e.preventDefault();
                                dropZoneElement.classList.add("upload-box--drag");
                            });

                            ["dragleave", "dragend"].forEach(type => {
                                dropZoneElement.addEventListener(type, e => {
                                    if(inputElement.files.length < 1){
                                        dropZoneElement.classList.remove("upload-box--drag");
                                    }
                                })
                            })

                            dropZoneElement.addEventListener("drop", e => {
                                e.preventDefault();
                                inputElement.files = e.dataTransfer.files;
                                change_icon(inputElement.files[0].name);
                            })
                        })

                        function change_icon(nameFile) { 
                            var icon = document.querySelector('.icon')
                            icon.classList.remove('fa-file-alt');
                            icon.classList.add('fa-check');
                            icon.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML = nameFile;
                        }
                    </script>

                </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5>Informasi</h5>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <p class="mb-1">File yang telah Terupload</p>
                        <small>transkrip_nilai_muh_fachrul_e1e117037.docx</small>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <p class="mb-0">Kunci Publik</p>
                        <small>Dibawah Merupakan Kunci Bawaan</small>

                        <input type="hidden" id="primary_key" name="key" value="<?= $key['id_key']?>">

                        <div class="form-group">
                            <input class="form-control form-control-sm public" type="text" name="public_key" placeholder="Kunci Publik Bawaan" readonly value="<?= $key['public_key']?>">
                            <button type="button" class="mt-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#newKeyModal">Ganti Kunci Publik</button>
                        </div>
                        <p class="mb-2">Target Email</p>
                        <div class="form-group">
                            <input name="target_email" class="form-control form-control-sm" type="email" placeholder="Email Tujuan" required>
                            <small style="color:red"><?= form_error('target_email')?></small>
                        </div>
                        <small>Untuk Kunci Publik Bawaan dapat diatur pada bagian pengaturan atau Tekan Link</small>
                        <div class="form-group mt-2">
                            <input type="submit" value="Tanda Tangan Dokumen" class="btn btn-primary w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close()?>

<!-- Modal Generate New Key -->
<div class="modal fade" id="newKeyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content m-auto w-75">
      <div class="modal-body">
        <div class="row text-center">
            <div class="col-12">
                <h4>Buat Kunci Baru</h4>
                <p>Masukkan 2 angka untuk membentuk kunci baru</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-5">
                <p class="mb-2">Angka Pertama</p>
                <input type="number" name="" id="" class="form-control form-control-sm input_num" min="2">
            </div>
            <div class="col-2 text-center">
                <p></p>
                &
            </div>
            <div class="col-5">
                <p class="mb-2">Angka Kedua</p>
                <input type="number" name="" id="" class="form-control form-control-sm input_num" min="2">
            </div>
            <div class="col-12 mt-3">
                <button id="start_generate" class="btn btn-primary btn-sm w-100">Buat Kunci Baru</button>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for=""><small>Kunci Publik terbaru</small></label>
            <input class="form-control form-control-sm public" type="text" placeholder="Kunci Publik Terbaru" disabled>
        </div>
        <div class="form-group">
            <label for=""><small>Kunci Privat terbaru</small></label>
            <input class="form-control form-control-sm private" type="text" placeholder="Kunci Privat Terbaru" disabled>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Output File Zip -->
<div class="modal fade" id="outputZipFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content m-auto w-50 py-4">
            <div class="modal-body text-center">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <i class="fas fa-file-archive icon-lg"></i>
                        </div>
                        <p>Transcript_DS_E1E117037.Zip</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 px-4">
                        <p>File Hasil Tanda Tangan anda Siap untuk</p>
                    </div>
                    <div class="col-12 px-4 mb-1">
                        <a href="" class="btn btn-danger w-100"><i class="icon-sm fas fa-envelope"></i>Kirim Email</a>
                    </div>
                    <div class="col-12 px-4 mt-1">
                        <a href="" class="btn btn-primary w-100"><i class="icon-sm fas fa-download"></i>Unduh File</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#start_generate').on('click', function(){
        var number = [];
        $('.input_num').each(function(){
            if($(this).val() == '' || $(this).val() < 2){
                alert('Semua Field Harus Diisi dan Angka tidak Boleh kurang dari 2');
                return false;
            } else {
                number.push($(this).val());            
            }
        })

        $.ajax({
                url : '<?= base_url()?>user/sign/ajax_key',
                type : 'post',
                datatype : 'json',
                data : {
                    Postnumber : number
                }, success : function(data){
                    var jsonData = JSON.parse(data)
                    
                    $('.public').val(jsonData['public']);
                    $('.private').val(jsonData['private']);
                    $('#primary_key').val(jsonData['public']+','+jsonData['private']);
                }
            });
           
        // console.log(number);
    });

    function formValid(){

    };
</script>