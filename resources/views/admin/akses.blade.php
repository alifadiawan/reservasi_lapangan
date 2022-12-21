@extends('layout.bodyadmin')
@section('judul_tab', 'STATUS')
@section('judul_navbar', 'STATUS')
@section('konten')

    <div class="row">
        <div class="col mt-3">
            <div class="col">
                <a href="{{ route('status.index') }}" class="btn btn-danger mb-3">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali ke Dashboard
                </a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h1>Pesanan milik {{ $reservasi->penanggungjawab }}</h1>
                </div>
                <div class="card-body">
                    <h5>Jenis Lapangan : </h5>
                    <h5>Dari jam : {{ $reservasi->waktu_mulai }}</h5>
                    <h5>Dari jam : {{ $reservasi->waktu_selesai }}</h5>
                    <p>kegiatan : {{ $reservasi->kegiatan }}</p>
                </div>
                <div class="card-footer">
                    <form action="{{ route('status.update', $reservasi->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" id="status" name="status" class="btn btn-success"
                            value="{{ 'Disetujui' }}">Approve</button>
                        <button type="submit" id="status" name="status" class="btn btn-outline-danger"
                            value="{{ 'Ditolak' }}">Decline</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
