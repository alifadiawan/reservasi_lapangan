@extends('layout.bodyadmin')
@section('judul_tab', 'STATUS')
@section('judul_navbar', 'STATUS')
@section('konten')

    <div class="container mt-3">
        <div class="row">
            <div class="row mt-3">
                {{-- kembali ke dashboard --}}
                <div class="col">
                    <a href="{{ route('admin.index') }}" class="btn btn-danger mb-3">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali ke Dashboard
                    </a>
                </div>

                {{-- search bar --}}
                <div class="col d-flex flex-row-reverse">
                    <div class="content">
                        <form action="" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="cari" placeholder="cari"
                                    aria-label="cari" aria-describedby="button-addon2">
                                <button class="btn btn-outline-dark" type="submit" id="button-addon2">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col mt-3">
                {{-- card permintaan --}}
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless text-center">
                            <thead>
                                <tr>
                                    <th>Nama Peanggung Jawab</th>
                                    <th>Tanggal</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            @foreach ($reservasi as $item)
                                <tbody>
                                    <tr>
                                        <td scope="row">{{ $item->penanggungjawab }}</td>
                                        <td scope="row">{{ $item->tanggal }}</td>

                                        <td>
                                            <a class="btn btn-sm btn-dark" href="{{ route('status.edit', $item->id) }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>



            {{-- <div class="col-9 mt-3"> --}}

            {{-- tabel akses --}}
            {{-- <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped-dark table-borderless text-white text-center">
                            <thead class="bg-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Booking</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>
                                    <th scope="col">kegiatan</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                @foreach ($reservasi as $i => $item)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $item->kode_booking }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->waktu_mulai }}</td>
                                        <td>{{ $item->waktu_selesai }}</td>
                                        <td>{{ $item->kegiatan }}</td>
                                        <td>{{ $item->penanggungjawab }}</td>
                                        <td class="text-warning">{{ $item->status }}</td>
                                        <td>
                                            <form action="">
                                                <a href="" class="btn btn-success">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="" class="btn btn-danger">
                                                    <i class="fa fa-ban"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}



            <script>
                //hide show dinamis request
                function show(id) {
                    $.get('status/' + id, function(data) {
                        $('#reservasi').html(data);
                    })

                }
            </script>


        @endsection
