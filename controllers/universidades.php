<?php 
    require_once("./models/universidadesModel.php");
	class Universidades extends Controller{
		public function __construct()
		{
			session_start();
			if(!isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			$this->model=new UniversidadesModel();
			parent::__construct();
		}

		public function universidades()
		{
			
			$data['page_title'] = "Universidades - Tesis Yanami";
			$data['page_content'] = "Universidades";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$data['page_table']= "Universidades";
			//Traer los datos del modelo
            $datos=$this->model->selectAllUniversities();
			$this->views->getView($this,"universidades", $data,$datos);
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

						$requestAdd = $this->model->insertNewUniversity($arrData);

						if($requestAdd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha insertado la universidad', 'type' => 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al agregar la universidad', 'type' => 'error');
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
				$datos_universidades=$this->model->viewUniversity($idd);

                if(empty($datos_universidades)){
					$arrResponse = array('status' => true, 'msg' => 'Datos no encontrados');
				}else{
					$arrResponse = array('status' => true, 
					'msg' => 'Se muestran todas las universidades',
					'university' => $datos_universidades); 
				}
					
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function actualizar(){
			if($_POST){

				$nombre = $_POST['nombre_u'];

				//Recibo el id
				$id = intval($_POST['id_u']);

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

						$requestUpd = $this->model->updateUniversity($arrData);

						if($requestUpd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado la universidad', 'type' => 'success');

						} else {

							$arrResponse = array('status' => false, 'msg' => 'Error al actualizar la universidad', 'type' => 'error');
						
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