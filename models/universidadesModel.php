<?php

class UniversidadesModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectAllUniversities()
		{
			$query="SELECT * FROM tb_universidad";
			$request=$this->select_all($query);
			return $request;
		}

		public function viewUniversity($id)
		{
			$query="SELECT * FROM tb_universidad WHERE ID=$id;";
			$request=$this->select($query);
			return $request;
		}
		
		public function insertNewUniversity($arrData){
			
			$query="INSERT INTO tb_universidad(
				Nombre) 
				VALUES (?);";
			
			$request=$this->insert($query,$arrData);
			return $request;
		}

		public function updateUniversity($arrData){
			$query="UPDATE tb_universidad SET
				Nombre=? WHERE ID=?";
			
			$request=$this->update($query,$arrData);
			return $request;
		}

		public function deleteUniversity($id){
			$query="DELETE FROM tb_universidad WHERE ID=$id;";
			$request=$this->delete($query);
			return $request;
		}
    }
?>