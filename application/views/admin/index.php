<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH PASIEN</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($pasien[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ($pasien[0]['jumlah']/100)*100;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH ASESMEN</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($assesment[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ($assesment[0]['jumlah']/100)*100;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-laptop-medical fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH KONSELING</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($konseling[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ($konseling[0]['jumlah']/100)*100;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-person-booth fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH GRUP TERAPI</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($terapi[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-theater-masks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH RAWAT JALAN</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($rawat[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ambulance fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH PASIEN BELUM SELESAI</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($belum[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH PASIEN SELESAI</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($selesai[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH SURAT BEBAS</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($bebas[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH PETUGAS</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($petugas[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH DOKTER</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($dokter[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH PERAWAT</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($perawat[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH PEGAWAI</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        print_r($perawat[0]['jumlah']+$dokter[0]['jumlah']+$petugas[0]['jumlah']);
                                        ?>
                                    </div>
                                    ORANG
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo (($perawat[0]['jumlah']+$dokter[0]['jumlah']+$petugas[0]['jumlah'])/100)*100;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEJARAH SINGKAT</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?= base_url('assets/img/Logo_BNN.png') ?>" alt="">
                </div>
                <p>&emsp;&emsp;&emsp;&emsp;Undang-Undang Nomor 22 Tahun 1997 tentang Narkotika. Berdasarkan Undang-Undang tersebut, maka dibentuklah Badan Koordinasi Narkotika Nasional yang selanjutnya disingkat (BKNN). Berdasarkan Keputusan Presiden Nomor 17 Tahun 2002 tentang Badan Narkotika Nasional, kedudukan BKNN selanjutnya diganti nama menjadi Badan Narkotika Nasional disingkat (BNN). Berdasarkan Peraturan Presiden Nomor 83 Tahun 2007 dibentuklah Badan Narkotika Propinsi (BNP) dan Badan Narkotika Kabupaten/Kota (BNK) yang masing-masing (BNP dan BNK) sebelumnya tidak mempunyai hubungan struktural secara vertikal dengan BNN.
                    Dalam Undang-Undang Nomor 35 Tahun 2009 tentang Narkotika, BNN diberikan kewenangan penyelidikan dan penyidikan tindak pidana Narkotika dan Prekursor Narkotika. Berdasarkan Peraturan Presiden Nomor 23 Tahun 2010 tentang Badan Narkotika Nasional, BNN berubah fungsi menjadi lembaga pemerintah non kementerian yang berkedudukan dibawah Presiden dan bertanggung jawab langsung kepada Presiden serta mempunyai perwakilan didaerah Provinsi dan Kabupaten/Kota sebagai instansi vertikal (BNN Provinsi, BNN Kabupaten/Kota) yang melaksanakan tugas, fungsi dan wewenang BNN di daerah. Pelantikan kepala BNN Kota Pekanbaru terbentuk berdasarkanSurat Keputusan Kepala BNN Nomor : KEP / 170 / IX/ 2011/BNN tanggal 30 September 2011 TentangPengangkatanKepala BNN Kota Pekanbaru AKBP 37 SUKITO, SH. BNN Kota Pekanbaru oleh Kepala BNN Republik Indonesia di Jakarta pada Tanggal 06 Oktober 2011, menjadi awal sejarah terbentuknya Badan Narkotika Nasional Kota Pekanbaru sebagai instansi vertikal Badan Narkotika Nasional yang melaksanakan tugas, fungsi dan wewenang dalam wilayah Kota Pekanbaru.
                    Dalam melaksanakan tugas dan wewenangnya BNN Kota Pekanbaru menyelenggarakan fungsi pelaksanaan kebijakan operasional Pencegahan dan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkoba (P4GN) dibidang pencegahan, pemberdayaan masyarakat dan rehabilitasi serta pemberantasan dalam rangka pemetaan jaringan kejahatan terorganisasi penyalahgunaan dan peredaran gelap Narkotika, Psikotropika, Prekusor dan Bahan Adiktif Lainnya kecuali untuk tembakau dan alkohol serta memonitor dan mengendalikan pelaksanaan P4GN diwilayah kota Pekanbaru.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">VISI</h6>
                    </div>
                    <div class="card-body">
                        <p>
                            <b>
                                <h3>Visi</h3>
                                <hr>
                            </b> Menjadi Lembaga Non Kementerian yang profesional dan mampu menggerakkan seluruh koponen masyarakat, bangsa dan negara Indonesia dalam melaksanakan Pencegahan dan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika, Psikotropika, Prekursor dan Bahan Adiktif Lainnya di Indonesia.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-8">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">MISI</h6>
                    </div>
                    <div class="card-body">
                        <p>
                            <b>
                                <h3>MISI</h3>
                                <hr>
                            </b>
                            1. Menyusun kebijakan nasional P4GN
                            <br>
                            2. Melaksanakan operasional P4GN sesuai bidang tugas dan kewenangannya.
                            <br>
                            3. Mengkoordinasikan pencegahan dan pemberantasan penyalahgunaan dan peredaran gelap narkotika, psikotropika, prekursor dan bahan adiktif lainnya (narkoba)
                            <br>
                            4. Memonitor dan mengendalikan pelaksanaan kebijakan nasional P4GN.
                            <br>
                            5. Menyusun laporan pelaksanaan kebijakan nasional P4GN dan diserahkan kepada Presiden. </p>
                    </div>
                </div>
            </div> <!-- /.container-fluid -->
        </div>
    </div>
    <div class="col-lg-12 mb-8">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">STRUKTUR ORGANISASI</h6>
            </div>
            <div class="card-body">
                <p>
                    Struktur Organisasi BNNK Pekanbaru sesuai dengan Peraturan Peraturan Kepala Badan Narkotika Nasional Nomor 23 Tahun 2017 tentang Perubahan kelima Atas Peraturan Kepala BNN Nomor 3 Tahun 2015 tentang Organisasi dan Tata Kerja Badan Narkotika Nasional Provinsi dan Badan Narkotika Nasional Kabupaten/Kota terdiri atas :
                    <br>
                    1. Kepala
                    <br>
                    2. Subbagian Umum
                    <br>
                    3. Seksi Pencegahan dan Pemberdayaan Masyarakat
                    <br>
                    4. Seksi Rehabilitasi
                    <br>
                    5. Seksi Pemberantasan
                </p>
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 45rem;" src="<?= base_url('assets/img/struktur.jpg') ?>" alt="">
                </div>
            </div>
        </div>
    </div>


</div>
<!-- End of Main Content -->