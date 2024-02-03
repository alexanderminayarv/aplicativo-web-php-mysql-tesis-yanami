<?php 
    require_once("./models/trabajosModel.php");
	class Trabajos extends Controller{
		public function __construct()
		{
			session_start();
			if(!isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			$this->model=new TrabajosModel();
			parent::__construct();
		}

		public function trabajos()
		{
			
			$data['page_title'] = "Trabajos - Tesis Yanami";
			$data['page_content'] = "Trabajos";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$data['page_table']= "Trabajos";
			//Traer los datos del modelo
            $datos=$this->model->selectAllWorks();
			$this->views->getView($this,"trabajos", $data,$datos);
		}

		public function agregar(){
			if($_POST){

                $titulo = $_POST['titulo'];
				$escuela = $_POST['escuela'];
				$universidad = $_POST['universidad'];
				$situacion_academica = $_POST['situacion_academica'];
				$cliente = $_POST['cliente'];
                
                $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

				if(empty($titulo))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type'=> 'warning');

				} else if($escuela == 0 || $universidad == 0 || $situacion_academica == 0 || $cliente == 0)
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Selecciona una opción', 'type'=> 'warning');

				} else
				{
					try
					{
						$arrData = array($titulo,$escuela,$universidad,$situacion_academica,$cliente);

						$requestAdd = $this->model->insertNewWork($arrData);

						if($requestAdd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha insertado el trabajo', 'type'=> 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al agregar el trabajo', 'type'=> 'error');
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
				$datos_trabajos=$this->model->viewWork($idd);
				$datos_escuelas=$this->model->loadSchools();
				$datos_universidades=$this->model->loadUniversities();
				$datos_situaciones_academicas=$this->model->loadAcademicSituations();
				$datos_clientes=$this->model->loadClients();

                if(empty($datos_trabajos)){
					$arrResponse = array('status' => true, 'msg' => 'Datos no encontrados');
				}else{
					$arrResponse = array('status' => true, 
					'msg' => 'Se muestran todos los trabajos',
					'work' => $datos_trabajos,
					'school' => $datos_escuelas,
					'university' => $datos_universidades,
					'academicsituation' => $datos_situaciones_academicas,
					'client' => $datos_clientes); 
				}
					
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function actualizar(){
			if($_POST){
				$titulo = $_POST['titulo_t'];
				$escuela = $_POST['escuela_t'];
				$universidad = $_POST['universidad_t'];
				$situacion_academica = $_POST['situacion_academica_t'];
				$cliente = $_POST['cliente_t'];

				//Recibo el id
				$id = intval($_POST['id_t']);

				$pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚÜüñÑ]+$/";

				if(empty($titulo))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type'=> 'warning');

				} else if($escuela == 0 || $universidad == 0 || $situacion_academica == 0 || $cliente == 0)
				{
				
					$arrResponse = array('status' => false, 'msg' => 'Selecciona una opción', 'type'=> 'warning');

				} else
				{
					try
					{
						$arrData = array($titulo,$escuela,$universidad,$situacion_academica,$cliente,$id);

						$requestUpd = $this->model->updateWork($arrData);

						if($requestUpd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado el trabajo', 'type' => 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al actualizar el trabajo', 'type' => 'error');
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


		public function cargarCombos(){
			if(isset($_POST['action'])){
				switch ($_POST['action']){
					case 'get-schools':
						$arrData=$this->model->loadSchools();
			            echo json_encode($arrData);
					break;

					case 'get-universities':
						$arrData=$this->model->loadUniversities();
			            echo json_encode($arrData);
					break;

					case 'get-academic-situations':
						$arrData=$this->model->loadAcademicSituations();
			            echo json_encode($arrData);
					break;

					case 'get-clients':
						$arrData=$this->model->loadClients();
			            echo json_encode($arrData);
					break;
				}
			}
			
			
		}
    }
?>