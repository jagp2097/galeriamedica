<?php

namespace galeriamedica;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $table = 'albums';
  protected $fillable = ['nombre_album', 'descripcion', 'paciente_id'];
  
  public function paciente()
  {
    //El album solo le pertenece a un paciente
    return $this->belongsTo(Paciente::class);
  }

  public function archivos()
  {
    //Un album puede tener muchos archivos
    return $this->hasMany(Archivo::class);
  }

  public function scopeArchivo($query, $albumId){
    //dd('scope:', $nom);
    return $query->join('archivos', function ($join) use($albumId) {
            $join->on('archivos.album_id', '=', 'albums.id')
                    ->where('archivos.album_id', '=', "$albumId");
                    })->select('archivos.ref_foto', 'archivos.nombre_foto', 'archivos.patologia', 'archivos.region', 'archivos.periodo',    'archivos.created_at', 'albums.nombre_album', 'archivos.id');
    }
}
