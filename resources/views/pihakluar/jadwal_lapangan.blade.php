@extends('layout.bodyall')
@section('judul_tab', 'JADWAL LAPANGAN')
@section('judul_navbar', 'JADWAL LAPANGAN')
@section('content')


    <a href="/" class="btn btn-danger mb-5">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </a>
    <div class="row mb-4 text-center">
        {{-- disetujui --}}
        <div class="col">
            <div class="card bg-transparent border border-danger">
                <div class="card-body p-0">
                    <table class="table table-borderless text-white">
                        <thead class="bg-danger">
                            <tr>
                                <th>Kode Booking</th>
                                <th>Tanggal</th>
                                <th>Waktu Mulai - Waktu Selesai</th>
                                <th>Nama Pemesan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $item)
                                @if ($item->status == 'Disetujui')
                                    <tr>
                                        <td>{{ $item->kode_booking }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                        <td>{{ $item->waktu_mulai }} : 00 - {{ $item->waktu_selesai }} : 00</td>
                                        <td>{{ $item->penanggungjawab }}</td>
                                        <td class="text-success">
                                            <i class="fa-solid fa-check"></i> ({{ $item->status }})
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                                Detail
                                              </button>
                                            {{-- <a href="{{ route('cetak.pdf', $item->id) }}" target="_blank"
                                                class="btn btn-success">
                                                <i class="fa-solid fa-print"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- row ditolak dan menunggu --}}
    <div class="row justify-content-center text-center">

        {{-- menunggu --}}
        <div class="col">
            <div class="card bg-transparent border border-danger">
                <div class="card-body m-0 p-0">
                    <table class="table table-borderless text-white">
                        <thead class="bg-danger">
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Pemesan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $item)
                                @if ($item->status == 'Menunggu')
                                    <tr>
                                        <td>{{ $item->kode_booking }}</td>
                                        <td>{{ $item->penanggungjawab }}</td>
                                        <td class="text-warning">
                                            <i class="fa-solid fa-clock"></i> ({{ $item->status }})
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                                <i class="fas fa-info "></i>
                                              </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- ditolak --}}
        <div class="col">
            <div class="card bg-transparent border border-danger">
                <div class="card-body m-0 p-0">
                    <table class="table table-borderless text-white">
                        <thead class="bg-danger">
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Pemesan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $item)
                                @if ($item->status == 'Ditolak')
                                    <td>{{ $item->kode_booking }}</td>
                                    <td>{{ $item->penanggungjawab }}</td>
                                    <td class="text-danger">
                                        <i class="fa-solid fa-circlex"></i> ({{ $item->status }})
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                            <i class="fas fa-x "></i>
                                          </button>
                                    </td>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
