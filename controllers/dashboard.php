<?php 

	class Dashboard extends Controller{
		public function __construct()
		{
			session_start();
			if(!isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			parent::__construct();
		}

		public function dashboard()
		{
			
			$data['page_title'] = "Dashboard - Tesis Yanami";
			$data['page_content'] = "Dashboard";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
            $datos=$this->model->contar();
			$dato=$this->model->dataUniversities();
			$dato1=$this->model->dataClients();
			$dato2=$this->model->earningsPerMonth();
			$dato3=$this->model->earningsPerYear();
			$this->views->getView($this,"dashboard", $data,$datos,$dato,$dato1,$dato2,$dato3);
		}

	}
 ?>