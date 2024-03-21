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
		.fixed_header tbody{
			display:block;
			overflow:auto;
			height:200px;
			width:100%;
		}
		.fixed_header thead {
			display: block;
		}
		.fixed_header tr{
			display:flex;
			flex-wrap: wrap;
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
                            <h2 class="page-title">Input Presensi</h2>
                        </div>
                    </div>
                </div>
                <div style="min-height:fit-content" class="row container-fluid">
                    <form method="post" action="<?=base_url()?>guru/<?= isset($data->id) ? 'edit_kbm_api/'.$data->id : 'tambah_kbm_api' ?>" class="container-fluid mt-5 col-8 row">
	  					<div class="col-6 my-2">
							<label class="w-100">Kelas</label>
							<select id="kelas" name="kelas" class="form-control select2 select2-info" id="kelas">
								<?php foreach ($kelas as $option): ?>
								<option value="<?= $option->id ?>">
									<?= $option->label ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Tanggal</label>
							<input required type="date" name="selesai" class="form-control" />
						</div>
	  					<div class="col-12 my-2">
							<label class="w-100">Kehadiran</label>
							<table class="fixed_header table table-hover table-secondary mt-2 ">
                                <thead>
                                    <tr>
                                        <th style="width: 14%;" class="text-center">No</th>
                                        <th style="width: 47%;" class="text-center">Nama</th>
                                        <th style="width: 13%;" class="text-center">Izin</th>
                                        <th style="width: 13%;" class="text-center">Sakit</th>
                                        <th style="width: 13%;" class="text-center">Alpha</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
									<?php for($i = 0; $i < 20; $i++): ?>
									<tr>
										<td style="width: 14%;" class="text-center">1</td>
										<td style="width: 47%;">Ahmat ireng</td>
										<td style="width: 13%;" class="text-center p-0">
											<label class="p-3 w-100" onclick="console.log('wadaw')">
												<input value="Izin" onchange="selectRadio(event, <?=$i?>)" type="radio" name="siswa<?=$i?>" />
											</label>
										</td>
										<td style="width: 13%;" class="text-center p-0">
											<label class="p-3 w-100">
												<input value="Sakit" onchange="selectRadio(event, <?=$i?>)" type="radio" name="siswa<?=$i?>" />
											</label>
										</td>
										<td style="width: 13%;" class="text-center p-0">
											<label class="p-3 w-100">
												<input value="Bolos" onchange="selectRadio(event, <?=$i?>)" type="radio" name="siswa<?=$i?>" />
											</label>
										</td>
									</tr>
									<?php endfor ?>
                                </tbody>
                            </table>
							<table class="table table-hover table-secondary mt-2 ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Izin</th>
                                        <th class="text-center">Sakit</th>
                                        <th class="text-center">Alpha</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
									<?php for($i = 0; $i < 20; $i++): ?>
									<tr>
										<td class="text-center">1</td>
										<td>Ahmat ireng</td>
										<td class="text-center">
											<input type="radio" name="siswa1" />
										</td>
										<td class="text-center">
											<input type="radio" name="siswa1" />
										</td>
										<td class="text-center">
											<input type="radio" name="siswa1" />
										</td>
									</tr>
									<?php endfor ?>
                                </tbody>
                            </table>
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
<script>
	const kehadiran = new Array(20).fill(false);
	function selectRadio(e, i) {
		if (kehadiran[i] != e.target.value) {
			return kehadiran[i] = e.target.value;
		}
		console.log('test')
		e.target.value = false;
	}
</script>
</html>