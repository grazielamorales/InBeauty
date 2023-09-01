<?php
     class PrestadorDAO 
     {
         public function __construct( private $conexao){}
         
        //autenticar prestador
		public function autenticar($prestador)
		{
			$sql = "SELECT idPrestador, Nome, Situacao FROM prestador 
					WHERE Email = ? AND Senha = ? AND Situacao = 'Ativo'";
            $stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $prestador->getEmail());	
			$stm->bindValue(2, $prestador->getSenha());

			$stm->execute();
            $this->conexao = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

		//função para inserir prestador no bd
        public function inserir($prestador)
        { 			
			 
            //incluir prestador
            
            $sql = "INSERT INTO prestador (Nome, DtNasc,
                    Celular, Email, Senha, Situacao, Tipo) VALUES (?,?,?,?,?,?,?)";
            $stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $prestador->getNome());
		    $stm->bindValue(2, $prestador->getDtNasc());
            $stm->bindValue(3, $prestador->getCelular());
            $stm->bindValue(4, $prestador->getEmail());
            $stm->bindValue(5, $prestador->getSenha());
            $stm->bindValue(6, $prestador->getSituacao());
			$stm->bindValue(7, $prestador->getTipo());
			$stm->execute();
            $this->conexao = null;   
		}
        
		//função select prestadores por email
		public function verificar_por_email($prestador)
		{
			$sql = "SELECT Email FROM prestador WHERE Email = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $prestador->getEmail());
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
		//função selecionar todos os prestadores no bd
        public function getPrestadores(){

            $sql = "SELECT idPrestador, Nome FROM prestador";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao buscar prestadores";
			}
        }

		public function getPrest($prestador)
		{
			$sql = "SELECT idPrestador, Nome FROM prestador
					WHERE idPrestador = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $prestador->getIdPrestador());
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Erro! Problema ao buscar prestadores";
			}
		}

		//função select prestador pelo id
		public function getPrestador($prestador)
		{
			$sql = "SELECT * FROM prestador WHERE idPrestador =?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $prestador->getIdPrestador());				
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Erro! Problema ao selecionar prestador por id";
			}	
		}

		//função para alterar dados do prestador no banco
		public function upDate($prestador)
		{
			  $sql = "UPDATE prestador SET Nome=?, DtNasc=?, Celular=?, Email=?, Senha=?, Situacao=? WHERE idPrestador=?";
			try
			{
				$stm = $this->conexao->prepare($sql);							
				$stm->bindValue(1, $prestador->getNome());
				$stm->bindValue(2, $prestador->getDtNasc());
				$stm->bindValue(3, $prestador->getCelular());
				$stm->bindValue(4, $prestador->getEmail());
				$stm->bindValue(5, $prestador->getSenha());
				$stm->bindValue(6, $prestador->getSituacao());
				$stm->bindValue(7, $prestador->getIdPrestador());

				$stm->execute();
				$this->conexao = null;
				return "Conta alterada com sucesso!";
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return $e->getMessage();
			}
		}
		public function getTempoEstimado($idPrestador)
		{
			$sql = "SELECT tempoEstimado FROM prestador WHERE idPrestador = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $idPrestador);				
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
    }
?>