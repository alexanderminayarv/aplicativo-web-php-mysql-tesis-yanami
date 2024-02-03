<?php 
    require_once("./models/escuelasModel.php");
	class Escuelas extends Controller{
		public function __construct()
		{
			session_start();
			if(!isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			$this->model=new EscuelasModel();
			parent::__construct();
		}

		public function escuelas()
		{
			
			$data['page_title'] = "Escuelas - Tesis Yanami";
			$data['page_content'] = "Escuelas";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$data['page_table']= "Escuelas";
			//Traer los datos del modelo
            $datos=$this->model->selectAllSchools();
			$this->views->getView($this,"escuelas", $data,$datos);
		}

		public function agregar(){
			if($_POST){

				$nombre = $_POST['nombre'] ;
                
                $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

                if(empty($nombre))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');

				} else if(!preg_match($pattern,$nombre))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Solo se ingresan letras', 'type' => 'warning');

				} else
				{
					try
					{
						$arrData = array($nombre);

						$requestAdd = $this->model->insertNewSchool($arrData);

						if($requestAdd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha insertado la escuela', 'type' => 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al agregar la escuela', 'type' => 'error');
						}
					} catch (Exception $e)
					{
						$arrResponse = array('status' => false, 'msg' => 'Ocurrió un error');
					}

				}
					
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

			}
				
			die();

		}

		public function editar(){
			$idd = intval($_POST['id']);
			if($idd>0)
			{
				$datos_escuelas=$this->model->viewSchool($idd);

                if(empty($datos_escuelas)){
					$arrResponse = array('status' => true, 'msg' => 'Datos no encontrados');
				}else{
					$arrResponse = array('status' => true, 
					'msg' => 'Se muestran todas las escuelas',
					'school' => $datos_escuelas); 
				}
					
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function actualizar(){
			if($_POST){

				$nombre = $_POST['nombre_s'];

				//Recibo el id
				$id = intval($_POST['id_s']);

				$pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

				if(empty($nombre))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');

				} else if(!preg_match($pattern,$nombre))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Solo se ingresan letras', 'type' => 'warning');

				} else
				{
					try
					{
						$arrData = array($nombre,$id);

						$requestUpd = $this->model->updateSchool($arrData);

						if($requestUpd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado la escuela', 'type' => 'success');

						} else {

							$arrResponse = array('status' => false, 'msg' => 'Error al actualizar la escuela', 'type' => 'error');
						
						}

					} catch (Exception $e)
					{

						$arrResponse = array('status' => false, 'msg' => 'Ocurrió un error', 'type' => 'error');
					
					}

				}
					
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

			}
				
			die();

		}
		

    }
?>