<?php

namespace galeriamedica;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
  protected $table = 'archivos';
  protected $fillable = [ 'nombre_foto', 'patologia', 'region', 'periodo', 'album_id', 'public_id' ];

  public function album()
  {
    //Un archivo pertenece a un solo album
    return $this->belongsTo(Album::class);
  }

  public function scopeArchivo($query, $nombre) {
    return $query->where('nombre_foto', 'LIKE', "$nombre")
               ->select('ref_foto');
  }
}
