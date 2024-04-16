<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="<?php echo base_url('package/dist/css/style.min.css');?>" rel="stylesheet" />
    <?php $this->load->view('components/head') ?>
    <link rel="stylesheet" href="<?php echo base_url('package/select2/css/select2.min.css'); ?>">
    <script src="<?php echo base_url('package/select2/css/select2.min.css'); ?>"></script>
    <script src="<?php echo base_url('package/select2-bootstrap-5-theme-1.3.0/dist/select2-bootstrap5.min.css'); ?>">
    </script>
    <link rel="stylesheet"
        href="<?php echo base_url('package/select2-bootstrap-5-theme-1.3.0/dist/select2-bootstrap5.min.css'); ?>">
    <?php //$this->load->view('style/head') ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, xtreme admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Xtreme is powerful and clean admin dashboard template, inpired from Google's Material Design" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Dashboard Guru</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo/logo-sekolah.png')?>" />
</head>

<body>
    <div class="all font-web">
        <?php $this->load->view('components/loader') ?>
       
        <div id="main-wrapper">
            <!-- Start Navbar -->
            <?php $this->load->view('components/navbar') ?>
            <!-- End Navbar -->

            <!-- Start Sidebar -->
            <?php $this->load->view('components/sidebar') ?>
            <!-- End Sidebar -->
            <div class="page-wrapper" style="min-height: 100vh; background-color: white;">
                <!-- Start Page Breadcrumb -->
                <div class="page-breadcrumb d-flex items-center justify-content-between">
                    <div>
                        <h2 class="page-title">Dashboard</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('guru')?>">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page Breadcrumb -->
                <div class="container-fluid">
                    <div class="container-fluid mt-2">
                    <div class="row">
                            <div class="col-md-<?= $this->session->userdata('kelas_id') ? '4' : '6' ?>">
                                <!-- Start Card Total Guru -->
                                <div class="card bg-info text-white" style="border-radius: 10px;">
                                    <div class="card-body d-flex justify-content-between align-items-center p-3">
                                        <div>
                                            <div class="card-title h2 fw-normal">KBM Guru</div>
                                            <div class="card-text display-6 fw-bold mt-3">
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-chalkboard-user fa-5x"
                                                style="color: rgba(0,0,0,.15);"></i>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url('guru/kbm') ;?>"
                                        class="btn d-flex justify-content-center align-items-center gap-2 py-1 text-white"
                                        style="background-color: #3B82F6; border-radius: 0px 0px 10px 10px;">
                                        <span>Open Page</span>
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                                <!-- End Card Total Guru -->
                            </div>
                            <?php if ($this->session->userdata('kelas_id')): ?>
                                <div class="col-md-4">
                                    <!-- Start Card Total Guru -->
                                    <div class="card bg-primary text-white" style="border-radius: 10px;">
                                        <div class="card-body d-flex justify-content-between align-items-center p-3">
                                            <div>
                                                <div class="card-title h2 fw-normal">Sikap</div>
                                                <div class="card-text display-6 fw-bold mt-3">
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fa-solid fa-person-circle-check fa-5x"
                                                    style="color: rgba(0,0,0,.15);"></i>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url('guru/sikap') ;?>"
                                            class="btn d-flex justify-content-center align-items-center gap-2 py-1 text-white"
                                            style="background-color: #3B82F6; border-radius: 0px 0px 10px 10px;">
                                            <span>Open Page</span>
                                            <i class="fa-solid fa-circle-arrow-right"></i>
                                        </a>
                                    </div>
                                    <!-- End Card Total Guru -->
                                </div>
                            <?php endif ?>
                            <div class="col-md-<?= $this->session->userdata('kelas_id') ? '4' : '6' ?>">
                                <div class="card text-white" style="border-radius: 10px; background-color: #00FFAB;">
                                    <!-- Start Card Total Siswa -->
                                    <div class="card-body d-flex justify-content-between align-items-center p-3">
                                        <div>
                                            <div class="card-title h2 fw-normal">Piketan</div>
                                            <div class="card-text display-6 fw-bold mt-3">
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-users fa-5x" style="color: rgba(0,0,0,.15);"></i>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url('guru/piket') ;?>"
                                        class="btn d-flex justify-content-center align-items-center gap-2 py-1 text-white"
                                        style="background-color: #14C38E; border-radius: 0px 0px 10px 10px;">
                                        <span>Open Page</span>
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                                <!-- End Card Total Siswa -->
                            </div>
                        </div>
                        <div class="rounded shadow p-3 mt-3">
                            <h3>Table Jadwal KBM</h3>
                            <!-- Start Table KBM -->
                            <table id="table" class="table table-hover table-secondary mt-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jam Masuk</th>
                                        <th class="text-center">Jam Selesai</th>
                                        <th class="text-center">Materi</th>
                                        <th class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light text-center">
                                    <?php $i = 0; foreach($kbm as $row): ?>
                                    <tr>
                                        <td><?= $i+1 ?></td>
                                        <td><?= substr($row->jam_masuk, 11, -3) ?></td>
                                        <td><?= substr($row->jam_selesai, 11, -3) ?></td>
                                        <td><?= $row->materi ?></td>
                                        <td><?= $row->keterangan ?></td>
                                    </tr>
                                    <?php $i++; endforeach ?>
                                </tbody>
                            </table>
                            <!-- End Table KBM -->
                        </div>
                    </div>
                </div>
                <!-- Start Footer -->
                <?php $this->load->view('components/footer')?>
                <!-- End Footer -->
            </div>
        </div>
    </div>
    <?php $this->load->view('components/scripts.php') ?>
</body>

</html>