<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>

    <div class="card" style="width: 18rem;">
        <?php foreach ($pegawai as $p) : ?>
            <div class="card-body">
                <h5 class="card-title"><?= $p['nama_pegawai'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $p['nip'] ?></h6>
                <p class="card-text">Jenis Kelamin : <?= $p['jk'] ?></p>
                <p class="card-text">No HP : <?= $p['no_hp'] ?></p>
                <p class="card-text">Alamat : <?= $p['alamat'] ?></p>
                <p class="card-text">Jabatan : <?= $p['jabatan'] ?></p>
                <a href="<?= base_url('pegawai') ?>" class="card-link">Kembali</a>
            </div>
        <?php endforeach; ?>
    </div>
</div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->