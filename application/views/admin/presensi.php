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
                    <div class="">
                        <h2 class="page-title">Data Piket</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Piket</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page Breadcrumb -->
                <div class="container-fluid">
                    <div class="container-fluid mt-2">
                        <div class="rounded shadow row p-3">
                            <div class="col-12 col-sm-6 p-0 mb-4">
                                <button data-bs-toggle="modal" onclick="openModal('filter')"
                                    data-bs-target="#exampleModalCenter" class="btn btn-success ms-2">
                                    <i width="15" height="15" data-feather="sliders" class="feather-icon mb-1"></i>
                                    Filter Kelas
                                </button>
                            </div>
                            <!-- Start Table Presensi -->
                            <table id="table" class="table table-hover table-secondary mt-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Sakit</th>
                                        <th class="text-center">Izin</th>
                                        <th class="text-center">Alpha</th>
                                        <th class="text-center">Total Hadir</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light text-center">
                                    <?php $i = 0; foreach ($data as $row): ?>
                                    <tr>
                                        <td><?= $i+1 ?></td>
                                        <td><?= indonesian_date($row->tanggal) ?></td>
                                        <td><?= $row->kelas ?></td>
                                        <td><?= $row->sakit ?></td>
                                        <td><?= $row->izin ?></td>
                                        <td><?= $row->bolos ?></td>
                                        <td><?= $this->Main_model->get_where('siswa', ['kelas_id' => $row->kelas_id])->num_rows() - ($row->bolos + $row->izin + $row->sakit)  ?>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                                <!-- End Table Presensi -->
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Start Footer -->
                <?php $this->load->view('components/footer') ?>
                <!-- End Footer -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div id="modal-content" class="modal-content">

            </div>
        </div>
    </div>
    <?php $this->load->view('components/scripts') ?>
</body>
<script>
const modalContent = $("#modal-content");
console.log(`<?php var_dump($kelas) ?>`)

function openModal(type) {
    modalContent.html(`
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Filter Laporan Piket</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="download-form" action="<?=base_url()?>admin/piket" class="modal-body row">
            <div class="px-3">
                <label>Kelas</label>
                <select id="kelas" name="kelas" class="form-control select2 select2-info w-full">
                    <option value="">none</option>
                    <?php foreach ($kelas as $option): if (!$option) continue;?>
                    <option value="<?= $option->id ?>">
                        <?= $option->label ?>
                    </option>
                    <?php endforeach; ?>
                <select>
            </div>
            </div>
        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" form="download-form" class="btn btn-primary">Cari</button>
        </div>
    `)
}
</script>

</html>