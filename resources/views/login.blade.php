@extends('layout.bodyall')
@section('judul_tab', 'login')
@section('judul_navbar', 'LOGIN')
@section('content')


    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong text-white" style="border-radius: 1rem; background-color:#191919;">
                <div class="card-body p-5">

                    {{-- error message --}}
                    @if ($message = Session::get('danger'))
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{$message}}</p>
                                    </div>
                                </div>
                            </div>
                        
                    @endif
                    @if ($message = Session::get('register_success'))
                        <div class="alert alert-success alert-block mt-3">
                            <strong>{{ $message }} berhasil dibuat</strong>
                        </div>
                    @endif



                    <a href="/" class="btn btn-danger mb-3">
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


                    <h3 class="mb-5">LOG IN <h3>
                            <form action="login" method="post" class="user">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        placeholder="email address" />
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Password" />
                                    {{-- <label class="form-label" for="typePasswordX-2">Password</label> --}}
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="submit" class="btn btn-danger btn-lg btn-block" value="Login">
                                </div>
                                <p style="font-size: 15px;">Belum punya akun ?
                                    <a style="font-size: 15px;" href="{{ route('register.create') }}">
                                        DAFTAR SEKARANG !!!
                                    </a>
                                </p>
                            </form>
                </div>
            </div>
        </div>

        </section>
    @endsection
