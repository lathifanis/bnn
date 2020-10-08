<div class="container-fluid">

	<a href="<?= base_url('pendaftaran/tambah') ?>" class="btn btn-primary mb-3">Register</a>
	<?= $this->session->flashdata('message'); ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">TABEL REGISTRASI</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>No RM</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Nama Keluarga</th>
							<th>No HP</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<?php $i = 1; ?>
					<?php foreach ($pendaftaran as $p) : ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $p['rekam_medis'] ?></td>
							<td><?= $p['nik'] ?></td>
							<td><?= $p['nama'] ?></td>
							<td><?= $p['nama_keluarga'] ?></td>
							<td><?= $p['no_hp'] ?></td>
							<td>
								<a href="<?= base_url('pendaftaran/detail') ?>/<?= $p['rekam_medis'] ?>" class="badge badge-primary">Detail</a>
								<a href="<?= base_url('pendaftaran/ubah') ?>/<?= $p['rekam_medis'] ?>" class="badge badge-success">Ubah</a>
								<a href="<?= base_url('pendaftaran/hapus') ?>/<?= $p['rekam_medis'] ?>" class="badge badge-danger" onclick="return confirm('Yakin')">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>

				</table>
			</div>
		</div>
	</div>
</div>

</div>