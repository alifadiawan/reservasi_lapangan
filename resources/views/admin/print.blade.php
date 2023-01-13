@extends('layout.bodyall')
@section('judul_tab', 'tes')
@section('judul_navbar', 'LOGIN')
@section('content')


    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8 ">
            <div class="card shadow-2-strong text-white" style="border-radius: 1rem; background-color:#191919;">
                <div class="card-body p-5">

                    <div id="not_print">
                        <a href="{{ route('admin.index') }}"" class="btn btn-danger mb-3">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a>
                    </div>

                    <table class="table table-borderless text-center">
                        <thead class="text-center text-white">
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jenis Lapangan</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                            </tr>
                        </thead>

                        <tbody class="text-white">
                            <tr>
                                <td>{{ $reservasi->penanggungjawab }}</td>
                                <td>{{ $reservasi->tanggal }}</td>
                                <td>{{ $reservasi->waktu_mulai }}</td>
                                <td>{{ $reservasi->waktu_selesai }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    @endsection
