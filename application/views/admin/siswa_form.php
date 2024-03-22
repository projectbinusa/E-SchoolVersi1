<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
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
            <?php $this->load->view('components/navbar') ?>
            <?php $this->load->view('components/sidebar') ?>
            <div class="page-wrapper" style="min-height: 100vh; background-color: white;">
                <div class="page-breadcrumb d-flex items-center justify-content-between">
                    <div class="">
                        <h2 class="page-title">Ubah Data <?= $data->nama_siswa ?></h2>
                    </div>
                    <div>
                        <div class="d-flex">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('siswa')?>">Siswa</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Ubah Data Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="rounded shadow p-3">
                        <form method="post" action="<?=base_url()?>admin/edit_siswa_api/<?=$data->id?>" class="row">
                            <div class="col-6">
                                <label for="nama_siswa">Nama
                                    Siswa</label>
                                <input required type="text" name="nama" class="form-control"
                                    id="nama_siswa" value="<?= $data->nama_siswa ?>" />
                            </div>
                            <div class="col-6">
                                <label for="nisn">NISN</label>
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
                    </div>
                </div>
                <?php $this->load->view('components/footer') ?>
            </div>
        </div>
    </div>
    <?php $this->load->view('components/scripts.php') ?>
</body>

</html>