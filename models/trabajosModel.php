<?php

class TrabajosModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectAllWorks()
		{
			$query="SELECT t.ID, Titulo,e.Nombre AS N_Escuela,u.Nombre AS N_Universidad, CONCAT(c.Apellidos,', ',c.Nombres) AS N_Cliente
			FROM tb_trabajo t
			INNER JOIN tb_escuela e ON e.ID=t.Escuela
			INNER JOIN tb_universidad u ON u.ID=t.Universidad
			INNER JOIN tb_cliente c ON c.ID=t.Cliente";
			$request=$this->select_all($query);
			return $request;
		}

		public function viewWork($id)
		{
			$query="SELECT * FROM tb_trabajo WHERE ID=$id;";
			$request=$this->select($query);
			return $request;
		}
		
		public function insertNewWork($arrData){
			
			$query="INSERT INTO tb_trabajo(
				Titulo,
                Escuela,
                Universidad,
                Situacion_Academica,
                Cliente) 
				VALUES (?,?,?,?,?);";
			
			$request=$this->insert($query,$arrData);
			return $request;
		}

		public function updateWork($arrData){
			$query="UPDATE tb_trabajo SET
				Titulo=?,
                Escuela=?,
                Universidad=?,
                Situacion_Academica=?,
                Cliente=? WHERE ID=?";
			
			$request=$this->update($query,$arrData);
			return $request;
		}

		public function loadSchools(){
			$query="SELECT * FROM tb_escuela;";
			$request=$this->select_all($query);
			return $request;
		}

		public function loadUniversities(){
			$query="SELECT * FROM tb_universidad;";
			$request=$this->select_all($query);
			return $request;
		}

		public function loadAcademicSituations(){
			$query="SELECT * FROM tb_situacion_academica;";
			$request=$this->select_all($query);
			return $request;
		}

		public function loadClients(){
			$query="SELECT ID, CONCAT(Apellidos, ', ', Nombres) AS N_Cliente FROM tb_cliente ORDER BY 2 ASC;";
			$request=$this->select_all($query);
			return $request;
		}
    }
?>