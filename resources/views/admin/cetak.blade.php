<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <table class="table table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Kode Booking</th>
                <th scope="col">NAMA</th>
                <th scope="col">KELAS</th>
                <th scope="col">JENIS LAPANGAN</th>
                @if ($reservasi->status == 'Ditolak')
                    <th scope="col">Alasan Ditolak</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $reservasi->kode_booking }}</td>
                <td>{{ $reservasi->user->name }}</td>
                <td>{{ $reservasi->user->kelas_id }}</td>
                <td>{{ $reservasi->lapangan->nama_lapangan }}</td>
                @if ($reservasi->status == 'Ditolak')
                    <td>{{ $reservasi->alasan }}</td>
                @endif
            </tr>
        </tbody>
    </table>
</body>

</html>
