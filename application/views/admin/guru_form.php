<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php $this->load->view('components/head') ?>
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
    <div class="all">
        <?php $this->load->view('components/loader') ?>
        <div id="main-wrapper">
            <?php $this->load->view('components/navbar') ?>
            <?php $this->load->view('components/sidebar') ?>
            <div class="page-wrapper" style="min-height: 100vh; background-color: white;">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="align-self-center">
                            <h2 class="page-title">Edit Guru <?= $data->nama ?></h2>
                        </div>
                    </div>
                </div>
                <div style="min-height:fit-content" class="row container-fluid">
                    <form method="post" action="<?=base_url()?>admin/edit_guru_api/<?=$data->id?>" class="container-fluid mt-5 col-8 row">
	  					<div class="col-6 my-2">
							<label class="w-100">Nama</label>
							<input required type="text" name="nama" class="form-control" value="<?= $data->nama ?>" />
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">NIP</label>
							<input required type="text" name="nip" class="form-control" value="<?= $data->nip ?>" />
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Mapel</label>
							<input required type="text" name="mapel" class="form-control" value="<?= $data->mapel ?>" />
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Walikelas</label>
							<select id="kelas" name="kelas" class="form-control select2 select2-info">
								<option value="NULL">none</option>
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
	  					<div class="col-6 my-2">
							<label class="w-100">Password <span style="font-weight: normal; font-size: 14px;">(tidak dirubah)</span></label>
							<div class="input-group">
								<input oninput="passChange(event)" id="password-input" name="password" type="password" class="form-control" />
								<div class="input-group-append">
									<button onclick="togglePassword(this)" class="btn btn-outline-secondary" type="button">
										<i width="16" height="16" data-feather="eye-off" class="feather-icon"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-end col-12 mt-2">
							<button type="submit" class="btn btn-success">Edit</button>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('components/scripts.php') ?>
</body>
<script>
function togglePassword(btn) {
	if (Array.from(btn.children[0].classList).find((x) => x === "feather-eye")) {
		btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off feather-icon"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
		$('#password-input')[0].type = "password"
		return;
	}
	btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye feather-icon"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>'
	$('#password-input')[0].type = "text"
}
function passChange(e) {
	const label = e.target.parentElement.parentElement.children[0].children[0];
	if (e.target.value) {
		label.textContent = "(dirubah)";
		return;
	}
	label.textContent = "(tidak dirubah)"
}
</script>
</html>