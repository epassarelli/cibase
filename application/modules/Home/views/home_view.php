<?php 
	//var_dump($secciones);
	if($landing): 

		foreach ($secciones as $s) {
			# code...
			$modulo = $s['slug'] . '/partial';
			echo Modules::run($modulo);
		}

	else:
		
		echo "<h1>Cargo la HOME del sitio con secciones</h1>";
		
	endif;
?>