<?php 
	
	class Controller
	{
        //Constructor
		public function __construct()
		{
            //Instanciar el objeto
			$this->views = new View();
            //Llamar a la funcion
			$this->loadModel();
		}
        
        //Función para llamar al Modelo
		public function loadModel()
		{
            //Model es lo que sigue después del nombre respectivo de cada archivo
			$model = get_class($this)."Model";
			$routClass = "models/".$model.".php";

            //Para verificar si existe la ruta
			if(file_exists($routClass)){
				require_once($routClass);
				$this->model = new $model();
			}
		}
	}

 ?>