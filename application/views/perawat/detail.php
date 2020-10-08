<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>

    <div class="card" style="width: 18rem;">
        <?php foreach ($perawat as $pe) : ?>
            <div class="card-body">
                <h5 class="card-title"><?= $pe['nama_perawat'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $pe['id_perawat'] ?></h6>
                <p class="card-text">Jenis Kelamin : <?= $pe['jk'] ?></p>
                <p class="card-text">No HP : <?= $pe['no_hp'] ?></p>
                <p class="card-text">Alamat : <?= $pe['alamat_perawat'] ?></p>
                <a href="<?= base_url('perawat') ?>" class="card-link">Kembali</a>
            </div>
        <?php endforeach; ?>
    </div>
</div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->