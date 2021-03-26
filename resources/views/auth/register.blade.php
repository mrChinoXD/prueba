@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link href={{asset('plugins/node-waves/waves.css')}} rel="stylesheet" />
    <link href={{asset('plugins/animate-css/animate.css')}} rel="stylesheet" />
    <link href={{asset('css/admin-template/style.css')}} rel="stylesheet">
    <link href="{{asset('css/admin-template/themes/all-themes.css')}}" rel="stylesheet"/>
@endpush

@section('content')
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Prueba<b>LJSM</b></a>
            <small>sistem</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" novalidate="novalidate" action="{{route('register')}}">
                    @method('POST')
                    @csrf
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" required="" value="{{ old('name') }}" autofocus="" aria-required="true">
                            @error('name')
                            <span class="font-bold col-pink" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address"  value="{{ old('email') }}" required="" aria-required="true">
                            @error('email')
                            <span class="font-bold col-pink" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" minlength="6" placeholder="Password" required="" aria-required="true">
                            @error('password')
                            <span class="font-bold col-pink" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control @error('password-confirmation') is-invalid @enderror" name="password_confirmation" minlength="6" placeholder="Confirm Password" required="" aria-required="true">
                            @error('password-confirmation')
                            <span class="font-bold col-pink" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="sign-in.html">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src={{asset('plugins/jquery/jquery.min.js')}}></script>
    <script src={{asset('plugins/bootstrap/js/bootstrap.js')}}></script>
    <script src={{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}></script>
    <script src={{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}></script>
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>
    <script src={{asset('js/admin-template/admin.js')}}></script>
    <script src={{asset('js/admin-template/demo.js')}}></script>
@endpush
a
