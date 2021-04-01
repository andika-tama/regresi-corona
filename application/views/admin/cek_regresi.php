       <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">

           <!-- Main Content -->
           <div id="content">
               <!-- Begin Page Content -->

               <div class="container-fluid">

                   <!-- Page Heading -->
                   <h1 class="h3 mb-4 text-gray-800 mt-3">Prediksi COVID-19</h1>
                   <hr class="sidebar-divider">

                   <div class="alert alert-secondary mt-2 mb-2"> <i class="fa fa-folder"></i> Data Prediksi / <b>Prediksi Regresi Linier</b></div>

                   <hr class="sidebar-divider">
                   <div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary text-center">Forcasting Regresi Linier</h6>
                       </div>
                       <div class="card-body">
                           <?php
                            $i = 0;
                            $jml_data = 0;
                            foreach ($hari as $hk) {
                                $hari_pandemi[$i++] = $hk;
                                $jml_data++;
                            }
                            $i = 0;
                            foreach ($forcast as $fc) {
                                $prediksi[$i++] = $fc;
                            }
                            $i = 0;
                            foreach ($data_real as $dr) {
                                $asli[$i++] = $dr;
                            }
                            ?>
                           <table class="table table-striped table-bordered">
                               <thead>
                                   <tr>
                                       <th>Hari Ke-</th>
                                       <th>Jumlah Positif (Real)</th>
                                       <th>Jumlah Positif (Prediksi)</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <?php for ($i = 0; $i < $jml_data; $i++) : ?>
                                       <tr>
                                           <td><?php echo $hari_pandemi[$i]; ?></td>
                                           <td><?php echo $asli[$i]; ?></td>
                                           <td><?php echo $prediksi[$i]; ?></td>
                                       </tr>
                                   <?php endfor; ?>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
               <!-- /.container-fluid -->
           </div>
           <!-- End of Main Content -->