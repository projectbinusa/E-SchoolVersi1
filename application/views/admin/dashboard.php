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
    <title>Dashboard Admin</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('package/assets/images/logo-pos.png')?>" />
</head>

<body>
    <div class="all font-web">
        <div class="preloader">
            <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
                    stroke="#2962FF" stroke-width="2"></path>
                <path
                    d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
                    stroke="#2962FF" stroke-width="2"></path>
                <path id="teabag" fill="#2962FF" fill-rule="evenodd" clip-rule="evenodd"
                    d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z">
                </path>
                <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" stroke="#2962FF"></path>
                <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#2962FF"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
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
                                            href="<?php echo base_url('admin')?>">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page Breadcrumb -->
                <div class="container-fluid">
                    <div class="container-fluid mt-2">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Start Card Total Guru -->
                                <div class="card bg-primary text-white" style="border-radius: 10px;">
                                    <div class="card-body d-flex justify-content-between align-items-center p-3">
                                        <div>
                                            <div class="card-title h4 fw-normal">Total Guru</div>
                                            <div class="card-text display-6 fw-bold mt-3">
                                                <?php echo count($guru); ?>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-chalkboard-user fa-5x"
                                                style="color: rgba(0,0,0,.15);"></i>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url('admin/guru') ;?>"
                                        class="btn d-flex justify-content-center align-items-center gap-2 py-1 text-white"
                                        style="background-color: #3B82F6; border-radius: 0px 0px 10px 10px;">
                                        <span>See More</span>
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                                <!-- End Card Total Guru -->
                            </div>
                            <div class="col-md-6">
                                <div class="card text-white" style="border-radius: 10px; background-color: #00FFAB;">
                                    <!-- Start Card Total Siswa -->
                                    <div class="card-body d-flex justify-content-between align-items-center p-3">
                                        <div>
                                            <div class="card-title h4 fw-normal">Total Siswa</div>
                                            <div class="card-text display-6 fw-bold mt-3">
                                                <?php echo count($siswa); ?>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-user fa-5x" style="color: rgba(0,0,0,.15);"></i>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url('admin/siswa') ;?>"
                                        class="btn d-flex justify-content-center align-items-center gap-2 py-1 text-white"
                                        style="background-color: #14C38E; border-radius: 0px 0px 10px 10px;">
                                        <span>See More</span>
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                                <!-- End Card Total Siswa -->
                            </div>
                        </div>
                        <div class="rounded shadow p-3 mt-3">
                            <h3>Table Guru</h3>
                            <!-- Start Table Guru -->
                            <table id="table" class="table table-hover table-secondary mt-2 ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Guru</th>
                                        <th class="text-center">NIP</th>
                                        <th class="text-center">Mapel</th>
                                        <th class="text-center">Tempat Tanggal Lahir</th>
                                        <th class="text-center">Walikelas</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php $i = 0; foreach ($guru as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $i + 1 ?></td>
                                        <td class="text-center"><?= $row->nama ?></td>
                                        <td class="text-center"><?= $row->nip ?></td>
                                        <td class="text-center"><?= $row->mapel ?></td>
                                        <td class="text-center"><?= $row->ttl ?></td>
                                        <td class="text-center"><?= $row->kelas ?></td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table Guru -->
                        </div>
                        <div class="rounded shadow p-3 mt-3">
                            <h3>Table Siswa</h3>
                            <!-- Start Table Siswa -->
                            <table id="table-2" class="table table-hover table-secondary mt-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">NISN</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Tempat Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php $i = 0; foreach ($siswa as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $i + 1 ?></td>
                                        <td class="text-center"><?= $row->nama_siswa ?></td>
                                        <td class="text-center"><?= $row->nisn ?></td>
                                        <td class="text-center"><?= $row->kelas ?></td>
                                        <td class="text-center"><?= $row->ttl ?></td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table Siswa -->
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