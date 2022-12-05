@extends('layout.bodyall')
@section('judul_tab', 'login')
@section('judul_navbar', 'LOGIN')
@section('content')


    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong text-white" style="border-radius: 1rem; background-color:#191919;">
                <div class="card-body p-5">

                    {{-- back button --}}
                    <div id="not_print">
                        <a href="{{route('admin.index')}}"" class="btn btn-danger mb-3">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a>
                    </div>

                    {{-- printable --}}
                    <table class="table table-borderless text-center">
                        <thead class="text-center">
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jenis Lapangan</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                            </tr>
                        </thead>
                        {{-- @foreach ($reservasi as $item) --}}
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                        {{-- @endforeach --}}
                    </table>



                </div>
            </div>
        </div>

        </section>
    @endsection
