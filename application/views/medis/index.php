<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DATA MEDIS</h6>
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
						foreach ($medis as $m) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $m['rekam_medis'] ?></td>
								<td><?= $m['nik'] ?></td>
								<td><?= $m['nama'] ?></td>
								<?php
								if($m['status']=='selesai'){
									?>
									<td><h5><span class="badge badge-pill badge-success"><?= $m['status'] ?></span></h5></td>
									<?php
								} else{
									?>   
									<td><h5><span class="badge badge-pill badge-danger"><?= $m['status'] ?></span></h5></td>
								<?php } ?>
								<td>
									<h5><a href="<?= base_url('medis/detail/' . $m['id_assesment']) ?>" class="badge badge-success">Detail</a></h5>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>