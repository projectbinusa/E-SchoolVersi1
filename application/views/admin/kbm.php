<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo/logo-sekolah.png')?>" />
    <title>E-School | Siswa</title>
    <style>
    td {
        text-align: center;
        vertical-align: middle;
    }
    </style>
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
                        <h2 class="page-title">KBM</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        KBM</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page Breadcrumb -->
                <div class="container-fluid">
                    <div class="container-fluid mt-2">
                        <div class="rounded shadow p-3">
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
                        </div>
                    </div>
                </div>
                <!-- Start Footer -->
                <?php $this->load->view('components/footer')?>
                <!-- End Footer -->
            </div>
        </div>
    </div>
    </div>
    <?php $this->load->view('components/scripts.php') ?>
</body>

</html>