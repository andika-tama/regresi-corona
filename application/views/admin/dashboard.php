<?php

//corona live

$url = file_get_contents('https://api.kawalcorona.com/indonesia');
$data = json_decode($url, true);

$positif = $data[0]["positif"];
$sembuh = $data[0]["sembuh"];
$meninggal = $data[0]["meninggal"];
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 mt-4 text-gray-800">Dashboard</h1>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Positif</h5>
                            <p class="card-text covid-total"><strong><?php echo $positif ?></strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pasien Sembuh</h5>
                            <p class="card-text covid-sembuh"><strong><?php echo $sembuh ?></strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pasien Meninggal</h5>
                            <p class="card-text covid-meninggal"><strong><?php echo $meninggal ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <canvas id="myChart"></canvas>
            <hr>

            <div class="konten-info">
                <div class="baris">
                    <div class="isi-konten">
                        <div class="card">
                            <div class="card-body bg-success text-white">Total Hari Perhitungan : <?php echo $jml_data; ?></div>
                        </div>
                    </div>
                    <div class="isi-konten tombol">
                        <button class="btn btn-info btn-block"><i class="fa fa-search mr-3"></i>Lihat Jumlah Positif</button>
                    </div>
                </div>
                <!-- Konten 2 -->
                <div class="baris">
                    <div class="isi-konten">
                        <div class="card">
                            <div class="card-body bg-danger text-white">Galat MAD : <?php echo $MAD; ?>%</div>
                        </div>
                    </div>
                    <div class="isi-konten tombol">
                        <button class="btn btn-warning btn-block"><i class="fas fa-percentage mr-3"></i> Lihat Perhitungan Galat</button>
                    </div>
                </div>

                <!-- konten 3 -->

                <div class="baris">
                    <div class="isi-konten kartu">
                        <div class="card kartu-var">
                            <div class="card-body bg-white">Variabel Y : <?php echo $big_Y; ?></div>
                        </div>
                    </div>
                    <div class="isi-konten kartu">
                        <div class="card kartu-var">
                            <div class="card-body bg-primary text-white">Variabel X : <?php echo $big_X; ?></div>
                        </div>
                    </div>
                </div>
                <!-- konten 4 -->
                <div class="baris">
                    <div class="isi-konten kartu">
                        <div class="card kartu-var">
                            <div class="card-body bg-primary text-white">Variabel b: <?php echo $small_b; ?></div>
                        </div>
                    </div>
                    <div class="isi-konten kartu">
                        <div class="card kartu-var">
                            <div class="card-body bg-white">Variabel a : <?php echo $small_a; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->


    <script>
        var ctx = document.getElementById('myChart'); //ctx berarti kita mengarah pada labek MyChart jadi selanjutnya hanya perlu pakai var ctx untuk ke label myChart  
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php for ($i = 0; $i < $jml_data; $i++) {
                                echo "' Hari Ke-" . intval($data_hari[$i]) . "' ,";
                            } ?>], //label untuk X
                datasets: [{
                    label: 'Data Korban Positif', //keterangan di atas grafik
                    data: [<?php for ($i = 0; $i < $jml_data; $i++) {
                                echo "'" . intval($data_pstf[$i]) . "' ,";
                            } ?>], //data grafiknya
                    backgroundColor: [ //warna untuk grafiknya jumlahnya harus sama banyaknya untuk tiap2 label dan data
                        'rgba(172, 236, 213, 0.7)'
                    ],
                    borderColor: [ //warna untuk border grafiknya
                        'rgba(172, 236, 213, 1)'
                    ],
                    borderWidth: 0.5
                }, ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true //garis Y (ke atas) mulai dari 0
                    }
                }
            }
        });
    </script>