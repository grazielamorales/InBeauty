<?php 
	require_once "models/conexao.class.php";
	require_once "models/empresa.class.php";
	require_once "models/empresaDAO.class.php";
	require_once "models/Usuario.Class.php";
	require_once "models/UsuarioDAO.class.php";
	require_once "models/Prestador.Class.php";
	require_once "models/PrestadorDAO.Class.php";
	
  	if(!isset($_SESSION))
		session_start();

    class inicioController
	{
		public function inicio()
		{
			require_once "views/home.php";
		}
	}
?>