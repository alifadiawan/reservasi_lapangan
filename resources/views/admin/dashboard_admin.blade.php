@extends('layout.bodyadmin')
@section('judul_tab', 'DASHBOARD')
@section('judul_navbar', 'DASHBOARD')
@section('konten')

    {{-- card row --}}
    <div class="row">

        {{-- search bar --}}
        <div class="row">
            <div class="container mt-3">
                <div class="row justify-content-end">
                    <div class="col">
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
                        @if ($message = Session::get('hapus_reservasi'))
                            <div class="alert alert-success">
                                <strong>Reservasi milik {{ $message }} telah dihapus</strong>
                            </div>
                        @endif
                    </div>

                    {{-- search bar --}}
                    <div class="content w-25">
                        <form action="{{ route('cari') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bg-light" placeholder="Search"
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

        {{-- jumlah siswa yg terdaftar --}}
        <div class="col">

            {{-- fitur lapangan --}}
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h5>Fitur Lapangan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-borderless">
                        <thead class="">
                            <tr>
                                <th>Nama Fitur</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
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


                {{-- FITUR LAPANGAN --}}
                <div class="card-footer">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#example_Modal">TAMBAH FITUR LAPANGAN</button>

                    <!-- Modal fitur lapangan -->
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
                                                class="form-control" placeholder="" aria-describedby="helpId">
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

        {{-- daftar reservasi lapangan --}}
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-borderless text-white text-center">
                        <thead class="bg-dark">
                            <tr>
                                <th scope="col">@sortablelink('kode_booking', 'No')</th>
                                <th scope="col">Waktu Reservasi</th>
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
                                    <th scope="row">{{ $item->kode_booking }}</th>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->waktu_mulai }}</td>
                                    <td>{{ $item->waktu_selesai }}</td>
                                    <td>{{ $item->kegiatan }}</td>
                                    <td>{{ $item->penanggungjawab }}</td>

                                    {{-- status dan tombol2 --}}
                                    @if ($item->status == 'Disetujui')
                                        <td class="text-success">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.show', $item->id) }}" class="btn btn-success">
                                                <i class="fa fa-print"></i>
                                            </a>
                                            <!-- Modal delete reservasi -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus reservasi ini ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="{{ route('reservasi.hapus', $item->id) }}"
                                                                class="btn btn-primary">Save
                                                                changes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    @elseif ($item->status == 'Ditolak')
                                        <td class="text-danger">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-success"
                                                href="{{ route('admin.show', $item->id) }}"> <i class="fa fa-eye"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus reservasi ini ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="{{ route('reservasi.hapus', $item->id) }}"
                                                                class="btn btn-danger">Save
                                                                changes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="text-warning">
                                            <i class="fa-regular fa-clock"></i>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-warning"
                                                href="{{ route('admin.konfirmasi', $item->id) }}" style="width: 75%">
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
                    <div class="row mt-3">
                        <div class="col">
                            {{ $reservasi->links() }}
                        </div>
                        <div class="col-md-2">
                            Jumlah Data : {{ $reservasi->total() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end daftar reservasi lapangan --}}

    </div>

@endsection
