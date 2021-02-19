		@php
				$fechas = array();
		@endphp

		@foreach($album->archivos as $archivo)
		@php

				list($soloFecha, $hora) = explode(' ', $archivo->created_at);
				$id = $archivo->id;
				$nomFoto = $archivo->nombre_foto;
				$ref = $archivo->ref_foto;
				$pat = $archivo->patologia;
				$reg = $archivo->region;
				$per = $archivo->periodo;
				$tipo = $archivo->tipo_archivo;
				$diag = $archivo->diagnostico;
				//$mes = strftime('%B', strtotime($soloFecha));
				$mes = date('m', strtotime($soloFecha));

				switch ($mes) {
	               case '01':
	                    $mes = "Enero"; break;
	                case '02':
	                    $mes = "Febrero"; break;
	                case '03':
	                    $mes = "Marzo"; break;
	                case '04':
	                    $mes = "Abril"; break;
	                case '05':
	                    $mes = "Mayo"; break;
	                case '06':
	                    $mes = "Junio"; break;
	                case '07':
	                    $mes = "Julio"; break;
	                case '08':
	                    $mes = "Agosto"; break;
	                case '09':
	                    $mes = "Septiembre"; break;
	                case '10':
	                    $mes = "Octubre"; break;
	                case '11':
	                    $mes = "Noviembre"; break;
	                case '12':
	                    $mes = "Diciembre"; break;
	            }

				$datosArray = [$id, $nomFoto, $ref, $pat, $reg, $per, $tipo, $soloFecha, $diag, $mes]; 

				if(key_exists($mes, $fechas)) {	
					$datos = implode("**", $datosArray);
					array_push($fechas["$mes"], $datos); 
				}
				else { 
					$datos = implode("**", $datosArray);
					$fechas["$mes"] = array("$datos"); 
				}

		@endphp
		@endforeach

		@php
			$fechas = array_reverse($fechas);
		@endphp

		@for ($i = 0; $i < sizeof($fechas); $i++)
			<div class="container divFecha">
				<p>{{ key($fechas) }}</p>
				<div class="contFotos">
				<ul class="tilesImg">
				@for ($j = 0; $j < sizeof($fechas[key($fechas)]); $j++)
				@php
					list($id, $nomFoto, $ref, $pat, $reg, $per, $tipo, $soloFecha, $diag) = explode("**", $fechas[key($fechas)][$j] );
				@endphp
				@if ($tipo == "Foto")
				<li>
					<div class="contArchivos">
						<img src="{{asset('imagenes/')}}/{{$ref}}">
						<div class="overlay">
					    <a href="#{{$id}}" class="icon" title="Clic para ver información" style="text-decoration:none">
					      <i class="fa fa-file-photo-o"></i>
					    </a>
					  </div>
					</div>
				</li>
				@elseif($tipo == "Video")
				<li>
					<div class="contArchivos">
						<video class="img-fluid"> 
							<source src="{{asset('imagenes/')}}/{{$ref}}">
						</video>
						<div class="overlay">
					   <a href="#{{$id}}" class="icon" title="Clic para ver información">
					     <i class="fa fa-file-video-o"></i>
					   </a>
					  </div>
					</div>					
				</li>
				@endif
					@include('archivos.show')
				@endfor
				@php
					next($fechas);
				@endphp
			  </ul>
			  </div>
			</div>
		@endfor

@include('archivos.edit')
