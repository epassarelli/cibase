<?php 
	// De ahora en mas en la pagina debo recorrer Bloques
	// 
	// Respeco al MENU
	// SI es landing pongo los bloques
	// SINO pongo las secciones


	//var_dump($secciones);
	if($this->session->userdata('landing')): 
		echo "<h1>Cargo la HOME del sitio como Landing</h1>";
		
		// foreach ($secciones as $s) {
			
		// 	# Seteo el módulo que va a cargar con su partial
		// 	$modulo = $s['modulo'] . '/partial';
			
		// 	// Seteo los parametros que voy a pasar al Módulo en cuestion
		// 	$seccion_id = $s['id'];
		// 	$slug 	= $s['slug'];
		// 	$titulo = $s['titulo']; 
		// 	$bajada = $s['bajada'];
		// 	$bloque = $s['bloqueNumero'];

		// 	echo Modules::run($modulo, $seccion_id, $slug, $titulo, $bajada, $bloque);
		// }

	else:
		
		echo "<h1>Cargo la HOME del sitio con secciones</h1>";
		
	endif;

	//echo "<h1>Hola mundo</h1>";
?>