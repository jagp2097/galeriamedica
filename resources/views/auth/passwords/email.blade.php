@extends('layouts.app2')

@section('content')
<div class="text-center mt-5 p-3" style="background-color:#e5e5e5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mt-5">
        <h2 class="mt-2 m-2">{{ __('Reestablecer contraseña') }}</h2>

          <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reestablecer contraseña') }}">
            @csrf

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                <p>
                  <div class="col-md-6">
                  <input id="email" style="width:100%" type="email" class="easyui-textbox" name="email" value="{{ old('email') }}">

                  @if ($errors->has('email'))
                    <small class="text-danger">
                      <strong>{{ $errors->first('email') }}</strong>
                    </small>
                  @endif
                </div>
              </div>
              </p>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="easyui-linkbutton">
                    {{ __('Enviar link para reestablecer contraseña') }}
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

{{--

@extends('layouts.app2')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Reset Password') }}</div>

          <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection




--}}