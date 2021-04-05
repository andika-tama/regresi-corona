       <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">

           <!-- Main Content -->
           <div id="content">
               <!-- Begin Page Content -->

               <div class="container-fluid">

                   <!-- Page Heading -->
                   <h1 class="h3 mb-4 text-gray-800 mt-3">Data Korban Positif COVID-19</h1>
                   <hr class="sidebar-divider">

                   <div class="alert alert-secondary mt-2 mb-2"> <i class="fa fa-folder"></i> Data Real / <b>Data Korban Positif</b></div>

                   <hr>

                   <div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary text-center">Grafik Korban Positif Covid-19 Indonesia</h6>
                       </div>
                       <div class="card-body">
                           <div class="text-center">
                               <canvas id="myChart"></canvas>
                           </div>
                       </div>
                   </div>

                   <hr class="sidebar-divider">
                   <div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary text-center">Data Real Korban Positif</h6>
                       </div>
                       <div class="card-body">
                           <table class="table table-striped table-bordered">
                               <thead>
                                   <tr>
                                       <th>Hari Ke-</th>
                                       <th>Tanggal</th>
                                       <th>Jumlah Positif</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <?php foreach ($corona as $cr) : ?>
                                       <tr>
                                           <td><?php echo $cr->hari_ke; ?></td>
                                           <td><?php echo $cr->tgl; ?></td>
                                           <td><?php echo $cr->jml_pstf; ?></td>
                                       </tr>
                                   <?php endforeach; ?>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <!-- /.container-fluid -->
           </div>
           <!-- End of Main Content -->

           <script>
               var ctx = document.getElementById('myChart'); //ctx berarti kita mengarah pada labek MyChart jadi selanjutnya hanya perlu pakai var ctx untuk ke label myChart
               var myChart = new Chart(ctx, {
                   type: 'line',
                   data: {
                       labels: [<?php foreach ($corona as $cr) {
                                    echo "' Hari Ke-" . $cr->hari_ke . "' ,";
                                } ?>], //label untuk X
                       datasets: [{
                           label: 'Data Korban Positif', //keterangan di atas grafik
                           data: [<?php foreach ($corona as $cr) {
                                        echo "'" . $cr->jml_pstf . "' ,";
                                    } ?>], //data grafiknya
                           backgroundColor: [ //warna untuk grafiknya jumlahnya harus sama banyaknya untuk tiap2 label dan data
                               'rgba(255, 99, 132, 0.2)'
                           ],
                           borderColor: [ //warna untuk border grafiknya
                               'rgba(255, 99, 132, 1)'
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