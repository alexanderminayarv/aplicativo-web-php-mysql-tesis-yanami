<?php

class EscuelasModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectAllSchools()
		{
			$query="SELECT * FROM tb_escuela";
			$request=$this->select_all($query);
			return $request;
		}

		public function viewSchool($id)
		{
			$query="SELECT * FROM tb_escuela WHERE ID=$id;";
			$request=$this->select($query);
			return $request;
		}
		
		public function insertNewSchool($arrData){
			
			$query="INSERT INTO tb_escuela(
				Nombre) 
				VALUES (?);";
			
			$request=$this->insert($query,$arrData);
			return $request;
		}

		public function updateSchool($arrData){
			$query="UPDATE tb_escuela SET
				Nombre=? WHERE ID=?";
			
			$request=$this->update($query,$arrData);
			return $request;
		}
    }
?>