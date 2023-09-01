<?php
require_once "models/Conexao.Class.php";
require_once "models/Servico.Class.php";
require_once "models/ServicoDAO.Class.php";
require_once "models/Usuario.Class.php";
require_once "models/UsuarioDAO.Class.php";
require_once "models/Prestador.Class.php";
require_once "models/PrestadorDAO.Class.php";
require_once "models/Serv_Prest_Serv.Class.php";
require_once "models/Serv_Prest_ServDAO.Class.php";


class ServicoController
{
    private $param;
    public function __construct(){

        $this->param = conexao::getInstancia();
    
    }    
    
    //função para o prestador cadastrar um serviço novo
    public function Adicionar()
    { 
        $msg = "";
        if($_GET["idPrestador"])
        {
            $prestador = $_GET["idPrestador"];            

            //buscar dados de todos os serviços p/ preencher as option           
            $servicoDAO= new ServicoDAO($this->param);
            $retServ = $servicoDAO->selectServicos();

            //echo "<pre>"; print_r($retServ, $idPrestador); die();                         

            if(isset($_POST['servico']))
            {
                 $prestador = new Prestador(idPrestador:$prestador); 

                //echo "<pre>"; var_dump($_POST['servico'], $_POST["idPrestador"]);die();
                
                foreach($_POST['servico'] as $servico )
                {
                    $servico = new Servico(idServico:$servico);
                    $prestador->setServico($servico);
                } 

               //echo "<pre>"; var_dump($prestador); die(); 
                
                $servPrestServDAO = new Serv_Prest_ServDAO($this->param);
                $msg = $servPrestServDAO-> cadastrarServicoPrestador($prestador);               

                   echo $msg;

                header("Location:index.php?controle=prestadorController&metodo=listarServicos&pagina=1");                 
            }
        
            require_once "views/formRelacionarServicoPrestador.php";    
        }
             
    }     
    
    // função para editar serviço pelo prestador
    public function Editar()
    {
        $msg = ["","",""];
        $resp = "";
        if (isset($_GET["idServico"])) {
           
            $servico = $_GET['idServico'];           

            // buscar dados do Serviço pelo idServico
            $servico = new Servico(idServico:$servico);
            $servicoDAO = new ServicoDAO($this->param);
            $ret = $servicoDAO->getServico($servico);            
             //echo "<pre>"; var_dump($ret); die();  

            // verificar se houve alteração correta e post
            if ($_POST) {
                
                $erro = false;
                if ($_POST["descritivo"] == "") {                    
                    $msg[0]="Preencha a descrição do serviço!";
                    $erro = true;
                }
                if ($_POST["preco"] == "") {                    
                    $msg[1]="Preencha o preço do serviço";
                    $erro = true;
                }
                if ($_POST["tempoEstimado"] == "") {                    
                    $msg[2]="Preencha o tempo estimado do serviço!";
                    $erro = true;
                }
                
                if (!$erro) {
                    
                    // inserir no banco de dados a alteração do serviço
                    $servico = new Servico(
                    $_POST['idServico'],
                    $_POST["descritivo"],
                    floatval($_POST['preco']),
                    $_POST['tempoEstimado'],
                );                                    
                    //echo "<pre>"; var_dump($servico); die();   
                    $servicoDAO = new ServicoDAO($this->param);
                    $resp = $servicoDAO->editar_servico($servico);
                }
            }
        }
    require_once "views/formEditarServico.php";
    }

    public function confirmaCancelaServico()
    {
        $msg = "";
        if (isset($_GET["id"]) && isset($_GET["idPrestador"]))
        {

            $servico = $_GET['id']; 
            $prestador = $_GET["idPrestador"];

            $servico = new Servico(idServico:$servico);
            $prestador = new Prestador(idPrestador:$prestador);           
            //echo "<pre>"; var_dump($prestador,$servico); "<br>"; die();            

            $prestServPrest = new Serv_Prest_ServDAO($this->param);
            $ret = $prestServPrest->selectServ($prestador, $servico);           
                 
            //echo "<pre>"; var_dump($ret); die(); 

            if($_POST){

                $servPrestServ = new serv_Prest_Serv(prestador:$_POST['idPrestador'], servico:$_POST['idServico'], situacao:"Inativo");

                 //echo "<pre>"; var_dump($servPrestServ); die(); 
               
                $servPrestServDAO = new Serv_Prest_ServDAO($this->param);  
                $resp = $servPrestServDAO->updateServPrest($servPrestServ);  

                $msg = $resp;

                //header("Location:index.php?controle=prestadorController&metodo=listarServicos&id=3&pagina=1");
                
            }          

            
        }
        require_once "views/ConfirmaCancelaServicoPrestador.php";
    }

    //função para inativar um serviço no BD ref. ao prestador
    public function cancelarServico()
    {
        $msg = "";
        if (isset($_GET["id"]) && isset($_GET["idPrestador"]))
        {

            $servico = $_GET['id']; 
            $prestador = $_GET["idPrestador"];

            $servico = new Servico(idServico:$servico);
            $prestador = new Prestador(idPrestador:$prestador);           
            //echo "<pre>"; var_dump($prestador,$servico); "<br>"; die();

            $serPrestServ = new Serv_Prest_Serv(prestador:$prestador, servico:$servico, situacao:'Ativo'); 

            $prestServPrest = new Serv_Prest_ServDAO($this->param);
            $ret = $prestServPrest->selectServ($prestador, $servico);        


            if($_POST){

               
                $servPrestServ = new Serv_Prest_Serv(prestador:$_POST['idPrestador'], servico:$_POST["idServico"], situacao:"Inativo");
                $servPrestServDAO = new Serv_Prest_ServDAO($this->param);  
                $resp = $servPrestServDAO->updateServPrest($serPrestServ);  

                header("Location:index.php?controle=prestadorController&metodo=listarServicos&id=3&pagina=1");
                
            }         
              
           

        }
        require_once "views/ConfirmaCancelaServicoPrestador.php";
    }
    
    

   

}
?>