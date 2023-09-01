<?php
    class Serv_Prest_ServDAO {
    public function __construct(private $conexao) {}

    public function cadastrarServicoPrestador($prestador)
	{
        $sql = "INSERT INTO serv_prest_serv (idPrestador, idServico, Situacao) VALUES (?,?,'Ativo')";

		//extrair do array $prestador o id do prestador e o array de id de serviços
		$idPrestador = $prestador->getIdPrestador();
		//var_dump( $idPrestador);
		$servico = $prestador->getServico();
		//echo "<pre>"; print_r($servico, $prestador); die();

        try {
            $stm = $this->conexao->prepare($sql);		

            foreach ($servico as $dado) {
                $stm->bindValue(1, $idPrestador);
                $stm->bindValue(2, $dado->getIdServico());                
                $stm->execute();
            }           

        } catch (PDOException $e) {

            return $e->getMessage();
        }

		$this->conexao = null;
		return "Serviços Cadastrado";
    }

    //função para selecionar o servico que o prestador vai alterar
    public function selectServ( $prestador, $servico,)
    {
        $sql = "SELECT * FROM `servico` 
                INNER JOIN serv_prest_serv ON servico.idServico=serv_prest_serv.idServico 
                WHERE serv_prest_serv.idPrestador=? AND serv_prest_serv.idServico=?";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $prestador->getIdPrestador());
            $stm->bindValue(2, $servico->getIdServico());
            $stm->execute();
            $this->conexao=null;
            return $stm->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            $this->conexao = null;
			return $e->getMessage();
        }
    }

    

    public function updateServPrest($servPrestServ)
    {
        $sql = "UPDATE serv_prest_serv 
                SET Situacao = ? 
                WHERE idPrestador = ? AND idServico = ?";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $servPrestServ->getSituacao()); 
            $stm->bindValue(2, $servPrestServ->getPrestador()); 
            $stm->bindValue(3, $servPrestServ->getServico());

           
            $stm->execute();
            $this->conexao=null;
            return "Serviço excluido com sucesso!";

        }catch(PDOException $e){
            $this->conexao = null;
			return $e->getMessage();
        }
    }

    //BUSCAR NO BANCO OS PRESTADORES PELO ID SERVIÇO
    public function selectPrestador($servico)
    {
        $sql = "SELECT * FROM serv_prest_serv 
                INNER JOIN prestador on serv_prest_serv.idPrestador=prestador.idPrestador 
                WHERE idServico=? AND serv_prest_serv.Situacao = 'Ativo';";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $servico->getIdServico());
                
            $stm->execute();
            $this->conexao=null;
            return $stm->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            $this->conexao = null;
			return $e->getMessage();
        }
        
    }

   
}

    
     
?>