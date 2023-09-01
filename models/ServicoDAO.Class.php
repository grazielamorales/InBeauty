<?php 
    class ServicoDAO
    {
        public function __construct( private $conexao){}

        public function buscarTodoServicos(){

            $sql = "SELECT *
                    FROM servico INNER JOIN serv_prest_serv
                    ON serv_prest_serv.idServico = servico.idServico
					INNER JOIN prestador ON prestador.idPrestador=serv_prest_serv.idPrestador";

            $stm = $this->conexao->prepare($sql);
			//executa a frase sql no BD
			$stm->execute();
			//fecha a conexao com o BD
			$this->conexao = null;
			//returna o resultado no formato de OBJETOS
			return $stm->fetchAll(PDO::FETCH_OBJ);
        
        }

		//função buscar todos os serviços cadastrados no BD
		function selectServicos()
		{
			$sql = "SELECT * FROM `servico` ORDER BY descritivo;";
			$stm = $this->conexao->prepare($sql);			
			$stm->execute();			
			$this->conexao = null;		
			return $stm->fetchAll(PDO::FETCH_OBJ);

		}		

		//função para criar paginação listagem de serviços p/ prestador
		public function calcularPaginas($idPrestador)
		{
			//Paginação - somar a qtde de registros 
			$sql = "SELECT * FROM `serv_prest_serv` 
							WHERE idPrestador=?";
			$stm = $this->conexao->prepare($sql );
			$stm->bindValue(1, $idPrestador);			
			$stm->execute();						
			return  $stm->fetchAll(PDO::FETCH_OBJ);						
		}

		public function qtde_pag($num_reg, $idPrestador)
		{
			//receber o numero da pag
			$pagAtual = filter_input(INPUT_GET,'pagina');
			$pagina = (!empty($pagAtual)) ? $pagAtual : 1;				
				
			//setar a qtde de itens por pag
			$qtdResultPag = 4;	

			//calcular a visualização
			$inicio = ($qtdResultPag * $pagina) - $qtdResultPag;

			$sql = "SELECT * FROM `serv_prest_serv` AS sp 
			 		 INNER JOIN servico AS s 
					 ON s.idServico = sp.idServico					 
					 WHERE idPrestador=? AND Situacao = 'Ativo' ORDER BY descritivo ASC
					 LIMIT $inicio, $qtdResultPag";

            $stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $idPrestador);			
			$stm->execute();						
			return $stm->fetchAll(PDO::FETCH_OBJ);			
			$this->conexao = null;
		}
	

		public function buscarTodoServicosPrestador($idPrestador,)
		{
			$sql = "SELECT * FROM serv_prest_serv AS sp 
			 		 INNER JOIN servico AS s 
					 ON s.idServico = sp.idServico					 
					 WHERE idPrestador=? AND sp.Situacao='Ativo' ORDER BY descritivo ASC ";

            $stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $idPrestador);			
			$stm->execute();						
			return $stm->fetchAll(PDO::FETCH_OBJ);			
			
			$this->conexao = null;
		}

		//função search da pag do usuario pesquisa serviço ou prestador
		public function pesquisar($data){
	
			$sql = "SELECT * FROM serv_prest_serv AS sp 
					INNER JOIN prestador AS p 
					ON sp.idPrestador = p.idPrestador 
					INNER JOIN servico AS s 
					ON sp.idServico = s.idServico 
					WHERE id LIKE '%$data%' OR Nome LIKE '%$data%' OR descritivo LIKE '%$data%'
					AND sp.Situacao = 'Ativo'";
			$stm = $this->conexao->prepare($sql);		
			$stm->execute();			
			$this->conexao = null;			
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

        //função para cadastrar um novo serviço no bd
       	public function inserir_servico($servico)
		{			
			$sql = "INSERT INTO servico (descritivo, preco, tempoEstimado) VALUES (?,?,?)";

			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $servico->getDescritivo());
				$stm->bindValue(2, $servico->getPreco());
				$stm->bindValue(3, $servico->getTempoEstimado());
				$stm->execute();
				$this->conexao = null;
				return "Serviço inserido com sucesso!";
			}
			catch(PDOException $e)
			{			
				$this->conexao = null;
				return $e->getMessage();
			}	
		
		
		}

		//função para EDITAR o serviço no BD
		public function editar_servico($servico)
		{ 
			
			$sql = "UPDATE servico SET descritivo = ?, preco = ?, tempoEstimado = ? WHERE idServico = ?";

			try {
				$stm = $this->conexao->prepare($sql);			
				$stm->bindValue(1, $servico->getDescritivo());
				$stm->bindValue(2, $servico->getPreco());
				$stm->bindValue(3, $servico->getTempoEstimado());
				$stm->bindValue(4, $servico->getIdServico());
				$stm->execute();
				$this-> conexao =null;
				return "Serviço alterado com sucesso!";


			}catch(PDOException $e)
			{
				
				$this->conexao = null;
				return $e->getMessage();
			}			

			
			

		}	

		//função para deletar o serviço no BD
		public function deletar_servico($idservico)
		{				
			$sql = "DELETE FROM servico WHERE idServico = ?";
			try {
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $idservico);
				$stm->execute();
				$stm->conexao = null;
				return "Serviço excluido com sucesso!";
				

			} catch (PDOException $e) {
				$this->conexao = null;
				//return $e->getMessage();
				return "ERRO! Registro não pode ser deletado!";
			}		

		}

		public function getServico($servico){

			$sql = "SELECT * FROM servico WHERE idServico = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $servico->getIdServico());				
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao verificar usuário pelo e-mail";
			}
		}

		public function getServicoPrestador($idServico)
		{
			$sql = "SELECT * FROM serv_prest_serv WHERE idPrestador = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $idServico);				
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao verificar usuário pelo e-mail";
			}
		}

		public function getServPrestador($idPrestador)
		{
			$sql = "SELECT * FROM `serv_prest_serv` AS sp 
					INNER JOIN servico AS s 
					ON sp.idServico = s.idServico WHERE idPrestador = ?";			

			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $idPrestador);			
			$stm->execute();		
			$this->conexao = null;		
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		
}
?>