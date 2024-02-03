<?php

class VentasModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectAllSales()
		{
			$query="SELECT v.ID, CONCAT(cl.Apellidos, ', ', cl.Nombres) AS N_Cliente, Monto, Fecha, Estado FROM tb_venta
			v INNER JOIN tb_cliente cl ON cl.ID=v.Cliente ORDER BY 4";
			$request=$this->select_all($query);
			return $request;
		}

		public function viewSale($id)
		{
			$query="SELECT d.ID, d.Venta, Cliente, Monto, Fecha, Servicio, PrecioVenta, Pago, Descuento, Banco, Estado FROM tb_detalle d INNER JOIN tb_venta v ON v.ID=d.Venta WHERE v.ID='$id';";
			$request=$this->select($query);
			return $request;
		}

        public function loadClients()
		{
			$query="SELECT ID, CONCAT(Apellidos, ', ', Nombres) AS Cliente FROM tb_cliente";
			$request=$this->select_all($query);
			return $request;
		}

		public function loadServices()
		{
			$query="SELECT * FROM tb_servicio";
			$request=$this->select_all($query);
			return $request;
		}

		public function loadBanks()
		{
			$query="SELECT * FROM tb_banco";
			$request=$this->select_all($query);
			return $request;
		}
		
		public function insertNewSale($arrData){
			
			$query="INSERT INTO tb_venta(
				Cliente,
				Monto,
				Fecha,
				Estado) 
				VALUES (?,?,?,?);";
			
			$request=$this->insert($query,$arrData);
			return $request;
		}

		public function insertNewDetailsSale($arrData){
			
			$query="INSERT INTO tb_detalle(
				Venta, 
				Servicio, 
				PrecioVenta, 
				Pago, 
				Descuento, 
				Banco) 
				VALUES (?,?,?,?,?,?);";
			
			$request=$this->insert($query,$arrData);
			return $request;
		}

		public function lastIDVenta(){
			$query="SELECT MAX(ID) AS ID FROM tb_venta;";
			$request=$this->select($query);
			return $request;
		}

		public function updateAmountAndStatus($arrData){
			$query="UPDATE tb_venta SET
				Monto=?, Estado=? WHERE ID=?";
			
			$request=$this->update($query,$arrData);
			return $request;
		}

		public function updateDetailsSale($arrData){
			$query="UPDATE tb_detalle SET
				Venta=?, 
				Servicio=?, 
				PrecioVenta=?, 
				Pago=?, 
				Descuento=?, 
				Banco=? WHERE ID=?";
			
			$request=$this->update($query,$arrData);
			return $request;
		}
    }
?>