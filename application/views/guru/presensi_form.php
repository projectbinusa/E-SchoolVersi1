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
		.cancel-btn {
			position: absolute;
			top: 0;
			right: 0;
			line-height: 0.6;
			padding: 7px;
			font-size: 18px;
			user-select: none;
			transition: 0.1s;
			padding-bottom: 9px;
			padding-top: 6px;
			border-radius: 3px;
			cursor: pointer;
		}
		.cancel-btn:hover {
			background-color: whitesmoke;
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
                    <form method="post" action="<?=base_url()?>guru/<?= isset($data->id) ? 'edit_presensi_api/'.$data->id : 'tambah_presensi_api' ?>" class="container-fluid mt-5 col-8 row">
	  					<div class="col-6 my-2">
							<label class="w-100">Kelas</label>
							<select onchange="getSiswas(event.target.value)" id="kelas" name="kelas" class="form-control select2 select2-info" id="kelas">
								<?php foreach ($kelas as $option): ?>
									<option value="<?= $option->id ?>"<?= $option->id == $data->kelas_id ? ' selected' : '' ?>>
										<?= $option->label ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
	  					<div class="col-6 my-2">
							<label class="w-100">Tanggal</label>
							<input required type="date" value="<?= $data->tanggal ? $data->tanggal:date('Y-m-d') ?>" name="tanggal" class="form-control" />
						</div>
						<input hidden name="jumlah_siswa" id="jumlah_siswa" />
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
                                <tbody id="tbody" class="table-light">
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
    const kehadiran = {
        <?php foreach ($kehadiran as $row): ?>
        ['<?=$row->siswa_id?>']: '<?=$row->keterangan?>',
        <?php endforeach; ?>
    }
	function cancelSelect(btn) {
		const row = btn.parentElement.parentElement.children;
		row[2].children[0].children[0].checked = false;
		row[3].children[0].children[0].checked = false;
		row[4].children[0].children[0].checked = false;
	}
	function getSiswas(id) {
		$.ajax({
			url: `<?=base_url()?>guru/get_siswas_bykelas/${id}`,
			success: async (res) => {
				const data = JSON.parse(await res);
				const table = $('#tbody')
				let rows = ""
				data.forEach((row, i) => {
					rows += 
					`<tr>
						<td style="width: 14%;" class="text-center">${i+1}</td>
						<td style="width: 47%;" class="position-relative">
							${row.nama_siswa}
                            <input hidden value="${row.id}" name="siswa${i}" readonly />
							<div class="cancel-btn" onclick="cancelSelect(this)">
								x
							</div>
						</td>
						<td style="width: 13%;" class="text-center p-0">
							<label class="p-3 w-100">
								<input value="Izin"${kehadiran[row.id] === "Izin" ? " checked":""} type="radio" name="kehadiran${i}" />
							</label>
						</td>
						<td style="width: 13%;" class="text-center p-0">
							<label class="p-3 w-100">
								<input value="Sakit"${kehadiran[row.id] === "Sakit" ? " checked":""} type="radio" name="kehadiran${i}" />
							</label>
						</td>
						<td style="width: 13%;" class="text-center p-0">
							<label class="p-3 w-100">
								<input value="Bolos"${kehadiran[row.id] === "Bolos" ? " checked":""} type="radio" name="kehadiran${i}" />
							</label>
						</td>
					</tr>`
				})
				$('#jumlah_siswa')[0].value = data.length;
				table.html(rows)
			}
		})
	}
	getSiswas(<?=$kelas[0]->id?>);
</script>
</html>