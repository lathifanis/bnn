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
            <form action="<?= base_url('pendaftaran/simpanubah') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="no_rm" class="col-sm-2 col-form-label">No. RM</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?= $pasien['rekam_medis'] ?>" id="no_rm" name="no_rm" readonly>
                    </div>
                    <label for="nama" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pasien['nik'] ?>" class="form-control" id="nik" name="nik">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pasien['nama'] ?>" class="form-control" id="nama" name="nama">
                    </div>
                    <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pasien['no_hp'] ?>" class="form-control" id="no_hp" name="no_hp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jk" id="jk">
                            <option value="laki-laki"
                            <?php
                            if($pasien['jk']=='laki-laki'){
                            echo 'selected'; }
                            ?>
                            >Laki-laki</option>
                            <option value="perempuan"
                             <?php
                            if($pasien['jk']=='perempuan'){
                            echo 'selected'; }
                            ?>
                            >Perempuan</option>
                        </select>
                    </div>
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="pendidikan" id="pendidikan">
                            <option value="tidak sekolah"
                            <?php
                            if($pasien['pendidikan']=='tidak sekolah'){
                            echo 'selected'; }
                            ?>
                            >Tidak Sekolah</option>
                            <option value="sd"
                            <?php
                            if($pasien['pendidikan']=='sd'){
                            echo 'selected'; }
                            ?>
                            >SD</option>
                            <option value="sltp"
                            <?php
                            if($pasien['pendidikan']=='sltp'){
                            echo 'selected'; }
                            ?>
                            >SLTP</option>
                            <option value="slta"
                            <?php
                            if($pasien['pendidikan']=='slta'){
                            echo 'selected'; }
                            ?>
                            >SLTA</option>
                            <option value="d3"
                            <?php
                            if($pasien['pendidikan']=='d3'){
                            echo 'selected'; }
                            ?>
                            >D3</option>
                            <option value="s1"
                            <?php
                            if($pasien['pendidikan']=='s1'){
                            echo 'selected'; }
                            ?>
                            >S1</option>
                            <option value="s2"
                            <?php
                            if($pasien['pendidikan']=='s2'){
                            echo 'selected'; }
                            ?>
                            >S2</option>
                            <option value="s3"
                            <?php
                            if($pasien['pendidikan']=='s3'){
                            echo 'selected'; }
                            ?>
                            >S3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pasien['tempat_lahir'] ?>" name="tempat_lahir" class="form-control">
                    </div>
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                        <input type="date" value="<?= $pasien['tgl_lahir'] ?>" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" onFocus="startCalc();" onBlur="stopCalc();">
                        <input type="text" hidden name="tgl" id="tgl" value="<?php echo date('Y-m-d'); ?>" placeholder="Masukkan Usia Klien">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Usia</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pasien['umur'] ?>" readonly name="usia" id="usia" class="form-control">
                    </div>
                    <label for="suku" class="col-sm-2 col-form-label">Suku</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pasien['suku'] ?>" name="suku" id="suku" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="agama" id="agama">
                            <option value="islam"
                            <?php
                            if($pasien['agama']=='islam'){
                            echo 'selected'; }
                            ?>
                            >Islam</option>
                            <option value="kristen"
                            <?php
                            if($pasien['agama']=='kristen'){
                            echo 'selected'; }
                            ?>
                            >Kristen</option>
                            <option value="khatolik"
                            <?php
                            if($pasien['agama']=='khatolik'){
                            echo 'selected'; }
                            ?>
                            >Khatolik</option>
                            <option value="hindu"
                            <?php
                            if($pasien['agama']=='hindu'){
                            echo 'selected'; }
                            ?>
                            >Hindu</option>
                            <option value="budha"
                            <?php
                            if($pasien['agama']=='budha'){
                            echo 'selected'; }
                            ?>
                            >Budha</option>
                        </select>
                    </div>
                    <label for="status_menikah" class="col-sm-2 col-form-label">Status Menikah</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="status_menikah" id="status_menikah">
                            <option value="menikah"
                            <?php
                            if($pasien['pernikahan']=='menikah'){
                            echo 'selected'; }
                            ?>
                            >Menikah</option>
                            <option value="belum"
                            <?php
                            if($pasien['pernikahan']=='belum'){
                            echo 'selected'; }
                            ?>
                            >Belum Menikah</option>
                            <option value="duda"
                            <?php
                            if($pasien['pernikahan']=='duda'){
                            echo 'selected'; }
                            ?>
                            >Duda</option>
                            <option value="janda"
                            <?php
                            if($pasien['pernikahan']=='janda'){
                            echo 'selected'; }
                            ?>
                            >Janda</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pasien['pekerjaan'] ?>" class="form-control" id="pekerjaan" name="pekerjaan">
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Gol Darah</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?= $pasien['golongan_darah'] ?>" name="goldarah" id="goldarah">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" value="<?= $pasien['alamat']?>" name="alamat" id="alamat"><?= $pasien['alamat']?></textarea>
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Berkas KTP / KK</label>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input type="file" value="<?= $pasien['berkas_identitas'] ?>" class="custom-file-input" accept=".jpg, .jpeg, .pdf" name="berkas_identitas" id="customFile">
                            <label class="custom-file-label" for="customFile" value="<?= $pasien['berkas_identitas'] ?>"><?= $pasien['berkas_identitas'] ?></label>
                        </div>
                    </div>
                </div>
                <br>
                <h1 class="h3 mb-4 text-gray-800">Keluarga Yang Dapat Dihubungi</h1>
                <hr>
                <div class="form-group row">
                    <label for="nama_keluarga" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_keluarga" value="<?= $pasien['nama_keluarga'] ?>" id="nama_keluarga" class="form-control">
                    </div>
                    <label for="hubungan" class="col-sm-2 col-form-label">Hubungan</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pasien['hubungan'] ?>" name="hubungan" class="form-control" id="hubungan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_keluarga" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" value="<?= $pasien['alamat_keluarga'] ?>" name="alamat_keluarga"><?= $pasien['alamat_keluarga'] ?></textarea>
                    </div>
                    <label for="no_telp" class="col-sm-2 col-form-label">No Telp / HP</label>
                    <div class="col-sm-4">
                        <input type="text" name="no_telp" value="<?= $pasien['no_hp_keluarga'] ?>" class="form-control" id="no_telp">
                    </div>
                </div>
                <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Berkas KTP</label>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" value="<?= $pasien['ktp_keluarga'] ?>" accept=".jpg, .jpeg, .pdf" name="ktp_keluarga" id="customFile">
                            <label class="custom-file-label" for="customFile"><?= $pasien['ktp_keluarga'] ?></label>
                        </div>
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Berkas KK</label>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input type="file" value="<?= $pasien['kk_keluarga'] ?>" class="custom-file-input" accept=".jpg, .jpeg, .pdf" name="kk_keluarga" id="customFile">
                            <label class="custom-file-label" for="customFile"><?= $pasien['kk_keluarga'] ?></label>
                        </div>
                    </div>
                </div>
                <br>
                <h1 class="h3 mb-4 text-gray-800">Riwayat Rehabilitas (Bila Ada)</h1>
                <hr>
                <div class="form-group row">
                    <label for="tempat_rehab" class="col-sm-2 col-form-label">Tempat Rehabilitas</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pasien['tempat_rehab'] ?>" name="tempat_rehab" class="form-control" id="tempat_rehab">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lama_rehab" class="col-sm-2 col-form-label">Lama Rehabilitas</label>
                    <div class="col-sm-10">
                        <input type="text" name="lama_rehab" value="<?= $pasien['lama_rehab'] ?>" class="form-control" id="lama_rehab">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="metode" class="col-sm-2 col-form-label">Metode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $pasien['metode_rehab'] ?>" name="metode" id="metode">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="dikirim" class="col-sm-2 col-form-label">Dikirim Oleh</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $pasien['dikirim_oleh'] ?>" id="dikirim" name="dikirim">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kasus" class="col-sm-2 col-form-label">Kasus Polisi</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kasus" id="kasus">
                            <option value="ya"
                            <?php
                            if($pasien['kasus_polisi']=='ya'){
                            echo 'selected'; }
                            ?>
                            >Ya</option>
                            <option value="tidak"
                            <?php
                            if($pasien['kasus_polisi']=='tidak'){
                            echo 'selected'; }
                            ?>
                            >Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berkas_pasien" class="col-sm-2 col-form-label">Berkas Data Pasien</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" value="<?= $pasien['berkas_pasien'] ?>" accept=".docx, .doc, .pdf" name="berkas_pasien" id="customFile">
                            <label class="custom-file-label" for="customFile"><?= $pasien['berkas_pasien'] ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berkas_register" class="col-sm-2 col-form-label">Berkas Registrasi</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept=".doc, .docx, .pdf" name="berkas_register" value="<?= $pasien['berkas_pendaftaran'] ?>" id="customFile">
                            <label class="custom-file-label" for="customFile"><?= $pasien['berkas_pendaftaran'] ?></label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" style="float:right">SIMPAN</button>
                        <a href="<?= base_url('pendaftaran') ?>" class="btn btn-success" style="float:left">KEMBALI</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>