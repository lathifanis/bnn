<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>

    <a href="<?= base_url('perawat/tambah'); ?>" class="btn btn-primary mb-3 tomboltambahperawat" data-toggle="modal" data-target="#newMenuModal">Tambah Data perawat</a>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">TABEL PERAWAT</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Perawat</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($perawat as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['id_perawat'] ?></td>
                                <td><?= $p['nama_perawat'] ?></td>
                                <td>
                                    <a href="<?= base_url('perawat/detail') ?>/<?= $p['id_perawat'] ?>" class="badge badge-primary">Detail</a>
                                    <a href="<?= base_url('perawat/ubah') ?>/<?= $p['id_perawat'] ?>" class="badge badge-success tomboleditperawat" data-toggle="modal" data-target="#newMenuModal" data-id="<?= $p['id_perawat'] ?>">Edit</a>
                                    <a href="<?= base_url('perawat/hapus') ?>/<?= $p['id_perawat'] ?>" class="badge badge-danger" onclick="return confirm('Yakin?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- /.container-fluid -->
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah perawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('perawat/tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="nip">ID Perawat</label>
                        <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP">
                    </div>
                <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" id="jk" name="jk">
                            <option value="Laki-laki">
                                Laki-laki
                            </option>
                            <option value="Perempuan">
                                Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Handphone</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>