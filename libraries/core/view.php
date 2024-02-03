<?php 
	//Crear clase
	class View
	{
        //Crear la funcion con parametros
		function getView($controller,$view,$data="",$datos="",$dato="",$dato1="",$dato2="",$dato3="")
		{
            //Verificar el controlador
			$controller = get_class($controller);
            
            //Verifica si es el controlador base o no (Login)
            //Cargar la página o no iniciar sesión
			if($controller == "Login"){
				$view = "views/".$view."View.php";
			}else{
				$view = "views/".$controller."/".$view."View.php";
			}
			require_once ($view);
		}
	}

 ?>