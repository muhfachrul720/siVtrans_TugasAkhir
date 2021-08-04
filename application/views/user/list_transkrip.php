<div class="row justify-content-center">   
    <div class="col-11">
        <h3>Data Transkrip Nilai Mahasiswa</h3>
        <p>Halaman berikut berisikan transkrip nilai mahasiswa per angkatan</p>
    </div>  
    <div class="col-11">
        <div class="form-group row">
            <div class="col-8">
                <input class="form-control form-control-sm" placeholder="Masukkan angkatan">
            </div>
            <div class="col-4">
                <input type="submit" value="Cari Berdasar Angkatan" class="btn btn-success btn-sm w-100">
            </div>
        </div>
    </div>
    <div class="col-11">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered nowrap table-font-sm" id="angkatanTable" style="width:100% !important; font-size:12px" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Angkatan</th>
                            <th>IPK</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>MUH FACHRUL</td>
                            <td>E1E117037</td>
                            <td>2017</td>
                            <td>3.67</td>
                            <td class="text-center" width="20%">
                                <button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit Nilai dan Informasi</button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td class="text-center" width="20%">
                                <button class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Unduh Transkrip</button>
                                <button class="btn btn-sm btn-success"><i class="fab fa-whatsapp"></i> Kirim WA</button> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                    $('#angkatanTable').DataTable();
                } );
            </script>
        </div>
    </div>
</div>