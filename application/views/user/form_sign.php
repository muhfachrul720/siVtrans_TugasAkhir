<!-- [ breadcrumb ] start -->
<div class="page-header px-2">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h3 class="m-b-10">Tanda Tangan Dokumen</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<?php if($this->session->flashdata('msg')) {?>
<div class="row px-2">
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
           <b><?= $this->session->flashdata('msg')?></b>
        </div>
    </div>
</div>
<?php }; ?>

<div class="row px-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <i class="fa fa-info-circle pr-3"></i>
                <small>Silahkan mengupload file excel transkrip dengan format yang sesuai, contoh format excel dapat diliat dari link berikut, <a href="" style="font-size:12px;">Download Format Excel</a></small>
            </div>
        </div>
    </div>
</div>

<?= form_open_multipart('user/sign/convert_transcript')?>
<div class="row px-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5>Upload File</h5>
                <small>Transkrip Nilai Dengan Format Excel Ke Form Dibawah</small>
                <small style="color:red"><?= $this->session->flashdata('mark')?></small>
                <label class="upload-box" for="file_original">
                    <div class="upload-icon">
                        <i class="icon fas fa-file-alt"></i> 
                        <br>
                        <small>Tekan Atau Drag File Kesini</small>
                    </div>
                    <input type="file" name="file_original" id="file_original" class="dropzone_input" style="display:none" accept=".xlsx, .xls, .csv"/>
                </label>
            </div>
        </div>
    </div>

    <!-- <div class="col-4">
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

                        <input type="hidden" id="primary_key" name="key" value="<?php// $key['id_key']?>">

                        <div class="form-group">
                            <input class="form-control form-control-sm public" type="text" name="public_key" placeholder="Kunci Publik Bawaan" readonly value="<?= $key['public_key']?>">
                            <button type="button" class="mt-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#newKeyModal">Ganti Kunci Publik</button>
                        </div>
                        <p class="mb-2">No Whatsapp Tujuan</p>
                        <div class="form-group">
                            <input name="target_email" class="form-control form-control-sm" type="email" placeholder="No Whatsapp Tujuan" required>
                            <small style="color:red"><?= form_error('target_email')?></small>
                        </div>
                        <small>Untuk Kunci Publik Bawaan dapat diatur pada bagian pengaturan atau Tekan Link</small>
                        <div class="form-group mt-2">
                            <input type="submit" value="Buat Transkrip Nilai" class="btn btn-primary w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<div class="row px-2">
    <div class="col-12">
        <input type="submit" value="Upload File Transkrip" class="btn btn-success w-100">
    </div>
</div>
<?= form_close()?>

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

        $('.dropzone_input').on('change', function(){
            console.log($(this));
        }); 
    </script>