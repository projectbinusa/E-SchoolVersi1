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
    <div class="all">
        <?php $this->load->view('components/loader') ?>
        <div id="main-wrapper">
            <?php $this->load->view('components/navbar') ?>
            <?php $this->load->view('components/sidebar') ?>
            <div class="page-wrapper" style="min-height: 100vh; background-color: white;">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h2 class="page-title">Data Siswa</h2>
                        </div>
                        <form method="post" action="<?php echo base_url('admin/spreadsheet_import_siswa');?>"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="upload_file" class="form-control" placeholder="Enter Name"
                                    id="upload_file" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="container-fluid mt-5">
                    <table class="table table-hover table-secondary ">
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
                              <td class="">
                                <a href="#" class="btn btn-warning"><i width="16" height="16" data-feather="edit" class="feather-icon"></i></a>
                                <button onclick="confirmDelete('<?= $row->nama_siswa ?>', '<?= $row->id ?>')" class="btn btn-danger">
                                  <i width="16" height="16" data-feather="trash-2" class="feather-icon"></i>
                                </button>
                              </td>
                            </tr>
                          <?php $i++; endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('components/scripts.php') ?>
</body>

</html>