<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data <?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">FORM REGISTRASI</h6>
        </div>
        <div class="card-body">
            <h1 class="h3 mb-4 text-gray-800">Data Diri Pasien</h1>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="no_rm" class="col-sm-2 col-form-label">No. RM</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control-plaintext" value=": <?= $pasien['rekam_medis'] ?>" id="no_rm" name="no_rm" readonly>
                    </div>
                    <label for="nama" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-4">
                        <input type="text" value=": <?= $pasien['nik'] ?>" class="form-control-plaintext" id="nik" name="nik" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" value=": <?= $pasien['nama'] ?>" class="form-control-plaintext" id="nama" name="nama" readonly>
                    </div>
                    <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="col-sm-4">
                        <input type="text" value=": <?= $pasien['no_hp'] ?>" class="form-control-plaintext" id="no_hp" name="no_hp" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <input type="text" value=": <?= $pasien['jk'] ?>" readonly name="suku" id="suku" class="form-control-plaintext">
                    </div>
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-4">
                        <input type="text" value=": <?= $pasien['pendidikan'] ?>" readonly name="suku" id="suku" class="form-control-plaintext">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                        <input type="text" value=": <?= $pasien['tempat_lahir'] ?>" name="tempat_lahir" readonly class="form-control-plaintext">
                    </div>
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                        <input type="text" readonly value=": <?= $pasien['tgl_lahir'] ?>" name="tgl_lahir" id="tgl_lahir" class="form-control-plaintext" placeholder="Tanggal Lahir">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Usia</label>
                    <div class="col-sm-4">
                        <input type="text" value=": <?= $pasien['umur'] ?>" readonly name="usia" id="usia" class="form-control-plaintext">
                    </div>
                    <label for="suku" class="col-sm-2 col-form-label">Suku</label>
                    <div class="col-sm-4">
                        <input type="text" readonly value=": <?= $pasien['suku'] ?>" name="suku" id="suku" class="form-control-plaintext">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-4">
                        <input type="text" readonly value=": <?= $pasien['agama'] ?>" readonly name="suku" id="suku" class="form-control-plaintext">
                    </div>
                    <label for="status_menikah" class="col-sm-2 col-form-label">Status Menikah</label>
                    <div class="col-sm-4">
                     <input type="text" readonly value=": <?= $pasien['pernikahan'] ?>" readonly name="suku" id="suku" class="form-control-plaintext">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-4">
                        <input  readonly type="text" value=": <?= $pasien['pekerjaan'] ?>" class="form-control-plaintext" id="pekerjaan" name="pekerjaan">
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Gol Darah</label>
                    <div class="col-sm-4">
                        <input type="text"  readonly class="form-control-plaintext" value=": <?= $pasien['golongan_darah'] ?>" name="goldarah" id="goldarah">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control-plaintext" value=": <?= $pasien['alamat']?>" name="alamat" readonly  id="alamat">
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Berkas KTP / KK</label>
                    <div class="col-sm-4">
                     <a href="<?= base_url('assets/identitas pasien/' . $pasien['berkas_identitas']) ?>" class="form-control-plaintext" readonly target="blank">: Download Surat Pernyataan</a>
                    </div>
                </div>
                <br>
                <h1 class="h3 mb-4 text-gray-800">Keluarga Yang Dapat Dihubungi</h1>
                <hr>
                <div class="form-group row">
                    <label for="nama_keluarga" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_keluarga" value=": <?= $pasien['nama_keluarga'] ?>" id="nama_keluarga" readonly class="form-control-plaintext">
                    </div>
                    <label for="hubungan" class="col-sm-2 col-form-label">Hubungan</label>
                    <div class="col-sm-4">
                        <input type="text" value=": <?= $pasien['hubungan'] ?>" name="hubungan" class="form-control-plaintext" readonly id="hubungan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_keluarga" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control-plaintext" readonly value=": <?= $pasien['alamat_keluarga'] ?>" name="alamat_keluarga">
                    </div>
                    <label for="no_telp" class="col-sm-2 col-form-label">No Telp / HP</label>
                    <div class="col-sm-4">
                        <input type="text" name="no_telp" value=": <?= $pasien['no_hp_keluarga'] ?>" class="form-control-plaintext" readonly id="no_telp">
                    </div>
                </div>
                <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Berkas KTP</label>
                    <div class="col-sm-4">
                        <a href="<?= base_url('assets/ktp keluarga/' . $pasien['ktp_keluarga']) ?>" class="form-control-plaintext" readonly target="blank">: Download KTP Keluarga</a>
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Berkas KK</label>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <a href="<?= base_url('assets/kk keluarga/' . $pasien['kk_keluarga']) ?>" class="form-control-plaintext" readonly target="blank">: Download KK Keluarga</a>
                        </div>
                    </div>
                </div>
                <br>
                <h1 class="h3 mb-4 text-gray-800">Riwayat Rehabilitas (Bila Ada)</h1>
                <hr>
                <div class="form-group row">
                    <label for="tempat_rehab" class="col-sm-2 col-form-label">Tempat Rehabilitas</label>
                    <div class="col-sm-10">
                        <input type="text" value=": <?= $pasien['tempat_rehab'] ?>" name="tempat_rehab" readonly class="form-control-plaintext" id="tempat_rehab">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lama_rehab" class="col-sm-2 col-form-label">Lama Rehabilitas</label>
                    <div class="col-sm-10">
                        <input type="text" name="lama_rehab" value=": <?= $pasien['lama_rehab'] ?>" class="form-control-plaintext" readonly id="lama_rehab">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="metode" class="col-sm-2 col-form-label">Metode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" readonly value=": <?= $pasien['metode_rehab'] ?>" name="metode" id="metode">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="dikirim" class="col-sm-2 col-form-label">Dikirim Oleh</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" readonly value=": <?= $pasien['dikirim_oleh'] ?>" id="dikirim" name="dikirim">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kasus" class="col-sm-2 col-form-label">Kasus Polisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" readonly value=": <?= $pasien['kasus_polisi'] ?>" id="dikirim" name="dikirim">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berkas_pasien" class="col-sm-2 col-form-label">Berkas Data Pasien</label>
                    <div class="col-sm-10">
                         <a href="<?= base_url('assets/pasien/' . $pasien['berkas_pasien']) ?>" class="form-control-plaintext" readonly target="blank">: Download Berkas Pasien</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berkas_register" class="col-sm-2 col-form-label">Berkas Registrasi</label>
                    <div class="col-sm-10">
                        <a href="<?= base_url('assets/register/' . $pasien['berkas_pendaftaran']) ?>" class="form-control-plaintext" readonly target="blank">: Download Berkas Pendaftaran</a>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <a href="<?= base_url('pendaftaran') ?>" class="btn btn-success" style="float:left">KEMBALI</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>