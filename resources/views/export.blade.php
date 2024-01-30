<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Agama</th>
                <th scope="col">Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->birthdate)->age }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->birthdate }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->religion }}</td>
                    <td>{{ $item->profession }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
