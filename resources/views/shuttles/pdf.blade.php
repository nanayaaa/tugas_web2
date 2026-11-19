<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Armada Shuttle</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Data Armada Shuttle PjBL</h2>
    <table>
        <thead>
            <tr>
                <th width="10%">No</th>
                <th width="35%">Nama Armada</th>
                <th width="20%">Kapasitas</th>
                <th width="35%">Rute Operasional</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shuttles as $index => $shuttle)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $shuttle->nama_armada }}</td>
                <td>{{ $shuttle->kapasitas }} Orang</td>
                <td>{{ $shuttle->rute_operasional }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
