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
                            <h2 class="page-title"><?= isset($data->id) ? "Edit" : "Tambah" ?> KBM</h2>
                        </div>
                    </div>
                </div>
                <div style="min-height:fit-content" class="row container-fluid">
                    <form method="post" action="<?=base_url()?>guru/<?= isset($data->id) ? 'edit_kbm_api/'.$data->id : 'tambah_kbm_api' ?>" class="container-fluid mt-5 col-8 row">
	  					<div class="col-6 my-2">
							<label class="w-100">Jam Masuk</label>
							<input required type="time" value="<?= substr($data->jam_masuk, 11, -3) ?>" name="masuk" class="form-control" />
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Jam Selesai</label>
							<input required type="time" value="<?= substr($data->jam_selesai, 11, -3) ?>" name="selesai" class="form-control" />
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Materi</label>
							<input required type="text" value="<?= $data->materi ?>" name="materi" class="form-control" />
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Keterangan</label>
							<input required type="text" value="<?= $data->keterangan ?>" name="keterangan" class="form-control" />
						</div>
						<div class="d-flex justify-content-end col-12 my-2">
							<button type="submit" class="btn btn-success"><?= isset($data->id) ? "Edit" : "Tambah" ?></button>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('components/scripts.php') ?>
</body>
</html>