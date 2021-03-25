@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link href={{asset('plugins/node-waves/waves.css')}} rel="stylesheet" />
    <link href={{asset('plugins/animate-css/animate.css')}} rel="stylesheet" />
    <link href={{asset('css/admin-template/style.css')}} rel="stylesheet">
    <link href="{{asset('css/admin-template/themes/all-themes.css')}}" rel="stylesheet" />
@endpush

@section('content')
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>{{ __('Panel') }}</b></a>
            <small>{{__('Prueba-LJSM')}}</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="msg">{{__('Inicio de session en el sistema')}}</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text"  class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="email" required autofocus>
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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input class="filled-in chk-col-pink" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-block bg-pink waves-effect">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 align-right">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
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

