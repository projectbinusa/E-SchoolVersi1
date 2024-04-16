<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/logo/logo-sekolah.png')?>" />
    <title>Sekolah | Edit Guru</title>
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
                        <h2 class="page-title">Input Data Guru</h2>
                    </div>
                    <div>
                        <div class="d-md-flex d-none">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('admin')?>">Admin</a></li>
                                    <li class="breadcrumb-item" aria-current="page" style="font-size: 15px;">
                                        <a href="<?php echo base_url('admin/guru')?>">Guru</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        Input Data Guru</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Page Breadcrumb -->
                <div class="container-fluid">
                    <div class="rounded shadow p-3">
                        <!-- Start Form Ubah & Tambah Guru -->
                        <form method="post" action="<?=base_url()?>admin/edit_guru_api/<?=$data->id?>" class="row">
                            <div class="col-6">
                                <label for="nama" class="form-label" style="color: #374151;">Nama
                                    Guru</label>
                                <input required type="text" name="nama" class="form-control" id="nama"
                                    value="<?= $data->nama ?>" />
                            </div>
                            <div class="col-6">
                                <label for="nip" class="form-label" style="color: #374151;">NIP</label>
                                <input required type="text" name="nip" class="form-control" id="nip"
                                    value="<?= $data->nip ?>" />
                            </div>
                            <div class="col-6 mt-3">
                                <label for="mapel" class="form-label" style="color: #374151;">Mapel</label>
                                <input required type="text" name="mapel" class="form-control" id="mapel"
                                    value="<?= $data->mapel ?>" />
                            </div>
                            <div class="col-6 mt-3">
                                <label for="kelas" class="form-label" style="color: #374151;">Kelas</label>
                                <select id="kelas" name="kelas" class="form-control select2 select2-info" id="kelas">
                                    <option value="NULL">none</option>
                                    <?php foreach ($kelas as $option): ?>
                                    <option value="<?= $option->id ?>"
                                        <?= $option->id==$data->kelas_id ?' selected':'' ?>>
                                        <?= $option->label ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="ttl" class="form-label" style="color: #374151;">Tempat Tanggal Lahir</label>
                                <input required type="text" name="ttl" class="form-control" id="ttl"
                                    value="<?= $data->ttl ?>" />
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label" style="color: #374151;">Password <span
                                        style="font-weight: normal; font-size: 14px;">(tidak
                                        dirubah)</span></label>
                                <div class="position-relative">
                                    <input type="password" oninput="passChange(event)" name="password"
                                        class="form-control shadow-input text-secondary" id="password"
                                        placeholder="Password">
                                    <span class="position-absolute top-0 mt-2 me-3 pointer text-secondary"
                                        id="togglePassword" style="right: 0;cursor
                                : pointer;">
                                        <i class="fas fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end col-12 mt-3">
                                <button type="submit" class="btn btn-success">Ubah</button>
                            </div>
                        </form>
                        <!-- End Form Ubah & Tambah Guru -->
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
<script>
// Start Show Hide Password
const passwordInput = document.getElementById('password');
const togglePassword = document.getElementById('togglePassword');

togglePassword.addEventListener('click', () => {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePassword.innerHTML = type === 'password' ? '<i class="fas fa-eye-slash"></i>' :
        '<i class="fas fa-eye"></i>';
});
// End Show Hide Password

// Start Change Label
function passChange(e) {
    const label = e.target.parentElement.parentElement.children[0].children[0];
    if (e.target.value) {
        label.textContent = "(dirubah)";
        return;
    }
    label.textContent = "(tidak dirubah)"
}
// End Change Label
</script>

</html>