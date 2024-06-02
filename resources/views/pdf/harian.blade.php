<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Harian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 2px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fff;
        }
    </style>
</head>
<body>

    
    <table>
        <thead>
            <tr>
                <th colspan="2">
                    <h2>Rekap Laporan Harian</h2>
                </th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>{{$today}}</th>
            </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Rencana</th>
                <th>Realisasi</th>
                <th>Persentase (%)</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
            <?php $num = 1 ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->rencana }}</td>
                        <td>{{ $item->realisasi }}</td>
                        <td>{{ $item->persentase }}%</td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td colspan="5">Tidak ada data</td>
            </tr>
            @endif
        </tbody>
    </table>

</body>
</html>