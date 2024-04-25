<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo/logo-sekolah.png')?>" />
    <title>E-School | Kelas </title>
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
                        <h2 class="page-title">Data Kelas</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Kelas</li>
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
                                <!-- Start Button Tambah Data -->
                                <button name="submit" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i width="15" height="15" data-feather="plus"
                                        class="feather-icon mb-1"></i> 
                                        <span class="d-none d-sm-inline-block">Tambah Data</span>
                                </button>
                                <!-- End Button Tambah Data -->
                            </div>
                            <!-- Start Table Kelas -->
                            <table id="table" class="table table-hover table-secondary mt-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Kelas</th>
                                        <th class="text-center">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php $i = 0; foreach ($data as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $i + 1 ?></td>
                                        <td class="text-center"><?= $row->nama?></td>
                                        <td>
                                            <button data-bs-toggle="modal" data-bs-target="#modal<?= $row->id?>"
                                                class="btn btn-warning"><i width="16" height="16" data-feather="edit"
                                                    class="feather-icon"></i></button>
                                            <button onclick="confirmDelete('<?= $row->nama ?>', '<?= $row->id ?>')"
                                                class="btn btn-danger">
                                                <i width="16" height="16" data-feather="trash-2"
                                                    class="feather-icon"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table Kelas -->
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h2 class="modal-title" id="exampleModalLabel">Tambah Kelas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="m-2">
                    <form method="post" action="<?=base_url()?>admin/tambah_kelas" enctype="multipart/form-data">
                        <div class="form-group m-3">
                            <input type="text" name=nama class="form-control" placeholder="Masukan Nama Kelas" required>
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

    <?php $no = 0; foreach ($data as $row) : $no++; ?>
    <div class="modal fade" id="modal<?= $row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h2 class="modal-title" id="exampleModalLabel">Edit Kelas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="m-2">
                    <form method="post" action="<?=base_url()?>admin/<?='edit_kelas_api/'.$row->id?>"
                        enctype="multipart/form-data">

                        <div class="form-group m-3">
                            <input type="hidden" name=id value="<?= $row->id ?>">
                            <input type="text" name=nama value="<?= $row->nama ?>" class="form-control"
                                placeholder="Masukan Nama Kelas" required>
                        </div>
                        <div class="form-group border-top">
                            <div class="modal-footer d-flex justify-content-between ">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $no++; endforeach; ?>
    <!-- End Modal -->

    <?php $this->load->view('components/scripts') ?>
</body>
<script>
// Start Function Delete
function confirmDelete(nama, id) {
    if (!confirm("Anda yakin ingin menghapus data kelas " + nama + "?")) return;
    location.href = "<?= base_url() ?>admin/hapus_kelas/" + id;
}
// End Function Delete
</script>

</html>