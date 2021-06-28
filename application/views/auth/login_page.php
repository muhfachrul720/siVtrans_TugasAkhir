<!-- <div class="container-fluid" style="width:100%; background-color:black">
    <div class="row">
        <div class="col-12">
            <div class="w-100 ps-relative" style="height:100vh">
               
            </div>
        </div>
    </div>
</div> -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/dist/css/adminlte.min.css">
<section id="hero">
    <div class="container">
      <div>
        <div class="card m-auto w-75 vertical-centered-content p-4">
            <div class="card-body">
                <h2 class="text-center">Login penanda tangan</h2>
                <hr class="mb-3">
                    <?= form_open('auth/auth')?>
                    <?= form_hidden('access', 'auth')?>
                    <div class="row">
                    <div class="form-group col-12 p-0">
                        <label for="" style="font-size:16px;">Username</label>
                        <input type="text" name="username" style="font-size:16px; padding:15px 5px" class="form-control form-control-sm" required >
                    </div>
                    <div class="form-group col-12 p-0">
                        <label for="" style="font-size:16px;">Password </label>
                        <input type="text" style="font-size:16px; padding:15px 5px;" name="pass" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group col-12 p-0">
                        <input type="submit" class="button-verif m-0 w-100" value="Login">
                    </div>
                    </div>
                    <?= form_close()?>
            </div>
        </div>
      </div>
    </div>
</section>