<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>

    <a href="<?= base_url('assesment/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data Assesment</a>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">TABEL ASESMEN</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No RM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tindakan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($assesment as $as) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $as['rekam_medis'] ?></td>
                            <td><?= $as['nama']?></td>
                            <td ><?= $as['tindak_lanjut'] ?></td>
                            <?php
                            if($as['status']=='selesai'){
                                ?>
                            <td><h5><span class="badge badge-pill badge-success"><?= $as['status'] ?></span></h5></td>
                            <?php
                            } else{
                            ?>   
                            <td><h5><span class="badge badge-pill badge-danger"><?= $as['status'] ?></span></h5></td>
                            <?php } ?> 
                        </td>
                        <td>
                            <a href="<?= base_url('assesment/detail') ?>/<?= $as['id_assesment'] ?>" class="badge badge-primary">Detail</a>
                            <a href="<?= base_url('assesment/ubah') ?>/<?= $as['id_assesment'] ?>" class="badge badge-success">Edit</a>
                            <a href="<?= base_url('assesment/hapus') ?>/<?= $as['id_assesment'] ?>" class="badge badge-danger" onclick="return confirm('Yakin?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->