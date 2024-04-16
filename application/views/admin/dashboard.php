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
                                        <td class="text-center"><?= !empty($row->nip) ? $row->nip : "Belum Ditambahkan"?></td>
                                        <td class="text-center"><?= !empty($row->mapel) ? $row->mapel : "Belum Ditambahkan"?></td>
                                        <td class="text-center"><?= !empty($row->ttl) ? $row->ttl : "Belum Ditambahkan"?></td>
                                        <td class="text-center"><?= !empty($row->kelas) ? $row->kelas : "Tidak Menjadi Wali kelas" ?></td>
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
                                        <th class="text-center">NIS</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Tempat Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php $i = 0; foreach ($siswa as $row): ?>
                                    <tr>
                                    <td class="text-center"><?= $i + 1 ?></td>
                                        <td class="text-center"><?= $row->nama_siswa ?></td>
                                        <td class="text-center"><?= !empty($row->nisn) ? $row->nisn : "Belum Ditambahkan"?></td>
                                        <td class="text-center"><?= $row->kelas ?></td>
                                        <td class="text-center"><?= !empty($row->ttl) ? $row->ttl : "Belum Ditambahkan"?></td>
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