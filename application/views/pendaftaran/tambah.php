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
            <form action="<?= base_url('pendaftaran/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="no_rm" class="col-sm-2 col-form-label">No. RM</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="no_rm" name="no_rm">
                    </div>
                    <label for="nama" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nik" name="nik">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jk" id="jk">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="pendidikan" id="pendidikan">
                            <option value="tidak sekolah">Tidak Sekolah</option>
                            <option value="sd">SD</option>
                            <option value="sltp">SLTP</option>
                            <option value="slta">SLTA</option>
                            <option value="d3">D3</option>
                            <option value="s1">S1</option>
                            <option value="s2">S2</option>
                            <option value="s3">S3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                        <input type="text" name="tempat_lahir" class="form-control">
                    </div>
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" onFocus="startCalc();" onBlur="stopCalc();">
                        <input type="text" hidden name="tgl" id="tgl" value="<?php echo date('Y-m-d'); ?>" placeholder="Masukkan Usia Klien">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Usia</label>
                    <div class="col-sm-4">
                        <input type="text" readonly name="usia" id="usia" class="form-control">
                    </div>
                    <label for="suku" class="col-sm-2 col-form-label">Suku</label>
                    <div class="col-sm-4">
                        <input type="text" name="suku" id="suku" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="agama" id="agama">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="khatolik">Khatolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                        </select>
                    </div>
                    <label for="status_menikah" class="col-sm-2 col-form-label">Status Menikah</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="status_menikah" id="status_menikah">
                            <option value="menikah">Menikah</option>
                            <option value="belum">Belum Menikah</option>
                            <option value="duda">Duda</option>
                            <option value="janda">Janda</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Gol Darah</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="goldarah" id="goldarah">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="alamat" id="alamat"></textarea>
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Berkas KTP / KK</label>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept=".jpg, .jpeg, .pdf" name="berkas_identitas" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih Berkas</label>
                        </div>
                    </div>
                </div>
                <br>
                <h1 class="h3 mb-4 text-gray-800">Keluarga Yang Dapat Dihubungi</h1>
                <hr>
                <div class="form-group row">
                    <label for="nama_keluarga" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_keluarga" id="nama_keluarga" class="form-control">
                    </div>
                    <label for="hubungan" class="col-sm-2 col-form-label">Hubungan</label>
                    <div class="col-sm-4">
                        <input type="text" name="hubungan" class="form-control" id="hubungan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_keluarga" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="alamat_keluarga"></textarea>
                    </div>
                    <label for="no_telp" class="col-sm-2 col-form-label">No Telp / HP</label>
                    <div class="col-sm-4">
                        <input type="text" name="no_telp" class="form-control" id="no_telp">
                    </div>
                </div>
                <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Berkas KTP</label>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept=".jpg, .jpeg, .pdf" name="ktp_keluarga" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih Berkas</label>
                        </div>
                    </div>
                    <label for="alamat" class="col-sm-2 col-form-label">Berkas KK</label>
                    <div class="col-sm-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept=".jpg, .jpeg, .pdf" name="kk_keluarga" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih Berkas</label>
                        </div>
                    </div>
                </div>
                <br>
                <h1 class="h3 mb-4 text-gray-800">Riwayat Rehabilitas (Bila Ada)</h1>
                <hr>
                <div class="form-group row">
                    <label for="tempat_rehab" class="col-sm-2 col-form-label">Tempat Rehabilitas</label>
                    <div class="col-sm-10">
                        <input type="text" name="tempat_rehab" class="form-control" id="tempat_rehab">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lama_rehab" class="col-sm-2 col-form-label">Lama Rehabilitas</label>
                    <div class="col-sm-10">
                        <input type="text" name="lama_rehab" class="form-control" id="lama_rehab">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="metode" class="col-sm-2 col-form-label">Metode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="metode" id="metode">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="dikirim" class="col-sm-2 col-form-label">Dikirim Oleh</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="dikirim" name="dikirim">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kasus" class="col-sm-2 col-form-label">Kasus Polisi</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kasus" id="kasus">
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berkas_pasien" class="col-sm-2 col-form-label">Berkas Data Pasien</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept=".docx, .doc, .pdf" name="berkas_pasien" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih Berkas</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berkas_register" class="col-sm-2 col-form-label">Berkas Registrasi</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept=".doc, .docx, .pdf" name="berkas_register" id="customFile">
                            <label class="custom-file-label" for="customFile">Pilih Berkas</label>
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