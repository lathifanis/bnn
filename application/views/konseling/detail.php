<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">FORM KONSELING</h6>
		</div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<form
			<?php if($jumlah[0]['jumlah']>=8){?> 
				action="<?= base_url('assesment/status') ?>"
			<?php }else{?>
				action="<?= base_url('konseling/simpan') ?>"
			<?php } ?>
			method="post" class="form">
			<div class="form-group row" hidden>
				<label for="kesimpulan" class="col-sm-2 col-form-label">Id Assesment</label>
				<div class="col-sm-10">
					<?php 
					$tanggal = date('dmY');
					foreach ($ass as $a) { ?>
						<input type="text" readonly value="<?= $a['id_assesment'] ?>" name="idassesment" class="form-control" name="kesimpulan" id="kesimpulan">
						<input type="text" readonly value="<?= $a['id_assesment'].$tanggal ?>" name="id_konseling" class="form-control">
					<?php } ?>
				</div>
			</div>
			<div
			<?php if($jumlah[0]['jumlah']>=8){?>
				style="display: none"
			<?php } else{?>
				style="display: block"
			<?php } ?>
			>
			<div class="form-group row" hidden>
				<label for="kesimpulan" class="col-sm-2 col-form-label">Catatan</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="id_kons" id="id_kons"></textarea>
				</div>
			</div>
			<div class="form-group row" >
				<label for="kesimpulan" class="col-sm-2 col-form-label">Catatan</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="catatan" id="catatan"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="kesimpulan" class="col-sm-2 col-form-label">Terapi/Tindakan</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="terapi" id="terapi"></textarea>
				</div>
			</div>
		</div>
		<div
		<?php if($jumlah[0]['jumlah']>=8){?>
			style="display: block"
		<?php } else{?>
			style="display: none"
		<?php } ?>
		>
		<div class="form-group row">
			<label for="norm" class="col-sm-2 col-form-label">Status</label>
			<div class="col-sm-10">
				<select class='form-control fstdropdown-select' name="status" data-placeholder="Pilih Nomor Rekam Medis Pasien">
					<option value="">Pilih Status</option>
					<option value="selesai">Selesai</option>
					<option value="belum">Belum</option>
				</select>
			</div>
		</div>
	</div>

	<br>
	<br>
	<div class="form-group row">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-primary" name="simpan" id="simpan" style="float:right">SIMPAN</button>
			<button type="submit" class="btn btn-dark" id="edit" style="float:right;display: none">UBAH</button>
			<a href="javascript:;" class="btn btn-danger" id="batal" style="float:right;display: none;margin-right: 10px">BATAL</a>
			<a href="<?= base_url('konseling') ?>" class="btn btn-success" style="float:left">KEMBALI</a>
		</div>
	</div>
</form>
</div>
</div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">DETAIL KONSELING</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Catatan</th>
						<th>Terapi/Tindakan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($det_kon as $dk) { ?>
						<tr>
							<td><?= $np = $no++ ?></td>
							<td><?= $dk['tgl_konseling'] ?></td>
							<td><?= $dk['catatan'] ?></td>
							<td><?= $dk['terapi'] ?></td>
							<td>
								<a href="javascript:;" class="badge badge-success tomboleditkonseling" data-id="<?= $dk['id_konseling'] ?>">Edit</a>
								<a href="<?= base_url('konseling/hapus/'.$dk['id_konseling'].'?di='.$dk['id_assesment']) ?>" class="badge badge-danger">Hapus</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>