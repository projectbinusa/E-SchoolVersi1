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
            <?php $this->load->view('components/navbar') ?>
            <?php $this->load->view('components/sidebar') ?>
            <div class="page-wrapper" style="min-height: 100vh; background-color: white;">
                <div class="page-breadcrumb d-flex items-center justify-content-between">
                    <div class="">
                        <h2 class="page-title">Data Piket</h2>
                    </div>
                    <div>
                        <div class="d-flex">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" style="font-size: 15px;"><a
                                            href="<?php echo base_url('guru')?>">Guru</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size: 15px;">
                                        KBM</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="container-fluid mt-2">
                        <div class="rounded shadow p-3">
                            <div class="button-tambah d-flex justify-content-end mb-4">
                                <a href="<?= base_url() ?>guru/tambah_piket" class="btn btn-primary"><i width="15" height="15"
									data-feather="plus" class="feather-icon mb-1"></i> Tambah Data</a>
                            </div>
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
                                            <a href="<?=base_url()?>guru/edit_piket/<?=$row->id?>" class="btn btn-warning"><i width="16" height="16"
                                                    data-feather="edit" class="feather-icon"></i></a>
                                            <button onclick="confirmDelete('<?=$row->kelas?>', '<?= $row->id ?>')" class="btn btn-danger">
                                                <i width="16" height="16" data-feather="trash-2"
                                                    class="feather-icon"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('components/footer') ?>
            </div>
        </div>
    </div>
    </div>
    <?php $this->load->view('components/scripts.php') ?>
</body>
<script>
function confirmDelete(kelas, id) {
  if (!confirm("Anda yakin ingin menghapus data presensi kelas " + kelas + "?")) return;
  location.href = "<?= base_url() ?>guru/hapus_presensi_api/" + id;
}
</script>
</html>