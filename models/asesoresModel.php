<?php

class AsesoresModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectAllAdvisors()
		{
			$query="SELECT a.ID, CONCAT(Apellidos,', ',Nombres) AS Asesor, Foto, 
			e.Nombre AS Especialidad, Celular, Email, s.Facebook, s.Instagram, s.Youtube, s.LinkedIn
			FROM tb_asesor_social aso
			INNER JOIN tb_asesor a ON a.ID=aso.Asesor
            INNER JOIN tb_social s ON s.ID=aso.Social
			INNER JOIN tb_especialidad e ON e.ID=a.Especialidad;";
			$request=$this->select_all($query);
			return $request;
		}
    }
?>