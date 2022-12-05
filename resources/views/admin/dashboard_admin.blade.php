@extends('layout.bodyadmin')
@section('judul_tab', 'DASHBOARD')
@section('judul_navbar', 'DASHBOARD')
@section('konten')

    {{-- error message --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block mt-3">
            <strong>{{ $message }} berhasil di tambahkan</strong>
        </div>
    @endif
    @if ($message = Session::get('delete'))
        <div class="alert alert-danger alert-block mt-3">
            <strong> {{ $message }} berhasil di hapus</strong>
        </div>
    @endif

    {{-- card row --}}
    <div class="row">
        <div class="col">
            {{-- jumlah permintaan --}}
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    <h5>Jumlah Permintaan</h5>
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer">
                    <a href="{{ route('akses.index') }}">Lihat lebih detail</a>
                </div>
            </div>

            {{-- jumlah siswa yg terdaftar --}}
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    <h5>Jumlah Siswa yang terdaftar</h5>
                </div>
                <div class="card-body">
                    {{ $jumlah_siswa }}
                </div>
                <div class="card-footer">
                    <a href="" data-bs-toggle="modal" data-bs-target="#detailsiswa">Lihat lebih detail</a>

                    <!-- Modal -->
                    <div class="modal fade" id="detailsiswa" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail_siswa as $i => $item)
                                                <tr>
                                                    <th scope="row">{{ ++$i }}</th>
                                                    {{-- <td>{{ $item-> name }}</td> --}}
                                                    <td>{{ $item->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- fitur lapangan --}}
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    <h5>Fitur - Fitur Lapangan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-borderless">
                        <thead class="text-center">
                            <tr>
                                <th>Fitur Lapangan</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($lapangan as $i => $item)
                                <tr>
                                    <td>{{ $item->nama_lapangan }}</td>
                                    <td>
                                        <a href="{{ route('admin.hapus', $item->id) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{-- {{$lapangan->links()}} --}}

                    {{-- FITUR LAPANGAN --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#example_Modal">TAMBAH FITUR LAPANGAN</button>

                    <!-- Modal -->
                    <div class="modal fade" id="example_Modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">TAMBAH LAPANGAN</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">TAMBAH LAPANGAN</label>
                                            <input type="text" name="nama_lapangan" id="nama_lapangan"
                                                class="form-control" placeholder="" aria-describedby="helpId" re>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">TUTUP</button>
                                    <input type="submit" class="btn btn-success" value="SUBMIT">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card mt-3">
                <div class="card-header p-0">
                    <table class="table table-striped-dark table-borderless text-white text-center">
                        <thead class="bg-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Mulai</th>
                                <th scope="col">Selesai</th>
                                <th scope="col-lg">kegiatan</th>
                                <th scope="col">Peminjam</th>
                                <th scope="col">Status</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @foreach ($reservasi as $i => $item)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->waktu_mulai }}</td>
                                    <td>{{ $item->waktu_selesai }}</td>
                                    <td>{{ $item->kegiatan }}</td>
                                    <td>{{ $item->penanggungjawab }}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('admin.show', $item->id) }}" class="btn btn-success">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    {{-- tabel dan modal fitur lapangan --}}
    <div class="col-3 mt-4 mb-4">

    </div>
    <div class="col-9 mt-4 mb-4">

    </div>
    <div class="row justify-content-center">

    </div>

    <script>
        $('.print-window').click(function() {
            window.print();
        });
    </script>

@endsection
