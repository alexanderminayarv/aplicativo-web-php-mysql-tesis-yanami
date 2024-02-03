<?php 
	$controller = ucwords($controller); // retorna cada palabra con mayuscula al inicio

	$controllerFile = "controllers/".$controller.".php";
	if(file_exists($controllerFile))
	{
		require_once($controllerFile);
		$controller = new $controller();

		//Comprobar si existe el objeto $controller
		if(method_exists($controller, $method))
		{
			//Si existe, carga todos los parametros dentro del controlador
			$controller->{$method}($params);
		}else{
			//require_once("controllers/error.php");
			echo "PARAMETROS NO ENVIADOS DEL CONTROLADOR";
			echo $controllerFile;
			
		}
	}else{
		//require_once("controllers/error.php");
		echo "NO EXISTE EL CONTROLADOR";
		echo $controllerFile;
	}

 ?>