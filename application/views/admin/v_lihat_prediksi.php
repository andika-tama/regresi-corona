<?php
$i = 0;
$jml_data = 0;
foreach ($hari as $hk) {
    $hari_pandemi[$i++] = $hk;
    $jml_data++;
}

$jml_hari = 0;
$i = 0;
foreach ($prediksi_kedepan as $pk) {
    $ramalan[$i++] = $pk;
    $jml_hari++;
}

if ($this->input->post('jml_hari') != NULL) {
    $isi = $this->input->post('jml_hari');
} else {
    $isi = '';
}
?>

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

            <hr>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Input Banyak Hari</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <form method="post" action="<?php echo base_url('admin/lihat_prediksi') ?>">
                            <div class="row text-center">
                                <div class="col-3"></div>
                                <div class="col-4">
                                    <input type="number" name="jml_hari" class="form-control" value="<?php echo $isi ?>">
                                </div>
                                <div class="col lg-2 text-left">
                                    <button class="btn btn-success">Lihat Prediksi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="sidebar-divider">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Prediksi Jumlah Positif Untuk <?php echo $jml_hari ?> Hari Kedepan</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Hari Ke-</th>
                                <th>Jumlah Positif (Prediksi)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < $jml_hari; $i++) : ?>
                                <tr>
                                    <td><?php echo $hari_pandemi[$jml_data - 1] + $i + 1; ?></td>
                                    <td><?php echo $ramalan[$i]; ?></td>
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