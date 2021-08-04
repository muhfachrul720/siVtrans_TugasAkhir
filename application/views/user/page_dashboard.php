<div class="row">   
    <div class="col-12">
        <h3>Dashboard Admin</h3>
        <p>Halaman Overview </p>
    </div>
    <div class="col-3">
        <div style="">
            <h6 style="background-color:#7bed9f; padding:10px; margin:0; text-align:center"> Jumlah Dokumen Tanda Tangan </h6>
            <div class="body content" style="text-align:center; background-color:rgb(255, 255, 255); font-size:72px; font-weight:bold; padding-bottom:12px;">
                <?= $countSign ?>
            </div>
            <div style="padding:10px; text-align:center; background-color:#7bed9f; font-weight:500">
                Dokumen
            </div>
        </div>
    </div>
    <div class="col-9">
        <div style="">
            <h6 style="background-color:#70a1ff; padding:10px; margin:0; text-align:center"> Kunci </h6>
            <div class="body content" style="text-align:center; background-color:rgb(255, 255, 255); font-weight:bold; padding-bottom:12px;">
                <div class="row">
                    <div class="col-6" style="font-size:72px;">
                        <?= $key['public_key'] ?>
                    </div>
                    <div class="col-6" style="font-size:72px;">
                        <?= $key['private_key'] ?>
                    </div>
                </div>
            </div>
            <div style="padding:10px; text-align:center; background-color:#70a1ff; font-weight:500">
                <div class="row">
                    <div class="col-6">
                        Publik
                    </div>
                    <div class="col-6">
                        Privat
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>