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
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '' ? 'nav-item active' : 'nav-item' ?>">
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
            <li class="<?php echo $this->uri->segment(2) == 'data_real' || $this->uri->segment(2) == 'input_data' ? 'nav-item active' : 'nav-item' ?>">
                <a class=" nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-viruses"></i>
                    <span>Data Real</span>
                </a>
                <div id="collapseTwo" class="<?php echo $this->uri->segment(2) == 'data_real' || $this->uri->segment(2) == 'input_data' ? 'collapse show' : 'collapse' ?>" aria-labelledby=" headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Positif COVID-19 (ID):</h6>
                        <a class="<?php echo $this->uri->segment(2) == 'data_real' ? 'collapse-item active' : 'collapse-item' ?>" href="<?php echo base_url('admin/data_real') ?>">Data Korban Positif</a>
                        <a class="<?php echo $this->uri->segment(2) == 'input_data' ? 'collapse-item active' : 'collapse-item' ?>" href="<?php echo base_url('admin/input_data') ?>">Input Data Positif</a>
                    </div>
                </div>
            </li>

            <li class="<?php echo $this->uri->segment(2) == 'lihat_hitung' || $this->uri->segment(2) == 'lihat_prediksi' || $this->uri->segment(2) == 'lihat_variabel' ? 'nav-item active' : 'nav-item' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegresi" aria-expanded="true" aria-controls="collapseRegresi">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Data Prediksi</span>
                </a>
                <div id="collapseRegresi" class="<?php echo $this->uri->segment(2) == 'lihat_hitung' || $this->uri->segment(2) == 'lihat_prediksi' || $this->uri->segment(2) == 'lihat_variabel' ? 'collapse show' : 'collapse' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Prediksi COVID-19 (ID):</h6>
                        <a class="<?php echo $this->uri->segment(2) == 'lihat_hitung' ? 'collapse-item active' : 'collapse-item' ?>" href="<?php echo base_url('admin/lihat_hitung') ?>">Prediksi Regresi Linier</a>
                        <a class="<?php echo $this->uri->segment(2) == 'lihat_prediksi' ? 'collapse-item active' : 'collapse-item' ?>" href="<?php echo base_url('admin/lihat_prediksi') ?>">Prediksi Kedepan</a>
                        <a class="<?php echo $this->uri->segment(2) == 'lihat_variabel' ? 'collapse-item active' : 'collapse-item' ?>" href="<?php echo base_url('admin/lihat_variabel') ?>"> Variabel Regresi Linier</a>
                    </div>
                </div>
            </li>

            <!-- data akurasi -->
            <li class="<?php echo $this->uri->segment(2) == 'lihat_selisih' || $this->uri->segment(2) == 'lihat_MAD' ? 'nav-item active' : 'nav-item' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkurasi" aria-expanded="true" aria-controls="collapseAkurasi">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Akurasi</span>
                </a>
                <div id="collapseAkurasi" class="<?php echo $this->uri->segment(2) == 'lihat_selisih' || $this->uri->segment(2) == 'lihat_MAD' ? 'collapse show' : 'collapse' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Akurasi Regresi Linier:</h6>
                        <a class="<?php echo $this->uri->segment(2) == 'lihat_selisih' ? 'collapse-item active' : 'collapse-item' ?>" href="<?php echo base_url('admin/lihat_selisih') ?>">Selisih</a>
                        <a class="<?php echo $this->uri->segment(2) == 'lihat_MAD' ? 'collapse-item active' : 'collapse-item' ?>" href="<?php echo base_url('admin/lihat_MAD') ?>"> Galat MAD</a>
                    </div>
                </div>
            </li>

            <?php if ($this->session->userdata('username')) : ?>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                </li>

            <?php endif; ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 d-md-none static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </nav>