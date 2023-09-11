@extends('layouts.app')

@section('content')
<div class="container row cont_principal">
    <div class="col container__slider">
        <div class="cont">
            <input type="radio" name="slider" id="item-1" checked>
            <input type="radio" name="slider" id="item-2">
            <input type="radio" name="slider" id="item-3">

            <div class="cards">
                <label class="card_img" for="item-1" id="selector-1">
                    <img src="/carrusel/carrusel_mario.jpg">
                </label>
                <label class="card_img" for="item-2" id="selector-2">
                    <img src="/carrusel/carrusel_assasing.jpg">
                </label>
                <label class="card_img" for="item-3" id="selector-3">
                    <img src="/carrusel/carrusel_among.jpg">
                </label>
            </div>
        </div>
    </div>

    <div class="col container_register">
        <div class="col-md-10">
            <div class="card contRegister">
                <span class="txtLogin">{{ __('Registrarse') }}</span>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <label for="name" class="col-md col-form-label text-md">{{ __('Name') }}</label>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="email" class="col-md col-form-label text-md">{{ __('Email Address') }}</label>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="usertype" class="col-md col-form-label text-md">{{ __('User Type') }}</label>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <!-- <input id="usertype" type="usertype" class="form-control @error('usertype') is-invalid @enderror" name="usertype" value="{{ old('usertype') }}" required autocomplete="usertype"> -->
                                <select name="usertype" id="usertype" class="form-control @error('usertype') is-invalid @enderror" value="{{ old('usertype') }}" required autocomplete="usertype">
                                    <option value="" selected>----Seleccionar-----</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Vendedor</option>
                                    <option value="3">Cliente</option>
                                </select>
                                @error('usertype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="password" class="col-md col-form-label text-md">{{ __('Password') }}</label>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="password-confirm" class="col-md col-form-label text-md">{{ __('Confirm Password') }}</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrarse') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
