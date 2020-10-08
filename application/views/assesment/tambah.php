<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">FORM ASESMEN</h6>
		</div>
		<div class="card-body">
			<h1 class="h3 mb-4 text-gray-800">Data Asesment</h1>
			<hr>
			<form action="<?= base_url('assesment/simpan') ?>" method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="norm" class="col-sm-2 col-form-label">No. RM</label>
					<div class="col-sm-10">
						<select class='form-control fstdropdown-select' id="norm" name="norm" data-placeholder="Pilih Nomor Rekam Medis Pasien">
							<option>Pilih Rekam Medis</option>
							<?php foreach ($rekam_medis as $rm) : ?>
								<option value="<?= $rm['rekam_medis']  ?>"><?= $rm['rekam_medis'] . " / [" . $rm['nama'] . "]"  ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="dokter" class="col-sm-2 col-form-label">Dokter</label>
					<div class="col-sm-4">
						<select class='form-control fstdropdown-select' id="dokter" name="dokter" data-placeholder="Pilih Nomor Rekam Medis Pasien">
							<option>Pilih Dokter</option>
							<?php foreach ($dokter as $d) : ?>
								<option value="<?= $d['id_dokter'] ?>"><?= $d['nama_dokter']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<label for="perawat" class="col-sm-2 col-form-label">Perawat</label>
					<div class="col-sm-4">
						<select class='form-control fstdropdown-select' id="perawat" name="perawat" data-placeholder="Pilih Nomor Rekam Medis Pasien">
							<option>Pilih Perawat</option>
							<?php foreach ($perawat as $p) : ?>
								<option value="<?= $p['id_perawat'] ?>"><?= $p['nama_perawat'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="kesimpulan" class="col-sm-2 col-form-label">Diagnosa</label>
					<div class="col-sm-10">
						<input class="form-control" name="diagnosa" id="diagnosa">
					</div>
				</div>
				<div class="form-group row">
					<label for="kesimpulan" class="col-sm-2 col-form-label">Hasil Urin</label>
					<div class="col-sm-10">
						<input class="form-control" name="urin" id="urin">
					</div>
				</div>
				<div class="form-group row">
					<label for="kesimpulan" class="col-sm-2 col-form-label">Kesimpulan</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="kesimpulan" id="kesimpulan"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="tindaklanjut" class="col-sm-2 col-form-label">Tindak Lanjut</label>
					<div class="col-sm-10">
						<select class='form-control fstdropdown-select' id="tindaklanjut" data-placeholder="Pilih Nomor Rekam Medis Pasien" name="tindaklanjut">
							<option value="">Pilih Tindak Lanjut</option>
							<option value="Konseling">Konseling</option>
							<option value="Terapi">Grup Terapi</option>
							<option value="Medis">Medis</option>
							<option value="Rawat Jalan">Rawat Jalan</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="berkas_pernyataan" class="col-sm-2 col-form-label">Berkas Pernyataan</label>
					<div class="col-sm-10">
						<div class="custom-file">
							<input type="file" class="custom-file-input" accept=".docx, .doc, .pdf" name="berkas_pernyataan" id="customFile">
							<label class="custom-file-label" for="customFile">Pilih Berkas Pernyataan</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="berkas_asesmen" class="col-sm-2 col-form-label">Berkas Asesmen</label>
					<div class="col-sm-10">
						<div class="custom-file">
							<input type="file" class="custom-file-input" accept=".docx, .doc, .pdf" name="berkas_asesmen" id="customFile">
							<label class="custom-file-label" for="customFile">Pilih Berkas Asesmen</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary" style="float:right">SIMPAN</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>