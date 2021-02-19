@extends('layouts.app2')

@section('content')
<div class="w3-main w3-padding-64" style="margin-top:11px;background-color:#e5e5e5">  
  <div class="col-md-4 col-md-offset-4"></div>
  <div class="col-md-5 col-md-offset-5 container my-3">
    <div class="card" style="width:100%;">
      <h2 class="mt-3 text-center">Registrarse</h2>
      @if($errors)
        @foreach($errors->all() as $message)
          <small class="text-danger"><strong>{{$message}}</strong></small>
        @endforeach
      @endif
        <div class="card-body mb-2">
        <form method="POST" action="{{route(('register'))}}">
          @csrf
          <div class="container">
            <label>Nombre:</label>
            <p>
              <input class="easyui-textbox form-control" name="name" value="{{ old('name') }}" style="width:100%">
              @if($errors->has('name'))
              <small class="text-danger">
                <strong>{{ $errors->first('name') }}</strong>
              </small>
              @endif
            </p>

            <label>Nombre de usuario:</label>
            <p>
              <input class="easyui-textbox form-control" name="username" value="{{ old('username') }}" style="width:100%">
              @if($errors->has('username'))
              <small class="text-danger">
                <strong>{{ $errors->first('username') }}</strong>
              </small>
              @endif
            </p>

            <label>Correo electrónico:</label>
            <p>
              <input class="easyui-textbox form-control" name="email" value="{{ old('email') }}" style="width:100%">
              @if($errors->has('email'))
              <small class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
              </small>
              @endif
            </p>

            <label>Contraseña:</label>
            <p>
              <input class="easyui-textbox form-control" type="password" name="password" value="{{old('password')}}" style="width:100%">
              @if($errors->has('password'))
              <small class="text-danger">
                <strong>{{ $errors->first('password') }}</strong>
              </small>
              @endif
            </p>

            <label>Confirmar contraseña:</label>
            <p><input class="easyui-textbox" type="password" name="password_confirmation" style="width:100%"></p>

            <p class="container text-center">
              <button type="submit" class="easyui-linkbutton" style="width:100%">Registrarse</button>
            </p>

          </div>

          </form>
        </div>
    </div>    
  </div>
  <div class="col-md-2 col-md-offset-2"></div>
  
</div>

@endsection
