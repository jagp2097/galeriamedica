<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Archivo de Pacientes - @yield('Titulo')</title>
    <link rel="icon" href="{{ asset('imagenes/medicina sin fondo.ico') }}">  
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>       

    <script src="{{ asset('js/elementosGaleria.js') }}"></script>
    <script src="{{ asset('js/tilesImgs.js') }}"></script>
    <script src="{{ asset('js/scriptAc.js') }}"></script>
    <script src="{{ asset('js/scriptDl.js') }}"></script>  
    <script src="{{ asset('js/functions.js') }}"></script>

    <script src="{{ asset('Wookmark/libs/jquery.imagesloaded.js') }}"></script>
    <script src="{{ asset('Wookmark/jquery.wookmark.js') }}"></script>   
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Styles -->
    <script src="{{ asset('magnific-popup/jquery.magnific-popup.js') }}"></script>
    <link href="{{asset('magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <script src="{{ asset('easyui/jquery.easyui.min.js') }}"></script>
    <link href="{{ asset('easyui/themes/default/easyui.css') }}" rel="stylesheet">
    <link href="{{ asset('easyui/themes/icon.css') }}" rel="stylesheet">
    
    <link href="{{ asset('Remodal-master/dist/remodal.css') }}" rel="stylesheet">
    <link href="{{ asset('Remodal-master/dist/remodal-default-theme.css') }}" rel="stylesheet">

    <link href="{{ asset('Wookmark/css/main.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 

    <script type="text/javascript">
      
    $(window).on('load', function(){
      $('#loading').delay(1000).fadeOut('slow');
    });
    </script>

</head>
<body>

  <span class="text-center" id="loading">
    <p><img src="{{ asset('imagenes/Rolling.gif') }}" width="80" height="80"><br>Cargando...</p>
  </span>

  <div class="w3-bar w3-container w3-top" style="background:#B3DFDA;">

 	<a class="w3-bar-item" href="{{ url('/') }}">
        <img src="{{ asset('imagenes/medicina sin fondo.png') }}" width="60" height="60" alt="Logo_hospital">
   	</a>

    <a class="w3-bar-item w3-hide-medium" href="{{ url('/') }}">
        <img src="{{ asset('imagenes/plastica.png') }}" width="45" height="60" alt="Logo_plastica">
    </a>

    @can('panelAdmin', galeriamedica\User::class)
    <a class="btn btn-outline-info mt-4 w3-hide-small" style="text-decoration:none;" href="{{ route('user.index') }}">Administración de usuarios</a>
    @endcan

    @guest
    <a class="btn btn-outline-info w3-right mt-4" href="{{ route('register') }}">{{ __('Registrarse') }}</a>

    @else

    @yield('icons')

    <a class="btn btn-outline-info w3-right mt-4 w3-hide-small" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>

    <a class="btn btn-outline-info w3-right mt-4 w3-hide-small" href="{{ route('user.show', Auth::user()->id) }}" href="#" role="button">{{ Auth::user()->name }}</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
                
    @endguest

  </div>

	@yield('overlay')

@yield('content')
  <script src="{{ asset('Remodal-master/dist/remodal.min.js') }}"></script>   
</body>
</html>

