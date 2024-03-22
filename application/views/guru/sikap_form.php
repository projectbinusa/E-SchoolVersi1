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
    <div class="all">
        <?php $this->load->view('components/loader') ?>
        <div id="main-wrapper">
            <?php $this->load->view('components/navbar') ?>
            <?php $this->load->view('components/sidebar') ?>
            <div class="page-wrapper" style="min-height: 100vh; background-color: white;">
                <div class="page-breadcrumb d-flex items-center justify-content-between">
                    <div class="">
                        <h2 class="page-title">Tambah Data Sikap</h2>
                    </div>
                    <div>
                        <div class="d-flex">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('guru')?>">Guru</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Tambah Data Sikap</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div style="min-height:fit-content" class="row container-fluid">
                    <div class="rounded shadow p-3">
                        <form method="post"
                            action="<?=base_url()?>guru/<?= isset($data->id) ? 'edit_sikap_api/'.$data->id : 'tambah_sikap_api' ?>"
                            class="row">
                            <div class="col-6 mt-3">
                                <label for="siswa">Nama Siswa</label>
                                <select required id="siswa" name="siswa_id" class="form-control select2 select2-info">
                                    <?php foreach ($siswa as $option): ?>
                                    <option value="<?= $option->id ?>"
                                        <?= $option->id==$data->siswa_id ?' selected':'' ?>>
                                        <?= $option->label ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label>Penilaian</label>
                                <input required type="text" value="<?= $data->penilaian ?>" name="penilaian"
                                    class="form-control" />
                            </div>
                            <div class="col-12 mt-3">
                                <label>Keterangan</label>
                                <input required type="text" value="<?= $data->keterangan ?>" name="keterangan"
                                    class="form-control" />
                            </div>
                            <div class="d-flex justify-content-end col-12 mt-3">
                                <button type="submit"
                                    class="btn btn-success"><?= isset($data->id) ? "Edit" : "Tambah" ?></button>
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