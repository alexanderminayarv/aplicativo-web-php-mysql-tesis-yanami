<?php 

	class LoginModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

		public function validateCredentials($usuario){
			
			$query="SELECT a.ID, DNI, Apellidos, Nombres, Foto, 
			e.Nombre AS Especialidad, Celular, Email, Usuario, Password, s.Facebook, s.Instagram, s.Youtube, s.LinkedIn
			FROM tb_asesor_social aso
			INNER JOIN tb_asesor a ON a.ID=aso.Asesor
            INNER JOIN tb_social s ON s.ID=aso.Social
			INNER JOIN tb_especialidad e ON e.ID=a.Especialidad
			WHERE Usuario = '$usuario'";
			
			$request = $this->select($query);
		
			return $request;
		
	    }

		public function getNumberOfDebtors(){

			$query="SELECT COUNT(*) AS CantDebe FROM tb_detalle WHERE (PrecioVenta-Descuento)-(Pago)>0;";
			$request=$this->select($query);
			return $request;

		}

		public function getDebtors(){
			$query = "SELECT CONCAT(Apellidos, ', ',Nombres) AS Cliente, (PrecioVenta - Descuento) - (Pago) AS Debe, v.Fecha from tb_detalle d 
			INNER JOIN tb_venta v ON v.ID=d.Venta 
			INNER JOIN tb_cliente c ON c.ID=v.Cliente 
			WHERE (PrecioVenta-Descuento)-(Pago)>0;";
			$request=$this->select_all($query);
			return $request;
		}
	}
 ?>