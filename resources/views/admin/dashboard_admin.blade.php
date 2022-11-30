@extends('layout.bodyadmin')
@section('judul_tab', 'DASHBOARD')
@section('judul_navbar', 'DASHBOARD')
@section('konten')


    {{-- card row --}}
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    <h5>Jumlah Permintaan</h5>
                </div>
                <div class="card-body">
                    <h5>belum</h5>
                </div>
                <div class="card-footer">
                    <a href="">Lihat lebih detail</a>
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
                                <th scope="col">Hari</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Mulai</th>
                                <th scope="col">Selesai</th>
                                <th scope="col-lg">kegiatan</th>
                                <th scope="col">Peminjam</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            {{-- @foreach ($reservasi as $i->$item) --}}
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="" class="btn btn-success">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- error message --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-3">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('delete'))
            <div class="alert alert-danger alert-block mt-3">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        {{-- tabel dan modal fitur lapangan --}}
        <div class="col-3 mt-4 mb-4">
            <div class="card p-0">
                <div class="card-header bg-dark text-white text-center">
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
                                    <form action="{{ route('admin.store') }}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">TAMBAH LAPANGAN</label>
                                            <input type="text" name="nama_lapangan" id="nama_lapangan"
                                                class="form-control" placeholder="" aria-describedby="helpId" re>
                                        </div>
                                        <div class="form-group">
                                            <label for="">TAMBAH FOTO LAPANGAN</label>
                                            <input type="file" name="nama_lapangan" id="nama_lapangan"
                                                class="form-control" placeholder="" aria-describedby="helpId" re>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">TUTUP</button>
                                    <input type="submit" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ================== --}}

                </div>
            </div>
        </div>
        <div class="col-9 mt-4 mb-4">

        </div>
    </div>
    <div class="row justify-content-center">

    </div>

@endsection
