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
                        <h2 class="page-title">Sikap Siswa</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('guru')?>">Guru</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Sikap Siswa</li>
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
                                <!-- Start Button Tambah Data Sikap -->
                                <a href="<?php echo base_url('guru/tambah_sikap')?>" class="btn btn-primary"><i
                                        width="15" height="15" data-feather="plus" class="feather-icon mb-1"></i> Tambah
                                    Data</a>
                                <!-- End Button Tambah Data Sikap -->
                            </div>
                            <!-- Start Table Sikap -->
                            <table id="table" class="table table-hover table-secondary mt-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Nama Guru</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light text-center">
                                    <?php $i = 0; foreach($data as $row): ?>
                                    <tr>
                                        <td><?= $i+1 ?></td>
                                        <td><?= get_nama_siswa($row->siswa_id) ?></td>
                                        <td><?= $row->penilaian ?></td>
                                        <td><?= $row->keterangan ?></td>
                                        <td><?= get_nama_guru($row->guru_id) ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>guru/edit_sikap/<?= $row->id ?>"
                                                class="btn btn-warning"><i width="16" height="16" data-feather="edit"
                                                    class="feather-icon"></i></a>
                                            <button onclick="confirmDelete(<?= $row->id ?>)" class="btn btn-danger">
                                                <i width="16" height="16" data-feather="trash-2"
                                                    class="feather-icon"></i>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach ?>
                                </tbody>
                            </table>
                            <!-- End Table Sikap -->
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
<script>
// Start Function Delet
function confirmDelete(id) {
    if (!confirm("Anda yakin ingin menghapus data?")) return;
    location.href = "<?= base_url() ?>guru/hapus_sikap_api/" + id;
}
// End Function Delet
</script>

</html>