<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>

    <a href="<?= base_url('pegawai/tambah'); ?>" class="btn btn-primary mb-3 tomboltambah" data-toggle="modal" data-target="#newMenuModal">Tambah Data Pegawai</a>
    <?= $this->session->flashdata('message'); ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Induk Pegawai</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pegawai as $p) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $p['nip'] ?></td>
                    <td><?= $p['nama_pegawai'] ?></td>
                    <td>
                        <a href="<?= base_url('pegawai/detail') ?>/<?= $p['nip'] ?>" class="badge badge-primary">Detail</a>
                        <a href="<?= base_url('pegawai/ubah') ?>/<?= $p['nip'] ?>" class="badge badge-success tomboledit" data-toggle="modal" data-target="#newMenuModal" data-id="<?= $p['nip'] ?>">Edit</a>
                        <a href="<?= base_url('pegawai/hapus') ?>/<?= $p['nip'] ?>" class="badge badge-danger" onclick="return confirm('Yakin?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pegawai/tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP">
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
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="Administrator">
                                Administrator
                            </option>
                            <option value="Pegawai">
                                Pegawai
                            </option>
                            <option value="Dokter">
                                Dokter
                            </option>
                        </select>
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