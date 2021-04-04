<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard') ?>">
                <div class=" sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-virus"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PRECON</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- side bar untuk kelola data -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-viruses"></i>
                    <span>Data Real</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Positif COVID-19 (ID):</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/data_real') ?>">Data Korban Positif</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/input_data') ?>">Input Data Korban Positif</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegresi" aria-expanded="true" aria-controls="collapseRegresi">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Data Prediksi</span>
                </a>
                <div id="collapseRegresi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Prediksi COVID-19 (ID):</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/lihat_hitung') ?>">Prediksi Regresi Linier</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/lihat_variabel') ?>"> Variabel Regresi Linier</a>
                    </div>
                </div>
            </li>

            <!-- data akurasi -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkurasi" aria-expanded="true" aria-controls="collapseAkurasi">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Akurasi</span>
                </a>
                <div id="collapseAkurasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Akurasi Regresi Linier:</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/lihat_selisih') ?>">Selisih</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/lihat_MAD') ?>"> Akurasi MAD</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->