<?php 
    require_once("./models/clientesModel.php");
	class Clientes extends Controller{
		public function __construct()
		{
			session_start();
			if(!isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			$this->model=new ClientesModel();
			parent::__construct();
		}

		public function clientes()
		{
			
			$data['page_title'] = "Clientes - Tesis Yanami";
			$data['page_content'] = "Clientes";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$data['page_table']= "Clientes";
			//Traer los datos del modelo
            $datos=$this->model->selectAllClients();
			$this->views->getView($this,"clientes", $data,$datos);
		}

		public function agregar(){
			if($_POST){

				$DNI = $_POST['DNI'] ;
                $nombres = $_POST['nombres'];
				$apellidos = $_POST['apellidos'];
				$celular = $_POST['celular'];
                
                $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

				if(empty($DNI) && empty($nombres) && empty($apellidos) && empty($celular))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campos vacíos', 'type' => 'warning');

				} else if(empty($DNI) || empty($nombres) || empty($apellidos))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');

				} else if(!is_numeric($DNI) || strlen($DNI) != 8)
				{
				
					$arrResponse = array('status' => false, 'msg' => 'DNI inválido', 'type' => 'warning');

				} else if(!preg_match($pattern,$nombres) || !preg_match($pattern,$apellidos))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Solo se ingresan letras', 'type' => 'warning');

				} else if(!empty($celular) && !is_numeric($celular)){
				
					$arrResponse = array('status' => false, 'msg' => 'Celular inválido', 'type' => 'warning');

				} else
				{
					try
					{

						$arrData = array($dni,$nombres,$apellidos,$celular);

						$requestAdd = $this->model->insertNewClient($arrData);

						if($requestAdd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha insertado al cliente', 'type' => 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al agregar al cliente', 'type' => 'error');
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
				$datos_clientes=$this->model->viewClient($idd);

                if(empty($datos_clientes)){
					$arrResponse = array('status' => true, 'msg' => 'Datos no encontrados');
				}else{
					$arrResponse = array('status' => true, 
					'msg' => 'Se muestran todos los clientes',
					'client' => $datos_clientes); 
				}
					
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function actualizar(){
			if($_POST){

				$DNI = $_POST['DNI_c']; 
				$nombres = $_POST['nombres_c'];
				$apellidos = $_POST['apellidos_c'];
				$celular = $_POST['celular_c'];

				//Recibo el id
				$id = intval($_POST['id_c']);

				$pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

				if(empty($DNI) && empty($nombres) && empty($apellidos) && empty($celular))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campos vacíos', 'type' => 'warning');

				} else if(empty($DNI) || empty($nombres) || empty($apellidos))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');

				} else if(strlen($DNI) < 8 || strlen($DNI) > 8 || is_numeric($DNI)==false)
				{

					$arrResponse = array('status' => false, 'msg' => 'DNI inválido', 'type' => 'warning');

				} else if(!preg_match($pattern,$nombres) || !preg_match($pattern,$apellidos)){
				
					$arrResponse = array('status' => false, 'msg' => 'Solo se ingresan letras', 'type' => 'warning');

				} else
				{
					try
					{
						$arrData = array($DNI,$nombres,$apellidos,$celular,$id);

						$requestUpd = $this->model->updateClient($arrData);

						if($requestUpd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado el cliente', 'type' => 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al actualizar el cliente', 'type' => 'error');
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