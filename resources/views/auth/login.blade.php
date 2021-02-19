@extends('layouts.app2')

@section('content')
<div class="w3-main w3-padding-64" style="margin-top:11px;background-color:#e5e5e5">  
  <div class="col-md-4 col-md-offset-4"></div>
  <div class="col-md-5 col-md-offset-5 container my-4">
    <div class="card text-center" style="width:100%;">
      <h2 class="mt-4">Iniciar Sesión</h2>
      <div class="card-body m-1">
        <h5>Usuario: demo-proyecto</h5>
        <h5>Contraseña: admin</h5>        
        <form method="POST" action="{{route(('login'))}}">
        @csrf
        <div class="container text-center">
          <p class="mb-4">
          <input id="tbUsuario" type="text" name="login" value="{{ old('username') ?: old('email') }}" style="width:100%;height:35px">
          @if ($errors->has('username') || $errors->has('email'))
            <small class="text-danger">
              <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
            </small>
          @endif
          </p>      

          <p class="mb-5">
          <input id="tbPassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" style="width:100%; height: 35px">
          @if ($errors->has('password'))
            <small class="text-danger">
              <strong>{{ $errors->first('password') }}</strong>
            </small>
          @endif
          </p>
                        
          <p>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordarme') }}
          </p>
            
          <p>
            <button type="submit" class="easyui-linkbutton" style="width:100%">Ingresar</button>
          </p>

          <a class="btn btn-link mb-2" href="{{ route('password.request') }}">
            {{ __('¿Olvidaste tu contraseña?') }}
          </a>

        </div>
        </form>
      </div>
    </div>    
  </div>
  <div class="col-md-2 col-md-offset-2"></div>
  
</div>

@endsection
