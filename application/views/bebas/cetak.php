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
    <title>SURAT KETERANGAN BEBAS REHABILITASI - BNN PEKANBARU</title>
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
</style>

<body>
    <img style="margin-left: 8%" src="<?php echo base_url(); ?>assets/img/kop_bnn.PNG" class="image" width="8000px">
    <!-- <h3 style="margin-left:30%">RINCIAN BIAYA PERJALAN DINAS</h3> -->
    <!-- <hr size="10px"> -->
    <br>
    <h4 style="margin-left: 48%;"><u>SURAT KETERANGAN</u></h4>
    <p style="margin-left: 30%;">NOMOR : <?php echo$surat[0]['no_surat'] ?> </p>
    <br>
    <?php 
    $bulan_pecah = explode('-',$surat[0]['tgl_surat']);
    $bulan_datang = explode('-',$surat[0]['tgl_kedatangan']);
    // echo"<pre>";
    // print_r($bulan[$bulan_pecah[1]]);
    // echo"</pre>";
    ?>
    <p style="margin-left: 12%">Saya yang bertanda tangan di bawah ini :</p>
    <p style="margin-left: 12%">Nama &emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $pimpinan[0]['nama_pegawai'] ?></p>
    <p style="margin-left: 12%">NIP/NRP &emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;: <?php echo $pimpinan[0]['nip'] ?></p>
    <p style="margin-left: 12%">Jabatan &emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;: <?php echo $pimpinan[0]['jabatan'] ?></p>
    <br>
    <p style="margin-left: 12%">Dengan ini menyatakan bahwa :</p>
    <p style="margin-left: 12%">Nama &emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $surat[0]['nama'] ?></p>
    <p style="margin-left: 12%">Tempat/Tanggal Lahir &nbsp;&nbsp;: <?php echo $surat[0]['tempat_lahir']." / ".tgl_indo($surat[0]['tgl_lahir']) ?></p>
    <p style="margin-left: 12%">Jenis Kelamin &emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;: <?php echo $surat[0]['jk'] ?></p>
    <p style="margin-left: 12%">Agama &emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $surat[0]['agama'] ?></p>
    <p style="margin-left: 12%">Alamat &emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $surat[0]['alamat'] ?></p>
    <br>
    <p style="margin-left: 12%">Telah mengikuti Rehabilitasi <b><?php if($surat[0]['tindak_lanjut']=="Rawat"){
        echo "Rawat Jalan";
    } ?></b> pada <b><?php echo $bulan[$bulan_datang[1]]; ?></b> sampai <b><?php echo $bulan[$bulan_pecah[1]]; ?></b> di Klinik Pratama BNNK Pekanbaru selama 8 kali pertemuan</p>
    <p style="margin-left: 12%">Demikian surat ini dibuat agar dapat dipergunakan sebagai mestinya</p>
    <br>
    <p style="margin-right: 3%;text-align:right">Pekanbaru, <?php echo tgl_indo($surat[0]['tgl_surat']) ?></p>
    <p style="margin-right: 10%;text-align:right">Mengetahui:</p>
    <p style="margin-right: 4%;text-align:right">Kepala BNNK Pekanbaru</p>
    <br>
    <br>
    <p style="margin-right: 3%;text-align:right"><?php echo $pimpinan[0]['nama_pegawai'] ?></p>
</body>
</html>
