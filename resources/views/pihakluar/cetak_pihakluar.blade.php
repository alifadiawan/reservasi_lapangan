<!DOCTYPE html>
<html>

<head>

    <title>{{$reservasi->kode_booking}}</title>

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

    <h2>HTML Table</h2>

    <table class="table table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Kode Booking</th>
                <th scope="col">NAMA</th>
                <th scope="col">KELAS</th>
                <th scope="col">JENIS LAPANGAN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $reservasi->kode_booking }}</td>
                <td>{{ $reservasi->penanggungjawab }}</td>
                <td>{{ $reservasi->kelas_id}}</td>
                <td>{{ $reservasi->lapangan->nama_lapangan}}</td>
        </tbody>
    </table>
</body>

</html>
