<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">FORM ASESMEN</h6>
		</div>
		<?= $this->session->flashdata('message'); ?>
		<div class="card-body">
			<h1 class="h3 mb-4 text-gray-800">Formulir Konseling</h1>
			<hr>
			<form>
				<div class="form-group row">
					<label for="norm" class="col-sm-2 col-form-label">No. RM</label>
					<div class="col-sm-10">
						<select class='form-control fstdropdown-select' id="norm" name="norm" data-placeholder="Pilih Nomor Rekam Medis Pasien">
							<option value="">Pilih Rekam Medis</option>
							<option value="1">RM-09289938</option>
							<option value="2">RM-09289999038</option>
							<option value="3">RM-67898</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="kesimpulan" class="col-sm-2 col-form-label">Catatan</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="kesimpulan" id="kesimpulan"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="kesimpulan" class="col-sm-2 col-form-label">Terapi/Tindakan</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="kesimpulan" id="kesimpulan"></textarea>
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