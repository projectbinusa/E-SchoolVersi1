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
        <h3>Laporan PDF Presensi Tanggal <?= $tgl ?></h3>
    </div>
    <?php $i = 0; foreach($presensi as $_): ?>

        <table style="font-family: Arial, Helvetica, sans-serif; width: 100%; margin-bottom:20px; margin-top: 40px">
            <tr>
                <td>Kelas : <?=$kelas[$i]->nama?></td>
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
                <?php $j = 0; foreach ($kehadiran[$i] as $row): ?>
                <tr>
                    <td class="text-center"><?= $j+1 ?></td>
                    <td class=""><?= $row->nama ?></td>
                    <td class="text-center"><?= $row->keterangan == 'Sakit' ? 'X' : '' ?></td>
                    <td class="text-center"><?= $row->keterangan == 'Izin' ? 'X' : '' ?></td>
                    <td class="text-center"><?= $row->keterangan == 'Bolos' ? 'X' : '' ?></td>
                </tr>
                <?php $j++; endforeach; ?>
            </tbody>
        </table>
    <?php $i++; endforeach ?>
</body>

</html>