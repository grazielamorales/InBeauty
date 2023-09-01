<?php 
    //incluir classes
    require_once "models/conexao.class.php";
    require_once "models/empresa.class.php";
    require_once "models/empresaDAO.class.php";

  
    if(!isset($_SESSION))
		session_start();

    class EmpresaController{

        private $param;
		public function __construct()
		{
			$this->param = Conexao::getInstancia();
		}

    
          public function inserir()
            {
                $msg = array("","","","","","","","","","","");
                $erro = false;
                if($_POST)
                {
                    //verificação preenchimento
                    if(empty($_POST["NomeFantasia"]))
                    {
                        $msg[0] = "Preencha o seu Nome Fantasia";
                        $erro = true;
                    }
                    


                    if(empty($_POST["Cnpj"]))
                    {
                        $msg[1] = "Preencha o Cnpj";
                        $erro = true;
                    }
                    if(empty($_POST["Logradouro"]))
                    {
                        $msg[2] = "Selecione o Logradouro";
                        $erro = true;
                    }
                    
                    if(empty($_POST["Num"]))
                    {
                        $msg[3] = "Preencha Numéro";
                        $erro = true;
                    }

                       
                    if(empty($_POST["Bairro"]))
                    {
                        $msg[4] = "Preencha Bairro";
                        $erro = true;
                    }


                       
                    if(empty($_POST["Cep"]))
                    {
                        $msg[5] = "Preencha Cep";
                        $erro = true;
                    }




                       
                    if(empty($_POST["Cidade"]))
                    {
                        $msg[6] = "Preencha a Cidade";
                        $erro = true;
                    }


                       
                    if(empty($_POST["Uf"]))
                    {
                        $msg[7] = "Preencha a Uf";
                        $erro = true;
                    }


                       
                    if(empty($_POST["Fone"]))
                    {
                        $msg[8] = "Preencha a Fone";
                        $erro = true;
                    }
                    

                    if(empty($_POST["Email"]))
                    {
                        $msg[9] = "Preencha o seu e-mail";
                        $erro = true;
                    }
                    if(empty($_POST["Senha"]))
                    {
                        $msg[10] = "Preencha a senha";
                        $erro = true;
                    }
                    if(empty($_POST["Confsenha"]))
                    {
                        $msg[11] = "Preencha a confirmação da senha";
                        $erro = true;
                    }
                    
                    if(!empty($_POST["Senha"]) && !empty($_POST["Confsenha"]))
                    {
                        if($_POST["Senha"] != $_POST["Confsenha"])
                        {
                            $msg[10] = "Senhas não conferem";
                            $erro = true;
                        }
                    }
                    if(!empty($_POST["Email"]))
                    {
                        $empresa = new empresa(Email:$_POST["Email"]);
                        $empresaDAO = new empresaDAO($this->param);
                        $retorno = $empresaDAO->verificar_por_email($empresa);
                        if(count($retorno) > 0)
                        {
                            $msg[9] = "E-mail já cadastrado";
                            $erro = true;
                        }
                    }
                    //se tudo certo
                    
                    if(!$erro)
                    {


  
                        //inserir BD
                        $empresa = new empresa(0,$_POST["NomeFantasia"],
                        $_POST["RazaoSocial"],$_POST["Cnpj"],
                         $_POST["logradouro"], $_POST["Numero"],$_POST["bairro"],
                         $_POST["cep"],$_POST["cidade"],
                         $_POST["uf"],$_POST["fone"],$_POST["email"],
                         md5($_POST["Senha"]),
                          $status="Ativo");
                        
                        $empresaDAO = new empresaDAO($this->param);
                        
                        $empresaDAO->inserir($empresa);
                        
                        //mostrar login
                        header("location:index.php?controle=empresaController&metodo=login");
                    }
                }
                require_once "views/formCadastroEmpresa.php";
            }//fim do inserir      
       
        public function login()
        {
             $msg = "";
            if($_POST)
            {                   
                //verificar preenchimento
                if($_POST["Email"] == "" || $_POST["Senha"] == "")
                {
                    $msg ="Dados Obrigatórios";
                }                
                
                //se não tiver erro 
            
                if($msg ==  "")
                {                    
                    //verificar usuario e senha no BD
                    $empresa = new Empresa(Email:$_POST["Email"],
                     Senha:md5($_POST["Senha"]));
                    
                    $empresaDAO = new empresaDAO($this->param);
                    $retorno = $empresaDAO->autenticar($empresa);
                    if(is_array($retorno) && count($retorno) > 0)
                    {
                    //é um usuário
                    // vamos guardar dados na sessão
                                        
                    $_SESSION["idEmpresa"] = $retorno[0]->idEmpresa;
                    
                    $_SESSION["NomeFantasia"] = $retorno[0]->NomeFantasia;
                    
                    $_SESSION["Email"] = $retorno[0]->Email;
                  
                    header("location:index.php?controle=empresaController&metodo=home&id=".$retorno[0]->idEmpresa);
				
                    }
                    else
                    {
                        $msg = "Verificar os dados digitados";
                    }
                }
                require_once "views/loginEmpresa.php";
            }
        }

     
        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            header("location:index.php");
        }  

		public function home(){
			if(isset($_SESSION["idEmpresa"])){
				$empresa = $_SESSION["NomeFantasia"];

				//$empresaDAO = new EmpresaDAO($this->param);
				//$retorno = $empresaDAO->buscarTodasEmpresas();

				
			}
			
			require_once "views/headerEmpresa.php";
		}

        
        
    }

    

    
?>