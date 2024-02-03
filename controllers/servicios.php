<?php 
    require_once("./models/serviciosModel.php");
	class Servicios extends Controller{
		public function __construct()
		{
			session_start();
			if(!isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			$this->model=new ServiciosModel();
			parent::__construct();
		}

		public function servicios()
		{
			
			$data['page_title'] = "Servicios - Tesis Yanami";
			$data['page_content'] = "Servicios";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$data['page_table']= "Servicios";
			//Traer los datos del modelo
            $datos=$this->model->selectAllServices();
			$this->views->getView($this,"servicios", $data,$datos);
		}
		
		public function agregar(){
			if($_POST){
				$nombre = $_POST['nombre'] ;
				$descripcion = $_POST['descripcion'] ;
                
                $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

                if(empty($nombre) && empty($descripcion))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campos vacíos', 'type' => 'warning');

				} else if(empty($nombre) || empty($descripcion))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');

				} else if(!preg_match($pattern,$nombre))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Solo se ingresan letras', 'type' => 'warning');

				} else
				{
					try
					{
						$arrData = array($nombre,$descripcion);

						$requestAdd = $this->model->insertNewService($arrData);

						if($requestAdd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha insertado el servicio', 'type' => 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al agregar el servicio', 'type' => 'error');
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
				$datos_servicios=$this->model->viewService($idd);

                if(empty($datos_servicios)){
					$arrResponse = array('status' => true, 'msg' => 'Datos no encontrados');
				}else{
					$arrResponse = array('status' => true, 
					'msg' => 'Se muestran todos los servicios',
					'service' => $datos_servicios); 
				}
					
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function actualizar(){
			if($_POST){

				$nombre = $_POST['nombre_s'] ;
				$descripcion = $_POST['descripcion_s'];

				//Recibo el id
				$id = intval($_POST['id_s']);

				$pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

				if(empty($nombre) && empty($descripcion))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campos vacíos', 'type' => 'warning');

				} else if(empty($nombre) || empty($descripcion))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');

				} else if(!preg_match($pattern,$nombre))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Solo se ingresan letras', 'type' => 'warning');

				} else
				{
					try
					{
						$arrData = array($nombre,$descripcion,$id);

						$requestUpd = $this->model->updateService($arrData);

						if($requestUpd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado el servicio', 'type' => 'success');

						} else {

							$arrResponse = array('status' => false, 'msg' => 'Error al actualizar el servicio', 'type' => 'error');
						
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