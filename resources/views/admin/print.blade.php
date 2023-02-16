@extends('layout.bodyadmin')
@section('judul_tab', 'STATUS')
@section('judul_navbar', 'STATUS')
@section('konten')

    <div class="row justify-content-center">
        <div class="row mt-3">
            <div class="col">
                <a href="{{ route('admin.index') }}" class="btn btn-danger mb-3">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
        <div class="col-md-9 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">Nama Pemesan</div>
                        <div class="col text-end">{{ $reservasi->penanggungjawab }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">Jenis Lapangan</div>
                        <div class="col text-end">{{ $reservasi->lapangan->nama_lapangan }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">Waktu Mulai</div>
                        <div class="col text-end">{{ $reservasi->waktu_mulai }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">Waktu Selesai</div>
                        <div class="col text-end">{{ $reservasi->waktu_selesai }}</div>
                    </div>
                    <hr>
                    @if ($reservasi->status == 'Ditolak')
                        <div class="row">
                            <div class="col">Alasan Ditolak</div>
                            <div class="col text-end">{{ $reservasi->alasan }}</div>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col">
                            <a class="btn btn-danger" href="{{ route('admin.cetakpdf', $reservasi->id) }}">
                                <i class="fas fa-print"></i> Cetak
                            </a>
                            <a href="" class="btn btn-outline-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
