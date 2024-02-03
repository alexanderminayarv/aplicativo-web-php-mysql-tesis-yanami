<?php 
    require_once("./models/registrarseModel.php");
	class Registrarse extends Controller{
		public function __construct()
		{
			$this->model=new RegistrarseModel();
			parent::__construct();
		}

		public function registrarse()
		{
			
			$data['page_title'] = "Registrarse - Tesis Yanami";
			$data['page_content'] = "Registrarse";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$this->views->getView($this,"registrarse", $data);
		}

		public function agregar(){
			if($_POST){
                //print_r("hola");
				$dni = $_POST['dni'] ;
                $nombres = $_POST['nombres'];
				$apellidos = $_POST['apellidos'];
                $especialidad = $_POST['especialidad'];
                $celular = $_POST['celular'];
                $email = $_POST['email'];
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];
                $foto = "frank.png";
                
                $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

				if(empty($dni) && empty($nombres) && empty ($apellidos) && empty($celular))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campos vacíos', 'type' => 'warning');

				} else if(empty($dni) || empty($nombres) || empty ($apellidos))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');

				} else if(!is_numeric($dni) || strlen($dni) != 8)
				{
				
					$arrResponse = array('status' => false, 'msg' => 'DNI inválido', 'type' => 'warning');

				} else if(!preg_match($pattern,$nombres) || !preg_match($pattern,$apellidos))
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Solo se ingresan letras', 'type' => 'warning');

				} else if(!is_numeric($celular)){
				
					$arrResponse = array('status' => false, 'msg' => 'Celular inválido', 'type' => 'warning');

				} else
				{
					try
					{
                        // Encriptar la contraseña usando password_hash
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

						$arrData = array($dni, $nombres, $apellidos, $especialidad, $celular, $email, $usuario, $hashedPassword,$foto);

						//var_dump($arrData);
                        
                        $requestAdd = $this->model->insertNewAdvisor($arrData);

						if($requestAdd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha registrado correctamente', 'type' => 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al agregar al asesor', 'type' => 'error');
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

    }
?>