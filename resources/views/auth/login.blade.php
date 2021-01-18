@extends('layout.general')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('iniciar sesion') }}</div>

                <div class="card-body">
                    <br>
                    <h1 class="h3 mb-2 font-weight-normal" align="center">Ingrese sus datos</h1>
                    <br>
                    <form method="POST" action="{{ route('login') }}">
                    <img class="mb-4 col-md-5 col-form-label" src="https://pa1.narvii.com/7686/bbcd8e1e253ef8d4ae017a1b4fe4c5e005481a0ar1-498-280_00.gif" alt="" width="300" height="150" align="right">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8 col-form-label">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8 col-form-label " >
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ingresar') }}
                                </button>

                            </div>
                        </div>

                        <br>
                        </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
