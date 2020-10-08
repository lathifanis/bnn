<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">FORM ASESMEN</h6>
        </div>
        <div class="card-body">
            <h1 class="h3 mb-4 text-gray-800">Data Asesment Rekam Medis <?= $as['rekam_medis']?></h1>
            <hr>
            <form action="<?= base_url('assesment/simpanubah') ?>" method="post">
                <div class="form-group row">
                    <label for="norm" class="col-sm-2 col-form-label">No. RM</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?= $as['rekam_medis'] ?>" readonly name="norm" id="norm">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dokter" class="col-sm-2 col-form-label">Dokter</label>
                    <div class="col-sm-4">
                        <select class='form-control fstdropdown-select' id="dokter" name="dokter" data-placeholder="Pilih Nomor Rekam Medis Pasien">
                            <?php foreach ($dokter as $d) : ?>
                                <option value="<?= $d['id_dokter'] ?>"
                                    <?php 
                                    if($d['id_dokter']==$as['id_dokter']){
                                        echo 'selected';
                                    }?>
                                    ><?= $d['nama_dokter']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="perawat" class="col-sm-2 col-form-label">Perawat</label>
                    <div class="col-sm-4">
                        <select class='form-control fstdropdown-select' id="perawat" name="perawat" data-placeholder="Pilih Nomor Rekam Medis Pasien">
                            <?php foreach ($perawat as $p) : ?>
                                <option value="<?= $p['id_perawat'] ?>"
                                    <?php 
                                    if($p['id_perawat']==$as['id_perawat']){
                                        echo 'selected';
                                    }?>
                                    ><?= $p['nama_perawat'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kesimpulan" class="col-sm-2 col-form-label">Diagnosa</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?= $as['diagnosa'] ?>" name="diagnosa" id="diagnosa">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kesimpulan" class="col-sm-2 col-form-label">Hasil Urin</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?= $as['urin'] ?>" name="urin" id="urin">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kesimpulan" class="col-sm-2 col-form-label">Kesimpulan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="kesimpulan" id="kesimpulan"><?= $as['kesimpulan'] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tindaklanjut" class="col-sm-2 col-form-label">Tindak Lanjut</label>
                    <div class="col-sm-10">
                        <select class='form-control fstdropdown-select' id="tindaklanjut" data-placeholder="Pilih Nomor Rekam Medis Pasien" name="tindaklanjut">
                            <option value="Konseling"
                             <?php 
                             if($as['tindak_lanjut']=='Konseling'){
                                echo 'selected';
                            }?>
                            >Konseling</option>
                            <option value="Terapi"
                            <?php 
                             if($as['tindak_lanjut']=='Terapi'){
                                echo 'selected';
                            }?>
                            >Grup Terapi</option>
                            <option value="Medis"
                            <?php 
                             if($as['tindak_lanjut']=='Medis'){
                                echo 'selected';
                            }?>
                            >Medis</option>
                            <option value="Rawat Jalan"
                            <?php 
                             if($as['tindak_lanjut']=='Rawat Jalan'){
                                echo 'selected';
                            }?>
                            >Rawat Jalan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berkas_pernyataan" class="col-sm-2 col-form-label">Berkas Pernyataan</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="berkas_pernyataan" id="berkas_pernyataan">
                            <label class="custom-file-label" for="customFile">Pilih Berkas Pernyataan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berkas_asesmen" class="col-sm-2 col-form-label">Berkas Asesmen</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="berkas_asesmen" id="berkas_asesmen">
                            <label class="custom-file-label" for="customFile">Pilih Berkas Asesmen</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" style="float:right">SIMPAN</button>
                        <a href="<?= base_url('assesment') ?>" class="btn btn-success" style="float:left">KEMBALI</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>