<?php
	class UsuarioDAO
	{
		public function __construct( private $conexao){}
		
		//função para autenticar email e senha do usuario
		public function autenticar($usuario)
		{
			$sql = "SELECT idUsuario, Nome, Email, Apelido FROM usuario 
					WHERE Email = ? AND Senha = ? AND Situacao='Ativo'";
			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $usuario->getEmail());
			$stm->bindValue(2, $usuario->getSenha());
			$stm->execute();
			$this->conexao = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

		//função para cadastrar o usuario (cliente)
		public function inserir($usuario)
		{
			$sql = "INSERT INTO usuario (Nome, Cpf, DataNascimento, Celular, Email,
			 Senha, Situacao, Apelido, Sexo) VALUES(?,?,?,?,?,?,?,?,?)";

			$stm = $this->conexao->prepare($sql);
			$stm->bindValue(1, $usuario->getNome());
			$stm->bindValue(2, $usuario->getCpf());
			$stm->bindValue(3, $usuario->getDataNascimento());
			$stm->bindValue(4, $usuario->getCelular());
			$stm->bindValue(5, $usuario->getEmail());
			$stm->bindValue(6, $usuario->getSenha());			
			$stm->bindValue(7, $usuario->getSituacao());
			$stm->bindValue(8, $usuario->getApelido());
			$stm->bindValue(9, $usuario->getSexo());
			$stm->execute();
			$this->conexao = null;
		}

		//função para verificar se email já não esta cadastrado no BD
		public function verificar_por_email($usuario)
		{
			$sql = "SELECT Email FROM usuario WHERE Email = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $usuario->getEmail());
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

		//função buscar dados do usuario no BD pelo id
		public function getUsuario($idUsuario)
		{
			$sql = "SELECT * FROM usuario WHERE idUsuario = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $idUsuario);
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao verificar usuário pelo id";
			}
		}

		public function selectUsuario($usuario)
		{
			$sql = "SELECT * FROM usuario WHERE idUsuario=?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $usuario->getidUsuario());				
				$stm->execute();
				$this->conexao = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Problema ao verificar usuário pelo id";
			}

		}
		
		//função para alterar dados do usuario no bd
		public function updateUsuario($usuarioEdit)
		{
			$sql = "UPDATE usuario SET Nome=?, Cpf=?, DataNascimento=?, Celular=?,
					Email=?, Senha=?, Situacao=?, Apelido=?, Sexo=?
					WHERE idUsuario = ?";
			try
			{
				$stm = $this->conexao->prepare($sql);
				$stm->bindValue(1, $usuarioEdit->getNome());
				$stm->bindValue(2, $usuarioEdit->getCpf());
				$stm->bindValue(3, $usuarioEdit->getDataNascimento());
				$stm->bindValue(4, $usuarioEdit->getCelular());
				$stm->bindValue(5, $usuarioEdit->getEmail());
				$stm->bindValue(6, $usuarioEdit->getSenha());
				$stm->bindValue(7, $usuarioEdit->getSituacao());
				$stm->bindValue(8, $usuarioEdit->getApelido());
				$stm->bindValue(9, $usuarioEdit->getSexo());
				$stm->bindValue(10,$usuarioEdit->getIdUsuario());
				$stm->execute();
				$this->conexao = null;
				return "Usuário alterado com sucesso!";
			}
			catch(PDOException $e)
			{
				$this->conexao = null;
				return "Erro! Não foi possível realizar a alteração!";
			}
		}
		//função para desativar conta do usuario
		public function cancelaUsuario($usuario)
		{
			$sql = "UPDATE usuario SET Situacao='Inativa' WHERE idUsuario=?";
			try {
				$stm = $this->conexao->prepare($sql); // Usar prepare() em vez de query()
				$stm->bindValue(1, $usuario->getIdUsuario());				
				$stm->execute();
				$this->conexao = null;
				return "Conta cancelada com sucesso!";
			} catch (PDOException $e) {
				$this->conexao = null;
				return "Erro! Não foi possível cancelar sua conta!";
			}
		}





	}//fim da classe
?>