<div>
<div class="opciones text-center">
	<div id="opcUser" class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-container p-3" style="display:none;">

		@can('panelAdmin', galeriamedica\User::class)
    	<a class="btn btn-outline-info mt-4" style="text-decoration:none;" href="{{ route('user.index') }}">Administración de usuarios</a>
    @endcan

    @guest
    <a class="btn btn-outline-info w3-middle mt-4" href="{{ route('register') }}">{{ __('Registrarse') }}</a>

    @else
    <a class="btn btn-outline-info w3-middle mt-4" style="width:100%" href="{{ route('user.show', Auth::user()->id) }}" href="#" role="button">{{ Auth::user()->name }} </a>
    <br>
    <a class="btn btn-outline-info w3-middle mt-4" style="width:80%" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
                
    @endguest
	</div>
</div>
</div>