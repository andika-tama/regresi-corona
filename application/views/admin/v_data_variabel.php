       <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">

           <!-- Main Content -->
           <div id="content">
               <!-- Begin Page Content -->

               <div class="container-fluid">

                   <!-- Page Heading -->
                   <h1 class="h3 mb-4 text-gray-800 mt-3">Data Variabel Regresi Linier (Model)</h1>
                   <hr class="sidebar-divider">

                   <div class="alert alert-secondary mt-2 mb-2"> <i class="fa fa-folder"></i> Data Prediksi / <b>Data Variabel</b></div>

                   <hr class="sidebar-divider">
                   <div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary text-center">Data Variabel Regresi Linier</h6>
                       </div>
                       <div class="card-body">
                           <?php foreach ($regresi as $rs) : ?>
                               <table class="table table-striped table-bordered">
                                   <tr>
                                       <th>X (Big X)</th>
                                       <td width="30px" class="text-center"> : </td>
                                       <td><?php echo $rs->big_x; ?></td>
                                   </tr>
                                   <tr>
                                       <th>Y (Big Y)</th>
                                       <td width="30px" class="text-center"> : </td>
                                       <td><?php echo $rs->big_y; ?></td>
                                   </tr>
                                   <tr>
                                       <th>a (Small A)</th>
                                       <td width="30px" class="text-center"> : </td>
                                       <td><?php echo $rs->small_a; ?></td>
                                   </tr>
                                   <tr>
                                       <th>b (Small B)</th>
                                       <td width="30px" class="text-center"> : </td>
                                       <td><?php echo $rs->small_b; ?></td>
                                   </tr>
                                   <tr>
                                       <th>Jumlah Data</th>
                                       <td width="30px" class="text-center"> : </td>
                                       <td><?php echo $rs->jml_data; ?></td>
                                   </tr>
                               <?php endforeach; ?>
                               </table>
                       </div>
                   </div>
               </div>
               <!-- /.container-fluid -->
           </div>
           <!-- End of Main Content -->