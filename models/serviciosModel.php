<?php

class ServiciosModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectAllServices()
		{
			$query="SELECT * FROM tb_servicio";
			$request=$this->select_all($query);
			return $request;
		}

		public function viewService($id)
		{
			$query="SELECT * FROM tb_servicio WHERE ID=$id;";
			$request=$this->select($query);
			return $request;
		}
		
		public function insertNewService($arrData){
			
			$query="INSERT INTO tb_servicio(
				Nombre,
                Descripcion) 
				VALUES (?,?);";
			
			$request=$this->insert($query,$arrData);
			return $request;
		}

		public function updateService($arrData){
			$query="UPDATE tb_servicio SET
				Nombre=?,
                Descripcion=? WHERE ID=?";
			
			$request=$this->update($query,$arrData);
			return $request;
		}

    }
?>