<?php

namespace galeriamedica\Http\Controllers;

use Validator;
use galeriamedica\Archivo;
use Illuminate\Http\Request;
use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use galeriamedica\Http\Requests\ArchivosRequest;
use galeriamedica\Http\Requests\ArchivosActualizarRequest;

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
        $archivo = new Archivo();
        
        if ($request->hasFile('archivo')) {
           
            $archForm = $request->file('archivo');
           
            $referenciaFoto = time();

            $archForm->move(public_path().'/pacientes/', $referenciaFoto);

            $upload = new UploadApi();

            if (str_contains($archForm->getClientMimeType(), 'image/')) {
                
                $uploadResponse = $upload->upload(public_path().'/pacientes/'.$referenciaFoto, [
                    'folder' => 'pacientes/',
                ]);
                
                $uploadResponse = json_encode($uploadResponse);
                $uploadResponse = json_decode($uploadResponse);

                File::delete(public_path('pacientes/').$referenciaFoto);

                $archivo->tipo_archivo = "Foto";
                $archivo->public_id = $uploadResponse->public_id;
                $archivo->ref_foto = $uploadResponse->url;
            
            } else if (str_contains($archForm->getClientMimeType(), 'video/')) {

                $uploadResponse = $upload->upload(public_path().'/pacientes/'.$referenciaFoto, [
                    'folder' => 'pacientes/',
                    'resource_type' => 'video'
                ]);
                
                $uploadResponse = json_encode($uploadResponse);
                $uploadResponse = json_decode($uploadResponse);

                File::delete(public_path('pacientes/').$referenciaFoto);

                $archivo->tipo_archivo = "Video";
                $archivo->public_id = $uploadResponse->public_id;
                $archivo->ref_foto = $uploadResponse->url;

            }

        }

        $archivo->nombre_foto = $request->input('nombreArchivo');
        $archivo->album_id = $request->input('id');

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
        $filename = $request->nombre;
        $tempfile = tempnam(sys_get_temp_dir(), $filename);
        copy($request->ref, $tempfile);

        return response()->download($tempfile, $filename);
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

        $adminApi = new AdminApi();

        if ($archivo->tipo_archivo === "Foto") {
            $adminApi->deleteAssets([ $archivo->public_id ], [
                'resource_type' => 'image',
                'type' => 'upload'
            ]);
        } else {
            $adminApi->deleteAssets([ $archivo->public_id ], [
                'resource_type' => 'video',
                'type' => 'upload'
            ]);
        }

        $archivo->delete($archivo->id);

        return redirect()->to(route('album.show', ['id' => $archivo -> album_id] ))->with('status', 'Archivo eliminado con éxito');
    }
}
