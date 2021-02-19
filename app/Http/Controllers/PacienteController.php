<?php

namespace galeriamedica\Http\Controllers;

use galeriamedica\Paciente;
use galeriamedica\Archivo;
use galeriamedica\Album;
use galeriamedica\User;
use Illuminate\Http\Request;
use galeriamedica\Http\Requests\PacientesRequest;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth'); //Este muddleware permite solo a los administradores
  }
  
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $pacientes = Paciente::all();
    $albObj = new Album();

    //Busqueda por nombre o registro
    if ($request->input('nombre') != null) {
      $pacientes = Paciente::nombre($request->input('nombre'))->get();
      return view('pacientes.index', compact('pacientes'));
      //return $pacientes;  
    }
    //Busqueda de archivo en especifico
    elseif ($request->input('nombre') == null && $request->input('patologiaBusqueda') != null && $request->input('diagnosticoBusqueda') != null&& $request->input('regionBusqueda') != null && $request->input('periodoBusqueda') != null && $request->input('tipoArchivoBusqueda') != null && $request->input('mes') != null ) {
      $fecha = $request->input('mes');
      $pacientes = Paciente::archivoEspecifico($request, $fecha)->get();
      return view('pacientes.index', compact('pacientes', 'albObj'));      
    }
    //Busqueda por archivo
    elseif ($request->input('nombre') == null && $request->input('patologiaBusqueda') != null || $request->input('diagnosticoBusqueda') != null || $request->input('regionBusqueda') != null || $request->input('periodoBusqueda') != null || $request->input('tipoArchivoBusqueda') != null || $request->input('fechaBusqueda') != null || $request->input('mes') ) {
      $pacientes = Paciente::archivo($request)->get();
      //dd($pacientes);
      return view('pacientes.index', compact('pacientes', 'albObj'));     
    }
    
    return view('pacientes.index', compact('pacientes'));
    //return $pacientes;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(User $user)
  {
    $this->authorize('create', Paciente::class);
    return view('pacientes.create', [
      'paciente' => New Paciente()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(PacientesRequest $request)
  {
    $this->authorize('create', Paciente::class);
    $paciente = new Paciente();
    $paciente->registro = $request->input('registro');
    $paciente->nombre = $request->input('nombre');
    $paciente->app = $request->input('apellido_paterno');
    $paciente->apm = $request->input('apellido_materno');
    $paciente->save();
    return redirect()->to(route('paciente.index'))->with('status', 'Paciente agregado con éxito');
     
  }

  /**
   * Display the specified resource.
   *
   * @param \galeriamedica\Paciente $paciente
   * @return \Illuminate\Http\Response
   */
  public function show(Paciente $paciente)
  {
    //~ $paciente = Paciente::find($paciente->id);
    $this->authorize('view', $paciente);
    $pacienteId = $paciente->id;
    $albums = Paciente::album($pacienteId)->get();    
    return view('pacientes.show', compact('paciente', 'albums'));
    //$pacientes = Album::find(1)->archivos;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \galeriamedica\Paciente $paciente
   * @return \Illuminate\Http\Response
   */
  public function edit(Paciente $paciente)
  {
    $this->authorize('update', $paciente);
    return view('pacientes.create', compact('paciente'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \galeriamedica\Paciente $paciente
   * @return \Illuminate\Http\Response
   */
  public function update(PacientesRequest $request, Paciente $paciente)
  {
    $this->authorize('update', $paciente);
    //$paciente->registro = $request->input('registro');
    $paciente->nombre = $request->input('nombre');
    $paciente->app = $request->input('apellido_paterno');
    $paciente->apm = $request->input('apellido_materno');
    $paciente->save();
    return redirect()->to(route('paciente.index'))->with('status', 'Paciente actualizado con éxito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \galeriamedica\Paciente $paciente
   * @return \Illuminate\Http\Response
   */
  public function destroy(Paciente $paciente)
  {
    $this->authorize('delete', $paciente);
    $paciente->delete();
    return redirect()->to(route('paciente.index'))->with('status', 'Paciente eliminado con éxito');
  }
}
