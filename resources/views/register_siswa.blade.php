@extends('layout.bodyall')
@section('judul_tab', 'REGISTER')
@section('judul_navbar', 'REGISTER')
@section('content')


    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong text-white" style="border-radius: 1rem; background-color:#191919;">
                <div class="card-body p-5">
                    <a href="{{route('login')}}" class="btn btn-danger mb-3">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </a>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="mb-5">REGISTER<h3>
                            <form action="{{route('register.store')}}" method="post" class="user">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                                        placeholder="name" />
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        placeholder="email address" />
                                </div>
                                <div class="form-outline mb-4">
                                    <select name="kelas_id" id="kelas_id" class="form-select">
                                       @foreach ($kelas as $item)
                                            <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Password" />
                                    {{-- <label class="form-label" for="typePasswordX-2">Password</label> --}}
                                </div>

                                <input type="submit" class="btn btn-danger btn-lg btn-block" value="REGISTER">
                            </form>

                </div>
            </div>
        </div>

        </section>
    @endsection
