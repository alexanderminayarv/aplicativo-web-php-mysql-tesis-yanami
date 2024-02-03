<?php 

	class Login extends Controller{
		public function __construct()
		{
			session_start();
			if(isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/dashboard');
			}
			parent::__construct();
		}
	
		public function login()
		{
			
			$data['page_title'] = "Login - Tesis Yanami";
			$data['page_content'] = "Login";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";

			if (isset($_COOKIE["usuario"])) {
				$data['usuario'] = $_COOKIE["usuario"];
			} else {
				$data['usuario'] = "";
			}

			$this->views->getView($this,"login", $data);
		}

		public function validarcredenciales(){
			if($_POST){

				try {

					$usuario = $_POST['usuario'] ;
					$password = $_POST['password'];

					$recordarme = isset($_POST['recordarme']) ? true : false;

					//validamos el captcha
					$ip =  $_SERVER['REMOTE_ADDR'];
					$captcha = $_POST['g-recaptcha-response'];
					$secret = "6LfQkbQoAAAAAIGZrDPG66QxG-m45zKgUAJyT4Ic";

					$correct  =  file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
					$atr =  json_decode($correct,TRUE);

					if ($atr['success']){
						$requestLog = $this->model->validateCredentials($usuario);
                        $getNumberOfDebtors = $this->model->getNumberOfDebtors();
						$getDebtors = $this->model->getDebtors();

						if($requestLog)
						{
							// Encriptar la contraseña para comparar con la almacenada
							$storedPasswordHash = $requestLog['Password'];

							if ($requestLog && password_verify($password, $storedPasswordHash))
							{
								$_SESSION['login']=true;
								$_SESSION['Usuario'] = $requestLog;

								$_SESSION['Cantidad_Deudores'] = $getNumberOfDebtors;
								$_SESSION['Deudores'] = $getDebtors;

								//creamos las cookis
								if ($recordarme) {
									$cookieExpiration = time() + 604800; // Caduca en 1 semana

									setcookie("usuario", $requestLog['Usuario'], $cookieExpiration, "/");
								}
								
								$arrResponse = array('status' => true, 'msg' => 'Es correcto las credenciales', 'type' => 'success');

							} else {

								$arrResponse = array('status' => false, 'msg' => 'Credenciales incorrectas' , 'type' => 'error');

							}
						
						} else if($requestLog == 'exist')
						{
							$arrResponse = array('status' => false, 'msg' => 'Credenciales incorrectas' , 'type' => 'error');
							
						} else if(empty($usuario) && empty($password))
						{

							$arrResponse = array('status' => false, 'msg' => 'Campos vacíos' , 'type' => 'warning');

						} else if(empty($usuario) || empty($password))
						{

							$arrResponse = array('status' => false, 'msg' => 'Campo vacío' , 'type' => 'warning');

						} else {

							$arrResponse = array('status' => false, 'msg' => 'Contraseña mala' , 'type' => 'error');

						}


					} else {

						$arrResponse = array('status' => false, 'msg' => 'Seleccione el Captcha' , 'type' => 'error');
						
					}

				} catch (Exception $e)
				{
					$arrResponse = array('status' => false, 'msg' => 'Ocurrió un error', 'type' => 'error');
				}
               
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			
			die();
		}

	}
 ?>