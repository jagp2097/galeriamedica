<?php

namespace galeriamedica\Http\Controllers;

use galeriamedica\Album;
use galeriamedica\Paciente;
use Illuminate\Http\Request;
use galeriamedica\Http\Requests\AlbumsRequest;
use Illuminate\Validation\Validator;

class AlbumController extends Controller
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
        /*$albums = Album::all();
        return view('albums.index', compact('albums'));*/
        //return view('pacientes.show', ['albums' => Album::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', galeriamedica\Album::class);
        return view('albums.create', [
            'album' => New Album()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumsRequest $request)
    {
        $this->authorize('create', Album::class);
        $album = new Album();
        $album->nombre_album = $request->input('nombreAlbum');
        $album->descripcion = $request->input('descripcion');
        $album->paciente_id = $request->input('id');

        $album->save();
        return redirect()->to(route('paciente.show', $request->input('id')))->with('status', 'Álbum creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \galeriamedica\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $this->authorize('view', $album);
        $registro =  $album->registro;
        $nom = $album->nombre_album;
        $albumId = $album->id;
        $archivos = Album::archivo($albumId)->get()->reverse();
        //dd($archivos);
        return view('albums.show', compact('album', 'archivos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \galeriamedica\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $this->authorize('update', $album);
        return view('albums.create', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \galeriamedica\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumsRequest $request, Album $album)
    {
        $this->authorize('update', $album); 
        $album->nombre_album = $request->input('nombreAlbum');
        $album->descripcion = $request->input('descripcion');
        $album->save();
        return redirect()->to(route('album.show', ['id' => $album->id]))->with('status', 'Álbum editado con éxito');
        //return $album->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \galeriamedica\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $this->authorize('delete', $album);
        $album->delete();
        return redirect()->to(route('paciente.show', ['id' => $album->paciente_id]))->with('status', 'Álbum eliminado con éxito');
    }
}
