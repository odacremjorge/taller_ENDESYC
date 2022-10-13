@extends('layouts.app')

@section('content')

<center>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <center><img src="{{asset('images/logo.png')}}" width="250" loading="lazy"></center>
                <div class="card-header text-white">{{ __('Iniciar Sesion') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-transparent text-white" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-xl-end text-white">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-transparent text-white" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-5 offset-md-4">
                                <button type="submit" class="btn btn-outline-info">
                                    {{ __('Iniciar Sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu Contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <a style="color:red">
                            @if(Session::has('error')){{
                            Session::get('error')
                            }}
                            @endif
                        </a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</center>
@endsection
