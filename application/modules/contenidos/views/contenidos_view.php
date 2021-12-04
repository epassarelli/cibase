<?php 
if(count($bloques)>0){
	foreach ($bloques as $bloque) {
		echo Modules::run('contenidos/bloque', $bloque->bloque_id, $bloque->view);
	}
}
else
	{
		echo "<h2>Seccion sin bloques</h2>";
	}
?>