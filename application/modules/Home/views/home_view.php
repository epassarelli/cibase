<?php 
	
	if($landing): 

		foreach ($modulos as $m) {
			# code...
			//echo "<h1>" . $m['titulo'] . "</h1>";
			$modulo = $m['slug'] . '/partial';
			echo Modules::run($modulo);
		}

	else:
		
		echo "<h1>Cargo la HOME del sitio con secciones</h1>";
		
	endif;
?>