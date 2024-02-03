<?php 

	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

		public function contar()
		{
          $query="SELECT
		  (SELECT COUNT(*) FROM tb_cliente) AS CountClient,
		  (SELECT COUNT(*) FROM tb_trabajo) AS CountWork,
		  (SELECT COUNT(*) FROM tb_universidad) AS CountUniversity,
		  (SELECT SUM(Monto) FROM tb_venta) AS CountSale;";
          $request=$this->select($query);
		  return $request;
		}

		public function dataUniversities(){
			$query="SELECT u.Nombre, count(*) AS CountClient FROM tb_trabajo t 
			INNER JOIN tb_universidad u ON u.ID=t.Universidad GROUP BY universidad ORDER BY 2 DESC LIMIT 7;";
		    $request=$this->select_all($query);
		    return $request;
		}

		public function dataClients(){
			$query="SELECT CONCAT(c.Apellidos, ', ', c.Nombres) AS Cliente, count(*) AS CountWork FROM tb_trabajo t 
			INNER JOIN tb_cliente c ON c.ID=t.Cliente GROUP BY cliente ORDER BY 2 DESC LIMIT 8;";
		    $request=$this->select_all($query);
		    return $request;
		}

		public function earningsPerMonth(){
			$query="SELECT SUM(monto) AS total, CASE WHEN MONTH(fecha) = 1 THEN 'Enero' WHEN MONTH(fecha) = 2 THEN 'Febrero' WHEN MONTH(fecha) = 3 THEN 'Marzo' WHEN MONTH(fecha) = 4 THEN 'Abril' WHEN MONTH(fecha) = 5 THEN 'Mayo' WHEN MONTH(fecha) = 6 THEN 'Junio' WHEN MONTH(fecha) = 7 THEN 'Julio' WHEN MONTH(fecha) = 8 THEN 'Agosto' WHEN MONTH(fecha) = 9 THEN 'Setiembre' WHEN MONTH(fecha) = 10 THEN 'Octubre' WHEN MONTH(fecha) = 11 THEN 'Noviembre' WHEN MONTH(fecha) = 12 THEN 'Diciembre' END as mes, YEAR(fecha) as año FROM tb_venta WHERE fecha >= '2023-01-01' AND fecha <= '2024-12-31' GROUP BY MONTH(Fecha), YEAR(Fecha) ORDER BY 2 AND 3 ASC;";
		    $request=$this->select_all($query);
		    return $request;
		}

		public function earningsPerYear(){
			$query="SELECT 
			SUM(monto) AS total,
			YEAR(fecha) as año 
		FROM 
			tb_venta 
		WHERE 
			fecha >= '2023-01-01' AND fecha <= '2024-12-31' 
		GROUP BY 
			YEAR(Fecha) 
		ORDER BY 
			YEAR(Fecha) ASC;";
		    $request=$this->select_all($query);
		    return $request;
		}
	}
	
 ?>