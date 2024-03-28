<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
    <title>Sekolah | Guru</title>
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
                        <h2 class="page-title">Data Guru</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Guru</li>
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
                                <!-- Start Button Import Data Guru -->
                                <button name="submit" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" onclick="importForm(false)">Import</button>
                                <button name="submit" type="button" class="btn btn-warning ms-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" onclick="importForm(true)">Edit</button>
                                <!-- End Button Import Data Guru -->
                            </div>

                            <!-- Start Table Guru -->
                            <table id="table" class="table table-hover table-secondary mt-2 ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Guru</th>
                                        <th class="text-center">NIP</th>
                                        <th class="text-center">Mapel</th>
                                        <th class="text-center">Tempat Tanggal Lahir</th>
                                        <th class="text-center">Walikelas</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php $i = 0; foreach ($data as $row): ?>
                                    <tr>
                                        <td class="text-center"><?= $i + 1 ?></td>
                                        <td class="text-center"><?= $row->nama ?></td>
                                        <td class="text-center"><?= $row->nip ?></td>
                                        <td class="text-center"><?= $row->mapel ?></td>
                                        <td class="text-center"><?= $row->ttl ?></td>
                                        <td class="text-center"><?= $row->kelas ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>admin/edit_guru/<?= $row->id ?>"
                                                class="btn btn-warning"><i width="16" height="16" data-feather="edit"
                                                    class="feather-icon"></i></a>
                                            <button onclick="confirmDelete('<?=$row->nama?>', '<?=$row->id?>')"
                                                class="btn btn-danger">
                                                <i width="16" height="16" data-feather="trash-2"
                                                    class="feather-icon"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table Guru -->
                        </div>
                    </div>
                </div>
                <button name="submit" type="button" class="d-none" id="toggle-btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"></button>
                <!-- Start Footer -->
                <?php $this->load->view('components/footer')?>
                <!-- End Footer -->
            </div>
        </div>
    </div>
    </div>

    <!-- Start Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="main-modal">
                
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <?php $this->load->view('components/scripts.php') ?>
</body>
<script>
// Start Function Delete
function confirmDelete(username, id) {
    if (!confirm("Anda yakin ingin menghapus data guru " + username + "?")) return;
    location.href = "<?= base_url() ?>admin/hapus_guru_api/" + id;
}
const mainModal = $("#main-modal");

function importForm(edit) {
    mainModal.html(
        `<div class="modal-header border-bottom">
            <h2 class="modal-title" id="exampleModalLabel">Import Data</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="m-2">
            <div class="d-flex justify-content-between">
                <span class="m-2">
                </span>
                <button onclick="downloadData('<?php echo base_url();?>${edit
                    ?'admin/format_guru_edit':'admin/format_guru'}')" class="btn btn-success">
                    <i class="fas fa-download"></i>
                    Download Format
                </button>
            </div>
            <form method="post" action="<?=base_url()?>${edit?'admin/import_guru_edit':'admin/spreadsheet_import_guru'}"
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
        </div>`
    )
}

function downloadData(link) {
    location.href = link;
    setTimeout(() => {
        console.log(mainModal[0].children[0].children[1].click());
    }, 10)
}
// End Function Delete
</script>


</html>