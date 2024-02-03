<?php

class ClientesModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectAllClients()
		{
			$query="SELECT ID, DNI, CONCAT(Apellidos,', ',Nombres) AS Cliente, Celular FROM tb_cliente ORDER BY 2";
			$request=$this->select_all($query);
			return $request;
		}

		public function viewClient($id)
		{
			$query="SELECT * FROM tb_cliente WHERE ID=$id;";
			$request=$this->select($query);
			return $request;
		}
		
		public function insertNewClient($arrData){
			
			$query="INSERT INTO tb_cliente(
				DNI,
                Nombres,
				Apellidos,
                Celular) 
				VALUES (?,?,?,?);";
			
			$request=$this->insert($query,$arrData);
			return $request;
		}

		public function updateClient($arrData){
			$query="UPDATE tb_cliente SET
				DNI=?,
                Nombres=?,
				Apellidos=?,
                Celular=? WHERE ID=?";
			
			$request=$this->update($query,$arrData);
			return $request;
		}

		public function selectAllDebtors(){
			$query = "SELECT v.ID, v.Fecha, CONCAT(Apellidos, ', ',Nombres) AS Cliente, s.Nombre AS Servicio, (PrecioVenta - Descuento) - (Pago) AS Debe from tb_detalle d INNER JOIN tb_venta v ON v.ID=d.Venta INNER JOIN tb_cliente c ON c.ID=v.Cliente INNER JOIN tb_servicio s ON s.ID=d.Servicio 
			WHERE (PrecioVenta-Descuento)-(Pago)>0;";
			$request=$this->select_all($query);
			return $request;
		}

		public function viewSaleDebtor($id)
		{
			$query="SELECT d.ID, d.Venta, CONCAT(Apellidos, ', ', Nombres) AS Cliente, Fecha, (PrecioVenta - Descuento) - (Pago) AS Debe, s.Nombre AS Servicio, Pago, Estado FROM tb_detalle d 
			INNER JOIN tb_venta v ON v.ID=d.Venta 
			INNER JOIN tb_cliente c ON c.ID=v.Cliente
			INNER JOIN tb_servicio s ON s.ID=d.Servicio
			WHERE v.ID='$id';";
			$request=$this->select($query);
			return $request;
		}
    }
?>