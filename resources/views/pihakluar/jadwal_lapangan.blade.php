@extends('layout.bodyall')
@section('judul_tab', 'JADWAL LAPANGAN')
@section('judul_navbar', 'JADWAL LAPANGAN')
@section('content')

    <a href="/" class="btn btn-danger mb-5">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </a>
    <div class="row justify-content-center">
        <h1 class="text-center mb-3">Jadwal Lapangan</h1>
        <div class="col">
            <table class="table table-striped-dark table-borderless text-white text-center">
                <thead class="bg-danger">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Selesai</th>
                        <th scope="col">kegiatan</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Status</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                @foreach ($reservasi as $i => $item)
                    <tr>
                        @if ($item->status == 'Disetujui')
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->waktu_mulai }}</td>
                            <td>{{ $item->waktu_selesai }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->penanggungjawab }}</td>
                            <td class="text-success">
                                <i class="fa-solid fa-circle-check"></i>
                            </td>
                            <td>
                                <a href="{{ route('admin.show', $item->id) }}" class="btn btn-outline-success">
                                    Print <i class="fa fa-print"></i>
                                </a>
                            </td>
                        @elseif ($item->status == 'Ditolak')
                            {{-- <td class="text-danger">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </td> --}}
                        @else
                            {{-- <td class="text-warning">
                                <i class="fa-solid fa-clock"></i>
                            </td> --}}  
                        @endif
                    </tr>
                @endforeach
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection
