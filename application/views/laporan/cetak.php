<?php
error_reporting();
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

function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>LAPORAN - BNN PEKANBARU</title>
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    
    .toggleDisplay {
        display: none;
    }
    .toggleDisplay.in {
        display: table-cell;
    }
</style>

<body>
    <img style="margin-top: 3%" src="<?php echo base_url(); ?>assets/img/kop_bnn_landscape.PNG" class="image" width="1000px">
    <h3 style="margin-left:40%">LAPORAN DATA PASIEN BARU</h3>
    <br>
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

    $dari_ = explode("-",$_GET['d']);
    $dari_bulan = $bulan[$dari_[1]];
            // print_r($dari_bulan);
    $sampai_ = explode("-",$_GET['s']);
    $sampai_bulan = $bulan[$sampai_[1]];
            // print_r($sampai_bulan);

    ?>
    <p style="margin-left: 8%">Bulan : <?php  if($dari_bulan == $sampai_bulan){
        echo $dari_bulan;
    }
    else{
        echo $dari_bulan." - ".$sampai_bulan;
    } ?></p>
    <p style="margin-left: 8%">Tahun : <?php 
    if($dari_[0] == $sampai_[0]){
        echo $dari_[0];
    }
    else{
        echo $dari_[0]." - ".$sampai_[0];
    }
    ?></p>
    <br>
    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th class="toggleDisplay">Nama</th>
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
                    <td class="toggleDisplay"><?= $l['nama']?></td>
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
                            <!--    <td>
                                    <a href="<?= base_url('bebas/cetak/?q='.$l['no_surat'])?>" target="blank">Cetak</a>
                                </td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <p style="margin-right: 10%;text-align:right">Mengetahui:</p>
                <p style="margin-right: 4%;text-align:right">Kepala BNNK Pekanbaru</p>
                <br>
                <br>
                <p style="margin-right: 3%;text-align:right"><?php echo $pimpinan[0]['nama_pegawai'] ?></p>
            </body>
            </html>
