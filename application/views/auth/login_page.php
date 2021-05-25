<div class="container-fluid" style="width:100%; background-color:black">
    <div class="row">
        <div class="col-12">
            <div class="w-100 ps-relative" style="height:100vh">
                <div class="card w-25 m-auto vertical-centered-content">
                    <div class="card-body">
                        <h5 class="text-center">Login As SuperAdmin</h5>
                        <hr class="mb-1">
                            <?= form_open('auth/auth')?>
                            <?= form_hidden('access', 'auth')?>
                            <div class="row">
                            <div class="form-group col-12">
                                <label for=""><small class="thin">Username</small> </label>
                                <input type="text" name="username" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group col-12">
                                <label for=""><small class="thin">Password</small> </label>
                                <input type="text" name="pass" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group col-12">
                                <input type="submit" class="btn btn-sm side-blue w-100" value="Login">
                            </div>
                            </div>
                            <?= form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>