<?php 
    echo "<h1>Theme: " . $this->config->item('theme') . "</h1>";
    echo "<h2>Sitio landing = " . $this->config->item('landing') . "</h2>";
    echo "<h3></h3>";
    foreach ($this->config->item('modulos') as $m) {
        echo $m['titulo'] . "<br>";
    } 

?>