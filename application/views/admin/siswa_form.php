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
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="align-self-center">
                            <h2 class="page-title">Edit Siswa <?= $data->nama_siswa ?></h2>
                        </div>
                    </div>
                </div>
                <div style="min-height:fit-content" class="row container-fluid">
                    <form method="post" action="<?=base_url()?>admin/edit_siswa_api/<?=$data->id?>" class="container-fluid mt-5 col-8 row">
	  					<div class="col-6 my-2">
							<label class="w-100">Nama</label>
							<input required type="text" name="nama" class="form-control" value="<?= $data->nama_siswa ?>" />
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">NISN</label>
							<input required type="text" name="nisn" class="form-control" value="<?= $data->nisn ?>" />
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Kelas</label>
							<select required id="kelas" name="kelas" class="form-control select2 select2-info">
								<?php foreach ($kelas as $option): ?>
									<option value="<?= $option->id ?>"<?= $option->id==$data->kelas_id ?' selected':'' ?>>
										<?= $option->label ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Tempat Tanggal Lahir</label>
							<input required type="text" name="ttl" class="form-control" value="<?= $data->ttl ?>" />
						</div>
						<div class="d-flex justify-content-end col-12 my-2">
							<button type="submit" class="btn btn-success">Edit</button>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('components/scripts.php') ?>
</body>
</html>