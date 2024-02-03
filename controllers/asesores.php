<?php 
    require_once("./models/asesoresModel.php");
	class Asesores extends Controller{
		public function __construct()
		{
			session_start();
			if(!isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			$this->model=new AsesoresModel();
			parent::__construct();
		}

		public function asesores()
		{
			
			$data['page_title'] = "Asesores - Tesis Yanami";
			$data['page_content'] = "Asesores";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$data['page_table']= "Asesores";
			//Traer los datos del modelo
            $datos=$this->model->selectAllAdvisors();
			$this->views->getView($this,"asesores", $data,$datos);
		}

		public function perfil()
		{
			
			$data['page_title'] = "Mi Perfil - Tesis Yanami";
			$data['page_content'] = "Mi Perfil";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$data['page_table']= "Mi Perfil";
			$this->views->getView($this,"perfil", $data);
		}
    }
?>