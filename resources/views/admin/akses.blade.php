@extends('layout.bodyadmin')
@section('judul_tab', 'AKSES')
@section('judul_navbar', 'AKSES')
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

                {{-- serch bar --}}
                <div class="col d-flex flex-row-reverse">

                </div>

                {{-- tombol search --}}
                <div class="col d-flex flex-row-reverse">
                    <div class="content">
                        <a onclick="javascript:showDiv();" class="btn btn-dark">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                    <div class="input" id="search_bar">
                        <input type="text">
                    </div>
                </div>
            </div>

            <div class="col-3 mt-3">
                {{-- card permintaan --}}
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5>Permintaan dari</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless text-center">
                            <thead>
                                <tr>
                                    <th>Nama Pemesan</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            @foreach ($reservasi as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $item->penanggungjawab }}</th>
                                        <td>
                                            <a onclick="show({{ $item->id }})" class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-9 mt-3">

                {{-- tabel akses --}}
                <div class="card">
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
                                        <td></td>
                                        <td>
                                            <a href="" class="btn btn-success">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="" class="btn btn-danger">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- show reservasi --}}
                <div class="card">
                    <div class="card shadow-mb-4">
                        <div class="card-header bg-dark">
                            <h6 class="m-0 font-weight-bold text-white">Project Siswa</h6>
                        </div>
                        <div class="card-body " id="reservasi">
                            <div class="text-center">
                                <h6>Pilih pesanan terlebih dahulu</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //hide show dinamis request
        function show(id) {
            $.get('akses/' + id, function(data) {
                $('#reservasi').html(data);
            })

        }

        //show search bar
        function showDiv() {
            div = document.getElementById('search_bar');
            div.style.display = "block";
        }
    </script>


@endsection