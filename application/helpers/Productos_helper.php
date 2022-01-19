<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('enOferta'))
{
    function enOferta($valor, $desde, $hasta){  
    	$enOferta = false;        
      
      if($valor > 0){
      	$hoy = date('Y-m-d', time());
      	
      	if(($desde <= $hoy) and ($hoy <= $hasta)){
      		$enOferta = true; 
      	}
        
      }
      return $enOferta;     
    }   
}



?>