@extends('layout.bodyall')
@section('judul_tab', 'JADWAL LAPANGAN')
@section('judul_navbar', 'JADWAL LAPANGAN')
@section('content')

<a href="/" class="btn btn-danger mb-3">
  <i class="fa fa-chevron-left" aria-hidden="true"></i>
</a>
<div class="row justify-content-center w-75 d-flex ">
    <table class="table table-striped-dark table-borderless text-white text-center">
        <thead class="bg-danger">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Hari</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Mulai</th>
            <th scope="col">Selesai</th>
            <th scope="col">kegiatan</th>
            <th scope="col">Penanggung Jawab</th>
          </tr>
        </thead>
        @foreach ($data as $i => $item)
        <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$item -> hari}}</td>
            <td>{{$item -> tanggal}}</td>
            <td>{{$item -> waktu_mulai}}</td>
            <td>{{$item -> waktu_selesai}}</td>
            <td>{{$item -> kegiatan}}</td>
            <td>{{$item -> penanggungjawab}}</td>
          </tr>
        @endforeach 
        <tbody>
        </tbody>
      </table>
</div>

@endsection