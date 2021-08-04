<div class="row justify-content-center">   
    <div class="col-11">
        <h3>Data Angkatan</h3>
        <p>Halaman untuk menambah angkatan</p>
    </div>  
    <div class="col-11">
        <div class="form-group row">
            <div class="col-8">
                <input class="form-control form-control-sm" placeholder="Masukkan angkatan">
            </div>
            <div class="col-4">
                <input type="submit" value="Tambahkan Angkatan" class="btn btn-success btn-sm w-100">
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
                            <th>Nama Angkatan</th>
                            <th>Jumlah Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2016</td>
                            <td>1</td>
                            <td>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
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