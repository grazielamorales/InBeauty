<?php
	class Conexao
	{
		private static $db;
				
		private function __construct(){}

		public static function getInstancia()
		{
			if(empty(self::$db))
			{
				//criar a conexão
				$parametros = "mysql:host=localhost;dbname=inbeautybd;charset=utf8mb4";
				try
				{
					self::$db = new PDO($parametros, "root", "");
				}
				catch(PDOException $e)
				{
					echo $e->getCode();
					echo $e->getMessage();
					//echo "Problema na conexão";
					die();
				}
			}//fim do if

			return self::$db;

		}//fim getInstancia
	}
?>