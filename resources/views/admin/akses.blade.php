@extends('layout.bodyadmin')
@section('judul_tab', 'STATUS')
@section('judul_navbar', 'STATUS')
@section('konten')

    <div class="row">
        <div class="col mt-3">
            <div class="col">
                <a href="{{ route('admin.index') }}" class="btn btn-danger mb-3">
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
                    </form>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Decline
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alasan ditolak</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('status.update', $reservasi->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="kegiatan">Alasan</label>
                                            <input type="text" name="alasan" id="alasan" class="form-control"
                                                aria-describedby="helpId">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="status" name="status" class="btn btn-outline-danger"
                                        value="{{ 'Ditolak' }}">Decline</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
