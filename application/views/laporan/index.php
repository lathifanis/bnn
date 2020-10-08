<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">LAPORAN</h6>
		</div>
		<div class="card-body">
			<form action="<?= base_url('laporan') ?>" method="post">
				<div class="form-group row">
					<label for="norm" class="col-sm-1 col-form-label">Dari</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" name="dari" id="dari">
					</div>
					<label for="norm" class="col-sm-1 col-form-label">Sampai</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" name="sampai" id="sampai">
					</div>
				</div>
				<br>
				<br>
				<div class="form-group row">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary" style="float:right">TAMPILKAN</button>
						<a href="<?= base_url('konseling') ?>" class="btn btn-success" style="float:left">KEMBALI</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DATA LAPORAN</h6>
		</div>
		<div class="card-body">
			<br>
			<?php 
			if(isset($_POST['dari'])){?>
				Bulan : 
				<?php

				$bulan = array(
					'01' => 'Januari',
					'02' => 'Februari',
					'03' => 'Maret',
					'04' => 'April',
					'05' => 'Mei',
					'06' => 'Juni',
					'07' => 'Juli',
					'08' => 'Agustus',
					'09' => 'September',
					'10' => 'Oktober',
					'11' => 'November',
					'12' => 'Desember',
				);

				$dari_ = explode("-",$_POST['dari']);
				$dari_bulan = $bulan[$dari_[1]];
			// print_r($dari_bulan);
				$sampai_ = explode("-",$_POST['sampai']);
				$sampai_bulan = $bulan[$sampai_[1]];
			// print_r($sampai_bulan);
				if($dari_bulan == $sampai_bulan){
					echo $dari_bulan;
				}
				else{
					echo $dari_bulan." - ".$sampai_bulan;
				} 
				?>
				<br>
				<br>
				Tahun : <?php
				if($dari_[0] == $sampai_[0]){
					echo $dari_[0];
				}
				else{
					echo $dari_[0]." - ".$sampai_[0];
				}
			} 
			?>
			
			<div class="table-responsive mt-5">
				<table class="table table-bordered" id="example" class="display" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>No RM</th>
							<th>Alamat</th>
							<th>Umur</th>
							<th>JK</th>
							<th>Pendidikan</th>
							<th>Pekerjaan</th>
							<th>Status</th>
							<th>Riwayat</th>
							<th>Asal Rujukan</th>
							<th>Diagnosa</th>
							<th>Pemeriksaan Urin</th>
							<th>Terapi</th>
						</tr>

					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach($laporan as $l){ ?>
							<tr>
								<td><?= $no++?></td>
								<td><?= $l['nama']?></td>
								<td><?= $l['tgl_daftar']?></td>
								<td><?= $l['rekam_medis']?></td>
								<td><?= $l['alamat']?></td>
								<td><?= $l['umur']?></td>
								<td><?= $l['jk']?></td>
								<td><?= $l['pendidikan']?></td>
								<td><?= $l['pekerjaan']?></td>
								<td><?= $l['pernikahan']?></td>
								<td><?= $l['metode_rehab']?></td>
								<td><?= $l['dikirim_oleh']?></td>
								<td><?= $l['diagnosa']?></td>
								<td><?= $l['urin']?></td>
								<td><?= $l['tindak_lanjut']?></td>
							<!-- 	<td>
									<a href="<?= base_url('bebas/cetak/?q='.$l['no_surat'])?>" target="blank">Cetak</a>
								</td> -->
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<br>
				<br>
				<?php if(isset($_POST['dari'])){ ?>
					<form method="post" id="framework_form" action="<?= base_url('laporan/cetak/?d=').$_POST['dari'].'&s='.$_POST['sampai']?>">
						<button type="submit" class="btn btn-success mb-4" style="float:right" target="blank">CETAK</button>
					</form>
				<?php } ?>
			</div>
		</div>
	</div>