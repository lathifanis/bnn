<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>

    <a href="<?= base_url('dokter/tambah'); ?>" class="btn btn-primary mb-3 tomboltambahdokter" data-toggle="modal" data-target="#modal-dokter">Tambah Data Dokter</a>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">TABEL DOKTER</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP / NRP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dokter as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['id_dokter'] ?></td>
                            <td><?= $d['nama_dokter'] ?></td>
                            <td>
                                <a href="<?= base_url('dokter/detail') ?>/<?= $d['id_dokter'] ?>" class="badge badge-primary">Detail</a>
                                <a href="<?= base_url('dokter/ubah') ?>/<?= $d['id_dokter'] ?>" class="badge badge-success tomboleditdokter" data-toggle="modal" data-target="#modal-dokter" data-id="<?= $d['id_dokter'] ?>">Edit</a>
                                <a href="<?= base_url('dokter/hapus') ?>/<?= $d['id_dokter'] ?>" class="badge badge-danger" onclick="return confirm('Yakin?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!-- /.container-fluid -->
    </div>
</div>
</div>
<!-- End of Main Content -->

<div class="modal fade" id="modal-dokter" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dokter/tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="nip">NIP / NRP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP / NRP">
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
                        <label for="no_ho">No Handphone</label>
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