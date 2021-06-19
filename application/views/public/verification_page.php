<div class="container-fluid" style="width:100%;">
    <?= form_open_multipart('public/verification/verified')?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 ps-relative" style="height:100vh">
            <div class="m-auto">
                <div class="m-auto vertical-centered-content">
                    <div class="col">   
                        <?php if($this->session->flashdata('mark')) {?>
                        <div class="alert alert-danger text-center">
                            <?= $this->session->flashdata('mark') ?>
                        </div>
                        <?php }; ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <h3>Verifikasi Digital Dokumen</h3> 
                                    <small>Untuk melakukan verifikasi dokumen silahkan memasukkan Kunci Privat, File zip berisikan tanda tangan dan file asli</small>
                                    <hr>
                                </div>
                                <div class="form-group px-3">
                                    <select name="privatKey" id="" class="form-control form-control-sm">
                                        <?php $no = 0; foreach($signer as $sg) {?>
                                            <?php if($no == 0) {?>
                                                <option value="<?= $sg['private_key'] ?>" selected><?= $sg['username']?></option>
                                            <?php } else { ?>
                                                <option value="<?= $sg['private_key'] ?>"><?= $sg['username']?></option>
                                            <?php };  ?>
                                        <?php $no = 1; }; ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group px-3">
                                    <label for="">Kunci Privat</label>
                                    <input type="text" name="private_key" class="form-control form-control-sm">
                                    <small style="color:red"><?= form_error('private_key')?></small>
                                </div> -->
                                <div class="form-group px-3">
                                    <input type="submit" class="btn side-blue w-100" value="Verifikasi Dokumen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 side-blue ps-relative">
            <div class="m-auto vertical-centered-content w-75">
                <div class="row">
                    <div class="col">
                        <label class="upload-box" for="file_zip">
                            <div class="upload-icon">
                                <i class="icon fas fa-file-alt"></i> 
                                <br>   
                                <small>Upload File Disini</small>
                            </div>
                            <input type="file" name="fileSign" id="file_zip" class="dropzone_input" style="display:none">

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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <?= form_close()?>
</div>

<!-- Modal Output File Zip -->
<div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content m-auto w-75 py-4">
            <div class="modal-body text-center">
               <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="pb-3">Pemberitahuan</h5>
                        <!-- <hr class="pt-0 mt-0"> -->
                        <i class="fas <?= $this->session->flashdata('notif') == 'true' ? 'fa-check': 'fa-times'?>" style="font-size:48px;"></i>
                        <?php if($this->session->flashdata('notif') == 'true'){?>
                            <p class="pt-3 mb-0">File merupakan asli dan telah <br> diberikan tanda tangan</p>
                        <?php } else { ?>
                            <p class="pt-3 mb-0">File telah dimodifikasi sebelumnya atau tanda tangan nya Palsu</p>
                        <?php }?>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('notif')){?>
<script type="text/javascript">
$(window).on('load', function() {
    $('#notifModal').modal('show');
});
</script>
<?php }; ?>