<?php 
//var_dump('Entre a la vista de contenidos_view');die();
// echo "<h2>Seccion sin bloques</h2>";
if($bloques){
	foreach ($bloques as $bloque) {
  //       echo 'Bloque dentro de la vista<br>';
  //       var_dump($bloque);
  //       echo "<br>";
		// var_dump($bloque->bloque_id .' - '. $bloque->view);
		$vista = 'application/modules/contenidos/views/'.$bloque->view.'.php';
		//var_dump($vista);
		if(file_exists($vista)){
			echo Modules::run('contenidos/bloque', $bloque->bloque_id, $bloque->view);
		}
		else{
			echo "<hr>";
			echo "<h1>No existe la vista del bloque ". $bloque->bloque_id . "</h1>";
			echo "<hr>";
		}
		
	}
}
else
	{
		echo "<h2>Seccion sin bloques</h2>";
	}
?>