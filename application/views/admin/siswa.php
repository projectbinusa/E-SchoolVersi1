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
                    <div>
                        <h2 class="page-title">Data Siswa</h2>
                    </div>
                    <div>
                        <div class="d-flex">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page Breadcrumb -->
                <div class="container-fluid">
                    <div class="container-fluid mt-2">
                        <div class="rounded shadow p-3">
                            <div class="button-import d-flex justify-content-end mb-4">
                                <!-- Start Button Download Format Data Siswa -->
                                <a class="mx-2 btn btn-success" href="<?php echo base_url('admin/format_siswa');?>"> <i
                                        width="15" height="15" data-feather="download"
                                        class="feather-icon mb-1"></i>Download Format</a>
                                <!-- End Button Download Format Data Siswa -->

                                <!-- Start Button Import Data Siswa -->
                                <button name="submit" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i width="15" height="15" data-feather="upload"
                                        class="feather-icon mb-1"></i> Import Data</button>
                                <!-- End Button Import Data Siswa -->
                            </div>
                            <!-- Start Table Siswa -->
                            <table id="table" class="table table-hover table-secondary mt-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">NISN</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Tempat Tanggal Lahir</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php $i = 0; foreach ($data as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $i + 1 ?></td>
                                        <td class="text-center"><?= $row->nama_siswa ?></td>
                                        <td class="text-center"><?= $row->nisn ?></td>
                                        <td class="text-center"><?= $row->kelas ?></td>
                                        <td class="text-center"><?= $row->ttl ?></td>
                                        <td>
                                            <a href="<?=base_url()?>admin/edit_siswa/<?=$row->id?>"
                                                class="btn btn-warning"><i width="16" height="16" data-feather="edit"
                                                    class="feather-icon"></i></a>
                                            <button
                                                onclick="confirmDelete('<?= $row->nama_siswa ?>', '<?= $row->id ?>')"
                                                class="btn btn-danger">
                                                <i width="16" height="16" data-feather="trash-2"
                                                    class="feather-icon"></i>
                                            </button>
                                        </td>
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

    <!-- Start Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h2 class="modal-title" id="exampleModalLabel">Import Data</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="m-2">
                    <span class="m-2">
                        *Pastikan Column Kelas Terisi
                    </span>
                    <form method="post" action="<?php echo base_url('admin/spreadsheet_import_siswa');?>"
                        enctype="multipart/form-data">
                        <div class="form-group m-3">
                            <input type="file" name="upload_file" class="form-control" placeholder="Enter Name"
                                id="upload_file" required>
                        </div>
                        <div class="form-group border-top">
                            <div class="modal-footer d-flex justify-content-between ">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <?php $this->load->view('components/scripts.php') ?>
</body>
<script>
// Start Function Delete
function confirmDelete(username, id) {
    if (!confirm("Anda yakin ingin menghapus data siswa " + username + "?")) return;
    location.href = "<?= base_url() ?>admin/hapus_siswa_api/" + id;
}
// End Function Delete
</script>

</html>