<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Data</h1>
        <table class="table-auto w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Nama Data</th>
                    <th class="px-4 py-2">Lokasi</th>
                    <th class="px-4 py-2">Jumlah Pedagang</th>
                    <th class="px-4 py-2">Pendapatan Harian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $data->nama_data }}</td>
                        <td class="px-4 py-2">{{ $data->lokasi }}</td>
                        <td class="px-4 py-2">{{ $data->jumlah_pedagang }}</td>
                        <td class="px-4 py-2">{{ $data->pendapatan_harian }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
