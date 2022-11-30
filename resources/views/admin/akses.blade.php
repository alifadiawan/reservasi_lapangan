@extends('layout.bodyadmin')
@section('judul_tab', 'AKSES')
@section('judul_navbar', 'AKSES')
@section('konten')

    <div class="container mt-3">
        <div class="row">
            <div class="col-4 mt-3">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5>Permintaan dari</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-borderless">
                            <thead >
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Pemesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>auhd</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-3">
                <div class="card">
                    <div class="card-body p-0">
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
    </div>

@endsection
