<?php
$i = 0;
$jml_data = 0;
//ambil data asli
foreach ($real as $rl) {
    $hari_pandemi[$i] = $rl->hari_ke;
    $jml_pstf[$i++] = $rl->jml_pstf;
    $jml_data++;
}
//ambil data prediksi
$i = 0;
foreach ($forcast as $fc) {
    $prediksi[$i++] = $fc;
}
//ambil data zifi
$i = 0;
foreach ($xifi as $xf) {
    $xifi[$i++] = $xf;
}
?>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800 mt-3">Perhitungan MAD</h1>
            <hr class="sidebar-divider">

            <div class="alert alert-secondary mt-2 mb-2"> <i class="fa fa-folder"></i> Akurasi / <b>Galat MAD</b></div>

            <hr class="sidebar-divider">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Galat Prediksi Regresi Linier</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h6>Berdasarkan perhitungan MAD, galat prediksi Regresi Linier adalah sebesar :</h6>
                    </div>
                    <br>
                    <div class="text-center">
                        <h3><?php echo $MAD ?>%</h3>
                    </div>
                </div>
            </div>

            <hr class="sidebar-divider">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Perhitungan MAD</h6>
                </div>
                <div class="card-body">
                    <table id="Data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Hari Ke-</th>
                                <th>Jumlah Positif (Real)</th>
                                <th>Jumlah Positif (Prediksi)</th>
                                <th>Xi - Fi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < $jml_data; $i++) : ?>
                                <tr>
                                    <td><?php echo $hari_pandemi[$i]; ?></td>
                                    <td><?php echo $jml_pstf[$i]; ?></td>
                                    <td><?php echo $prediksi[$i]; ?></td>
                                    <td><?php echo $xifi[$i]; ?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                    Sigma Xi - Fi : <b><?php echo $sgm_xifi; ?></b>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->