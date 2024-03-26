<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
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
                                            href="<?php echo base_url('guru')?>">Guru</a></li>
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
                        <div class="rounded shadow p-3">
                            <div class="button-tambah d-flex justify-content-end mb-4">
                                <!-- Start Button Tambah Data Presensi -->
                                <a href="<?= base_url() ?>guru/tambah_piket" class="btn btn-primary"><i width="15"
                                        height="15" data-feather="plus" class="feather-icon mb-1"></i> Tambah Data</a>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-info ms-2">
                                <i width="15"
                                        height="15" data-feather="download" class="feather-icon mb-1"></i> Download Data
                                </button>
                                <!-- End Button Tambah Data Presensi -->
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
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light text-center">
                                    <?php $i = 0; foreach ($data as $row): ?>
                                    <tr>
                                        <td><?= $i+1 ?></td>
                                        <td><?= $row->tanggal ?></td>
                                        <td><?= $row->kelas ?></td>
                                        <td><?= $row->sakit ?></td>
                                        <td><?= $row->izin ?></td>
                                        <td><?= $row->bolos ?></td>
                                        <td class="">
                                            <a href="<?=base_url()?>guru/edit_piket/<?=$row->id?>"
                                                class="btn btn-warning"><i width="16" height="16" data-feather="edit"
                                                    class="feather-icon"></i></a>
                                            <button onclick="confirmDelete('<?=$row->kelas?>', '<?= $row->id ?>')"
                                                class="btn btn-danger">
                                                <i width="16" height="16" data-feather="trash-2"
                                                    class="feather-icon"></i>
                                            </button>
                                            <a href="<?= base_url()?>guru/pdf_presensi/<?=$row->id?>"
                                                class="btn btn-primary">
                                                <i width="16" height="16" data-feather="download"
                                                    class="feather-icon"></i>
                                            </a>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Download Laporan Piket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="download-form" action="<?=base_url()?>guru/pdf_presensi_tgl" class="modal-body row">
                    <div class="col-6 px-3">
                        <label>Tanggal</label>
                        <input type="date" name="taggal" required class="form-control" id="date-filter" />
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="download-form" class="btn btn-primary">Unduh</button>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('components/scripts') ?>
</body>
<script>
// Start Function Delete
function confirmDelete(kelas, id) {
    if (!confirm("Anda yakin ingin menghapus data presensi kelas " + kelas + "?")) return;
    location.href = "<?= base_url() ?>guru/hapus_presensi_api/" + id;
}
// End Function Delete
</script>

</html>