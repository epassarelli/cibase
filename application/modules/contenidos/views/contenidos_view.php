<?php

if ($bloques) {
	foreach ($bloques as $bloque) {

		$vista = 'application/modules/contenidos/views/' . $bloque->view . '.php';

		if (file_exists($vista)) {
			echo Modules::run('contenidos/bloque', $bloque->bloque_id, $bloque->view);
		} else {
?>
			<div class="alert alert-danger">';
				<i class="icon-remove-sign"></i><strong>No encontramos</strong> vista para el bloque.
			</div>
	<?php
		}
	}
} else { ?>
	<h2>Seccion sin bloques</h2>";
	<div class="alert alert-danger">';
		<i class="icon-remove-sign"></i><strong>No encontramos</strong> bloques en dicha sección.
	</div>
<?php
}

if (isset($novedades)) {
	$this->load->view('claudia_novedades_view');
}
