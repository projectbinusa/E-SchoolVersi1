<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
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
                        <h2 class="page-title">Input Data KBM</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('guru')?>">Guru</a></li>
                                    <li class="breadcrumb-item" aria-current="page" style="font-size: 15px;">
                                        <a href="<?php echo base_url('guru/KBM')?>">KBM</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Input Data KBM</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page Breadcrumb -->
                <div class="container-fluid">
                    <div class="rounded shadow p-3">
                        <form method="post"
                            action="<?=base_url()?>guru/<?= isset($data->id) ? 'edit_kbm_api/'.$data->id : 'tambah_kbm_api' ?>"
                            class="row">
                            <div class="col-6 my-2">
                                <label>Jam Masuk</label>
                                <input required type="time" value="<?= substr($data->jam_masuk, 11, -3) ?>" name="masuk"
                                    class="form-control" />
                            </div>
                            <div class="col-6 my-2">
                                <label>Jam Selesai</label>
                                <input required type="time" value="<?= substr($data->jam_selesai, 11, -3) ?>"
                                    name="selesai" class="form-control" />
                            </div>
                            <div class="col-6 my-2">
                                <label>Materi</label>
                                <input required type="text" value="<?= $data->materi ?>" name="materi"
                                    class="form-control" />
                            </div>
                            <div class="col-6 my-2">
                                <label>Keterangan</label>
                                <input type="text" value="<?= $data->keterangan ?>" name="keterangan"
                                    class="form-control" />
                            </div>
                            <div class="col-12 my-2">
                                <label>Kelas</label>
                                <select id="kelas_id" name="kelas_id" class="form-control select2 select2-info">
                                    <option value="">none</option>
                                    <?php foreach ($kelas as $option): if (!$option) continue;?>
                                    <option value="<?= $option->id ?>">
                                        <?= $option->label ?>
                                    </option>
                                    <?php endforeach; ?>
                                    <select>
                            </div>
                            <div class="d-flex justify-content-end col-12 my-2">
                                <button type="submit"
                                    class="btn btn-success"><?= isset($data->id) ? "Edit" : "Tambah" ?></button>
                            </div>
                        </form>
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