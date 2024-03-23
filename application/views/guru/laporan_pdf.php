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
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Laporan PDF Prsensi</h3>
    </div>

    <table id="table">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">tanggal</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Alpha</th>
                <th class="text-center">Izin</th>
                <th class="text-center">Sakit</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; foreach ($kehadiran as $row): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $row->tanggal ?></td>
                <td><?= $row->kelas ?></td>
                <td><?= $row->bolos ?></td>
                <td><?= $row->izin ?></td>
                <td><?= $row->sakit ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>

</html>