<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo/logo-sekolah.png')?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo/logo-sekolah.png')?>" />
    <title>Sekolah | Edit Siswa</title>
    <style>
    td {
        text-align: center;
        vertical-align: middle;
    }

    .toggle-pass {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        padding-right: 10px;
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-selection {
        border: 1px solid #e9ecef !important;
        padding: 0.375rem .3rem;
        height: 34px !important;
    }

    .select2-selection__rendered {
        line-height: 21px !important;
    }

    .select2-dropdown {
        border: 1px solid #e9ecef !important;
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
                        <h2 class="page-title">Input Data Siswa</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item" aria-current="page" style="font-size: 15px;">
                                        <a href="<?php echo base_url('admin/siswa')?>">Siswa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Input Data Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page Breadcrumb -->
                <div class="container-fluid">
                    <div class="rounded shadow p-3">
                        <!-- Start Form Ubah & Tambah Siswa -->
                        <form method="post" action="<?=base_url()?>admin/edit_siswa_api/<?=$data->id?>" class="row">
                            <div class="col-6">
                                <label for="nama_siswa">Nama
                                    Siswa</label>
                                <input required type="text" name="nama" class="form-control" id="nama_siswa"
                                    value="<?= $data->nama_siswa ?>" />
                            </div>
                            <div class="col-6">
                                <label for="nisn">NIS</label>
                                <input required type="text" name="nisn" class="form-control" id="nisn"
                                    value="<?= $data->nisn ?>" />
                            </div>
                            <div class="col-6 mt-3">
                                <label for="kelas">Kelas</label>
                                <select required id="kelas" name="kelas" class="form-control select2 select2-info">
                                    <?php foreach ($kelas as $option): ?>
                                    <option value="<?= $option->id ?>"
                                        <?= $option->id==$data->kelas_id ?' selected':'' ?>>
                                        <?= $option->label ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="ttl">Tempat Tanggal Lahir</label>
                                <input required type="text" name="ttl" class="form-control" id="ttl"
                                    value="<?= $data->ttl ?>" />
                            </div>
                            <div class="d-flex justify-content-end col-12 mt-3">
                                <button type="submit" class="btn btn-success">Ubah</button>
                            </div>
                        </form>
                        <!-- Start Form Ubah & Tambah Siswa -->
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