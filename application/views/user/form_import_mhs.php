<div class="row justify-content-center">   
    <div class="col-11">
        <h3>Data Mahasiswa</h3>
        <p>Halaman untuk Menambah Data Mahasiswa</p>
    </div>
    <div class="col-11">
        <a href="<?= base_url()?>user/mahasiswa/individual_mhs" class="btn btn-primary btn-sm mb-3">Input Nilai Individual</a>
        <div class="card">
            <div class="card-body">
                <h5>Import Excel Data Mahasiswa</h5>
                <small>Berikut merupakan bagian untuk melakukan import excel data transkrip mahasiswa</small>
                <hr>
                <div class="form-inline">
                    <div class="form-group mr-3">
                        <label for="" class="">Angkatan : </label>
                    </div>
                    <div class="form-group">    
                       <?= cmb_dinamis('angkatanID','tbl_angkatan','nama','id','','ASC') ?>
                    </div>
                    <div class="form-group">
                        <small></small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="upload-box" for="file_original">
                        <div class="upload-icon">
                            <i class="icon fas fa-file-alt"></i> 
                            <br>
                            <small>Tekan Atau Drag File Kesini</small>
                        </div>
                        <input type="file" name="file_original" id="file_original" class="dropzone_input" style="display:none" accept=".xlsx, .xls, .csv"/>
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Upload File" class="btn btn-success w-100">
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