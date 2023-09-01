<?php 
    //incluir classes
    require_once "models/Conexao.class.php";
    require_once "models/usuario.class.php";
    require_once "models/usuarioDAO.class.php";
	require_once "models/Servico.Class.php";
	require_once "models/servicoDAO.class.php";
	require_once "models/Reserva.Class.php";
	require_once "models/ReservaDAO.Class.php";
	require_once "models/Prestador.Class.php";
	require_once "models/PrestadorDAO.Class.php";
	require_once "models/Serv_Prest_Serv.Class.php";
	require_once "models/Serv_Prest_ServDAO.Class.php";

    if(!isset($_SESSION))
		session_start();

    class UsuarioController
	{
        private $param;
		public function __construct()
		{
			$this->param = Conexao::getInstancia();
		}
        
          public function inserir()
		{
			$msg = array("","","","","","","","","","");
			$erro = false;
			if($_POST)
			{
				//verificação preenchimento
				if(empty($_POST["Nome"]))
				{
					$msg[0] = "Preencha o seu nome";
					$erro = true;
				}
				if(empty($_POST["Apelido"]))
				{
					$msg[1] = "Preencha o seu nome de usuario";
					$erro = true;
				}
				
				if(empty($_POST["Cpf"]))
				{
					$msg[2] = "Preencha o seu CPF";
					$erro = true;
				}
				if(empty($_POST["Celular"]))
				{
					$msg[3] = "Preencha o celular";
					$erro = true;
				}
				if(empty($_POST["DataNascimento"]))
				{
					$msg[4] = "Preencha a Data de Nascimento";
					$erro = true;
				}
				if($_POST["Sexo"] == "")
				{
					$msg[5] = "Selecione o sexo";
					$erro = true;
				}			
				
				if(empty($_POST["Email"]))
				{
					$msg[6] = "Preencha o seu e-mail";
					$erro = true;
				}
				if(empty($_POST["Senha"]))
				{
					$msg[7] = "Preencha a senha";
					$erro = true;
				}
				if(empty($_POST["ConfSenha"]))
				{
					$msg[8] = "Preencha a confirmação da senha";
					$erro = true;
				}
				
				if(isset($_POST["Senha"]) && isset($_POST["ConfSenha"]))
				{
					if($_POST["Senha"] != $_POST["ConfSenha"])
					{
						$msg[9] = "Senhas não conferem";
						$erro = true;
					}
				}
				if(isset($_POST["Email"])) //se digitou o email
				{
					$usuario = new usuario(Email:$_POST["Email"]);
					$usuarioDAO = new usuarioDAO($this->param);
					$retorno = $usuarioDAO->verificar_por_email($usuario);
					if(count($retorno) > 0)
					{
						$msg[5] = "E-mail já cadastrado";
						$erro = true;
					}
				}
				//se tudo certo
				
				if(!$erro)
				{					
					//inserir BD
					$usuario = new Usuario(
						Nome:$_POST["Nome"],
						Cpf:$_POST["Cpf"],
						DataNascimento:$_POST["DataNascimento"],
						Celular:$_POST["Celular"], 
						Email:$_POST["Email"],
						Senha:md5($_POST["Senha"]), 
						Situacao:$situacao = "Ativo", 
						Apelido:$_POST["Apelido"],
					 	Sexo:$_POST['Sexo']);
					
					$usuarioDAO = new UsuarioDAO($this->param);
					
					$usuarioDAO->inserir($usuario);
					
					//mostrar login
					header("location:index.php?controle=usuarioController&metodo=login");
				}
			}
			require_once "views/formCadastroUsuario.php";
		}//fim do inserir

        public function login()
		{
			//validar se ta logado
			if(isset($_SESSION['idUsuario'])){
				header("Location:?controle=usuarioController&metodo=home");
			}

			$msg = "";
            if($_POST)
            {   
				//verificar preenchimento
				if($_POST["Email"] == "" || $_POST["Senha"] == "")
				{
					$msg ="Dados Obrigatórios";
				}
				
				//se não tiver erro
				if($msg == ""){
					//verificar usuario e senha no BD
					$usuario = new Usuario(Email:$_POST["Email"], Senha:md5($_POST["Senha"]));
					
					$usuarioDAO = new UsuarioDAO($this->param);
					$retorno = $usuarioDAO->autenticar($usuario);

					//print_r($retorno); die();

					if(is_array($retorno) && count($retorno) > 0)
					{
						//é um usuário
						// vamos guardar dados na sessão
										
						$_SESSION["idUsuario"] = $retorno[0]->idUsuario;						
						$_SESSION["Nome"] = $retorno[0]->Nome;						
						$_SESSION["Email"] = $retorno[0]->Email;
						$_SESSION["Apelido"] = $retorno[0]->Apelido;
						$_SESSION['Tipo'] = "usuario";					
						
						header("location:index.php?controle=usuarioController&metodo=home");
						
					}
					else
					{
						$prestador = new Prestador(Email:$_POST["Email"], Senha:md5($_POST["Senha"]));
						$prestadorDAO = new PrestadorDAO($this->param);
						$retorno = $prestadorDAO->autenticar($prestador);

						if(is_array($retorno) && count($retorno) > 0){
							//é um prestador de serviços
							//guardar dados na sessão
							
							$idPrestador = $_SESSION['idPrestador'] = $retorno[0]->idPrestador;
							$prestador = $_SESSION["Nome"] = $retorno[0]->Nome;
							$_SESSION["Email"] = $retorno[0]->Email;
							$_SESSION["Tipo"] = "prestador";							

							header("Location:index.php?controle=prestadorController&metodo=home&idPrestador=".$idPrestador);

						}else{
							$msg = "Senha ou usuário inválido!";
						}
						
					}  
				 
				}  			
			}
			require_once "views/loginUsuario.php";
		}

        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            header("location:index.php");
        }  

		public function home(){

			if(isset($_SESSION["idUsuario"])){
				$usuario = $_SESSION["Nome"];
				$apelido = $_SESSION["Apelido"];
				$idUsuario = $_SESSION["idUsuario"];

				//print_r($usuario); die();
				
				$servicoDAO = new ServicoDAO($this->param);
				$retorno = $servicoDAO->selectServicos();
				//echo "<pre>"; print_r($retorno); die();
			}
			
			require_once "views/homeUsuario.php";
		}

		//FUNÇÃO P/ LISTAR OS PRESTADORES P/ UM SERVIÇO ESPECÍFICO
		public function listPrestador()
		{			
			if(isset($_GET["id"]))
			{
				$id = $_GET["id"];
				$servico = new Servico(idServico:$_GET["id"]);
				//var_dump($servico); die();

				$servPrestServ = new Serv_Prest_Serv(servico:$servico, situacao:"Ativo");
			    //echo "<pre>";var_dump($servPrestServ); die();
				$servPrestServ= new Serv_Prest_ServDAO($this->param);				
				$ret = $servPrestServ->selectPrestador($servico);

				//echo "<pre>"; print_r($ret); die();				
				
			}
			
			require_once "views/listaPrestadoresServico.php";
		}

		//função para editar os dados cadastrais do usuario
		public function editarUsuario()
		{
			$resp = "";
			if(isset($_SESSION["idUsuario"])){
				$usuario = $_SESSION["Apelido"];
				$idUsuario = $_SESSION["idUsuario"];				

				$usuarioDAO = new UsuarioDAO($this->param);
				$ret = $usuarioDAO->getUsuario($idUsuario);

				$msg = array("","","","","","","","","");
				$erro = false;
			}
			if($_POST)
			{
				//verificação preenchimento
				if(empty($_POST["Nome"]))
				{
					$msg[0] = "Preencha o seu nome";
					$erro = true;
				}
				if(empty($_POST["Apelido"]))
				{
					$msg[1] = "Preencha o seu nome de usuario";
					$erro = true;
				}
				
				if(empty($_POST["Cpf"]))
				{
					$msg[2] = "Preencha o seu CPF";
					$erro = true;
				}
				if(empty($_POST["Celular"]))
				{
					$msg[3] = "Preencha o celular";
					$erro = true;
				}
				if(empty($_POST["DataNascimento"]))
				{
					$msg[4] = "Preencha a Data de Nascimento";
					$erro = true;
				}
				if($_POST["Sexo"] == "")
				{
					$msg[5] = "Selecione o sexo";
					$erro = true;
				}			
				
				if(empty($_POST["Email"]))
				{
					$msg[6] = "Preencha o seu e-mail";
					$erro = true;
				}							
					
				$usuarioEdit = new Usuario($_POST['idUsuario'], $_POST['Nome'],$_POST['Cpf'],$_POST['DataNascimento'], $_POST['Celular'], $_POST['Email'], md5($_POST['Senha']), $Situação = "Ativo", $_POST['Apelido'], $_POST['Sexo']);
				$editUsuario = new UsuarioDAO($this->param);
				$resp = $editUsuario->updateUsuario($usuarioEdit);			
					
			}	
		
			require_once "views/formEditUsuario.php";

		}

		//função para criar o campo pesquisa na pag usuário
		public function pesquisar()
		{
			if(isset($_SESSION["idUsuario"])){
				$usuario = $_SESSION["Nome"];
				$idUsuario = $_SESSION["idUsuario"];
			

				//verificando se o search esta vazio
				if(!empty($_GET['search']))
				{
					$data = $_GET['search'];
					$servicoDAO = new ServicoDAO($this->param);
					$pesquisa = $servicoDAO->pesquisar($data);
					//echo "<pre>";
					//var_dump($pesquisa);
					require_once "views/homeUsuario.php";
					
				}else{

					$servicoDAO = new ServicoDAO($this->param);
					$retorno = $servicoDAO->buscarTodoServicos();
					require_once "views/homeUsuario.php";
				}
			}
		}
		//função para cancelar a conta do usuário
		public function cancelaUsuario()
		{
			$msg="";          
            if($_GET['id']){

                $usuario = new Usuario($_GET["id"]); 
                $usuarioDAO = new UsuarioDAO($this->param);
                $msg = $usuarioDAO->cancelaUsuario($usuario, $situacao="Inativa"); 

				echo "<span>" .$msg. "</span>";
				
				require_once "index.php";
            }     

			
			require_once "views/ConfirmaDeletUsuario.php";		
		}
    }
			

	  
        
        
    
?>