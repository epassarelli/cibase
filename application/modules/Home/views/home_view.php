<?php 
	//var_dump($secciones);
	if($landing): 

		foreach ($secciones as $s) {
			
			# Seteo el módulo que va a cargar con su partial
			$modulo = $s['modulo'] . '/partial';
			
			// Seteo los parametros que voy a pasar al Módulo en cuestion
			$seccion_id = $s['id'];
			$slug 	= $s['slug'];
			$titulo = $s['titulo']; 
			$bajada = $s['bajada'];
			$bloque = $s['bloqueNumero'];

			echo Modules::run($modulo, $seccion_id, $slug, $titulo, $bajada, $bloque);
		}

	else:
		
		echo "<h1>Cargo la HOME del sitio con secciones</h1>";
		
	endif;
?>