<?php 

	class RegistrarseModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

		public function insertNewAdvisor($arrData){
			
			$query="INSERT INTO tb_asesor(
				DNI,
                Nombres,
                Apellidos,
                Especialidad,
                Celular,
                Email,
                Usuario,
                Password,
				Foto) 
				VALUES (?,?,?,?,?,?,?,?,?);";

			$request = $this->insert($query, $arrData);
			return $request;
		}

	}
	
 ?>