<?php

namespace galeriamedica\Http\Controllers;

use galeriamedica\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use galeriamedica\Http\Requests\ArchivosRequest;
use galeriamedica\Http\Requests\ArchivosActualizarRequest;
use Validator;

class ArchivoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$archivo = new Archivo();
        return view('albums.showFotos', compact('archivo'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Archivo::class);
        $archivo = new Archivo();
        return view('albums.show', compact('archivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArchivosRequest $request)
    {
        $this->authorize('create', Archivo::class);
        dd($request->file('archivo')->getClientMimeType());
        $archivo = new Archivo();
        if ($request->hasFile('archivo')) {
            $archForm = $request->file('archivo');
            $referenciaFoto = time().$archForm->getClientOriginalName();

            $path = Storage::putFileAs(
                'public/pacientes', // path to store
                $archForm, // file
                $referenciaFoto // filename as store
            );

            if (str_contains($archForm->getClientMimeType(), 'image/')) {
                
                $archivo->tipo_archivo = "Foto";
            
            } else if (str_contains($archForm->getClientMimeType(), 'video/')) {

                $archivo->tipo_archivo = "Video";

            }

        }

        $archivo->nombre_foto = $request->input('nombreArchivo');
        $archivo->album_id = $request->input('id');
        $archivo->ref_foto = $referenciaFoto;

        if ($request->input('patologia') == 'Otro' ) {
            
            $archivo->patologia = 'Otro:'.$request->input('patologiaOtro');
            $archivo->diagnostico = 'Otro:'.$request->input('diagnosticoOtro');

        }

        elseif (($request->input('patologia') == 'Mano' || $request->input('patologia') == 'Quemados' || $request->input('patologia') == 'Estética' || $request->input('patologia') == 'Craneofacial' || $request->input('patologia') == 'Reconstructiva y microcirugía') && $request->input('diagnostico') == 'Otro') {

            $archivo->patologia = $request->input('patologia');
            $archivo->diagnostico = 'Otro:'.$request->input('diagnosticoOtro'); 

        }

        elseif (($request->input('patologia') != null && $request->input('patologia') != 'Otro' && $request->input('diagnostico') != null) && $request->input('diagnostico') != 'Otro') {

            $archivo->patologia = $request->input('patologia');
            $archivo->diagnostico = $request->input('diagnostico');

        }
        
        $archivo->region = $request->input('region');
        $archivo->periodo = $request->input('periodo');

        $archivo->save();
        return redirect()->to(route('album.show', ['id' => $request->id] ))->with('status', 'Archivo agregado con éxito');
        //dd($request->all());
        //dd($archivo);
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \galeriamedica\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        $this->authorize('view', $archivo);
        //return view('album.show', compact('archivo'));
    }

    public function download(Request $request)
    {
        $path = public_path('storage/pacientes/').$request->ref;
        //return $path;   
        return response()->download($path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \galeriamedica\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        return response()->json(
            $archivo->toArray()
        );
        //return view('archivos.edit', compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \galeriamedica\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(ArchivosActualizarRequest $request, Archivo $archivo)
    {
      $this->authorize('update', $archivo);
      $archivo->nombre_foto = $request->nombre_foto;
      $archivo->patologia = $request->patologia;
      $archivo->diagnostico = $request->diagnostico;
      $archivo->region = $request->region;
      $archivo->periodo = $request->periodo;
    //   $archivo->tipo_archivo = $request->tipo_archivo;
      $archivo->save();
      return response()->json(
        ["men" => 'listo']
      );
      /*return redirect()->to(route('album.show', ['id' => $archivo->album_id]))->with('status', 'Información del archivo actualizada con éxito');*/
      //dd($request->all());
      //return $request; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \galeriamedica\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        $this->authorize('delete', $archivo);
        Storage::delete($archivo->ref_foto);

        $archivo->delete($archivo->id);
        return redirect()->to(route('album.show', ['id' => $archivo -> album_id] ))->with('status', 'Archivo eliminado con éxito');
    }
}
