<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DATA GROUP TERAPHY</h6>
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
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($terapi as $t) {
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $t['rekam_medis'] ?></td>
								<td><?= $t['nik'] ?></td>
								<td><?= $t['nama'] ?></td>
								<?php
								if($t['status']=='selesai'){
									?>
									<td><h5><span class="badge badge-pill badge-success"><?= $t['status'] ?></span></h5></td>
									<?php
								} else{
									?>   
									<td><h5><span class="badge badge-pill badge-danger"><?= $t['status'] ?></span></h5></td>
								<?php } ?>
								<td>
									<h5><a href="<?= base_url('terapi/detail/' . $t['id_assesment']) ?>" class="badge badge-success">Detail</a></h5>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>