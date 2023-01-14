@extends('layout.css')
@extends('layout.script')
@section('judul_tab', 'DASHBOARD')
@section('judul_navbar', 'DASHBOARD')

<div class="container">
    {{-- alert message --}}
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
    @if ($message = Session::get('setujui'))
        <div class="alert alert-success alert-block mt-3">
            <strong>Reservasi Milik {{ $message }} berhasil di Disetujui</strong>
        </div>
    @endif
    @if ($message = Session::get('hapus_reservasi'))
        <div class="alert alert-success">
            <strong>Reservasi milik {{ $message }} telah dihapus</strong>
        </div>
    @endif


    {{-- card row --}}
    <div class="row">

        <div class="row mt-3">
            <div class="alert alert-primary" role="alert">
                A simple primary alert—check it out!
              </div>
        </div>

        {{-- search bar --}}
        <div class="row">
            <div class="container mt-3">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('admin.index') }}" class="btn btn-danger mb-3">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i> Dashboard
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="content">
                            <form action="{{ route('cari') }}" method="GET">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search"
                                        aria-describedby="button-addon2" id="cari" name="cari"
                                        value="{{ old('cari') }}">
                                    <button class="btn btn-outline-danger" type="submit" id="button-addon2">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- daftar reservasi lapangan --}}
        <div class="col">
            <div class="card mt-3">
                <div class="card-header p-0">
                    <table class="table table-bordered text-white text-center">
                        <thead class="bg-dark">
                            <tr>
                                <th scope="col">@sortablelink('created_at', 'No')</th>
                                <th scope="col">Waktu Reservasi (yyy-mm-dd)</th>
                                <th scope="col">Dari Jam</th>
                                <th scope="col">Sampai Jam</th>
                                <th scope="col-lg">kegiatan</th>
                                <th scope="col">Peminjam</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @if ($reservasi->isEmpty())
                                <tr>
                                    <td colspan="8">
                                        <h3>Belum ada reservasi</h3>
                                    </td>
                                </tr>
                            @endif


                            @foreach ($reservasi as $i => $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->waktu_mulai }}</td>
                                    <td>{{ $item->waktu_selesai }}</td>
                                    <td>{{ $item->kegiatan }}</td>
                                    <td>{{ $item->tipe_pemesan }}</td>

                                    {{-- status dan tombol2 --}}
                                    @if ($item->status == 'Disetujui')
                                        <td class="text-success">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.show', $item->id) }}" class="btn btn-success"
                                                style="width:37.5%">
                                                <i class="fa fa-print"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            {{-- <a href="{{ route('reservasi.hapus', $item->id) }}"
                                                    style="width:37.5%" class="btn btn-danger">
                                                    
                                                </a> --}}
                                        </td>
                                    @elseif ($item->status == 'Ditolak')
                                        <td class="text-danger">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-success" style="width:37.5%"
                                                href="{{ route('admin.show', $item->id) }}"> <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.hapusreservasi', $item->id) }}"
                                                style="width:37.5%" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td class="text-warning">
                                            <i class="fa-regular fa-clock"></i>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-warning"
                                                href="{{ route('status.edit', $item->id) }}" style="width: 75%">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{-- {{ $reservasi->links() }} --}}
                </div>
            </div>
        </div>
        {{-- end daftar reservasi lapangan --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
