<?php

namespace galeriamedica;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
  protected $table = 'pacientes';
  protected $fillable = ['registro', 'nombre', 'app', 'apm'];
  
  public function getNombreCompletoAttribute() {
    return sprintf("%s %s %s", $this->nombre, $this->app, $this->apm);
  }

  public function albums()
  {
    //Un paciente puede tener muchos albums
    return $this->hasMany(Album::class);
  }

  public function scopeNombre($query, $nombre) {
    //dd('Scope', $nombre);
    return $query->where('nombre', 'LIKE', "%$nombre%")
           ->orWhere('registro', '=', "$nombre")
           ->orWhere('app', '=', "$nombre")
           ->orWhere('apm', '=', "$nombre")
           ->orWhere(\DB::raw("concat(app, ' ', apm)"), '=', $nombre);
  }

  public function scopeArchivo($query, $request) {
    //dd($request->all());
    $mes = mes($request->input('mes'));
    $patologia = $request->input('patologiaBusqueda');
    $diagnostico = $request->input('diagnosticoBusqueda');

    if ($patologia == 'Otro') {
       
       $query = \DB::table('archivos')
                         ->where('patologia', 'LIKE', $patologia."%")
                          /*->select('id', 'ref_foto', 'region', 'tipo_archivo', 'nombre_foto', 'patologia', 'diagnostico', 'periodo', 'created_at')*/;
              //dd($query);
              return $query;
    }

    elseif ($diagnostico == 'Otro') {
       
       $query = \DB::table('archivos')
                         ->where('diagnostico', 'LIKE', $diagnostico."%")
                          /*->select('id', 'ref_foto', 'region', 'tipo_archivo', 'nombre_foto', 'patologia', 'diagnostico', 'periodo', 'created_at')*/;
              //dd($query);
              return $query;
    }
    //dd($diagnostico);
    else {
      $query = \DB::table('archivos')
                           ->where('patologia', '=', $patologia)
                           ->orWhere('diagnostico', '=', $diagnostico)
                           ->orWhere('region', '=', $request->input('regionBusqueda'))
                           ->orWhere('periodo', '=', $request->input('periodoBusqueda'))
                           ->orWhere('tipo_archivo', '=', $request->input('tipoArchivoBusqueda'))
                           ->orWhere(\DB::raw("month(created_at)"), '=', $mes)
                            /*->select('id', 'ref_foto', 'region', 'tipo_archivo', 'nombre_foto', 'patologia', 'diagnostico', 'periodo', 'created_at')*/;  
      //dd($query);
      return $query;
    }

  }

  public function scopeArchivoEspecifico($query, $request, $fecha) {
    
    $mes = mes($request->input('mes'));
    $patologia = $request->input('patologiaBusqueda');
    $diagnostico = $request->input('diagnosticoBusqueda');
    
    return $query = \DB::table('archivos')
                         ->where([
                          ['patologia', 'LIKE', $patologia."%"],
                          ['diagnostico', 'LIKE', $diagnostico."%"],
                          ['region', '=', $request->input('regionBusqueda')],
                          ['periodo', '=', $request->input('periodoBusqueda')],
                          ['tipo_archivo', '=', $request->input('tipoArchivoBusqueda')],
                          [\DB::raw("month(created_at)"), '=', $mes]
                        ])/*->select('id', 'ref_foto', 'region', 'tipo_archivo', 'nombre_foto', 'patologia', 'diagnostico', 'periodo', 'created_at')*/;
                         //dd($query);
  }

  public function scopeAlbum($query, $pacienteId) {
    //dd($regPaciente);
    return $query->join('albums', function ($join) use ($pacienteId) {
            $join->on('albums.paciente_id', '=', 'pacientes.id')
                  ->where('pacientes.id', '=', "$pacienteId");
                  })->select('albums.id', 'albums.nombre_album',  'albums.descripcion', 'albums.created_at');
    //dd($query);
  }
}

//En la base de datos el mes se guarda con número, por eso esta función
  function mes($mes) {

    switch ($mes) {
        case 'Enero':
          $mes = '01'; break;
        case 'Febrero':
          $mes = '02'; break;
        case 'Marzo':
          $mes = '03'; break;
        case 'Abril':
          $mes = '04'; break;
        case 'Mayo':
          $mes = '05'; break;
        case 'Junio':
          $mes = '06'; break;
        case 'Julio':
          $mes = '07'; break;
        case 'Agosto':
          $mes = '08'; break;
        case 'Septiembre':
          $mes = '09'; break;
        case 'Octubre':
          $mes = '10'; break;
        case 'Noviembre':
          $mes = '11'; break;
        case 'Diciembre':
          $mes = '12'; break;
        default:
          $mes = null; break;
      }

      return $mes;
}