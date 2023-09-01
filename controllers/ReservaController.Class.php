<?php 
    require_once "models/Conexao.Class.php";
    require_once "models/Reserva.Class.php";
    require_once "models/ReservaDAO.Class.php";
    require_once "models/Usuario.Class.php";
    require_once "models/UsuarioDAO.Class.php";
    require_once "models/Servico.Class.php";
    require_once "models/ServicoDAO.Class.php";
    require_once "models/Prestador.Class.php";
    require_once "models/PrestadorDAO.Class.php";
   

    if(!isset($_SESSION))
		session_start();

    Class ReservaController{

        private $param;
		public function __construct()
		{
			$this->param = Conexao::getInstancia();
		}

        public function agendar() 
        {
            if(isset($_GET['idServico']) && isset($_GET['idPrestador']))
            {
                $prestador = $_GET["idPrestador"];
                $servico = $_GET["idServico"];

                //instanciar os obj servico e prestador
                $servico = new Servico(idServico:$_GET["idServico"]);
                $prestador = new Prestador(idPrestador:$_GET["idPrestador"]);                 

                //buscar os dados do prestador no BD
                $prestadorDAO = new PrestadorDAO($this->param);
                $retprestador = $prestadorDAO->getPrest($prestador);             
                //buscar os dados do Serviço no BD
                $servicoDAO = new ServicoDAO($this->param);
                $retservico = $servicoDAO->getServico($servico);              
                
                //echo"<pre>"; var_dump($retprestador, $retservico); die();
            }
            
            $msg="";
            //var_dump($_SESSION);
            if($_POST)
            {
                //instanciar um obj usuario, prestador e servico
                $usuario = new Usuario(idUsuario:$_SESSION["idUsuario"]);
                $prestador = new Prestador(idPrestador:$_POST["idPrestador"]);
                $servico = new Servico(idServico:$_POST["idServico"]);

               //instanciar um obj reserva
               $reserva = new Reserva(DataReserva:$_POST["DataReserva"], HoraReserva:$_POST["HoraReserva"],Servico:$servico,usuario:$usuario, prestador:$prestador,Situacao:"Ativo");

               $reservaDAO = new ReservaDAO($this->param);
               $msg = $reservaDAO->insertReserva($reserva);

              
            }            
           
            require_once "views/calendarioUsuario.php";
        }

        public function listarAgenda()
        {
            
            if(isset($_SESSION["idUsuario"])){
                $msg = "";
				$usuario = new Usuario($_SESSION["idUsuario"]);
				$reserva = new Reserva(usuario:$usuario, Situacao:"Ativo");
				$agendaDAO = new ReservaDAO($this->param);
                $retorno = $agendaDAO->listReserva($reserva);
                      
                if(is_array($retorno))
			    {
				    require_once "views/agendaUsuario.php";
			    }
                else
                {
                    echo $retorno;
                }
				
			}          
        }                 

        public function confirmaDeletReserva()
        {  
            $msg="";          
            if(isset($_SESSION["idUsuario"])){
                $reserva = new Reserva($_GET["idReserva"]); 
                $reservaDAO = new ReservaDAO($this->param);
                $retorno = $reservaDAO->getReserva($reserva); 
                 require "views/deletReservaUsuario.php";
            }else{
                if(isset($_SESSION["idPrestador"]))
                {
                    $reserva = new Reserva($_GET["idReserva"]); 
                    $reservaDAO = new ReservaDAO($this->param);
                    $retorno = $reservaDAO->getReserva($reserva);

                    require "views/deletReservaPorPrestador.php"; 
                }
            }
            
          
        }
        
        //função deletar Reserva
         public function deletReserva(){
            $msg = "";
             if ($_GET["idReserva"]){          
             
                $reserva = new Reserva(idReserva:$_GET["idReserva"], Situacao:"Cancelado");
                $reservaDAO = new reservaDAO($this->param);
                $msg = $reservaDAO->deletReserva($reserva); 
  
            }

            if(isset($_SESSION['idUsuario'])){
                header("Location:index.php?controle=ReservaController&metodo=listarAgenda&id=1");
            }else{
                if(isset($_SESSION['idPrestador'])){
                    header("Location:index.php?controle=prestadorController&metodo=home");
                }
            }

            

        }

        
        public function buscarDataAgenda()
        {
            if(isset($_GET['data']))
            {
				$prestador = new Prestador($_GET["idPrestador"]);
                $reserva = new Reserva(DataReserva:$_GET['data'], prestador:$prestador, Situacao:"Ativo");
                $reservaDAO = new reservaDAO($this->param);
                $retorno = $reservaDAO->buscarAgendaData($reserva);

                echo json_encode($retorno);
            }
           
        }
                
                
    }
?>