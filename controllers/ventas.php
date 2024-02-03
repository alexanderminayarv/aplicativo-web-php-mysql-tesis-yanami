<?php 
    require_once("./models/ventasModel.php");
	class Ventas extends Controller{
		public function __construct()
		{
			session_start();
			if(!isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			$this->model=new VentasModel();
			parent::__construct();
		}

		public function ventas()
		{
			
			$data['page_title'] = "Ventas - Tesis Yanami";
			$data['page_content'] = "Ventas";
			$data['page_author'] = "";
			$data['page_description'] = "";
			$data['page_keywords'] = "";
			$data['page_table'] = "Ventas";
			//Traer los datos del modelo
            $datos=$this->model->selectAllSales();
			$this->views->getView($this,"ventas", $data,$datos);
		}

        public function cargarCombos(){
			if(isset($_POST['action'])){
				switch ($_POST['action']){
					case 'get-clients':
						$arrData=$this->model->loadClients();
			            echo json_encode($arrData);
					break;

                    case 'get-services':
						$arrData=$this->model->loadServices();
			            echo json_encode($arrData);
					break;

                    case 'get-banks':
						$arrData=$this->model->loadBanks();
			            echo json_encode($arrData);
					break;
				}
			}
        }

		public function agregar(){
			if($_POST){
                //Venta
                $cliente = $_POST['cliente'];
				//Monto se pone por defecto
				$fecha = $_POST['fecha'];
				//Detalle
				//Se halla abajo el ID de la venta
				$servicio = $_POST['servicio'];
				$precioventa = $_POST['precio'];
				$pago = $_POST['pago'];
				$descuento = $_POST['descuento'];
				$banco = $_POST['banco'];
				//Estado se pone por defecto

				if(empty($fecha) && empty($precioventa) && empty($descuento) && empty($pago))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campos vacíos', 'type' => 'warning');

				} else if(empty($fecha) || empty($precioventa) || empty($pago))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');

				} else if($cliente == 0 || $servicio == 0 || $banco == 0)
				{

					$arrResponse = array('status' => false, 'msg' => 'Seleccione una opción', 'type' => 'warning');

				} else if($pago > $precioventa - $descuento)
				{

					$arrResponse = array('status' => false, 'msg' => 'El pago es inválido', 'type' => 'warning');

				} else
				{
					try
					{
						if($pago < $precioventa - $descuento)
						{
                          	$estado = "Pendiente";
						}
						else 
						{
							$estado = "Cancelado";
						}

						$monto = $pago;
						$lastIDVenta = $this->model->lastIDVenta();
						$venta = $lastIDVenta['ID']+1;
						
						$arrData = array($cliente,$monto,$fecha,$estado);
						$requestAdd = $this->model->insertNewSale($arrData);

						$arrData1 = array($venta,$servicio,$precioventa,$pago,$descuento,$banco);
						$requestAdd1 = $this->model->insertNewDetailsSale($arrData1);

						if($requestAdd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha insertado la venta', 'type' => 'success');

						} else {

							$arrResponse = array('status' => false, 'msg' => 'Error al agregar la venta', 'type' => 'error');

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
				$datos_ventas=$this->model->viewSale($idd);
				$datos_clientes=$this->model->loadClients();
				$datos_servicios=$this->model->loadServices();
				$datos_bancos=$this->model->loadBanks();

                if(empty($datos_ventas)){
					$arrResponse = array('status' => true, 'msg' => 'Datos no encontrados');
				}else{
					$arrResponse = array('status' => true, 
					'msg' => 'Se muestran todos las ventas',
					'sale' => $datos_ventas,
					'client' => $datos_clientes,
					'service' => $datos_servicios,
					'bank' => $datos_bancos); 
				}
					
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function actualizar(){

			if($_POST){

				 //Venta
				 $cliente = $_POST['cliente_v'];
				 //Monto se pone por defecto
				 $fecha = $_POST['fecha_v'];
				 //Detalle
				 //Se halla abajo el ID de la venta
				 $servicio = $_POST['servicio_dv'];
				 $precioventa = $_POST['precio_dv'];
				 $pago = $_POST['pago_dv'];
				 $descuento = $_POST['descuento_dv'];
				 $banco = $_POST['banco_dv'];
				 //Estado se pone por defecto

				//Recibo el id
				$id = intval($_POST['id_dv']);
				$venta = intval($_POST['id_v']);

				if(empty($fecha) && empty($precioventa) && empty($descuento) && empty($pago))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campos vacíos', 'type' => 'warning');

				/*} else if(empty($fecha) || empty($precio) || empty($pago))
				{

					$arrResponse = array('status' => false, 'msg' => 'Campo vacío', 'type' => 'warning');*/

				} else if($cliente == 0 || $servicio == 0 || $banco == 0)
				{

					$arrResponse = array('status' => false, 'msg' => 'Seleccione una opción', 'type' => 'warning');

				} else if($pago > $precioventa - $descuento)
				{

					$arrResponse = array('status' => false, 'msg' => 'El pago es inválido', 'type' => 'warning');

				} else
				{
	
					try
					{
	
						if($pago < $precioventa - $descuento)
						{
                          	$estado = "Pendiente";
						}
						else 
						{
							$estado = "Cancelado";
						}

						$arrData = array($venta,$servicio,$precioventa,$pago,$descuento,$banco,$id);
						$requestUpd = $this->model->updateDetailsSale($arrData);

						$arrData1 = array($pago,$estado,$venta);
						$requestUpd1 = $this->model->updateAmountAndStatus($arrData1);

						//$estado

						if($requestUpd)
						{

							$arrResponse = array('status' => true, 'msg' => 'Se ha actualizado la venta', 'type' => 'success');

						} else {
							$arrResponse = array('status' => false, 'msg' => 'Error al actualizar la venta', 'type' => 'error');
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