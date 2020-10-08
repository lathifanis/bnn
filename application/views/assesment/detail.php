<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Assesment</h6>
        </div>
        <div class="card-body">
            <h1 class="h3 mb-4 text-gray-800">Data Asesment</h1>
            <hr>
            <div class="form-group row">
                <label for="norm" class="col-sm-2 col-form-label">No. RM</label>
                <div class="col-sm-4">
                    <input readonly class="form-control" type="text" class="form-control" id="norm" value="<?= $assesment['rekam_medis']; ?>">
                </div>
                <label for="norm" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                    <input readonly class="form-control" type="text" class="form-control" id="norm" value="<?= $assesment['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="dokter" class="col-sm-2 col-form-label">Dokter</label>
                <div class="col-sm-4">
                    <input readonly class="form-control" type="text" class="form-control" id="dokter" value="<?= $dokter['nama_dokter'] ?>">
                </div>
                <label for="perawat" class="col-sm-2 col-form-label">Perawat</label>
                <div class="col-sm-4">
                    <input type="text" readonly name="perawat" class="form-control" value="<?= $perawat['nama_perawat'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kesimpulan" class="col-sm-2 col-form-label">Diagnosa</label>
                <div class="col-sm-4">
                    <input type="text" readonly class="form-control" value="<?= $assesment['diagnosa']; ?>">
                </div>
                <label for="kesimpulan" class="col-sm-2 col-form-label">Kesimpulan</label>
                <div class="col-sm-4">
                    <input type="text" readonly class="form-control" value="<?= $assesment['kesimpulan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tindaklanjut" class="col-sm-2 col-form-label">Pemeriksaan Urin</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" readonly value="<?= $assesment['urin'] ?>">
                </div>
                <label for="tindaklanjut" class="col-sm-2 col-form-label">Tindak Lanjut</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" readonly value="<?= $assesment['tindak_lanjut'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="berkas_pernyataan" class="col-sm-2 col-form-label">Berkas Pernyataan</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <a href="<?= base_url('assets/a/' . $assesment['file']) ?>" target="blank">Download Surat Pernyataan</a>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="berkas_asesmen" class="col-sm-2 col-form-label">Berkas Asesmen</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <a href="<?= base_url('assets/b/' . $assesment['surat_pernyataan']) ?>" target="blank">Download Surat Asesmen</a>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <a href="<?= base_url('assesment') ?>" class="btn btn-primary">KEMBALI</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>