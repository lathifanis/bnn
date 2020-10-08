<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>

    <div class="card" style="width: 18rem;">
        <?php foreach ($dokter as $d) : ?>
            <div class="card-body">
                <h5 class="card-title"><?= $d['nama_dokter'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $d['id_dokter'] ?></h6>
                <p class="card-text">Jenis Kelamin : <?= $d['jk'] ?></p>
                <p class="card-text">No HP : <?= $d['no_hp'] ?></p>
                <p class="card-text">Alamat : <?= $d['alamat'] ?></p>
                <a href="<?= base_url('dokter') ?>" class="card-link">Kembali</a>
            </div>
        <?php endforeach; ?>
    </div>
</div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->