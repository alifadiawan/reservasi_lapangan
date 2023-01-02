@extends('layout.bodyall')
@section('judul_tab')
@section('judul_navbar')
@section('content')

    <div class="row">
        <div class="content text-center">
            <h1>Reservasi Lapangan</h1>
                <div class="d-flex justify-content-center mt-4">
                    <a href="{{ route('login') }}" class="btn-get-started scrollto">Siswa / admin</a>
                    <a href="{{ route('reservasi.create') }}" class="btn-get-started scrollto">pihak luar</a>
                    <a href="{{ route('reservasi.index') }}" class="btn-get-started scrollto">JADWAL LAPANGAN</a>
                </div>
        </div>
    </div>

    


@endsection
