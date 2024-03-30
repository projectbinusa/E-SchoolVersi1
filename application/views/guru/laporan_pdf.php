<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan</title>
    <style>
    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: #4CAF50;
        color: white;
    }
    .text-center {
        text-align: center;
    }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Laporan PDF Prsensi</h3>
    </div>

    <table style="font-family: Arial, Helvetica, sans-serif; width: 100%; margin-bottom:20px">
        <tr>
            <td>Kelas : <?=$kelas->nama?></td>
            <td></td>
            <td style="text-align: right">Tanggal : <?= indonesian_date($presensi->tanggal) ?></td>
        </tr>
    </table>

    <table id="table">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Izin</th>
                <th class="text-center">Alpha</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; foreach ($siswa as $row): ?>
            <tr>
                <td class="text-center"><?= $i+1 ?></td>
                <td class=""><?= $row->nama_siswa ?></td>
                <td class="text-center"><?= isset($kehadiran[$row->id]) && $kehadiran[$row->id] == 'Sakit' ? 'X' : '' ?></td>
                <td class="text-center"><?= isset($kehadiran[$row->id]) && $kehadiran[$row->id] == 'Izin' ? 'X' : '' ?></td>
                <td class="text-center"><?= isset($kehadiran[$row->id]) && $kehadiran[$row->id] == 'Bolos' ? 'X' : '' ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>

</html>