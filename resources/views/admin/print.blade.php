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

    <div class="container">
        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">KODE BOOKING</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">KELAS</th>
                    <th scope="col">JENIS LAPANGAN</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($reservasi as $item) --}}
                    <tr>
                        <th scope="row"></th>
                        <td>{{$reservasi->nama}}</td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>

</body>

</html>
