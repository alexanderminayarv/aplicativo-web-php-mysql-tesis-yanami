<?php 
    //Agregar todas la carpeta (libraries )y subcarpeta (core) que se va a utilizar de los archivos 
	spl_autoload_register(function($class){
		if(file_exists("libraries/".'core/'.$class.".php")){
			require_once("libraries/".'core/'.$class.".php");
		}
	});
 ?>