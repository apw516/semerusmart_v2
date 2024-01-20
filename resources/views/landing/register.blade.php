@extends('templates_landing.main')
@section('container')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/login-form-09/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/login-form-09/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/login-form-09/css/bootstrap.min.css') }}">

    <!-- Style -->
    {{-- <link rel="stylesheet" href="{{ asset('public/login-form-09/css/style.css')}}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .content {
            padding: 7rem 0;
        }
    </style>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                <div class="mb-2">
                                    <h3>Silahkan Daftar</h3>
                                </div>
                                <form method="post" action="{{ route('/register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input required type="text" class="form-control" id="nama" name="nama"
                                            aria-describedby="emailHelp" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div>
                                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <div>
                                                <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Unit</label>
                                        <select required class="form-control" id="unit" name="unit">
                                            <option value="1">IT</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hak Akses</label>
                                        <select required class="form-control" id="hak_akses" name="hak_akses">
                                            <option value="1">Super Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input required type="password" class="form-control" id="password" name="password"
                                            aria-describedby="emailHelp">
                                        @error('password2')
                                            <div>
                                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Konfirmasi Password</label>
                                        <input required type="password" class="form-control" id="password2" name="password2"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" class="btn btn-success"><i class="bi bi-r-square"></i>
                                        Daftar</button>
                                    <a type="button" href="{{ route('login') }}" class="btn btn-info"><i
                                            class="bi bi-box-arrow-in-right"></i> Login</a>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
