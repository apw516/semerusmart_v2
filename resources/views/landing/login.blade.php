@extends('templates_landing.main')
@section('container')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/login-form-09/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('public/login-form-09/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/login-form-09/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('public/login-form-09/css/style.css')}}">
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                <div class="mb-2">
                                    <h3>Silahkan Login</h3>
                                </div>
                                <form action="#" method="post">
                                    <div class="form-group first">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username">

                                    </div>
                                    <div class="form-group last mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <input type="submit" value="Log In"
                                        class="btn btn-pill text-white btn-block btn-success">
                                    <span class="d-block text-center my-4 text-muted"> Register</span>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
