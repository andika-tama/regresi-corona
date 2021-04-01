       <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">

           <!-- Main Content -->
           <div id="content">
               <!-- Begin Page Content -->

               <div class="container-fluid">

                   <!-- Page Heading -->
                   <h1 class="h3 mb-4 text-gray-800 mt-3">Dara Korban Positif COVID-19</h1>
                   <hr class="sidebar-divider">

                   <div class="alert alert-secondary mt-2 mb-2"> <i class="fa fa-folder"></i> Data Real / <b>Data Korban Positif</b></div>

                   <hr class="sidebar-divider">
                   <div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary text-center">Data Real Korban Positif</h6>
                       </div>
                       <div class="card-body">
                           <?php //echo $this->session->flashdata('pesan') 
                            ?>
                           <?php foreach ($corona as $cr) {
                                $hari       = $cr->hari_ke;
                                $tanggal    = $cr->tgl;
                                $tgl_fix    = date('d-m-Y', strtotime('+1 days', strtotime($tanggal)));
                            } ?>
                           <form method="POST" action="<?php echo base_url('admin/input_data') ?>">
                               <div class="item form-group">
                                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Hari Ke-
                                   </label>
                                   <div class="col-md-6 col-sm-6 ">
                                       <input type="number" id="first-name" name="hari" class="form-control" value="<?php echo $hari + 1; ?>" disabled>
                                       <input type="hidden" id="first-name" name="hari" class="form-control" value="<?php echo $hari + 1; ?>">
                                   </div>
                               </div>
                               <div class="item form-group">
                                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal
                                   </label>
                                   <div class="col-md-6 col-sm-6 ">
                                       <input type="text" id="first-name" name="tgl" class="form-control" required="required" value="<?php echo $tgl_fix; ?>" disabled>
                                       <input type="hidden" id="first-name" name="tgl" class="form-control" required="required" value="<?php echo $tgl_fix; ?>">
                                   </div>
                               </div>
                               <div class="item form-group">
                                   <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jumlah Positif
                                   </label>
                                   <div class="col-md-6 col-sm-6 ">
                                       <input type="number" id="first-name" name="jml_pstf" class="form-control" required="required">
                                   </div>
                               </div>
                               <div class="item form-group">
                                   <div class="col-md-6 col-sm-6 ">
                                       <button type="submit" class="btn btn-primary">Tambah</button>
                                   </div>
                               </div>

                           </form>
                       </div>
                   </div>
               </div>
               <!-- /.container-fluid -->
           </div>
           <!-- End of Main Content -->