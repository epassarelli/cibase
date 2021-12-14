<?php 
//var_dump('Entre a la vista de contenidos_view');die();
// echo "<h2>Seccion sin bloques</h2>";
if($bloques){
	foreach ($bloques as $bloque) {
  //       echo 'Bloque dentro de la vista<br>';
  //       var_dump($bloque);
  //       echo "<br>";
		// var_dump($bloque->bloque_id .' - '. $bloque->view);
		echo Modules::run('contenidos/bloque', $bloque->bloque_id, $bloque->view);
	}
}
else
	{
		echo "<h2>Seccion sin bloques</h2>";
	}
?>