<?php
    class EmpresaDAO 
	{
		public function __construct( private $conexao){}
		

        public function autenticar($empresa)
		{
			$sql = "SELECT idEmpresa, NomeEmpresa FROM empresa WHERE Email = ? AND Senha = ?";
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $empresa->getEmail());
			$stm->bindValue(2, $empresa->getSenha());
			$stm->execute();
			$this->conexao = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}


        public function inserir($empresa)
		{
	
	
            $sql = "INSERT INTO empresa (NomeFantasia,RazaoSocial,Cnpj, logradouro,
            numero, bairro, cep, cidade, uf, fone, email, Senha, Status)
             values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $empresa->getNomeFantasia());
		    $stm->bindValue(2, $empresa->getRazaoSocial());
            $stm->bindValue(3, $empresa->getCnpj());
            $stm->bindValue(4, $empresa->getLogradouro());
            $stm->bindValue(5, $empresa->getNum());
            $stm->bindValue(6, $empresa->getBairro());
            $stm->bindValue(7, $empresa->getCep());
            $stm->bindValue(8, $empresa->getCidade());
            $stm->bindValue(9, $empresa->getUf());
            $stm->bindValue(10, $empresa->getFone());
            $stm->bindValue(11, $empresa->getEmail());
            $stm->bindValue(12, $empresa->getSenha());
            $stm->bindValue(13, $empresa->getStatus());
         
			$stm->execute();

            $this->conexao=null;
            /* //obtem a ultima chave inserida!
            $idEmpresa = $this->db->lastInsertId();

            $sql = "INSERT INTO prestador(idEmpresa, NomePrestador, DataNascimento, Celular, Email, Senha, Situacao) values (?,?,?,?,?,?,?)";
            $stm = $this->db->prepare($sql);
			$stm->bindValue(1, $idEmpresa);
			$stm->bindValue(2, $empresa->getPrestador()[0]->getNomePrestador());
            $stm->bindValue(3, $empresa->getPrestador()[0]->getDataNascimento());
            $stm->bindValue(4, $empresa->getPrestador()[0]->getCelular());
            $stm->bindValue(5, $empresa->getPrestador()[0]->getEmail());
            $stm->bindValue(6, $empresa->getPrestador()[0]->getSenha());
            $stm->bindValue(7, $empresa->getPrestador()[0]->getSituacao());*/
        }


        public function verificar_por_email($empresa)
		{
			$sql = "SELECT Email FROM empresa WHERE Email = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $empresa->getEmail());
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