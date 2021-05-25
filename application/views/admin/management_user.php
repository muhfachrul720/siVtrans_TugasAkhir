<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Kelola Data Pengguna</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.htmadl"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/user">Data Pengguna</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- <?php var_dump($pegawai);?> -->

<?php if($msg = $this->session->flashdata('msg')){?>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Berhasil!</h4>
                <!-- <p style="padding-bottom:0"><?= $msg ?></p> -->
            </div>
        </div>
    </div>
<?php };?>

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url()?>admin/user/add_user" class="btn btn-success btn-sm"><i class="icon-sm fas fa-plus"></i> Tambah Pengguna</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap table-font-sm" id="simpleTable" style="width:100% !important; font-size:12px" >

                    <thead>
                                <tr>
                                    <th>No </th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                    </thead>

                    <tbody>
                            <?php $no = 1; foreach($data as $p){?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $p['username']?></td>
                                    <td><?= $p['nama']?></td>
                                    <td>
                                        <a href="<?= base_url()?>admin/user/edit_user/<?=$p['id_user']?>" class="btn btn-sm btn-warning"><i class="fas fa-edit icon-sm"></i>Sunting</a>
                                        <a href="<?= base_url()?>admin/user/delete_user/<?= $p['id_user']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash icon-sm"></i>Hapus</a>
                                    </td>
                                </tr>
                            <?php $no++; };?>
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#simpleTable').DataTable();
            } );
        </script>
    </div>
</div>