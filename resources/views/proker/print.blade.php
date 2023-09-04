<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Program Kerja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <center>
        <h3>Laporan Program Kerja</h3>
    </center><br>
    <hr><br>
    <table class="table m-4">
        <thead>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama Program Kerja</th>
            <th>Anggaran</th>
            <th>Semester</th>
            <th>Tahun</th>
            <th>Status</th>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($datas as $data)
                @if ($data->prokers->toArray() != [])
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kategori }}</td>
                        @foreach ($data->prokers as $item)
                            @php
                                $total += str_replace(',', '', $item->anggaran);
                            @endphp
                            <td>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $item->nama_proker }}</td>
                        <td>{{ $item->anggaran }}</td>
                        <td>{{ $item->semester }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>
                            @if ($item->status == 1)
                                <span class="badge bg-success">Sudah Dilaporkan</span>
                            @elseif($item->status == 2)
                                <span class="badge bg-danger">Belum Dilaporkan</span>
                            @endif
                        </td>
                    </tr>
                    </td>
                @endforeach
                </tr>
            @endif
            @endforeach
        </tbody>
        <tfoot>
            <th colspan="3"> Total</th>
            <th>{{ number_format($total) }}</th>
            <th colspan="3"></th>
        </tfoot>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
