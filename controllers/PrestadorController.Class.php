<?php 
    //incluir classes
    require_once "models/Conexao.Class.php";
    require_once "models/Prestador.Class.php";
    require_once "models/PrestadorDAO.Class.php";
	require_once "models/Servico.Class.php";
	require_once "models/ServicoDAO.Class.php";
	require_once "models/Reserva.Class.php";
	require_once "models/ReservaDAO.Class.php";
	require_once "models/Usuario.Class.php";
	require_once "models/UsuarioDAO.Class.php";
	require_once "models/Serv_Prest_Serv.Class.php";
	require_once "models/Serv_Prest_ServDAO.Class.php";

    if(!isset($_SESSION))
		session_start();

    class PrestadorController{

        private $param;
		public function __construct()
		{
			$this->param = Conexao::getInstancia();
		}
		
        //função para cadastrar Prestador
         public function inserir()
			{
			$msg = array("","","","","","","","","");
			$erro = false;
			if($_POST)
			{     

				//verificação preenchimento
				if(empty($_POST["Nome"]))
				{
					$msg[0] = "Preencha o seu nome!";
					$erro = true;
				}
				
				if(empty($_POST["DtNasc"]))
				{
					$msg[1] = "Preencha a Data de Nascimento!";
					$erro = true;
				}
				if(empty($_POST["Celular"]))
				{
					$msg[2] = "Preencha o seu celular!";
					$erro = true;
				}				
				
				if(empty($_POST["Email"]))
				{
					$msg[3] = "Preencha o seu e-mail!";
					$erro = true;
				}
				if(empty($_POST["Senha"]))
				{
					$msg[4] = "Preencha a senha!";
					$erro = true;
				}
				if(empty($_POST["Confsenha"]))
				{
					$msg[5] = "Confirme a senha!";
					$erro = true;
				}
				
				if(!empty($_POST["Senha"]) && !empty($_POST["Confsenha"]))
				{
					if($_POST["Senha"] != $_POST["Confsenha"])
					{
						$msg[4] = "Senhas não conferem!";
						$erro = true;
					}
				}
				if(!empty($_POST["Email"]))
				{
					$prestador = new Prestador(Email:$_POST["Email"]);
					$prestadorDAO = new prestadorDAO($this->param);
					$retorno = $prestadorDAO->verificar_por_email($prestador);
					if(count($retorno) > 0)
					{
						$msg[3] = "E-mail já cadastrado!";
						$erro = true;
					}
				}
				//se tudo certo
				
				if(!$erro)
				{              
     
					//inserir BD
					$prestador = new Prestador(
							Nome:$_POST["Nome"],
							DtNasc:$_POST["DtNasc"],
							Celular:$_POST["Celular"],
							Email:$_POST["Email"],
							Senha:md5($_POST["Senha"]),
					  		Situacao:$Situacao="Ativo",
							Tipo:$tipo='Prestador');
					
					$prestadorDAO = new PrestadorDAO($this->param);
					
					$prestadorDAO->inserir($prestador);
					
					//mostrar login
					header("location:index.php?controle=usuarioController&metodo=login");
				}
			}
			require_once "views/formCadastroPrestador.php";
		}//fim do inserir			

		//função logout
        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            header("location:index.php");
        }  
		//função para listar na homePrestador a agendamentos do dia
		public function home(){			
			
			$msg = "";
			if(isset($_SESSION["idPrestador"])){
				$prestador = $_SESSION["Nome"];
				$idprestador = $_SESSION["idPrestador"];				
				
				$prestador = new Prestador($_SESSION["idPrestador"]);
				$reserva = new Reserva(prestador:$idprestador);
				$reservaDAO = new ReservaDAO($this->param);
                $retorno = $reservaDAO->selectReservaDia($reserva);
						
				//echo "<pre>";
				//var_dump($retorno);
				//die();				
				   			
			}	
			
			require_once "views/homePrestador.php";
			
			
		}

		public function editarCadastro()
		{
			$msgBD = "";
			if(isset($_SESSION["idPrestador"])){
				$prestador = $_SESSION["Nome"];
				$idprestador = $_SESSION["idPrestador"];					
			

				//buscar dados no banco pelo $_GET['id']			
				$prestador = new Prestador(idPrestador:$_GET['id']);
				$prestadorDAO = new PrestadorDAO($this->param);
				$resp = $prestadorDAO->getPrestador($prestador);

				//echo "<pre>";	print_r($resp);	die();
			}
		

			$msg = array("","","","","","","");
			$erro = false;
			if($_POST)
			{  
				//verificação preenchimento
				if(empty($_POST["Nome"]))
				{
					$msg[0] = "Preencha o seu nome";
					$erro = true;
				}
				
				if(empty($_POST["DtNasc"]))
				{
					$msg[1] = "Preencha o seu Data do Nascimento";
					$erro = true;
				}
				if(empty($_POST["Celular"]))
				{
					$msg[2] = "Preencha o seu celular";
					$erro = true;
				}
				
				
				if(empty($_POST["Email"]))
				{
					$msg[3] = "Preencha o seu e-mail";
					$erro = true;
				}				
				
				if(!empty($_POST["Senha"]) && !empty($_POST["Confsenha"]))
				{
					if($_POST["Senha"] != $_POST["Confsenha"])
					{
						$msg[4] = "Senhas não conferem";
						$erro = true;
					}
				}			
					
				//inserir as alterações no bd
				$prestador = new Prestador(	
					$_POST['idPrestador'],									
					$_POST["Nome"],
					$_POST["DtNasc"],
					$_POST["Celular"],
					$_POST["Email"],
					md5($_POST["Senha"]),
					$Situacao="Ativo");
				
				$prestadorDAO = new prestadorDAO($this->param);					
				$msgBD = $prestadorDAO->upDate($prestador);
				

			}

			require_once "views/formEditarPrestador.php";
		}
		//função para listar serviçoc na homeServicoPrestador
		public function listarServicos()
		{
			if(empty('pagina')){
				$pagina = $_GET['pagina'];
			}		
			$resp="";
			if(isset($_SESSION["idPrestador"]))
        	{  
				$idPrestador = $_SESSION["idPrestador"];
				$prestador = $_SESSION["Nome"];	
				$Tipo = "prestador";					
				
				$servicoDAO = new servicoDAO($this->param);
				$retorno = $servicoDAO->buscarTodoServicosPrestador($idPrestador);
				//echo "<pre>"; var_dump($retorno); die();

				$servicoDAO = new servicoDAO($this->param);
				$result = $servicoDAO->calcularPaginas($idPrestador);				
				$num_reg = count($result);
				
				//Quantidade de pag
				//setar a qtde de itens por pag
				$qtdResultPag = 4;	

				$qtd_pag = ceil($num_reg / $qtdResultPag);	
			
				//limitar os links antes e depois
				$max_link = 2;	

				$servicoDAO = new servicoDAO($this->param);
				$retorno = $servicoDAO->qtde_pag($num_reg, $idPrestador);
				//var_dump($retorno);	
				

        	}

			require_once "views/homeServicoPrestador.php";
		}
		//função para deletar conta do prestador
		public function Deletar()
    	{   
			if(isset($_SESSION["idPrestador"]))
        	{  
				$idPrestador = $_SESSION["idPrestador"];
				$prestador = $_SESSION["Nome"];	
				$Tipo = "prestador";
				
				
				if($_GET["idServico"])
				{
					$idServico = $_GET['idServico'];								
															
					//apagar o serviço no banco					
					$servico = new ServicoDAO($this->param);
					$resp = $servico->deletar_servico($idServico);					
					
				    header("Location:index.php?controle=prestadorController&metodo=listarServicos");    

				}
			}
		
			require_once "views/homeServicoPrestador.php";
    
    	}
		//função para listar a agenda do prestador
        public function listarAgenda()
        {			
            
            if(isset($_GET["id"])){				

                $msg = "";
				$prestador = new Prestador($_SESSION["idPrestador"]);
				$reserva = new Reserva(prestador:$prestador, Situacao:"Ativo");
				$reservaDAO = new ReservaDAO($this->param);
                $retorno = $reservaDAO->listReservaPrestador($reserva);				 
				
				//echo "<pre>";
				//var_dump($retorno);
				//die();
				
			}  
			require_once "views/agendaPrestador.php"; 
        }

		

	}     
        
        
    
?>
	