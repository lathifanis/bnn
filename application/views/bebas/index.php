<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">FORM KONSELING</h6>
		</div>
		<div class="card-body">
			<form action="<?= base_url('bebas/simpan') ?>" method="post">
				<div class="form-group row">
					<label for="norm" class="col-sm-2 col-form-label">No. RM</label>
					<div class="col-sm-10">
						<select class='form-control fstdropdown-select' id="id_assesment" name="id_assesment" data-placeholder="Pilih Nomor Rekam Medis Pasien">
							<option>Pilih Assesment</option>
							<?php foreach ($ass as $a) : ?>
								<option value="<?= $a['id_assesment']  ?>"><?= $a['id_assesment']." - [".$a['rekam_medis']."] - [".$a['nama']."]"?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<br>
				<br>
				<div class="form-group row">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary" style="float:right">SIMPAN</button>
						<a href="<?= base_url('konseling') ?>" class="btn btn-success" style="float:left">KEMBALI</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DATA SURAT BEBAS NARKOBA</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						
						<tr>
							<th>No</th>
							<th>No. Surat</th>
							<th>No RM</th>
							<th>Nama</th>
							<th>Tgl Bebas</th>
							<th>Aksi</th>
						</tr>

					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach($surat as $s){ ?>
							<tr>
								<td><?= $no++?></td>
								<td><?= $s['no_surat']?></td>
								<td><?= $s['rekam_medis']?></td>
								<td><?= $s['nama']?></td>
								<td><?= $s['tgl_surat']?></td>
								<td>
									<a href="<?= base_url('bebas/cetak/?q='.$s['no_surat'])?>" target="blank">Cetak</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>